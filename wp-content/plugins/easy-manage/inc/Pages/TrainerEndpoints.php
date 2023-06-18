<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class TrainerEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this, "trainer_endpoints"));
    }

    public function trainer_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => array('POST', 'GET'),
                'callback' => array($this, 'trainee_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/individual',
            array(
                'methods' => array('POST'),
                'callback' => array($this, 'create_individual_project'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/group',
            array(
                'methods' => array('POST'),
                'callback' => array($this, 'create_group_project'),
            )
        );
    }

    // Callback methods

    public function trainee_callback($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_trainee_callback($request);
        } elseif ($request->get_method() === 'GET') {
            return $this->retrieve_trainee_callback($request);
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

    // Callback methods for trainee endpoints

    public function create_trainee_callback($request)
    {
        $parameters = $request->get_params();

        $trainee_name = sanitize_text_field($parameters['trainee_name']);
        $trainee_email = sanitize_email($parameters['trainee_email']);
        $trainee_role = sanitize_text_field($parameters['trainee_role']);
        $trainee_password = sanitize_text_field($parameters['trainee_password']);


        $user_id = wp_create_user($trainee_name, $trainee_password, $trainee_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('id', $user_id);

            $user->set_role($trainee_role);

            $response = array(
                'success' => true,
                'message' => 'Trainee created successfully',
                'user_id' => $user_id,
            );

            // Send email to trainee with login information
            $email_subject = 'Your Trainee Account Details';
            $email_body = 'Your username: ' . $user->user_login . "\r\n";
            $email_body .= 'Your password: ' . $trainee_password . "\r\n";
            $email_body .= 'Please login to the website using this information.';
            wp_mail($trainee_email, $email_subject, $email_body);

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'Trainee not created'),
            );

            return rest_ensure_response($response)->set_status(400);
        }
    }

    public function retrieve_trainee_callback($request)
    {
        $users = get_users();

        $trainees = array();

        foreach ($users as $user) {
            if (in_array('trainee', $user->roles)) {
                $trainees[] = array(
                    'trainee_name' => $user->display_name,
                    'trainee_email' => $user->user_email,
                    'trainee_role' => $user->roles[0],
                );
            }
        }

        return $trainees;
    }


    public function create_individual_project($request)
    {
        $parameters = $request->get_json_params();


        if (empty($parameters) || !isset($parameters['project_name']) || !isset($parameters['project_task']) || !isset($parameters['assignee']) || !isset($parameters['due_date'])) {
            return new WP_Error('invalid_parameters', 'Invalid parameters.', array('status' => 400));
        }
    
        $project_name = $parameters['project_name'];
        $project_task = $parameters['project_task'];
        $assignee = $parameters['assignee'];
        $due_date = $parameters['due_date'];

        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';

        $result = $wpdb->insert(
            $table_name,
            array(
                'project_name' => $project_name,
                'project_task' => $project_task,
                'assignee' => $assignee,
                'due_date' => $due_date,
            )
        );

        // If project creation is successful, return a success response
        if ($result) {
            $project_id = $wpdb->insert_id; // Retrieve the inserted project ID

            $response = array(
                'success' => true,
                'message' => 'Individual project created successfully',
                'project_id' => $project_id,
            );

            return rest_ensure_response($response);
        }

        // If project creation fails, return an error response
        return new WP_Error('project_creation_failed', 'Failed to create individual project.', array('status' => 500));
    }


    // public function update_individual_project($request)
    // {
    //     global $wpdb;
    //     $table_name = $wpdb->prefix . 'individual_projects';
    //     $project_id = $request['project_id'];

    //     $data = $request->get_json_params();

    //     $project_name = $data['project_name'];
    //     $project_task = $data['project_task'];
    //     $assignee = $data['assignee'];
    //     $due_date = $data['due_date'];


    //     $data = array(

    //         'project_name' => $project_name,
    //         'project_task' => $project_task,
    //         'assignee' => $assignee,
    //         'due_date' => $due_date,
    //     );
    //     $condition = array('project_id' => $project_id);

    //     $wpdb->update($table_name, $data, $condition);
    // }


    
    public function create_group_project($request)
    {
        $data = $request->get_json_params();

        $assigned_trainees = $data['assigned_trainees'];
        $project_name = $data['project_name'];
        $project_task = $data['project_task'];
        $due_date = $data['due_date'];


        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';

        $result = $wpdb->insert(
            $table_name,
            array(
                'assigned_trainees' => $assigned_trainees,
                'project_name' => $project_name,
                'project_task' => $project_task,
                'due_date' => $due_date,
            )
        );

        // If project creation is successful, return a success response
        if ($result) {
            $response = array(
                'success' => true,
                'message' => 'Group project created successfully',
                'project_id' => $result, // Example: The inserted project ID
            );

            return rest_ensure_response($response);
        }

        // If project creation fails, return an error response
        return new WP_Error('project_creation_failed', 'Failed to create group project.', array('status' => 500));

    }

    // public function update_group_project($request)
    // {
    //     global $wpdb;
    //     $table_name = $wpdb->prefix . 'group_projects';
    //     $project_id = $request['project_id'];

    //     $data = $request->get_json_params();

    //     $assigned_trainees = $data['assigned_trainees'];
    //     $project_name = $data['project_name'];
    //     $project_task = $data['project_task'];
    //     $due_date = $data['due_date'];


    //     $data = array(

    //         'assigned_trainees' => $assigned_trainees,
    //         'project_name' => $project_name,
    //         'project_task' => $project_task,
    //         'due_date' => $due_date,
    //     );
    //     $condition = array('project_id' => $project_id);

    //     $wpdb->update($table_name, $data, $condition);
    // }

}