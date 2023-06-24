<?php
require_once(ABSPATH . 'wp-load.php');

$token = isset($_COOKIE['token']) ? $_COOKIE['token'] : '';

$response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $token
    )
));

$user_data = null; // Initialize the user data variable
$roles = array(); // Initialize the roles array

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $user_data = json_decode(wp_remote_retrieve_body($response));

    if (!empty($user_data->id)) {
        // Fetch the user's role separately
        $roles_response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/' . $user_data->id . '/roles', array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $token
            )
        ));

        // Check if the roles request was successful
        if (!is_wp_error($roles_response) && wp_remote_retrieve_response_code($roles_response) === 200) {
            // Get the roles data from the response body
            $roles_data = json_decode(wp_remote_retrieve_body($roles_response));

            // Access the user's role(s)
            if (!empty($roles_data)) {
                foreach ($roles_data as $role) {
                    $roles[] = $role->name; // Access the role name property
                }
            }
        }
    }
}
?>

<div class="sidenav-nav" style="background-color: #315B87; height: 100vh; display: flex; flex-direction: column; padding-top: 3rem; color: #FAFAFA; font-weight: 500;">
    <div style="align-items: center; display: flex; flex-direction: column;">
        <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png" style="width: 8rem; height: 8rem;" />
        <h5>
            <?php echo isset($user_data->name) ? $user_data->name : ''; ?>
        </h5>
        <h6>
            <?php echo !empty($roles) ? implode(', ', $roles) : 'No Roles'; ?>
        </h6>
    </div>
    <div>
        <?php if (current_user_can('manage_options')){ ?>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/wp-admin/" style="display: block; padding: 16px; text-decoration: none; color: #FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png" style="width: 2.5rem; height: 2.5rem;" />
                Dashboard
            </a>
        </div>
        <?php } ?>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'admin-pm-list') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/admin-pm-list/" style="display: block; padding: 16px; text-decoration: none; color: #FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/team.png" style="width: 2.5rem; height: 2.5rem;" />
                Program Managers
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'create-program-manager') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/create-program-manager/" style="display: block; padding: 16px; text-decoration: none; color: #FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/create.png" style="width: 2.5rem; height: 2.5rem;" />
                Create PM
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'admin-deactivate-table') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/admin-deactivate-table/" style="display: block; padding: 16px; text-decoration: none; color: #FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png" style="width: 2.5rem; height: 2.5rem;" />
                Deactivated
            </a>
        </div>
    </div>
</div>

<style>
    .side-menu.active {
        background-color: #40a7f1;
    }
</style>
