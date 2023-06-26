<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class AllUsers
{
    public function register()
    {
        add_action("rest_api_init", array($this, "users_endpoints"));
    }
    public function users_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/users/pm',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_pm_callback'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/user_project_ids',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'get_user_project_ids'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/deleted',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_deleted_users'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/trainers',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainers_callback'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/pm',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_pm_callback'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/trainees',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainees_callback'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/(?P<user_role>\w+)/(?P<id>\d+)',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_single_callback'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }

    // public function check_admin_permission($request)
    // {
    //     if (current_user_can('administrator') || current_user_can('program_manager') || current_user_can('trainer')) {
    //         return true;
    //     } else {
    //         return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
    //     }
    // }

    public function retrieve_pm_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $user_status = 0;

        $pm = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = %d AND ID IN (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value LIKE '%%\"program_manager\"%%')",
                $user_status
            )
        );

        if (empty($pm)) {
            return new WP_Error('no_program_managers', 'No program managers found.', array('status' => 404));
        }

        return $pm;
    }


    public function get_user_project_ids($request)
    {
        $username = $request->get_param('username');

        // Query to retrieve the project ID(s) assigned to the user
        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';

        $project_ids = $wpdb->get_col(
            $wpdb->prepare(
                "SELECT group_id FROM $table_name WHERE FIND_IN_SET(%s, assigned_members) > 0 AND group_status = 0",
                $username
            )
        );

        if (empty($project_ids)) {
            return new WP_Error('project_ids_not_found', 'No project IDs found for the user.', array('status' => 404));
        }

        return $project_ids;
    }


    public function retrieve_trainers_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $user_status = 0; // Set the desired user_status value

        $trainers = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = %d AND ID IN (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value LIKE '%%\"trainer\"%%')",
                $user_status
            )
        );

        if (empty($trainers)) {
            return new WP_Error('no_trainers', 'No trainers found.', array('status' => 404));
        }

        return $trainers;
    }


 

    public function retrieve_trainees_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $user_status = 0; // Set the desired user_status value

        $trainees = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = %d AND ID IN (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value LIKE '%%\"trainee\"%%')",
                $user_status
            )
        );

        if (empty($trainees)) {
            return new WP_Error('no_trainees', 'No trainees found.', array('status' => 404));
        }

        return $trainees;
    }


    public function retrieve_single_callback($request)
    {
        $user_role = $request->get_param('user_role');
        $user_id = $request->get_param('id');

        $user = get_user_by('ID', $user_id);

        if (!$user || empty($user->roles) || !in_array($user_role, $user->roles)) {
            return new WP_Error('user_not_found', 'User not found.', array('status' => 404));
        }

        $user_info = array(
            'user_name' => $user->display_name,
            'user_email' => $user->user_email,
            'user_role' => !empty($user->roles[0]) ? $user->roles[0] : '',
        );

        return $user_info;
    }

}