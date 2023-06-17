<?php
/**
 * @package pms plugin
 */


namespace Inc\Pages;

class UserRoles
{
    public function register()
    {
        $this->easy_manage_add_roles_and_capabilities();

    }

    // Add custom roles and capabilities
    public function easy_manage_add_roles_and_capabilities()
    {
        // Admin Role
        add_role('admin', 'Admin');

        // Program Manager Role
        add_role('program_manager', 'Program Manager');

        // Trainer Role
        add_role('trainer', 'Trainer');

        // Trainee Role
        add_role('trainee', 'Trainee');

        // Add capabilities to Admin role
        $admin_capabilities = array(
            'create_program_managers',
            'deactivate_users',
            'search_users',
            'create_projects',
            'allocate_training_stacks'
        );
        foreach ($admin_capabilities as $capability) {
            $cap = 'admin_' . $capability;
            $role = get_role('admin');
            if ($role) {
                $role->add_cap($cap);
            }
        }

        // Add capabilities to Program Manager role
        $program_manager_capabilities = array(
            'create_trainers',
            'search_users',
            'create_projects',
            'allocate_training_stacks'
        );
        foreach ($program_manager_capabilities as $capability) {
            $cap = 'program_manager_' . $capability;
            $role = get_role('program_manager');
            if ($role) {
                $role->add_cap($cap);
            }
        }

        // Add capabilities to Trainer role
        $trainer_capabilities = array(
            'create_trainees',
            'soft_delete_trainees',
            'search_users',
            'create_projects',
            'allocate_training_stacks'
        );
        foreach ($trainer_capabilities as $capability) {
            $cap = 'trainer_' . $capability;
            $role = get_role('trainer');
            if ($role) {
                $role->add_cap($cap);
            }
        }

        // Add capabilities to Trainee role
        $trainee_capabilities = array(
            'view_assigned_projects'
        );
        foreach ($trainee_capabilities as $capability) {
            $cap = 'trainee_' . $capability;
            $role = get_role('trainee');
            if ($role) {
                $role->add_cap($cap);
            }
        }
    }


}