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
            '/projects/deleted',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'deleted_projects'),
            )
        );

        register_rest_route(
            'em/v1',
            '/project/completed/(?P<id>\d+)',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'single_completed_project'),
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
            '/projects/cohort/(?P<username>[a-zA-Z0-9-]+)',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'get_cohort_id_by_trainer'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/cohorts/(?P<id>\d+)',
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
                "SELECT *  FROM $table_name WHERE project_status = 0"
            )
        );

        if (empty($projects)) {
            return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        }

        return $projects;
    }

    public function deleted_projects($request)
    {
        global $wpdb;
        $individual_table = $wpdb->prefix . 'individual_projects';
        $group_table = $wpdb->prefix . 'group_projects';
        
        $individual_projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT *, 'individual' as project_type FROM $individual_table WHERE project_status = %d",
                1
            )
        );
        
        $group_projects = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT *, 'group' as project_type FROM $group_table WHERE group_status = %d",
                1
            )
        );
        
        $projects = array_merge($individual_projects, $group_projects);
    
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
                "SELECT * FROM $table_name WHERE group_status = 0"
            )
        );

        if (empty($projects)) {
            return new WP_Error('no_projects', 'No projects found.', array('status' => 404));
        }

        return $projects;
    }

    public function single_completed_project($request)
    {
        $project_id = $request->get_param('id');

        global $wpdb;
        $individual_projects_table = $wpdb->prefix . 'individual_projects';
        $group_projects_table = $wpdb->prefix . 'group_projects';

        $individual_project = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM $individual_projects_table WHERE project_id = %d AND project_status = 1",
                $project_id
            ),
            ARRAY_A
        );

        $group_project = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM $group_projects_table WHERE group_id = %d AND group_status = 1",
                $project_id
            ),
            ARRAY_A
        );

        if (empty($individual_project) && empty($group_project)) {
            return new WP_Error('project_not_found', 'Project not found.', array('status' => 404));
        }

        if (!empty($individual_project)) {
            return $individual_project;
        } else {
            return $group_project;
        }
    }


    public function retrieve_completed_projects($request)
    {
        $project_id = $request->get_param('id');

        global $wpdb;
        $individual_projects_table = $wpdb->prefix . 'individual_projects';
        $group_projects_table = $wpdb->prefix . 'group_projects';

        $individual_project = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM $individual_projects_table WHERE project_id = %d AND project_status = 1",
                $project_id
            ),
            ARRAY_A
        );

        $group_project = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM $group_projects_table WHERE group_id = %d AND group_status = 1",
                $project_id
            ),
            ARRAY_A
        );

        if (empty($individual_project) && empty($group_project)) {
            return new WP_Error('project_not_found', 'Project not found.', array('status' => 404));
        }

        if (!empty($individual_project)) {
            return $individual_project;
        } else {
            return $group_project;
        }
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


    function get_cohort_id_by_trainer($request)
    {
        $username = $request->get_param('username');
        global $wpdb;
        $table_name = $wpdb->prefix . 'cohorts';

        $cohort_id = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT cohort_id FROM $table_name WHERE trainer = %s",
                $username
            )
        );

        if (empty($cohort_id)) {
            return new WP_Error('cohort_not_found', 'Cohort not found.', array('status' => 404));
        }

        return $cohort_id;
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
                "SELECT * FROM $table_name WHERE project_id = %d AND project_status = 0",
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
                "SELECT * FROM $table_name WHERE group_id = %d AND group_status = 0",
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