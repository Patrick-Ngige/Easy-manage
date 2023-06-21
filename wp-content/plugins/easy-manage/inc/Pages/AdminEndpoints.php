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
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'pm_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }
    public function check_admin_permission($request)
    {
        if (current_user_can('administrator')) {
            return true;
        } else {
            return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
        }
    }

    public function pm_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_pm_callback($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_pm_callback($request);
        }
    }
    public function create_pm_callback($request)
    {
        $parameters = $request->get_params();

        $pm_name = sanitize_text_field($request->get_param('pm_name'));
        $pm_email = sanitize_email($request->get_param('pm_email'));
        $pm_role = sanitize_text_field($request->get_param('pm_role'));
        $pm_password = sanitize_text_field($request->get_param('pm_password'));


        $user_id = wp_create_user($pm_name, $pm_password, $pm_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('login', $pm_name);
            
            $user->set_role($pm_role);
            wp_update_user($user);


            $response = array(
                'success' => true,
                'message' => 'Project Manager created successfully',
                'user_id' => $user_id,
            );

            // Send email to trainee with login information
            // $email_subject = 'Your pm Account Details';
            // $email_body = 'Your username: ' . $user->user_login . "\r\n";
            // $email_body .= 'Your password: ' . $pm_password . "\r\n";
            // $email_body .= 'Please login to the website using this information.';
            // wp_mail($pm_email, $email_subject, $email_body);

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'pm not created'),
            );

            return rest_ensure_response($response)->set_status(400);
        }
    }

    public function update_pm_callback($request)
    {
        $parameters = $request->get_params();
    
        $pm_id = sanitize_text_field($request->get_param('pm_id'));
        $pm_name = sanitize_text_field($request->get_param('pm_name'));
        $pm_email = sanitize_email($request->get_param('pm_email'));
        $pm_role = sanitize_text_field($request->get_param('pm_role'));
        $pm_password = sanitize_text_field($request->get_param('pm_password'));
    
        $user = get_user_by('id', $pm_id);
    
        if ($user) {
            $user->user_login = $pm_name;
            $user->user_nicename = sanitize_title($pm_name);
            $user->user_email = $pm_email;
    
            if ($pm_password) {
                wp_set_password($pm_password, $pm_id);
            }

            $user->set_role($pm_role);
    
            wp_update_user($user);
    
            $response = array(
                'success' => true,
                'message' => 'Program manager updated successfully',
                'user_id' => $pm_id,
            );
    
            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('program_manager_not_found', 'Program manager not found'),
            );
    
            return new WP_Error('program_manager_update_failed', 'Failed to update program manager.', array('status' => 500));
        }
    }
    
}

