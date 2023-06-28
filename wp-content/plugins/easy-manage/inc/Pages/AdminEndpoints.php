<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class AdminEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this, "admin_endpoints"));
    }
    public function admin_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/pm',
            array(
                'methods' => array('POST', 'PATCH', 'GET'),
                'callback' => array($this, 'pm_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }

    public function check_admin_permission($request)
    {

        if (current_user_can('administrator')) {
            return true;
        } else {
            return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
        }
    }

    public function pm_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_pm_callback($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_pm_callback($request);
        } elseif ($request->get_method() === 'GET') {
            return $this->retrieve_soft_deleted($request);
        }
    }

    public function create_pm_callback($request)
    {

        $parameters = $request->get_params();


        $pm_name = sanitize_text_field($request->get_param('pm_name'));
        $pm_email = sanitize_email($request->get_param('pm_email'));
        $pm_role = sanitize_text_field($request->get_param('pm_role'));
        $pm_password = sanitize_text_field($request->get_param('pm_password'));

        if (empty($pm_name) || empty($pm_email) || empty($pm_role) || empty($pm_password)) {
            $missing_fields = array();
            if (empty($pm_name)) {
                $missing_fields[] = 'pm_name';
            }
            if (empty($pm_email)) {
                $missing_fields[] = 'pm_email';
            }
            if (empty($pm_role)) {
                $missing_fields[] = 'pm_role';
            }
            if (empty($pm_password)) {
                $missing_fields[] = 'pm_password';
            }

            return new WP_Error('missing_fields', 'Cannot create the program manager without the ' . implode(', ', $missing_fields), array('status' => 400));
        }

        $existing_email = email_exists($pm_email);
        if ($existing_email) {
            return new WP_Error('email_exists', 'User with the same email already exists.', array('status' => 400));
        }

        $allowed_roles = array('program_manager');
        if (!in_array($pm_role, $allowed_roles)) {
            return new WP_Error('invalid_role', 'Invalid program manager role specified.', array('status' => 400));
        }

        $user_id = wp_create_user($pm_name, $pm_password, $pm_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('login', $pm_name);

            $user->set_role($pm_role);

            wp_update_user($user);

            $response = array(
                'success' => true,
                'message' => 'Project Manager created successfully',
                'user_id' => $user_id,
            );

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('pm_creation_failed', 'Failed to create Project Manager.', array('status' => 400)),
            );

            return rest_ensure_response($response)->set_status(400);
        }
    
    }


    public function update_pm_callback($request)
    {
        $parameters = $request->get_json_params();
    
        $pm_id = sanitize_text_field($request->get_json_param('pm_id'));
        $pm_name = sanitize_text_field($request->get_json_param('pm_name'));
        $pm_email = sanitize_email($request->get_json_param('pm_email'));
        $pm_role = sanitize_text_field($request->get_json_param('pm_role'));
        $pm_password = sanitize_text_field($request->get_json_param('pm_password'));
    
        $user = get_user_by('id', $pm_id);
    
        if ($user) {
            $user->user_login = $pm_name;
            $user->user_nicename = sanitize_title($pm_name);
            $user->user_email = $pm_email;
    
            if ($pm_password) {
                wp_set_password($pm_password, $pm_id);
            }
            $user->set_role($pm_role);
            wp_update_user($user);
            $response = array(
                'success' => true,
                'message' => 'Program manager updated successfully',
                'user_id' => $pm_id,
            );
            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('program_manager_not_found', 'Program manager not found'),
            );
            return new WP_Error('program_manager_update_failed', 'Failed to update program manager.', array('status' => 500));
        }
    }
    

    public function retrieve_soft_deleted($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
    
        $users = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = 1"
            )
        );
    
        if (empty($users)) {
            return new WP_Error('no_deactivated user', 'No deactivated users found.', array('status' => 404));
        }
    
        return $users;
    }

}