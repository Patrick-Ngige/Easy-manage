<!-- <?php
/*
Plugin Name: Custom Login Plugin
// */

// // Register custom endpoint
// function custom_login_endpoint() {
//     add_rewrite_endpoint( 'custom-login', EP_ROOT );
// }
// add_action( 'init', 'custom_login_endpoint' );

// Handle custom endpoint template
// function custom_login_template( $template ) {
//     global $wp_query;

//     if ( isset( $wp_query->query_vars['custom-login'] ) ) {
//         $template = plugin_dir_path( __FILE__ ) . 'login-template.php';
//     }

//     return $template;
// }
// add_filter( 'template_include', 'custom_login_template' );

// // Soft delete function
// function soft_delete_user( $user_id ) {
//     $user = get_user_by( 'id', $user_id );

//     if ( $user ) {
//         update_user_meta( $user_id, 'soft_deleted', true );
//         wp_delete_user( $user_id );
//         return true;
//     }

//     return false;
// }

// // Custom routes and controllers
// function custom_login_routes() {
//     add_action( 'rest_api_init', 'register_trainee_routes' );
//     add_action( 'rest_api_init', 'register_trainer_routes' );
//     add_action( 'rest_api_init', 'register_program_manager_routes' );
//     add_action( 'rest_api_init', 'register_admin_routes' );
// }
// add_action( 'init', 'custom_login_routes' );

// // Trainee Controller
// class TraineeController {
//     public function __construct() {
//         add_action( 'rest_api_init', array( $this, 'register_routes' ) );
//     }

//     public function register_routes() {
//         register_rest_route( 'custom-login/v1', '/trainee-login', array(
//             'methods'             => 'POST',
//             'callback'            => array( $this, 'trainee_login' ),
//             'permission_callback' => array( $this, 'check_authentication' ),
//         ) );
//     }

//     public function check_authentication() {
//         // Add authentication logic here
//         return true;
//     }

//     public function trainee_login( $request ) {
//         // Process trainee login logic here
//         $response = array(
//             'status'  => 'success',
//             'message' => 'Trainee logged in successfully.',
//             'data'    => array(
//                 // Include relevant data in the response
//             ),
//         );

//         return rest_ensure_response( $response );
//     }
// }

// Trainer Controller
// class TrainerController {
//     public function __construct() {
//         add_action( 'rest_api_init', array( $this, 'register_routes' ) );
//     }

//     public function register_routes() {
//         register_rest_route( 'custom-login/v1', '/trainer-login', array(
//             'methods'             => 'POST',
//             'callback'            => array( $this, 'trainer_login' ),
//             'permission_callback' => array( $this, 'check_authentication' ),
//         ) );
//     }

//     public function check_authentication() {
//         // Add authentication logic here
//         return true;
//     }

//     public function trainer_login( $request ) {
//         // Process trainer login logic here
//         $response = array(
//             'status'  => 'success',
//             'message' => 'Trainer logged in successfully.',
//             'data'    => array(
//                 // Include relevant data in the response
//             ),
//         );

//         return rest_ensure_response( $response );
//     }
// }

// // Program Manager Controller
// class ProgramManagerController {
//     public function __construct() {
//         add_action( 'rest_api_init', array( $this, 'register_routes' ) );
//     }

//     public function register_routes() {
//         register_rest_route( 'custom-login/v1', '/program-manager-login', array(
//             'methods'             => 'POST',
//             'callback'            => array( $this, 'program_manager_login' ),
//             'permission_callback' => array( $this, 'check_authentication' ),
//         ) );
//     }

//     public function check_authentication() {
//         // Add authentication logic here
//         return true;
//     }

//     public function program_manager_login( $request ) {
//         // Process program manager login logic here
//         $response = array(
//             'status'  => 'success',
//             'message' => 'Program manager logged in successfully.',
//             'data'    => array(
//                 // Include relevant data in the response
//             ),
//         );

//         return rest_ensure_response( $response );
//     }
// }

// Admin Controller
// class AdminController {
//     public function __construct() {
//         add_action( 'rest_api_init', array( $this, 'register_routes' ) );
//     }

//     public function register_routes() {
//         register_rest_route( 'custom-login/v1', '/admin-login', array(
//             'methods'             => 'POST',
//             'callback'            => array( $this, 'admin_login' ),
    //         'permission_callback' => array( $this, 'check_authentication' ),
    //     ) );
    // }

    // public function check_authentication() {
    //     // Add authentication logic here
    //     return true;
    // }

//     public function admin_login( $request ) {
//         // Process admin login logic here
//         $response = array(
//             'status'  => 'success',
//             'message' => 'Admin logged in successfully.',
//             'data'    => array(
//                 // Include relevant data in the response
//             ),
//         );

//         return rest_ensure_response( $response );
//     }
// }

// Instantiate controllers
// function instantiate_controllers() {
//     new TraineeController();
//     new TrainerController();
//     new ProgramManagerController();
//     new AdminController();
// }
// add_action( 'init', 'instantiate_controllers' );

// Password encryption
// function encrypt_password( $password ) {
//     return password_hash( $password, PASSWORD_DEFAULT );
// }

// Soft delete example
// function example_soft_delete() {
//     $user_id = 123; // Replace with the user ID to soft delete
//     soft_delete_user( $user_id );
// }
// Uncomment the line below to run the example soft delete
// example_soft_delete(); -->
