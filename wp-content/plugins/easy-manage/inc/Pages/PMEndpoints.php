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
        add_action("rest_api_init", array($this,"pm_endpoints" ));
    }
    public function pm_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/trainer',
            array(
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'trainer_callbacks'),
            )
        );

        register_rest_route(
            'em/v1',
            '/cohorts',
            array(
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'cohort_callbacks'),
            )
        );

    }

    public function trainer_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_trainer_callback($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_trainer_callback($request);
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



    // Permission callback methods

    // public function manage_trainees_permission($request)
    // {
    //     if (!current_user_can('manage_options')) {
    //         return new WP_Error(
    //             'rest_forbidden',
    //             __('You do not have permissions to manage trainees.', 'text-domain'),
    //             array('status' => 403)
    //         );
    //     }

    //     return true;
    // }



    public function create_trainer_callback($request)
    {
        $parameters = $request->get_params();

        $trainer_name = sanitize_text_field($request->get_param('trainer_name'));
        $trainer_email = sanitize_email($request->get_param('trainer_email'));
        $trainer_role = sanitize_text_field($request->get_param('trainer_role'));
        $trainer_password = sanitize_text_field($request->get_param('trainer_password'));


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

            // Send email to trainee with login information
            // $email_subject = 'Your Trainer Account Details';
            // $email_body = 'Your username: ' . $user->user_login . "\r\n";
            // $email_body .= 'Your password: ' . $trainer_password . "\r\n";
            // $email_body .= 'Please login to the website using this information.';
            // wp_mail($trainer_email, $email_subject, $email_body);

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'Trainer not created'),
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
        $trainer_password = sanitize_text_field($request->get_param('trainer_password'));

        $user = get_user_by('id', $trainer_id);

        if ($user) {
            $user->user_login = $trainer_name;
            $user->user_email = $trainer_email;

            if ($trainer_password) {
                wp_set_password($trainer_password, $trainer_id);
            }

            $user->set_role($trainer_role);
            wp_update_user($user);

            $response = array(
                'success' => true,
                'message' => 'trainer updated successfully',
                'user_id' => $trainer_id,
            );

            return rest_ensure_response($response);

        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'trainer not found'),
            );

            return new WP_Error('trainer_updating_failed', 'Failed to update trainer.', array('status' => 500));
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
                'message' => 'Cohort created successfully',
                'cohort_id' => $cohort_id,
            );

            return rest_ensure_response($response);
        }  
        return new WP_Error('cohort_updation_failed', 'Failed to update cohort.', array('status' => 500));

    }


    
}

