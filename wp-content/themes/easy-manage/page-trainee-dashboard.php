<?php
get_header();

/**
 * Template Name: Admin PM List
 */

 require_once(ABSPATH . 'wp-load.php');

 $token = $_COOKIE['token'];
 
 $response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
     'headers' => array(
         'Authorization' => 'Bearer ' . $token
     )
 ));
 
 if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
     $user_data = json_decode(wp_remote_retrieve_body($response));
 
 }

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainee'); ?>
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
                  $request_url = "http://localhost/easy-manage/wp-json/em/v1/individual_project/{$user_data->id}";
                    $response = wp_remote_get($request_url);
                    $trainees = wp_remote_retrieve_body($response);
                    $trainees = json_decode($trainees, true);

                    var_dump($trainees);

                    if (is_array($trainees)) {
                        foreach ($trainees as $trainee) {
                            // if ($trainee['trainee_id'] == $user_data->id) {
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
                    // } else {
                    //     echo 'Error retrieving trainees';
                    // }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>
