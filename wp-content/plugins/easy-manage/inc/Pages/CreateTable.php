<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class CreateTable {
    public function register() {
        $this->create_projects_table_to_db();
        $this->create_group_projects_table_to_db();
        $this->create_cohorts_table_to_db();
    }

    public function create_projects_table_to_db() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'individual_projects';

        $project_details = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
            project_id int (20) NOT NULL AUTO_INCREMENT,
            project_name text NOT NULL,
            project_task text NOT NULL,
            assignee text NOT NULL,
            due_date date NOT NULL,
            project_status int NOT NULL DEFAULT 0,
            project_activate int NOT NULL DEFAULT 0,
            project_deleted int NOT NULL DEFAULT 0,
            PRIMARY KEY (project_id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $project_details );
    }

    public function create_group_projects_table_to_db() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'group_projects';

        $project_details = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
            group_id int (20) NOT NULL AUTO_INCREMENT,
            assigned_members text NOT NULL,
            project_name text NOT NULL,
            project_task text NOT NULL,
            due_date date NOT NULL,
            group_status int NOT NULL DEFAULT 0,
            group_activate int NOT NULL DEFAULT 0,
            group_deleted int NOT NULL DEFAULT 0,
            PRIMARY KEY (group_id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $project_details );
    }

    public function create_cohorts_table_to_db() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'cohorts';

        $project_details = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
            cohort_id int (20) NOT NULL AUTO_INCREMENT,
            cohort text NOT NULL,
            cohort_info text NOT NULL,
            trainer text NOT NULL,
            starting_date date NOT NULL,
            ending_date date NOT NULL,
            cohort_status int NOT NULL DEFAULT 0,
            cohort_deleted int NOT NULL DEFAULT 0,
            PRIMARY KEY (cohort_id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $project_details );
    }
}
