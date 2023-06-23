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
                'methods' => array('POST', 'PATCH', 'GET'),
                'callback' => array($this, 'trainee_callbacks'),
                // 'permission_callback' => array($this, 'check_admin_permission'),
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
        } elseif ($request->get_method() === 'GET') {
            return $this->retrieve_soft_deleted($request);
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
    $assignee_name = $request->get_param('assignee');
    $due_date = $request->get_param('due_date');

    // Check if the assignee exists in wp_users table
    $assignee_user = get_user_by('login', $assignee_name);
    if (!$assignee_user) {
        return new WP_Error('invalid_assignee', 'Invalid assignee. Please select an existing user.', array('status' => 400));
    }

    $assignee_id = $assignee_user->ID;

    if ($this->is_assignee_reached_max_projects($assignee_id)) {
        return new WP_Error('max_projects_reached', 'The assignee has reached the maximum number of projects.', array('status' => 400));
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'individual_projects';

    $result = $wpdb->insert(
        $table_name,
        array(
            'project_name' => $project_name,
            'project_task' => $project_task,
            'assignee' => $assignee_id,
            'due_date' => $due_date,
        )
    );

    if ($result !== false) {
        $project_id = $wpdb->insert_id;
        $response = array(
            'success' => true,
            'message' => 'Individual project created successfully',
            'project_id' => $project_id,
        );
        return rest_ensure_response($response);
    } else {
        return new WP_Error('project_creation_failed', 'Failed to create individual project.', array('status' => 500));
    }
}

    
    

private function is_assignee_reached_max_projects($assignee)
{
    $max_projects = 3;

    $assigned_projects_count = get_users(
        array(
            'role' => 'trainee',
            'meta_query' => array(
                array(
                    'key' => 'assigned_projects',
                    'value' => '"' . $assignee . '"',
                    'compare' => 'LIKE',
                ),
            ),
            'count_total' => true,
        )
    );

    return $assigned_projects_count >= $max_projects;
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
    
        $assigned_members = $data['assigned_members'];
        $group_project = $data['group_project'];
        $project_task = $data['project_task'];
        $due_date = $data['due_date'];
    
        if (empty($assigned_members) || empty($group_project) || empty($project_task) || empty($due_date)) {
            $missing_fields = array();
            if (empty($assigned_members)) {
                $missing_fields[] = 'assigned_members';
            }
            if (empty($group_project)) {
                $missing_fields[] = 'group_project';
            }
            if (empty($project_task)) {
                $missing_fields[] = 'project_task';
            }
            if (empty($due_date)) {
                $missing_fields[] = 'due_date';
            }
    
            return new WP_Error('missing_fields', 'The following fields are required: ' . implode(', ', $missing_fields), array('status' => 400));
        }
    
        $assigned_members_limit = 3;
        $assigned_members_count = count($assigned_members);
    
        if ($assigned_members_count < 2 || $assigned_members_count > $assigned_members_limit) {
            return new WP_Error('invalid_assigned_members', 'Assigned members should be between 2 and 3.', array('status' => 400));
        }
    
        foreach ($assigned_members as $assignee) {
            if (!is_string($assignee) || empty(trim($assignee))) {
                return new WP_Error('invalid_assigned_member', 'One or more assigned members contain invalid names.', array('status' => 400));
            }
        }
    
        global $wpdb;
        $table_name = $wpdb->prefix . 'group_projects';
        $existing_project = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE assigned_members = %s AND project_name = %s AND project_task = %s AND due_date = %s", implode(', ', $assigned_members), $group_project, $project_task, $due_date));
        if ($existing_project) {
            return new WP_Error('project_already_exists', 'A project with the same credentials already exists.', array('status' => 400));
        }
    
        foreach ($assigned_members as $assignee) {
            $projects_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE assigned_members LIKE %s", '%' . $assignee . '%'));
    
            if ($projects_count >= 3) {
                return new WP_Error('too_many_projects', 'One or more assigned members already have 3 or more projects.', array('status' => 400));
            }
        }
    
        $result = $wpdb->insert(
            $table_name,
            array(
                'assigned_members' => implode(', ', $assigned_members),
                'project_name' => $group_project,
                'project_task' => $project_task,
                'due_date' => $due_date,
            )
        );
    
        if ($result) {
            $response = array(
                'success' => true,
                'message' => 'Group project created successfully',
                'project_id' => $wpdb->insert_id,
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

        $data = array(
            'assigned_members' => $request->get_param('assigned_members'),
            'project_name' => $request->get_param('group_project'),
            'project_task' => $request->get_param('project_task'),
            'due_date' => $request->get_param('due_date'),
        );

        $where = array('group_id' => $group_id);

        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            $response = array(
                'success' => true,
                'message' => 'Group project updated successfully',
                'project_id' => $group_id,
            );
            return rest_ensure_response($response);
        }

        return new WP_Error('project_update_failed', 'Failed to update group project.', array('status' => 500));
    }

    public function retrieve_soft_deleted($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'users';
        $trainee_status = 1;

        $trainees = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE user_status = %d AND ID IN (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value LIKE '%%\"trainee\"%%')",
                $trainee_status
            )
        );

        if (empty($trainees)) {
            return new WP_Error('no_trainees', 'No trainees found.', array('status' => 404));
        }

        return $trainees;
    }

}