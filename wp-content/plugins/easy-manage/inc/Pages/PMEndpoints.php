<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class PMEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this, "pm_endpoints"));
    }
    public function pm_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/trainer',
            array(
                'methods' => array('POST', 'PUT', 'GET'),
                'callback' => array($this, 'trainer_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/cohorts',
            array(
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'cohort_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }

    public function check_admin_permission($request)
    {
        if (current_user_can('program_manager')) {
            return true;
        } else {
            return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
        }
    }
    

    public function trainer_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_trainer_callback($request);
        } elseif ($request->get_method() === 'PUT') {
            return $this->update_trainer_callback($request);
        } elseif ($request->get_method() === 'GET') {
            return $this->retrieve_deleted_trainers($request);
        }
    }
    public function cohort_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_cohort_callback($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_cohort_callback($request);
        }
    }
    public function create_trainer_callback($request)
    {
        $parameters = $request->get_params();

        $trainer_name = sanitize_text_field($request->get_param('trainer_name'));
        $trainer_email = sanitize_email($request->get_param('trainer_email'));
        $trainer_role = sanitize_text_field($request->get_param('trainer_role'));
        $trainer_password = sanitize_text_field($request->get_param('trainer_password'));

        if (empty($trainer_name) || empty($trainer_email) || empty($trainer_password)) {
            $missing_fields = array();
            if (empty($trainer_name)) {
                $missing_fields[] = 'trainer_name';
            }
            if (empty($trainer_email)) {
                $missing_fields[] = 'trainer_email';
            }
            if (empty($trainer_password)) {
                $missing_fields[] = 'trainer_password';
            }

            return new WP_Error('missing_fields', 'The following fields are required: ' . implode(', ', $missing_fields), array('status' => 400));
        }

        $existing_email = email_exists($trainer_email);
        if ($existing_email) {
            return new WP_Error('email_exists', 'Trainer with the same email already exists.', array('status' => 400));
        }

        $allowed_roles = array('trainer');
        if (!in_array($trainer_role, $allowed_roles)) {
            return new WP_Error('invalid_role', 'Invalid trainer role specified.', array('status' => 400));
        }

        $user_id = wp_create_user($trainer_name, $trainer_password, $trainer_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('login', $trainer_name);

            $user->set_role($trainer_role);
            wp_update_user($user);

            $response = array(
                'success' => true,
                'message' => 'Trainer created successfully',
                'user_id' => $user_id,
            );
            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('trainer_creation_failed', 'Failed to create Trainer.', array('status' => 400)),
            );
            return rest_ensure_response($response);
        }
    }

    public function update_trainer_callback($request)
    {
        $parameters = $request->get_params();

        $trainer_id = sanitize_text_field($request->get_param('trainer_id'));
        $trainer_name = sanitize_text_field($request->get_param('trainer_name'));
        $trainer_email = sanitize_email($request->get_param('trainer_email'));
        $trainer_role = sanitize_text_field($request->get_param('trainer_role'));

        $existing_trainer = get_users(
            array(
                'meta_query' => array(
                    'relation' => 'OR',
                    array('key' => 'user_name', 'value' => $trainer_name),
                    array('key' => 'user_email', 'value' => $trainer_email),
                ),
                'exclude' => array($trainer_id),
                'role' => 'trainer',
            )
        );

        if (!empty($existing_trainer)) {
            return new WP_Error('trainer_exists', 'A trainer with the same name or email already exists.', array('status' => 400));
        }

        $user = get_user_by('id', $trainer_id);

        if ($user) {
            $update_fields = array();
            if ($user->user_nicename !== $trainer_name) {
                $update_fields['user_nicename'] = $trainer_name;
                $update_fields['user_login'] = $trainer_name;
            }
            if ($user->user_email !== $trainer_email) {
                $update_fields['user_email'] = $trainer_email;
            }
            if (!empty($update_fields)) {
                wp_update_user(array('ID' => $trainer_id) + $update_fields);
            }

            update_user_meta($trainer_id, 'trainer_role', $trainer_role);

            $response = array(
                'success' => true,
                'message' => 'Trainer updated successfully',
            );
            return rest_ensure_response($response);
        } else {
            return new WP_Error('trainer_not_found', 'Trainer not found.', array('status' => 404));
        }
    }


    public function create_cohort_callback($request)
    {
            $parameters = $request->get_json_params();

            $cohort = $request->get_param('cohort');
            $cohort_info = $request->get_param('cohort_info');
            $trainer = $request->get_param('trainer');
            $starting_date = $request->get_param('starting_date');
            $ending_date = $request->get_param('ending_date');

            if (strtotime($ending_date) <= strtotime($starting_date)) {
                return new WP_Error('invalid_dates', 'Invalid cohort dates. The ending date must be after the starting date.', array('status' => 400));
            }

            global $wpdb;
            $table_name = $wpdb->prefix . 'cohorts';

            $result = $wpdb->insert(
                $table_name,
                array(
                    'cohort' => $cohort,
                    'cohort_info' => $cohort_info,
                    'trainer' => $trainer,
                    'starting_date' => $starting_date,
                    'ending_date' => $ending_date,
                )
            );

            if ($result) {
                $cohort_id = $wpdb->insert_id;
                $response = array(
                    'success' => true,
                    'message' => 'Cohort created successfully',
                    'cohort_id' => $cohort_id,
                );
                return rest_ensure_response($response);
            }

            return new WP_Error('cohort_creation_failed', 'Failed to create cohort.', array('status' => 500));
        } 
    
    


    public function update_cohort_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cohorts';
        $cohort_id = $request['cohort_id'];

        $data = $request->get_json_params();

        $cohort = $request->get_param('cohort');
        $cohort_info = $request->get_param('cohort_info');
        $trainer = $request->get_param('trainer');
        $starting_date = $request->get_param('starting_date');
        $ending_date = $request->get_param('ending_date');

        $data = array(

            'cohort' => $cohort,
            'cohort_info' => $cohort_info,
            'trainer' => $trainer,
            'starting_date' => $starting_date,
            'ending_date' => $ending_date,
        );
        $condition = array('cohort_id' => $cohort_id);

        $updated = $wpdb->update($table_name, $data, $condition);

        if ($updated) {
            $cohort_id = $wpdb->insert_id;

            $response = array(
                'success' => true,
                'message' => 'Cohort updated successfully',
                'cohort_id' => $cohort_id,
            );

            return rest_ensure_response($response);
        }
        return new WP_Error('cohort_updation_failed', 'Failed to update cohort.', array('status' => 500));
    }

    public function retrieve_deleted_trainers($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $trainer_status = 1;

        $trainees = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = %d AND ID IN (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value LIKE '%%\"trainer\"%%')",
                $trainer_status
            )
        );

        if (empty($trainees)) {
            return new WP_Error('no_trainer', 'No trainers found.', array('status' => 404));
        }

        return $trainees;
    }
}