<?php
require_once(ABSPATH . 'wp-load.php'); // Include the wp-load.php file

$current_user = wp_get_current_user();?>
<div class="sidenav-trainer"
style="background-color:#315B87;height:100vh;display:flex;flex-direction:column; padding-top:3rem;color:#FAFAFA;font-weight:500;">
    <div style=" align-items:center;display:flex;flex-direction:column;">
        <img src='http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png'
            style="width:8em;height:8rem;" />
            <h5>
            <?php echo $current_user->display_name; ?>
        </h5>
        <h6>
            <?php echo get_user_role($current_user); ?>
        </h6>
    </div>
    <div >
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trainer-dashboard') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/trainer-dashboard/" style=" display: block; padding: 16px ; text-decoration: none;color:#FAFAFA "> <img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png'
                    style="width:2.5rem;height:2.5rem;" /> Dashboard</a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trainer-projects') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/individual-projects/" style=" display: block; padding: 16px; text-decoration: none; color:#FAFAFA;"><img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/project.png'
                    style="width:2.5rem;height:2.5rem;" />Individual Projects</a>
        </div>

        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trainer-projects') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/group-projects" style=" display: block; padding: 16px; text-decoration: none; color:#FAFAFA;"><img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/project.png'
                    style="width:2.5rem;height:2.5rem;" />Group Projects</a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trainer-cohort') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/trainer-cohort/" style=" display: block; padding: 16px; text-decoration: none; color:#FAFAFA"><img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/cohort.png'
                    style="width:2.5rem;height:2.5rem;" /> Cohort</a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'trash') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/trash/" style=" display: block; padding: 16px; text-decoration: none; color:#FAFAFA;"><img
                    src='http://localhost/easy-manage/wp-content/uploads/2023/06/dustbin.png'
                    style="width:2.5rem;height:2.5rem;" /> Trash</a>
        </div>
        
    </div>

</div>

<style>
    .side-menu.active {
    background-color: #40a7f1;
}
</style>