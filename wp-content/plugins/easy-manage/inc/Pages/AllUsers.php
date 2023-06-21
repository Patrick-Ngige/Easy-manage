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
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/deleted',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_deleted_users'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/trainers',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainers_callback'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/pm',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_pm_callback'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/trainees',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainees_callback'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users/(?P<user_role>\w+)/(?P<id>\d+)',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_single_callback'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }

    public function check_admin_permission($request)
    {
        if (current_user_can('administrator') || current_user_can('program_manager') || current_user_can('trainer')) {
            return true;
        } else {
            return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
        }
    }

    public function retrieve_pm_callback($request)
    {
        $users = get_users();
        $pm = array();

        foreach ($users as $user) {
            if (!empty($user->roles) && in_array('program_manager', $user->roles)) {
                $pm[] = array(
                    'pm_id' => $user->ID,
                    'pm_name' => $user->display_name,
                    'pm_email' => $user->user_email,
                    'pm_role' => !empty($user->roles[0]) ? $user->roles[0] : '',
                );
            }
        }

        if (empty($pm)) {
            return new WP_Error('no_program_managers', 'No program managers found.', array('status' => 404));
        }

        return $pm;
    }

    public function retrieve_deleted_users($request) {
        $current_user = wp_get_current_user();
    
        $current_user_role = $current_user->roles[0];
    
        $roles_permissions = array(
            'administrator' => array(),
            'project_manager' => array('administrator'),
            'trainer' => array('administrator', 'project_manager'),
            'trainee' => array('administrator', 'project_manager', 'trainer'),
        );
    
        if (!in_array($current_user_role, $roles_permissions['project_manager']) &&
        !in_array($current_user_role, $roles_permissions['trainer']) &&
        !in_array($current_user_role, $roles_permissions['administrator'])) {
        return new WP_Error('permission_denied', 'Permission denied.', array('status' => 403));
    }
    
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
    
        $allowed_roles = $roles_permissions[$current_user_role];
    
        $users = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = %d AND user_role IN ('" . implode("','", $allowed_roles) . "')",
                1
            )
        );
    
        if (empty($users)) {
            return new WP_Error('no_deleted_users', 'No deleted users found.', array('status' => 404));
        }
        return $users;
    }
    
    public function retrieve_trainers_callback($request)
    {
        $users = get_users();
        $trainers = array();

        foreach ($users as $user) {
            if (!empty($user->roles) && in_array('trainer', $user->roles)) {
                $trainers[] = array(
                    'trainer_id' => $user->ID,
                    'trainer_name' => $user->display_name,
                    'trainer_email' => $user->user_email,
                    'trainer_role' => !empty($user->roles[0]) ? $user->roles[0] : '',
                );
            }
        }

        if (empty($trainers)) {
            return new WP_Error('no_trainers', 'No trainer found.', array('status' => 404));
        }

        return $trainers;
    }

    public function retrieve_trainees_callback($request)
    {
        $users = get_users();
        $trainees = array();
    
        foreach ($users as $user) {
            if (!empty($user->roles) && in_array('trainee', $user->roles)) {
                $trainees[] = array(
                    'trainee_id' => $user->ID,
                    'trainee_name' => $user->display_name,
                    'trainee_email' => $user->user_email,
                    'trainee_role' => !empty($user->roles[0]) ? $user->roles[0] : '',
                );
            }
        }
    
        if (empty($trainees)) {
            return new WP_Error('no_trainees', 'No trainees found.', array('status' => 404));
        }
    
        return rest_ensure_response($trainees);
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