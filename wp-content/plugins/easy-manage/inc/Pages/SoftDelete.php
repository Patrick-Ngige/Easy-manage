<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class SoftDelete
{
    public function register()
    {
        add_action("rest_api_init", array($this, "soft_delete_endpoints"));
    }
    public function soft_delete_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/soft_delete/(?P<user_id>\d+)',
            array(
                'methods' => 'DELETE',
                'callback' => array($this, 'soft_delete_callback'),
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

    public function soft_delete_callback($request) {
        global $wpdb;
    
        $user_id = $request->get_param('user_id');
    
        // Get the user by ID
        $user = get_user_by('ID', $user_id);
    
        if (!$user) {
            return new WP_Error('user_not_found', 'User not found.', array('status' => 404));
        }
    
        // Update the user's status to 1
        $table_name = $wpdb->prefix . 'users';
        $wpdb->update(
            $table_name,
            array('user_status' => 1),
            array('ID' => $user_id)
        );
    
        $response = array(
            'success' => true,
            'message' => 'User soft deleted successfully',
        );
    
        return rest_ensure_response($response);
    }
    
}