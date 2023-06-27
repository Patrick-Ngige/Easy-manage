<?php
get_header();

/**
 * Template Name: Admin PM List
 */

 $token = $_COOKIE['token'];

 $response = wp_remote_get(
     'http://localhost/easy-manage/wp-json/wp/v2/users/me',
     array(
         'headers' => array(
             'Authorization' => 'Bearer ' . $token
         )
     )
 );

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>


    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <a href="http://localhost/easy-manage/admin-trainers-table/" class="floating-btn"
                    style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    View Trainers
                </a>
                <a href="http://localhost/easy-manage/admin-trainees-table/" class="floating-btn"
                    style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    View Trainees
                </a>
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $request_url = 'http://localhost/easy-manage/wp-json/em/v1/users/trainers';
                    $response = wp_remote_get($request_url);
                    $users = wp_remote_retrieve_body($response);
                    $users = json_decode($users, true);

                    if (is_array($users)) {
                        foreach ($users as $user) {

                            echo '<tr>';
                            echo '<td>';
                            echo '<div class="d-flex align-items-center">';
                            echo '<div class="ms-3">';
                            echo '<p class="mb-1">' . $user['user_nicename'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</td>';
                            echo '<td>';
                            echo '<p class="fw-normal mb-1">' . $user['user_email'] . '</p>';
                            echo '</td>';
                            echo '<td>';
                            echo '<p class="fw-normal mb-1"> Trainer</p>';
                            echo '</td>';
                            echo '<td>';
                            echo '<form method="POST">';
                            echo '<a href="http://localhost/easy-manage/admin-update-form/?id=' . $user['ID'] . '" style="padding:6px"><img src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png" style="width:25px;" alt=""></a> &nbsp;&nbsp;';
                            echo '<input type="hidden" name="" value="">';
                            echo '<a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png" style="width:25px;" alt="">  </a> &nbsp;&nbsp;';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Error retrieving users';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>