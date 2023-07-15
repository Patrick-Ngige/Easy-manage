<?php
get_header();

/**
 * Template Name: PM update pm
 * 
 * 
 */
$user_id = $_GET['id'];
$token = $_COOKIE['token'];

$response = wp_remote_get(
    'http://localhost/easy-manage/wp-json/em/v1/users/program_manager/' . $user_id,
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        ),
        'cookies' => array(
            'token' => $token
        )
    )
);

if (is_wp_error($response)) {
    $error = $response->get_error_message();
} else {
    $pm = json_decode(wp_remote_retrieve_body($response), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['pm_name'])) {
        $errors[] = 'pm name is required';
    }
    if (empty($_POST['pm_email'])) {
        $errors[] = 'Email is required';
    }

    if (isset($_POST['updatebtn'])) {
        $pm_name = $_POST['pm_name'];
        $pm_email = $_POST['pm_email'];

        $updated_pm = array(
            'pm_id' => $user_id,
            'pm_name' => $pm_name,
            'pm_email' => $pm_email,
        );

        $responses = wp_remote_post(
            'http://localhost/easy-manage/wp-json/em/v1/pm',
            array(
                'method' => 'PATCH',
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ),
                'body' => json_encode($updated_pm),
            )
        );

        if (is_wp_error($responses)) {
            wp_die('Error: ' . $responses->get_error_message());
        } else {
            $response_code = wp_remote_retrieve_response_code($responses);
            if ($response_code === 200) {
                $result = json_decode(wp_remote_retrieve_body($responses));

                if ($result && isset($result->success)) {
                    $_SESSION['success_message'] = 'pm updated successfully.';
                    ?>
                    <script>
                        window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
                    </script>
                    <?php
                    exit;
                }
            } else {
                wp_die('Error updating pm. HTTP response code: ' . $response_code);
            }
        }
    }
}
?>

<div style="width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;">

    <div class="page-trainee-dashboard" style="margin-top: -1.99rem; width: 20vw;">
        <?php get_template_part('sidenav-admin'); ?>
    </div>
    <div style="height: 80vh; margin-left: 15rem;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-10" style="width: 40vw;">
                    <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50"
                            style="width: 40vw;">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50"
                                style="width: 40vw;">
                                <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                    style="height:auto ; width: 40vw;">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size: 16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color: #315B87;margin-top:-2rem">
                                                Update pm
                                            </h2>

                                            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                <div class="alert alert-success" role="alert">
                                                    pm updated successfully.
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Name :</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter pm name" name="pm_name"
                                                    value="<?php echo $pm['user_name'] ?>" />
                                                <?php if (isset($errors) && in_array('pm name is required', $errors)) {
                                                    echo '<p class="text-danger">pm name is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter pm email" name="pm_email"
                                                    value="<?php echo $pm['user_email'] ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>

                                            <div
                                                class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50"
                                                    style="background-color: #315B87; color: #FAFAFA;margin-bottom:-2rem"
                                                    type="submit" name="updatebtn">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
