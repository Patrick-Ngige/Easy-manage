<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;



class CreateTable {
    public function register() {
       $this->create_table_to_db();
    }


    public function create_table_to_db() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'projects';

        $project_details = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
            employee_id varchar(200) NOT NULL,
            project text NOT NULL,
            assignee text NOT NULL,
            due_date date NOT NULL,
            project_status int NOT NULL DEFAULT 0,
            deleted int NOT NULL DEFAULT 0,
            PRIMARY KEY (employee_id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $project_details );

    
    }
}
