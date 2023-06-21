<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;

class TrainerEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this, "trainer_endpoints"));
    }
    public function trainer_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'trainee_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/individual',
            array(
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'individual_projects_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );

        register_rest_route(
            'em/v1',
            '/projects/group',
            array(
                'methods' => array('POST', 'PATCH'),
                'callback' => array($this, 'group_projects_callbacks'),
                'permission_callback' => array($this, 'check_admin_permission'),
            )
        );
    }
    public function check_admin_permission($request)
    {
        if (current_user_can('trainer')) {
            return true;
        } else {
            return new WP_Error('rest_forbidden', __('You are not allowed to access this endpoint.'), array('status' => 403));
        }
    }
    public function trainee_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_trainee_callback($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_trainee_callback($request);
        }
    }
    public function individual_projects_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_individual_project($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_individual_project($request);
        }
    }
    public function group_projects_callbacks($request)
    {
        if ($request->get_method() === 'POST') {
            return $this->create_group_project($request);
        } elseif ($request->get_method() === 'PATCH') {
            return $this->update_group_project($request);
        }
    }
    public function create_trainee_callback($request)
    {
        $parameters = $request->get_params();

        $trainee_name = sanitize_text_field($request->get_param('trainee_name'));
        $trainee_email = sanitize_email($request->get_param('trainee_email'));
        $trainee_role = sanitize_text_field($request->get_param('trainee_role'));
        $trainee_password = sanitize_text_field($request->get_param('trainee_password'));

        if (empty($trainee_name) || empty($trainee_email) || empty($trainee_role) || empty($trainee_password)) {
            $missing_fields = array();

            if (empty($trainee_name)) {
                $missing_fields[] = 'trainee_name';
            }
            if (empty($trainee_email)) {
                $missing_fields[] = 'trainee_email';
            }
            if (empty($trainee_role)) {
                $missing_fields[] = 'trainee_role';
            }
            if (empty($trainee_password)) {
                $missing_fields[] = 'trainee_password';
            }

            return new WP_Error('missing_fields', 'The following fields are required: ' . implode(', ', $missing_fields), array('status' => 400));
        }

        $existing_email = email_exists($trainee_email);
        if ($existing_email) {
            return new WP_Error('email_exists', 'Trainee with the same email already exists.', array('status' => 400));
        }

        $allowed_roles = array('trainee');
        if (!in_array($trainee_role, $allowed_roles)) {
            return new WP_Error('invalid_role', 'Invalid trainee role specified.', array('status' => 400));
        }

        $user_id = wp_create_user($trainee_name, $trainee_password, $trainee_email);

        if (!is_wp_error($user_id)) {
            $user = get_user_by('id', $user_id);

            $user->set_role($trainee_role);
            wp_update_user($user);

            $response = array(
                'success' => true,
                'message' => 'Trainee created successfully',
                'user_id' => $user_id,
            );

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('trainee_creation_failed', 'Failed to create Trainee.', array('status' => 400)),
            );

            return rest_ensure_response($response)->set_status(400);
        }
    }

    public function update_trainee_callback($request)
    {
        $parameters = $request->get_params();

        $trainee_id = sanitize_text_field($request->get_param('trainee_id'));
        $trainee_name = sanitize_text_field($request->get_param('trainee_name'));
        $trainee_email = sanitize_email($request->get_param('trainee_email'));
        $trainee_role = sanitize_text_field($request->get_param('trainee_role'));
        $trainee_password = sanitize_text_field($request->get_param('trainee_password'));

        $user = get_user_by('id', $trainee_id);

        if ($user) {
            $user->user_login = $trainee_name;
            $user->user_email = $trainee_email;

            if ($trainee_password) {
                wp_set_password($trainee_password, $trainee_id);
            }

            $user->set_role($trainee_role);
            wp_update_user($user);

            $response = array(
                'success' => true,
                'message' => 'Trainee updated successfully',
                'user_id' => $trainee_id,
            );

            return rest_ensure_response($response);

        } else {
            $response = array(
                'success' => false,
                'errors' => new WP_Error('400', 'Trainee not found'),
            );

            return new WP_Error('trainee_updating_failed', 'Failed to update trainee.', array('status' => 500));
        }
    }
    public function create_individual_project($request)
    {
        $parameters = $request->get_json_params();

        $project_name = $request->get_param('project_name');
        $project_task = $request->get_param('project_task');
        $assignee = $request->get_param('assignee');
        $due_date = $request->get_param('due_date');

        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';

        $result = $wpdb->insert(
            $table_name,
            array(
                'project_name' => $project_name,
                'project_task' => $project_task,
                'assignee' => $assignee,
                'due_date' => $due_date,
            )
        );

        if ($result) {
            $project_id = $wpdb->insert_id;
            $response = array(
                'success' => true,
                'message' => 'Individual project created successfully',
                'project_id' => $project_id,
            );
            return rest_ensure_response($response);
        }
        return new WP_Error('project_creation_failed', 'Failed to create individual project.', array('status' => 500));
    }

    public function update_individual_project($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'individual_projects';
        $project_id = $request['project_id'];

        $data = $request->get_json_params();

        $project_name = $request->get_param('project_name');
        $project_task = $request->get_param('project_task');
        $assignee = $request->get_param('assignee');
        $due_date = $request->get_param('due_date');

        $data = array(

            'project_name' => $project_name,
            'project_task' => $project_task,
            'assignee' => $assignee,
            'due_date' => $due_date,
        );
        $condition = array('project_id' => $project_id);

        $updated = $wpdb->update($table_name, $data, $condition);

        if ($updated) {
            $response = array(
                'success' => true,
                'message' => 'Individual project updated successfully',
                'project_id' => $updated,
            );
            return rest_ensure_response($response);
        }
        return new WP_Error('project_updating_failed', 'Failed to update individual project.', array('status' => 500));
    }
    public function create_group_project($request)
    {
        $data = $request->get_json_params();

        $assigned_members = $request->get_param('assigned_members');
        $group_project = $request->get_param('group_project');
        $project_task = $request->get_param('project_task');
        $due_date = $request->get_param('due_date');

        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';

        $result = $wpdb->insert(
            $table_name,
            array(
                'assigned_members' => $assigned_members,
                'project_name' => $group_project,
                'project_task' => $project_task,
                'due_date' => $due_date,
            )
        );

        if ($result) {
            $response = array(
                'success' => true,
                'message' => 'Group project created successfully',
                'project_id' => $result,
            );
            return rest_ensure_response($response);
        }
        return new WP_Error('project_creation_failed', 'Failed to create group project.', array('status' => 500));
    }
    public function update_group_project($request)
    {
        $group_id = $request['group_id'];

        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';

        $request->get_json_params();

        $assigned_members = $request->get_param('assigned_members');
        $group_project = $request->get_param('group_project');
        $project_task = $request->get_param('project_task');
        $due_date = $request->get_param('due_date');

        $data = array(

            'assigned_members' => $assigned_members,
            'project_name' => $group_project,
            'project_task' => $project_task,
            'due_date' => $due_date,
        );
        $condition = array('group_id' => $group_id);
        $update = $wpdb->update($table_name, $data, $condition);

        if ($update) {
            $response = array(
                'success' => true,
                'message' => 'Group project updated successfully',
                'project_id' => $update,
            );
            return rest_ensure_response($response);
        }
        return new WP_Error('project_update_failed', 'Failed to update group project.', array('status' => 500));
    }

}