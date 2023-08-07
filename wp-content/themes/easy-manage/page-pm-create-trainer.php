<?php get_header();

/**
 * Template Name: PM Create Trainer
 * 
 */

 $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2Vhc3ktbWFuYWdlIiwiaWF0IjoxNjg3MzQxODU1LCJuYmYiOjE2ODczNDE4NTUsImV4cCI6MTY4Nzk0NjY1NSwiZGF0YSI6eyJ1c2VyIjp7ImlkIjoiMiJ9fX0.4hkelWCIK1ZT2u4mtMWRuWnHAi9MpFY3_VeczfCJQ6U';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['trainer_name'])) {
        $errors[] = 'Trainer name is required';
    }
    if (empty($_POST['trainer_email'])) {
        $errors[] = 'Email is required';
    }
    if (empty($_POST['trainer_password'])) {
        $errors[] = 'Password is required';
    }
 
    if (isset($_POST['createbtn'])) {
        $trainer_name = $_POST['trainer_name'];
        $trainer_email = $_POST['trainer_email'];
        $trainer_role = 'trainer';
        $trainer_password = $_POST['trainer_password'];

        $created_trainer = array(
            'trainer_name' => $trainer_name,
            'trainer_email' => $trainer_email,
            'trainer_role' => $trainer_role,
            'trainer_password' => $trainer_password,
        );

        $token = $_COOKIE['token'];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/easy-manage/wp-json/em/v1/trainer');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($created_trainer));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($httpCode === 200) {
            $result = json_decode($response);

            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Trainer created successfully.';
                ?>
                <script>
                    window.location.href = '<?php echo esc_url("http://localhost/easy-manage/pm-trainers-list/"); ?>';
                </script>
                <?php
            }else{
                echo "failed to create trainer";
            }
        }


    }
}
?>

<div class="main-div">

    <div class="page-pm-sidenav" >
        <?php get_template_part('sidenav-pm'); ?>
    </div>
    <div class="div-1">
        <div class="container">
            <div class="div-2">
                <div class="col col-xl-10" style="width: 40vw;">
                    <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50"
                            style="width: 40vw;">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50"
                                style="width: 40vw;">
                                <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                    style="height: max-height; width: 40vw;">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size: 16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color: #315B87;margin-top:-2rem">
                                                Create Trainer
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
                                                    value="<?php echo isset($_POST['trainer_name']) ? $_POST['trainer_name'] : ''; ?>" />
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
                                                    value="<?php echo isset($_POST['trainer_email']) ? $_POST['trainer_email'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight: 600;">Password:</label>
                                                <input type="password" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="********" name="trainer_password"
                                                    value="<?php echo isset($_POST['trainer_password']) ? $_POST['trainer_password'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Password is required', $errors)) {
                                                    echo '<p class="text-danger">Password is required</p>';
                                                } ?>
                                            </div>

                                            <div
                                                class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50"
                                                    style="background-color: #315B87; color: #FAFAFA;margin-bottom:-2rem" type="submit"
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

<style>
    .main-div{
        width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;
    }
    .page-pm-sidenav{
        margin-top: -1.99rem; width: 20vw;
    }
    .div-1{
        height: 80vh; margin-left: 15rem;
    }
    .container{
        margin-top:5rem
    }
    .div-2{
        display:flex; justify-content:center; align-items:center;
    }
</style>

<?php get_footer(); ?>