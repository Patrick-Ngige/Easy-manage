<?php
get_header();

/**
 * Template Name: Trainer Update
 */

$user_id = $_GET['id'];
$token = $_COOKIE['token'];

$response = wp_remote_get(
    "http://localhost/easy-manage/wp-json/em/v1/users/program_manager/" . $user_id,
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        )
    )
);

if (is_wp_error($response)) {
    $error = $response->get_error_message();
} else {
    $user = json_decode(wp_remote_retrieve_body($response), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['pm_name'])) {
        $errors[] = 'Username is required';
    }

    if (empty($_POST['pm_email'])) {
        $errors[] = 'Email is required';
    }

    if (isset($_POST['updatebtn'])) {
        $pm_id = $_GET['id'];
        $pm_name = sanitize_text_field($_POST['pm_name']);
        $pm_email = sanitize_email($_POST['pm_email']);

        $updated_pm = array(
            'pm_id' => $pm_id,
            'pm_name' => $pm_name,
            'pm_email' => $pm_email,
        );

        $response = wp_remote_request(
            'http://localhost/easy-manage/wp-json/em/v1/pm/' . $pm_id,
            array(
                'method' => 'PATCH',
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ),
                'body' => json_encode($updated_pm),
            )
        );

        if (is_wp_error($response)) {
            wp_die('Error: ' . $response->get_error_message());
        } else {
            $response_code = wp_remote_retrieve_response_code($response);
            if ($response_code === 200) {
                $result = json_decode(wp_remote_retrieve_body($response));

                if ($result && isset($result->success)) {
                    $_SESSION['success_message'] = 'Program Manager updated successfully.';
                    ?>
                    <script>
                        window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
                    </script>
                    <?php
                    exit;
                }
            } else {
                wp_die('Error updating Program Manager. HTTP response code: ' . $response_code);
            }
        }
    } else {
        echo 'You do not have permission to perform this action.';
    }
}
?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-admin'); ?>
    </div>

    <div style="height:88vh;margin-left:20%;padding:1rem ">
        <div class="container py-3 h-auto">
            <div class="row d-flex justify-content-center align-items-center h-auto">
                <div class="col col-xl-10" style="width:40vw;">
                    <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                            style="width:40vw;">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                style="width:40vw;">
                                <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                    style="height:80vh; width:40vw; ">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size:16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color:#315B87">
                                                Update PM
                                            </h2>

                                            <?php
                                            if (!empty($errors)) {
                                                foreach ($errors as $error) {
                                                    echo '<p class="text-danger">' . $error . '</p>';
                                                }
                                            } 
                                            ?>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Username:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter project task" name="pm_name"
                                                    value="<?php echo isset($user['user_name']) ? $user['user_name'] : ''; ?>" />
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Email</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter project task" name="pm_email"
                                                    value="<?php echo isset($user['user_email']) ? $user['user_email'] : ''; ?>" />
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Role:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter project task" name="pm_role"
                                                    value="Program Manager" readonly />
                                            </div>

                                            <div
                                                class="pt-1 mb-4 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50 "
                                                    style="background-color:#315B87 ;color:#FAFAFA" type="submit"
                                                    name="updatebtn">Update</button>
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
