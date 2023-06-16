<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class TrainerEndpoints
{
    function create_trainee_endpoint()
    {
        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'create_trainee_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_trainee_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'update_trainee_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/project',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'create_individual_project'),
            )
        );

        register_rest_route(
            'em/v1',
            '/project',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'update_individual_project'),
            )
        );

        register_rest_route(
            'em/v1',
            '/project',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_individual_projects'),
            )
        );

    register_rest_route(
        'em/v1',
        '/project',
        array(
            'methods' => 'POST',
            'callback' => array($this, 'create_group_project'),
        )
    );

    register_rest_route(
        'em/v1',
        '/project',
        array(
            'methods' => 'POST',
            'callback' => array($this, 'update_group_project'),
        )
    );

    register_rest_route(
        'em/v1',
        '/project',
        array(
            'methods' => 'GET',
            'callback' => array($this, 'retrieve_group_projects'),
        )
    );
}

    

    function create_trainee_callback($request)
    {
        $parameters = $request->get_params();

        $trainee_name = sanitize_text_field($parameters['trainee-name']);
        $trainee_email = sanitize_email($parameters['trainee-email']);
        $trainee_role = sanitize_text_field($parameters['trainee-role']);


        if (empty($errors)) {

            global $wpdb;
            $table_name = $wpdb->prefix . 'trainees';

            $data = array(
                'trainee' => $trainee_name,
                'email' => $trainee_email,
                'role' => $trainee_role,
            );

            $wpdb->insert($table_name, $data);

            $response = array(
                'success' => true,
                'message' => 'Trainee created successfully',
            );

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => $errors,
            );

            return rest_ensure_response($response)->set_status(400);
        }


    }
    function retrieve_trainee_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'trainees';

        $result = "SELECT * FROM $table_name WHERE `trainee_delete` = 0";

        $data = $wpdb->get_results($result);

        return $data;
    }

    function create_individual_project($request)
    {
        $data = $request->get_json_params();

        $project_name = $data['project_name'];
        $project_task = $data['project_task'];
        $assignee = $data['assignee'];
        $due_date = $data['due_date'];


        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';

        $data = $wpdb->insert($table_name, array(
            'project_name' => $project_name,
            'project_task' => $project_task,
            'assignee' => $assignee,
            'due_date' => $due_date,
        ));

        return $data;

    }

    function update_individual_project($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';
        $project_id = $request['project_id'];
        
        $data = $request->get_json_params();

        $project_name = $data['project_name'];
        $project_task = $data['project_task'];
        $assignee = $data['assignee'];
        $due_date = $data['due_date'];


        $data = array(

            'project_name' => $project_name,
            'project_task' => $project_task,
            'assignee' => $assignee,
            'due_date' => $due_date,
        );
        $condition = array('project_id' => $project_id);

        $wpdb->update($table_name, $data, $condition);
    }

    
    function retrieve_individual_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';
    
        $project_id = $request->get_param('project_id');
    
        $projects = $wpdb->get_results($wpdb->prepare(
            "SELECT project_name, project_task, assignee, due_date, project_status  FROM $table_name WHERE project_status = 0 
        "));
    
        // if (empty($projects)) {
        //     return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        // }
    
        return $projects;
    }

    function create_group_project($request)
    {
        $data = $request->get_json_params();

        $assigned_trainees = $data['assigned_trainees'];
        $project_name = $data['project_name'];
        $project_task = $data['project_task'];
        $due_date = $data['due_date'];


        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';

        $data = $wpdb->insert($table_name, array(
            'assigned_trainees' => $assigned_trainees,
            'project_name' => $project_name,
            'project_task' => $project_task,
            'due_date' => $due_date,
        ));

        return $data;

    }

    function update_group_project($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';
        $project_id = $request['project_id'];
        
        $data = $request->get_json_params();

        $assigned_trainees = $data['assigned_trainees'];
        $project_name = $data['project_name'];
        $project_task = $data['project_task'];
        $due_date = $data['due_date'];


        $data = array(

            'assigned_trainees' => $assigned_trainees,
            'project_name' => $project_name,
            'project_task' => $project_task,
            'due_date' => $due_date,
        );
        $condition = array('project_id' => $project_id);

        $wpdb->update($table_name, $data, $condition);
    }

    
    function retrieve_group_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';
    
        $project_id = $request->get_param('project_id');
    
        $projects = $wpdb->get_results($wpdb->prepare(
            "SELECT assigned_trainees project_name, project_task, due_date, project_status  FROM $table_name WHERE project_status = 0 
        "));
    
        // if (empty($projects)) {
        //     return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        // }
    
        return $projects;
    }
}