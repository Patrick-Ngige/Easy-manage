<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

use WP_Error;
use WP_User_Query;

class SearchUsers
{
    public function register()
    {
        add_action("rest_api_init", array($this, "search_users_endpoints"));
    }

    public function search_users_endpoints()
    {
        register_rest_route(
            'em/v1',
            '/users/search',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'search_users_callback'),
                'args' => array(
                    'name' => array(
                        'required' => true,
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                ),
            )
        );
    }
    public function search_users_callback($request) {
        $name = $request->get_param('name');
    
        // return $name;
       
        global $wpdb;
        $users_table = $wpdb->prefix . 'users';
    
        $query = "SELECT * FROM $users_table WHERE user_login LIKE %s AND user_status = '0'";
        $prepared_query = $wpdb->prepare($query, '%' . esc_sql($name) . '%');
        $users = $wpdb->get_results($prepared_query);
    

        if (empty($users)) {
            return new WP_Error('no_users_found', 'No users found.', array('status' => 404));
        }
    
        $results = array();
        foreach ($users as $user) {
            $results[] = array(
                'user_id' => $user->ID,
                'user_name' => $user->display_name,
                'user_email' => $user->user_email,
                'user_role' => !empty($user->roles[0]) ? $user->roles[0] : '',
            );
        }
    
        return rest_ensure_response($results);
    }
    
    
    
}