<?php
get_header();

/**
 * Template Name: Admin PM List
 */

$token = $_COOKIE['token'];

// Make sure the token is properly sanitized before use to prevent security vulnerabilities

$request_url = 'http://localhost/easy-manage/wp-json/em/v1/pm';
$response = wp_remote_get($request_url, array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $token
    )
)
);

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $users = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($_POST['restore_user'])) {
        $user_id = $_POST['user_id'];
        $endpoint = 'http://localhost/easy-manage/wp-json/em/v1/restore_user/';

        $data = array('user_id' => $user_id);
        $data_string = json_encode($data);

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        )
        );

        $result = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_status === 200) {
            // Successful response
            $response = json_decode($result, true);
            // Handle the response accordingly
        } else {
            // Error occurred
            // Handle the error response
        }

        curl_close($ch);
    }
    ?>
    <div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
        <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
            <?php get_template_part('sidenav-admin'); ?>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1">
                                                <?php echo $user['user_nicename'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $user['user_email'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1" style="color:red"> Deactivated</p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['ID']; ?>">
                                        <button type="submit" name="restore_user"
                                            style="padding:6px; border: none; background: none; cursor: pointer;">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                                style="width:25px;" alt="">
                                        </button>
                                    </form>
                                </td>


                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
} else {
    // Handle case when no users are found
    echo 'No users found.';
}

get_footer();
?>