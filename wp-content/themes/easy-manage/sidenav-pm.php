<?php
require_once(ABSPATH . 'wp-load.php');

$token = $_COOKIE['token'];

$response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $token
    )
));

$user_data = null; // Initialize the user data variable
$roles = array(); // Initialize the roles array

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $user_data = json_decode(wp_remote_retrieve_body($response));

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
        foreach ($roles_data as $role) {
            $roles[] = $role->name; // Access the role name property
        }
    }
}
?>
<div class="sidenav-pm" style="background-color:#315B87;height:100vh;display:flex;flex-direction:column;padding-top:3rem;color:#FAFAFA;font-weight:500;">
    <div style="align-items:center;display:flex;flex-direction:column;">
        <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png" style="width:8rem;height:8rem;" />
        <h5>
            <?php echo $user_data->name ?? ''; ?>
        </h5>
        <h6>
            <?php echo !empty($roles) ? implode(', ', $roles) : 'No Roles'; ?>
        </h6>
    </div>
    <div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'pm-dashboard') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/pm-dashboard"  style="display:block;padding:16px;text-decoration:none;color:#FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png" style="width:2.5rem;height:2.5rem;" /> Dashboard
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'create-trainer') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/create-trainer"  style="display:block;padding:16px;text-decoration:none;color:#FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/teacher.png" style="width:2.5rem;height:2.5rem;" /> Create Trainer
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'create-cohort') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/create-cohort"  style="display:block;padding:16px;text-decoration:none;color:#FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/create.png" style="width:2.5rem;height:2.5rem;" /> Create Cohort
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'cohorts') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/cohorts"  style="display:block;padding:16px;text-decoration:none;color:#FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/create.png" style="width:2.5rem;height:2.5rem;" /> Cohorts
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'pm-trainers-list') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/pm-trainers-list"  style="display:block;padding:16px;text-decoration:none;color:#FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/customer.png" style="width:2.5rem;height:2.5rem;" /> Trainers
            </a>
        </div>
    </div>
</div>

<style>
    .side-menu.active {
    background-color: #40a7f1;
}
</style>