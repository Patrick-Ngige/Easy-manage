<?php $current_user ?>

<div class="sidenav-nav" style="background-color: #315B87; height: 100vh; display: flex; flex-direction: column; padding-top: 3rem; color: #FAFAFA; font-weight: 500;">
    <div style="align-items: center; display: flex; flex-direction: column;">
        <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png" style="width: 8rem; height: 8rem;" />
        <h5>Jon Doe</h5>
        <h6>Administrator</h6>
    </div>
    <div>
        <?php //if //(current_user_can('manage_options')){ ?>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/wp-admin/" style="display: block; padding: 16px; text-decoration: none; color: #FAFAFA;">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png" style="width: 2.5rem; height: 2.5rem;" />
                Dashboard
            </a>
        </div>
        <?php //} ?>
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