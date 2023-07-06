<style>
    /* Default styles */
    .sidenav-nav {
        background-color: #315B87;
        height: 100vh;
        display: flex;
        flex-direction: column;
        padding-top: 3rem;
        color: #FAFAFA;
        font-weight: 500;
    }

    .sidenav-nav > div:first-child {
        align-items: center;
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
    }

    .sidenav-nav > div:first-child img {
        width: 8rem;
        height: 8rem;
    }

    .sidenav-nav > div:first-child h5 {
        margin: 0.5rem 0;
    }

    .sidenav-nav > div:first-child h6 {
        margin: 0;
    }

    .sidenav-nav > div:last-child {
        display: flex;
        flex-direction: column;
    }

    .sidenav-nav > div:last-child .side-menu {
        margin-bottom: 1rem;
    }

    .sidenav-nav > div:last-child .side-menu a {
        display: flex;
        align-items: center;
        padding: 16px;
        text-decoration: none;
        color: #FAFAFA;
    }

    .sidenav-nav > div:last-child .side-menu a img {
        width: 2.5rem;
        height: 2.5rem;
        margin-right: 0.5rem;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
        .sidenav-nav {
            height: auto;
            padding: 1rem 0;
        }

        .sidenav-nav > div:first-child {
            margin-bottom: 0;
        }

        .sidenav-nav > div:first-child img {
            width: 6rem;
            height: 6rem;
        }

        .sidenav-nav > div:first-child h5,
        .sidenav-nav > div:first-child h6 {
            font-size: 0.8rem;
            text-align: center;
        }

        .sidenav-nav > div:last-child .side-menu {
            display: flex;
            flex-direction: row;
        }

        .sidenav-nav > div:last-child .side-menu a {
            flex-grow: 1;
            justify-content: center;
            margin-right: 0.5rem;
        }
    }
</style>

<div class="sidenav-nav">
    <div>
        <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png" alt="Profile Image" />
        <h5>
            <?php echo isset($user_data->name) ? $user_data->name : ''; ?>
        </h5>
        <h6>
            Administrator
        </h6>
    </div>
    <div>
        <?php if (current_user_can('manage_options')){ ?>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/wp-admin/">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png" alt="Dashboard Icon" />
                Dashboard
            </a>
        </div>
        <?php } ?>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'admin-pm-list') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/admin-pm-list/">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/team.png" alt="Program Managers Icon" />
                Program Managers
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'create-program-manager') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/create-program-manager/">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/create.png" alt="Create PM Icon" />
                Create PM
            </a>
        </div>
        <div class="side-menu <?php echo (strpos($_SERVER['REQUEST_URI'], 'admin-deactivate-table') !== false) ? 'active' : ''; ?>">
            <a href="http://localhost/easy-manage/admin-deactivate-table/">
                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png" alt="Deactivated Icon" />
                Deactivated
            </a>
        </div>
    </div>
</div>
