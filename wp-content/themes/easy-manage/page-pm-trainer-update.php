<?php get_header();

/**
 * Template Name: PM update Trainer
 * 
 */
$user_id = $_GET['id'];
 $token = $_COOKIE['token'];

 $response = wp_remote_get(
    'http://localhost/easy-manage/wp-json/em/v1/users/trainer/'. $user_id,
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
    $trainer = json_decode(wp_remote_retrieve_body($response), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['trainer_name'])) {
        $errors[] = 'Trainer name is required';
    }
    if (empty($_POST['trainer_email'])) {
        $errors[] = 'Email is required';
    }
    if (empty($_POST['trainer_role'])) {
        $errors[] = 'Role is required';
    }
    if (isset($_POST['updatebtn'])) {
        $trainer_name = $_POST['trainer_name'];
        $trainer_email = $_POST['trainer_email'];
        $trainer_role = $_POST['trainer_role'];
        $updated_trainer = array(
            'trainer_id' => $user_id,
            'trainer_name' => $trainer_name,
            'trainer_email' => $trainer_email,
            'trainer_role' => $trainer_role,
        );
        $responses = wp_remote_post(
            'http://localhost/easy-manage/wp-json/em/v1/trainee',
            array(
                'method' => 'PATCH',
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ),
                'body' => json_encode($updated_trainer),
            )
        );
        if (is_wp_error($response)) {
            wp_die('Error: ' . $response->get_error_message());
        } else {
            $response_code = wp_remote_retrieve_response_code($response);
            if ($response_code === 200) {
                $result = json_decode(wp_remote_retrieve_body($response));
                if ($result && isset($result->success)) {
                    $_SESSION['success_message'] = 'trainer updated successfully.';
                    ?>
                    <script>
                        window.location.href = '<?php echo esc_url("http://localhost/easy-manage/pm-trainers-list/"); ?>';
                    </script>
                    <?php
                    exit;
                }
            } else {
                wp_die('Error updating trainer. HTTP response code: ' . $response_code);
            }
        }
    }
}
?>

<div class="main-div">
    <div class="page-pm-sidenav">
        <?php get_template_part('sidenav-pm'); ?>
    </div>
    <div style="height: 80vh; margin-left: 15rem;">
        <div class="container py-4">
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
                                               Update Trainer
                                            </h2>
                                            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                <div class="alert alert-success" role="alert">
                                                    Trainer created successfully.
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Trainer:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainer name" name="trainer_name"
                                                    value="<?php echo $trainer['user_name'] ?>" />
                                                <?php if (isset($errors) && in_array('Trainer name is required', $errors)) {
                                                    echo '<p class="text-danger">Trainer name is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainer email" name="trainer_email"
                                                    value="<?php echo $trainer['user_email'] ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Role:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainer role" name="trainer_role"
                                                    value="<?php echo $trainer['user_role'] ?>" />
                                                <?php if (isset($errors) && in_array('Role is required', $errors)) {
                                                    echo '<p class="text-danger">Role is required</p>';
                                                } ?>
                                            </div>
                                            <div
                                                class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50"
                                                    style="background-color: #315B87; color: #FAFAFA;margin-bottom:-2rem" type="submit"
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

<style>
    .main-div{
        width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;
    }
    .page-pm-sidenav{
        margin-top: -1.99rem; width: 20vw;
    }
</style>

<?php get_footer(); ?>