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
            '/users/trainers',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainers_callback'),
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

    }


    public function check_admin_permission($request)
    {
        if (current_user_can('admin') || current_user_can('program_manager') || current_user_can('trainer')) {
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

    public function retrieve_trainers_callback($request)
    {
        $users = get_users();

        $trainers = array();

        foreach ($users as $user) {
            if (!empty($user->roles) && in_array('trainer', $user->roles)) {
                $trainers[] = array(
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
                'trainee_name' => $user->display_name,
                'trainee_email' => $user->user_email,
                'trainee_role' => !empty($user->roles[0]) ? $user->roles[0] : '',
            );
        }
    }

    if (empty($trainees)) {
        return new WP_Error('no_trainees', 'No trainee found.', array('status' => 404));
    }

    return $trainees;
}

    



}