<?php
require_once(ABSPATH . 'wp-load.php'); 

$user_role = isset($_COOKIE['user_role']) ? $_COOKIE['user_role'] : '';

$user = get_users(array(
    'role' => $user_role,
    'number' => 1, 
));

if (!empty($user)) {
    $user = $user[0]; 

    $username = $user->user_login;
} ?>
<div class="sidenav-trainee "
    style="background-color:#315B87;height:100vh;display:flex;flex-direction:column; padding-top:3rem;color:#FAFAFA;font-weight:500;">
    <div style=" align-items:center;display:flex;flex-direction:column;">
        <img src='http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png'
            style="width:8rem;height:8rem;" />
        <h5>
            <?php echo $username; ?>
        </h5>
        <h6>
            <?php echo $user_role; ?>
        </h6>
    </div>
    <div>
        <div
            class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trainee-dashboard') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/trainee-dashboard/"
                style=" display: block; padding: 16px ; text-decoration: none;color:#FAFAFA "> <img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png'
                    style="width:2.5rem;height:2.5rem;" /> Dashboard</a>
        </div>
        <div
            class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'completed-projects') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/completed-projects/"
                style=" display: block; padding: 16px; text-decoration: none; color:#FAFAFA;"><img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/complete1.png'
                    style="width:2.5rem;height:2.5rem;" /> Completed</a>
        </div>
        <div
            class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trainee-group-projects') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/trainee-group-projects/"
                style=" display: block; padding: 16px; text-decoration: none; color:#FAFAFA;"><img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/project-management-1.png'
                    style="width:2.5rem;height:2.5rem;" /> Group Projects</a>
        </div>

    </div>

</div>

<style>
    .side-menu.active {
        background-color: #40a7f1;
    }
</style>