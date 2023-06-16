<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class AdminEndpoints
{
    public function register()
    {
        add_action("rest_api_init", array($this,"create_trainer_endpoint" ));
    }
    public function create_trainer_endpoint()
    {
        register_rest_route(
            'em/v1',
            '/pm',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'create_pm_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_pm_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/trainee',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_trainee_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/traineer',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'retrieve_traineer_callback'),
            )
        );
    }

    public function create_pm_callback($request)
    {
        $parameters = $request->get_params();

        $pm_name = sanitize_text_field($parameters['pm-name']);
        $pm_email = sanitize_email($parameters['pm-email']);
        $pm_role = sanitize_text_field($parameters['pm-role']);


        if (empty($errors)) {

            global $wpdb;
            $table_name = $wpdb->prefix . 'trainees';

            $data = array(
                'trainee' => $pm_name,
                'email' => $pm_email,
                'role' => $pm_role,
            );

            $wpdb->insert($table_name, $data);

            $response = array(
                'success' => true,
                'message' => 'Program Manager created successfully',
            );

            return rest_ensure_response($response);
        } else {
            $response = array(
                'success' => false,
                'errors' => $errors,
            );

            return rest_ensure_response($response)->set_status(400);
        }


    }

    public function retrieve_pm_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'pm';

        $result = "SELECT * FROM $table_name WHERE `delete` = 0";

        $data = $wpdb->get_results($result);

        return $data;
    }

    
    public function retrieve_trainer_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'trainers';

        $result = "SELECT * FROM $table_name WHERE `delete` = 0";

        $data = $wpdb->get_results($result);

        return $data;
    }

    public function retrieve_trainee_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'trainees';

        $result = "SELECT * FROM $table_name WHERE `delete` = 0";

        $data = $wpdb->get_results($result);

        return $data;
    }
}