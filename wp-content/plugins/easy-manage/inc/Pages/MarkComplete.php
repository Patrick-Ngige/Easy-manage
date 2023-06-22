<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class MarkComplete
{
    public function register()
    {
        add_action("rest_api_init", array($this, "mark_complete_endpoints"));
    }
    public function mark_complete_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/projects/mark_complete/(?P<project_id>\d+)',
            array(
                'methods' => 'PATCH',
                'callback' => array($this, 'mark_project_complete'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }

    public function check_admin_permission($request)
    {
        if (current_user_can('trainer') || current_user_can('trainee')) {
            return true;
        } else {
            return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
        }
    }

    public function mark_project_complete($request)
    {
        $project_id = $request->get_param('project_id');
        $group_id = $request->get_param('project_id');
    
        global $wpdb;
        $individual_projects_table = $wpdb->prefix . 'individual_projects';
        $group_projects_table = $wpdb->prefix . 'group_projects';
    
        $individual_result = $wpdb->update(
            $individual_projects_table,
            array('project_status' => 1),
            array('project_id' => $project_id)
        );
    
        $group_result = $wpdb->update(
            $group_projects_table,
            array('group_status' => 1),
            array('project_id' => $group_id)
        );
    
        if ($individual_result === false || $group_result === false) {
            return new WP_Error('project_update_failed', 'Failed to mark project as complete.', array('status' => 500));
        }
    
        return rest_ensure_response('Project marked as complete.');
    }

}