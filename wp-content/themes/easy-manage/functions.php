<?php 

//
function em_script_enqueue(){
    wp_enqueue_style('customstyle', get_template_directory_uri().'/custom/styles.css', [], '3.1.1', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri(). '/custom/script.js',[], '1.0.0', true);

    // introducing bootstrap
    wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');

    wp_enqueue_style('bootstrapcss');

    wp_register_script('jsbootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
    wp_enqueue_script ('jsbootstrap');
}

add_action('wp_enqueue_scripts', 'em_script_enqueue');


//CUSTOM POST TYPE FOR PROJECTS

// Register the custom post type
function register_project_post_type() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'menu_name' => 'Projects',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Project',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'view_item' => 'View Project',
        'search_items' => 'Search Projects',
        'not_found' => 'No projects found',
        'not_found_in_trash' => 'No projects found in trash',
        'all_items' => 'All Projects',
        'archives' => 'Project Archives',
        'insert_into_item' => 'Insert into project',
        'uploaded_to_this_item' => 'Uploaded to this project',
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image' => 'Use as featured image',
        'filter_items_list' => 'Filter projects list',
        'items_list_navigation' => 'Projects list navigation',
        'items_list' => 'Projects list',
        'item_published' => 'Project published',
        'item_published_privately' => 'Project published privately',
        'item_reverted_to_draft' => 'Project reverted to draft',
        'item_scheduled' => 'Project scheduled',
        'item_updated' => 'Project updated',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'projects'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true, // Enable Gutenberg editor
        'rest_base' => 'projects', // API endpoint base slug
        'rest_controller_class' => 'WP_REST_Posts_Controller', // Use default REST controller
    );

    register_post_type('project', $args);
}

// Hook into the 'init' action to register the custom post type
add_action('init', 'register_project_post_type');

// ADDING MENUS - HEADER AND FOOTER

function em_setup(){
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header');
    register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'em_setup');
// ADDING NAVWALKER CLASS
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}




