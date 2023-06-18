<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class AllProjects
{
    public function register()
    {
        add_action("rest_api_init", array($this, "all_projects_endpoints"));
    }

    public function all_projects_endpoints()
    {
       
        register_rest_route(
            'em/v1',
            '/projects/individual',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_individual_projects'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/group',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_group_projects'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/completed',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_completed_projects'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/cohorts',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_cohorts_callbacks'),
            )
        );
    }

    // Callback methods





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





    public function retrieve_individual_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';

        $project_id = $request->get_param('project_id');

        $projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT project_name, project_task, assignee, due_date, project_status  FROM $table_name WHERE project_status = 0 
        "
            )
        );

        if (empty($projects)) {
            return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        }

        return $projects;
    }


    public function retrieve_group_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';

        $project_id = $request->get_param('project_id');

        $projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT assigned_trainees project_name, project_task, due_date, project_status  FROM $table_name WHERE project_status = 0 
        "
            )
        );

        if (empty($projects)) {
            return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        }

        return $projects;
    }

    public function retrieve_completed_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'projects';
    
        $project_id = $request->get_param('project_id');
    
        $projects = $wpdb->get_results($wpdb->prepare(
            "SELECT project_name, project_task, assignee, due_date, project_status  FROM $table_name WHERE project_status = 1 
        "));
    
        if (empty($projects)) {
            return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        }
    
        return $projects;
    }

    public function retrieve_cohorts_callbacks($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cohorts';

        $cohort_id = $request->get_param('cohort_id');

        $cohorts = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT cohort, cohort_info, trainer, ending_date, cohort_status  FROM $table_name WHERE cohort_status = 0 
        "
            )
        );

        if (empty($cohorts)) {
            return new WP_Error('no_cohort', 'No cohort found.', array('status' => 404));
        }

        return $cohorts;
    }
}
