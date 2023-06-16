<?php
/**
 * @package easy_manage
 */

namespace Inc\Pages;

class PMEndpoints
{
    function create_cohort_endpoint()
    {
       
        register_rest_route(
            'em/v1',
            '/trainer',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'update_trainer_callback'),
            )
        );

        register_rest_route(
            'em/v1',
            '/cohort',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'create_trainer_cohort'),
            )
        );

        register_rest_route(
            'em/v1',
            '/cohort',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'retrieve_trainer_cohort'),
            )
        );
    }

    function create_trainer_cohort($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'trainers';

        $result = "SELECT * FROM $table_name WHERE `trainer_delete` = 0";

        $data = $wpdb->get_results($result);

        return $data;

    }

    function retrieve_trainer_cohort($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cohorts';
    
        $project_id = $request->get_param('cohort_id');
    
        $cohorts = $wpdb->get_results($wpdb->prepare(
            "SELECT cohort, cohort_info, trainer, starting_date, ending_date, cohort_status  FROM $table_name WHERE cohort_status = 0 
        "));
    
        // if (empty($projects)) {
        //     return new WP_Error('no_cohorts', 'No cohort found.', array('status' => 404));
        // }
    
        return $cohorts;
    }

    function retrieve_trainer_callback($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'trainers';

        $result = "SELECT * FROM $table_name WHERE `delete` = 0";

        $data = $wpdb->get_results($result);

        return $data;
    }
}