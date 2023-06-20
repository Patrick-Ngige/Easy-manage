<?php get_header();

/**
 * Template Name: Trainer Create trainee
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();


    if (empty($_POST['trainee_name'])) {
        $errors[] = 'Trainee name is required';
    }

    if (empty($_POST['trainee_email'])) {
        $errors[] = 'Email is required';
    }

    if (empty($_POST['trainee_role'])) {
        $errors[] = 'Role is required';
    }

    if (empty($_POST['trainee_password'])) {
        $errors[] = 'Password is required';
    }


    if (empty($errors)) {
        $trainee_name = $_POST['trainee_name'];
        $trainee_email = $_POST['trainee_email'];
        $trainee_role = $_POST['trainee_role'];
        $trainee_password = $_POST['trainee_password'];


        $response = wp_remote_post(
            'http://localhost/easy-manage/wp-json/em/v1/trainee',
            array(
                'body' => array(
                    'trainee_name' => $trainee_name,
                    'trainee_email' => $trainee_email,
                    'trainee_role' => $trainee_role,
                    'trainee_password' => $trainee_password,
                ),
            )
        );


        if (!is_wp_error($response)) {
            $result = wp_remote_retrieve_body($response);
            $result = json_decode($result);

            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Trainer created successfully.';
                ?>
                <script>
                    window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
                </script>
                <?php
                exit;
            }
        }
    }
}
?>

<div style="width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;">

    <div class="page-trainee-dashboard" style="margin-top: -1.99rem; width: 20vw;">
        <?php get_template_part('sidenav-trainer'); ?>
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
                                    style="height: fit-content; width: 40vw;">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size: 16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color: #315B87;margin-top:-2rem">
                                                Create trainee
                                            </h2>

                                            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                <div class="alert alert-success" role="alert">
                                                    Trainer created successfully.
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Trainee:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee name" name="trainee_name"
                                                    value="<?php echo isset($_GET['trainee_name']) ? $_GET['trainee_name'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Trainee name is required', $errors)) {
                                                    echo '<p class="text-danger">Trainee name is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee email" name="trainee_email"
                                                    value="<?php echo isset($_GET['trainee_email']) ? $_GET['trainee_email'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Role:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee role" name="trainee_role"
                                                    value="<?php echo isset($_GET['trainee_role']) ? $_GET['trainee_role'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Role is required', $errors)) {
                                                    echo '<p class="text-danger">Role is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Password:</label>
                                                <input type="password" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee role" name="trainee_password"
                                                    value="<?php echo isset($_GET['trainee_password']) ? $_GET['trainee_password'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Password is required', $errors)) {
                                                    echo '<p class="text-danger">Passsword is required</p>';
                                                } ?>
                                            </div>

                                            <div
                                                class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50"
                                                    style="background-color: #315B87;margin-bottom:-2rem; color: #FAFAFA" type="submit"
                                                    name="createbtn">Create</button>
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