<?php get_header();

/**
 * Template Name: PM Create Trainer
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();


    if (empty($_POST['trainer-name'])) {
        $errors[] = 'Trainer name is required';
    }

    if (empty($_POST['trainer-email'])) {
        $errors[] = 'Email is required';
    }

    if (empty($_POST['trainer-role'])) {
        $errors[] = 'Role is required';
    }


    if (empty($errors)) {
        $trainer_name = $_POST['trainer-name'];
        $trainer_email = $_POST['trainer-email'];
        $trainer_role = $_POST['trainer-role'];


        $response = wp_remote_post(
            '/wp-json/em/v1/create-trainer',
            array(
                'body' => array(
                    'trainer' => $trainer_name,
                    'email' => $trainer_email,
                    'role' => $trainer_role,
                ),
            )
        );


        if (!is_wp_error($response) && $response['response']['code'] === 200) {
            wp_redirect('/trainers-dashboard');
            exit;
        } else {
            $errors[] = 'Trainer creation failed. Please try again.';
        }
    }
}
?>

<div style="width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;">

    <div class="page-trainee-dashboard" style="margin-top: -1.99rem; width: 20vw;">
        <?php get_template_part('sidenav-pm'); ?>
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
                                    style="height: 80vh; width: 40vw;">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size: 16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color: #315B87">
                                                Create Trainer
                                            </h2>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Trainer:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainer name" name="trainer-name"
                                                    value="<?php echo isset($_POST['trainer-name']) ? $_POST['trainer-name'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Trainer name is required', $errors)) {
                                                    echo '<p class="text-danger">Trainer name is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainer email" name="trainer-email"
                                                    value="<?php echo isset($_POST['trainer-email']) ? $_POST['trainer-email'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Role:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainer role" name="trainer-role"
                                                    value="<?php echo isset($_POST['trainer-role']) ? $_POST['trainer-role'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Trainer role is required', $errors)) {
                                                    echo '<p class="text-danger">Trainer role is required</p>';
                                                } ?>
                                            </div>

                                            <div
                                                class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50"
                                                    style="background-color: #315B87; color: #FAFAFA" type="submit"
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