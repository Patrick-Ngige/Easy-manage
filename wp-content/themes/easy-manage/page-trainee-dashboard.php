<?php
get_header();

/**
 * Template Name: Admin PM List
 */

$current_user = wp_get_current_user();

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>


    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Trainee</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $request_url = 'http://localhost/easy-manage/wp-json/em/v1/trainee';
                    $response = wp_remote_get($request_url);
                    $trainees = wp_remote_retrieve_body($response);
                    $trainees = json_decode($trainees, true);

                    if (is_array($trainees)) {
                        foreach ($trainees as $trainee) {
                            if ($trainee['user_id'] == $current_user->ID) {
                                echo '<tr>';
                                echo '<td>';
                                echo '<div class="d-flex align-items-center">';
                                echo '<div class="ms-3">';
                                echo '<p class="mb-1">' . $trainee['user_login'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td>';
                                echo '<p class="fw-normal mb-1">' . $trainee['user_email'] . '</p>';
                                echo '</td>';
                                echo '<td>';
                                echo '<p class="fw-normal mb-1">' . ($trainee['user_status'] == 0 ? 'Active' : 'Inactive') . '</p>';
                                echo '</td>';
                                echo '<td>';
                                echo '<form method="POST">';
                                echo '<a href="http://localhost/easy-manage/admin-update-form/?id=' . $trainee['ID'] . '" style="padding:6px"><img src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png" style="width:25px;" alt=""></a> &nbsp;&nbsp;';
                                echo '<input type="hidden" name="" value="">';
                                echo '<a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png" style="width:25px;" alt="">  </a> &nbsp;&nbsp;';
                                echo '</form>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    } else {
                        echo 'Error retrieving trainees';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>
