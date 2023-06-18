<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class AdminEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this,"admin_endpoints" ));
    }
    public function admin_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/pm',
            array(
                'methods' => array('POST',),
                'callback' => array($this, 'create_pm_callback'),
            )
        );

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

    public function create_pm_callback($request)
    {
        $parameters = $request->get_params();

        $pm_name = sanitize_text_field($parameters['pm_name']);
        $pm_email = sanitize_email($parameters['pm_email']);
        $pm_role = sanitize_text_field($parameters['pm_role']);
        $pm_password = sanitize_text_field($parameters['pm_password']);


        $user_id = wp_create_user($pm_name, $pm_password, $pm_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('id', $user_id);

            $user->set_role($pm_role);

            $response = array(
                'success' => true,
                'message' => 'pm created successfully',
                'user_id' => $user_id,
            );

            // Send email to trainee with login information
            $email_subject = 'Your pm Account Details';
            $email_body = 'Your username: ' . $user->user_login . "\r\n";
            $email_body .= 'Your password: ' . $pm_password . "\r\n";
            $email_body .= 'Please login to the website using this information.';
            wp_mail($pm_email, $email_subject, $email_body);

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'pm not created'),
            );

            return rest_ensure_response($response)->set_status(400);
        }
    }
}

