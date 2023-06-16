<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class TraineeEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this,"trainee_endpoint" ));
    }
    public function trainee_endpoint()
    {
        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_individual_projects'),
            )
        );

        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_group_projects'),
            )
        );

        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_completed_projects'),
            )
        );
    }
    public function retrieve_individual_projects($request)
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

    public function retrieve_group_projects($request)
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

    public function retrieve_individual_completed_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';
    
        $project_id = $request->get_param('project_id');
    
        $projects = $wpdb->get_results($wpdb->prepare(
            "SELECT project_name, project_task, assignee, due_date, project_status  FROM $table_name WHERE project_status = 1 
        "));
    
        // if (empty($projects)) {
        //     return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        // }
    
        return $projects;
    }

    public function retrieve_group_completed_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';
    
        $project_id = $request->get_param('project_id');
    
        $projects = $wpdb->get_results($wpdb->prepare(
            "SELECT project_name, project_task, assignee, due_date, project_status  FROM $table_name WHERE project_status = 1 
        "));
    
        // if (empty($projects)) {
        //     return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        // }
    
        return $projects;
    }
}