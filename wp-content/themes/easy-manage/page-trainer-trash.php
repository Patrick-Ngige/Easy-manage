<?php
get_header();

/**
 * Template Name: trash
 */

$token = $_COOKIE['token'];

$request_url = 'http://localhost/easy-manage/wp-json/em/v1/pm';
$response = wp_remote_get(
    $request_url,
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        )
    )
);

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $users = json_decode(wp_remote_retrieve_body($response), true);
}

$endpoint_url = '';
if (isset($_POST['restore_user'])) {
    $user_id = $_POST['user_id'];
    $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/restore_user/' . $user_id;

}
$ch = curl_init($endpoint_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Authorization: Bearer ' . $token
    )
);

$result = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_status === 200) {
    $result = json_decode($result);

    if ($result && isset($result->success)) {
        $_SESSION['success_message'] = 'User restored successfully.';
        ?>
        <script>
            window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
        </script>
        <?php
        exit;
    }
}

curl_close($ch);

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>


    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: end; margin-bottom: 1rem;">
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
                    $token = $_COOKIE['token'];

                    $request_url = 'http://localhost/easy-manage/wp-json/em/v1/trainee';
                    $response = wp_remote_get($request_url, array(
                        'headers' => array(
                            'Authorization' => 'Bearer ' . $token
                        )
                    )
                    );

                    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                        $trainees = json_decode(wp_remote_retrieve_body($response), true);

                        if (is_array($trainees)) {
                            foreach ($trainees as $trainee) { ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="mb-1">
                                                    <?php echo $trainee['user_login'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">
                                            <?php echo $trainee['user_email'] ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">
                                            <?php echo ($trainee['user_status'] == 0 ? 'Active' : '<span style="color:#d11a2a">inactive</span>') ?>
                                        </p>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $trainee['ID']; ?>">
                                            <button type="submit" name="restore_user"
                                                style="border: none; background: none; cursor: pointer;">
                                                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png"
                                                    style="width:3vw;" alt="">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo '<tr><td colspan="4" style="text-align: center;">No trainees available</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">Error retrieving trainees</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>
