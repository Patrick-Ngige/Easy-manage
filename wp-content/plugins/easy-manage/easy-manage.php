<?php

/**
 * @package easy_manage
 */

/*
Plugin Name: easy-manage
Plugin URI: http://...
Description: A project management plugin 
Version: 1.0.0
Author: PNK
Author URI: http://...
License: GPLv2 or Later
Text Domain: easy-manage plugin
*/

//Security Check 

defined('ABSPATH') or die("Got you hacker");

//Require once the Composer Autoload
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Base;
function activate_easy_manage_plugin(){
    Base\Activate::activate();
 
}
register_activation_hook(__FILE__, 'activate_easy_manage_plugin');

function deactivate_easy_manage_plugin(){
    Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_easy_manage_plugin');

if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}


// require_once plugin_dir_path(__FILE__) . 'custom-endpoints.php';


// add_action( 'rest_api_init', 'easy_manage_register_custom_endpoints' );

// function easy_manage_register_custom_endpoints(){

//     $endpoints = new CustomEndpoints();
//     $endpoints->pms_register_custom_endpoints();
// }
