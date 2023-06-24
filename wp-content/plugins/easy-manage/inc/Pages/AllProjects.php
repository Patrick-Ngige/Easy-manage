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
            '/projects/completed/(?P<id>\d+)',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'single_completed_projects'),
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

        register_rest_route(
            'em/v1',
            '/cohorts/(?P<id>\d+)',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_single_cohort'),
            )
        );

        register_rest_route(
            'em/v1',
            '/individual_project/(?P<id>\d+)',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'single_individual_project'),
            )
        );

        register_rest_route(
            'em/v1',
            '/group_project/(?P<id>\d+)',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'single_group_project'),
            )
        );
    }

    public function retrieve_individual_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';

        $project_id = $request->get_param('project_id');

        $projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT project_id, project_name, project_task, assignee, due_date, project_status  FROM $table_name WHERE project_status = 0 
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
    
        $group_id = $request->get_param('group_id');
    
        $projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT group_id, assigned_members, project_name, project_task, due_date, group_status FROM $table_name WHERE group_status = 0"
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
        $group_projects_table = $wpdb->prefix . 'group_projects';
        $individual_projects_table = $wpdb->prefix . 'individual_projects';

         $group_projects = $wpdb->get_results(
            "SELECT group_id, assigned_members, project_name, project_task, due_date, group_status FROM $group_projects_table WHERE group_status = 1"
        );
    
        $individual_projects = $wpdb->get_results(
            "SELECT project_id, project_name, project_task, assignee, due_date, project_status FROM $individual_projects_table WHERE project_status = 1"
        );
    
        $projects = array_merge($group_projects, $individual_projects);
    
        if (empty($projects)) {
            return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        }
    
        return $projects;
    }
    

    public function single_completed_projects($request)
    {
        global $wpdb;
        $group_projects_table = $wpdb->prefix . 'group_projects';
        $individual_projects_table = $wpdb->prefix . 'individual_projects';
    
        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;
    
        $group_projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT group_id, assigned_members, project_name, project_task, due_date, group_status FROM $group_projects_table WHERE group_status = 1 AND assigned_members LIKE %s",
                '%' . $wpdb->esc_like($user_id) . '%'
            )
        );
    
        $individual_projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT project_id, project_name, project_task, assignee, due_date, project_status FROM $individual_projects_table WHERE project_status = 1 AND assignee = %d",
                $user_id
            )
        );
    
        $projects = array_merge($group_projects, $individual_projects);
    
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
                "SELECT cohort_id, cohort, cohort_info, trainer, ending_date, cohort_status  FROM $table_name WHERE cohort_status = 0 
        "
            )
        );

        if (empty($cohorts)) {
            return new WP_Error('no_cohort', 'No cohort found.', array('status' => 404));
        }

        return $cohorts;
    }

    public function retrieve_single_cohort($request)
{
    $cohort_id = $request->get_param('id');

    global $wpdb;
    $table_name = $wpdb->prefix . 'cohorts';

    $cohort = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE cohort_id = %d",
            $cohort_id
        ),
        ARRAY_A
    );

    if (empty($cohort)) {
        return new WP_Error('cohort_not_found', 'Cohort not found.', array('status' => 404));
    }

    return $cohort;
}

public function single_individual_project($request)
{
    $project_id = $request->get_param('id');

    global $wpdb;
    $table_name = $wpdb->prefix . 'individual_projects';

    $cohort = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE project_id = %d",
            $project_id,
        ),
        ARRAY_A
    );

    if (empty($cohort)) {
        return new WP_Error('project_not_found', 'Individual project not found.', array('status' => 404));
    }

    return $cohort;
}

public function single_group_project($request)
{
    $group_id = $request->get_param('id');

    global $wpdb;
    $table_name = $wpdb->prefix . 'group_projects';

    $cohort = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE group_id = %d",
            $group_id,
        ),
        ARRAY_A
    );

    if (empty($cohort)) {
        return new WP_Error('project_not_found', 'Group project not found.', array('status' => 404));
    }

    return $cohort;
}

}
