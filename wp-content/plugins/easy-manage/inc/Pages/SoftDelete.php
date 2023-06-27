<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;
use WP_User;

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

        register_rest_route(
            'em/v1',
            '/individual_project/soft_delete/(?P<project_id>\d+)',
            array(
                'methods' => 'DELETE',
                'callback' => array($this, 'individual_project_soft_delete'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/group_project/soft_delete/(?P<group_id>\d+)',
            array(
                'methods' => 'DELETE',
                'callback' => array($this, 'group_project_soft_delete'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/restore_user/(?P<user_id>\d+)',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'restore_user_callback'),
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

    private function get_current_user_role()
    {
        $current_user = wp_get_current_user();
        if ($current_user instanceof WP_User) {
            $roles = $current_user->roles;
            return !empty($roles) ? $roles[0] : '';
        }
        return '';
    }

    public function soft_delete_callback($request)
    {
        global $wpdb;

        $user_id = $request->get_param('user_id');

        $current_user_role = $this->get_current_user_role();


        if ($request->get_param('user_id') === 'administrator') {

            return new WP_Error('admin_deletion_not_allowed', 'Admin user cannot be deleted.', array('status' => 403));
        }

        $user = get_user_by('ID', $user_id);

        if (!$user) {
            return new WP_Error('user_not_found', 'User not found.', array('status' => 404));
        }

        if (in_array('administrator', $user->roles)) {
            return new WP_Error('admin_deletion_not_allowed', 'Administrator user cannot be deleted.', array('status' => 403));
        }

        if ($current_user_role === 'program_manager') {
            if (in_array('program_manager', $user->roles)) {
                return new WP_Error('pm_deletion_not_allowed', 'Program manager cannot delete fellow program manager.', array('status' => 403));
            }
        }

        if ($current_user_role === 'trainer') {
            if (in_array('trainer', $user->roles) || in_array('program_manager', $user->roles)) {
                return new WP_Error('trainer_deletion_not_allowed', 'Trainer cannot delete trainer or program manager.', array('status' => 403));
            }
        }

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



    public function individual_project_soft_delete($request)
    {
        global $wpdb;
        $project_id = $request->get_param('project_id');

        $individual_project = $wpdb->prefix . 'individual_projects';

        $wpdb->update(
            $individual_project,
            array('project_status' => 1),
            array('project_id' => $project_id)
        );


        $response = array(
            'success' => true,
            'message' => 'Project soft deleted successfully',
        );

        return rest_ensure_response($response);
    }


    
    public function group_project_soft_delete($request)
    {
        global $wpdb;
        $group_id = $request->get_param('group_id');

        $group_project = $wpdb->prefix . 'group_projects';

        $wpdb->update(
            $group_project,
            array('group_status' => 1),
            array('group_id' => $group_id)
        );

        $response = array(
            'success' => true,
            'message' => 'Project soft deleted successfully',
        );

        return rest_ensure_response($response);
    }




    public function restore_user_callback($request)
    {
        global $wpdb;
        $user_id = $request->get_param('user_id');

        $user = get_user_by('ID', $user_id);
        if (!$user) {
            return new WP_Error('user_not_found', 'User not found.', array('status' => 404));
        }

        $user_status = $user->user_status;
        if ($user_status != 1) {
            return new WP_Error('invalid_user_status', 'User already exists.', array('status' => 400));
        }

        $table_name = $wpdb->prefix . 'users';
        $wpdb->update(
            $table_name,
            array('user_status' => 0),
            array('ID' => $user_id)
        );

        $response = array(
            'success' => true,
            'message' => 'User restored successfully',
        );

        return rest_ensure_response($response);
    }

}