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
                'methods' => array('POST',),
                'callback' => array($this, 'create_trainer_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/cohorts',
            array(
                'methods' => array('POST',),
                'callback' => array($this, 'create_cohort_callback'),
            )
        );
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

    // Callback methods for trainee endpoints

    public function create_trainer_callback($request)
    {
        $parameters = $request->get_params();

        $trainer_name = sanitize_text_field($parameters['trainer_name']);
        $trainer_email = sanitize_email($parameters['trainer_email']);
        $trainer_role = sanitize_text_field($parameters['trainer_role']);
        $trainer_password = sanitize_text_field($parameters['trainer_password']);


        $user_id = wp_create_user($trainer_name, $trainer_password, $trainer_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('id', $user_id);

            $user->set_role($trainer_role);

            $response = array(
                'success' => true,
                'message' => 'Trainer created successfully',
                'user_id' => $user_id,
            );

            // Send email to trainee with login information
            $email_subject = 'Your Trainer Account Details';
            $email_body = 'Your username: ' . $user->user_login . "\r\n";
            $email_body .= 'Your password: ' . $trainer_password . "\r\n";
            $email_body .= 'Please login to the website using this information.';
            wp_mail($trainer_email, $email_subject, $email_body);

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'Trainer not created'),
            );

            return rest_ensure_response($response)->set_status(400);
        }
    }

    
    public function create_cohort_callback($request)
    {
        $parameters = $request->get_json_params();


        if (empty($parameters) || !isset($parameters['cohort']) || !isset($parameters['cohort_info']) || !isset($parameters['trainer']) || !isset($parameters['starting_date']) || !isset($parameters['ending_date'])) {
            return new WP_Error('invalid_parameters', 'Invalid parameters.', array('status' => 400));
        }
    
        $cohort = $parameters['cohort'];
        $cohort_info = $parameters['cohort_info'];
        $trainer = $parameters['trainer'];
        $starting_date = $parameters['starting_date'];
        $ending_date = $parameters['ending_date'];

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

        // If project creation is successful, return a success response
        if ($result) {
            $cohort_id = $wpdb->insert_id; // Retrieve the inserted project ID

            $response = array(
                'success' => true,
                'message' => 'Individual project created successfully',
                'cohort_id' => $cohort_id,
            );

            return rest_ensure_response($response);
        }

        // If project creation fails, return an error response
        return new WP_Error('cohort_creation_failed', 'Failed to create cohort.', array('status' => 500));
    }


    // public function update_individual_project($request)
    // {
    //     global $wpdb;
    //     $table_name = $wpdb->prefix . 'individual_projects';
    //     $project_id = $request['project_id'];

    //     $data = $request->get_json_params();

    //     $project_name = $data['project_name'];
    //     $cohort_info = $data['cohort_info'];
    //     $trainer = $data['trainer'];
    //     $starting_date = $data['starting_date'];


    //     $data = array(

    //         'project_name' => $project_name,
    //         'cohort_info' => $cohort_info,
    //         'trainer' => $trainer,
    //         'starting_date' => $starting_date,
    //     );
    //     $condition = array('project_id' => $project_id);

    //     $wpdb->update($table_name, $data, $condition);
    // }


    
}

