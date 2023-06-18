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
        add_action("rest_api_init", array($this,"users_endpoints" ));
    }
    public function users_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/users',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_pm_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainers_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/users',
            array(
                'methods' => array('GET'),
                'callback' => array($this, 'retrieve_trainees_callback'),
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

    

    public function retrieve_pm_callback($request)
    {
        $users = get_users();

        $pms = array();

        foreach ($users as $user) {
            if (in_array('pm', $user->roles)) {
                $pms[] = array(
                    'pm_name' => $user->display_name,
                    'pm_email' => $user->user_email,
                    'pm_role' => $user->roles[0],
                );
            }
        }

        return $pms;
    }

    public function retrieve_trainers_callback($request)
    {
        $users = get_users();

        $trainers = array();

        foreach ($users as $user) {
            if (in_array('trainer', $user->roles)) {
                $trainers[] = array(
                    'trainer_name' => $user->display_name,
                    'trainer_email' => $user->user_email,
                    'trainer_role' => $user->roles[0],
                );
            }
        }

        return $trainers;
    }

    public function retrieve_trainees_callback($request)
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

    
}

