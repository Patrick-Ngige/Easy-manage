<?php
get_header();

/**
 * Template Name: Trainer Update
 *
 */

$user_id = $_GET['id'];

$curl = curl_init();

$url = "http://localhost/easy-manage/wp-json/em/v1/users/program_manager/" . $user_id;
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$user = json_decode($response, true);

if ($response === false) {
    $error = curl_error($curl);
}

curl_close($curl);

$token = $_COOKIE['token'];

var_dump($token);

$response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $token
    )
));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['pm_name'])) {
        $errors[] = 'Username is required';
    }

    if (empty($_POST['pm_email'])) {
        $errors[] = 'Email is required';
    }

    if (isset($_POST['updatebtn'])) {
        $pm_name = $_POST['pm_name'];
        $pm_email = $_POST['pm_email'];

        $updated_pm = array(
            'pm_name' => $pm_name,
            'pm_email' => $pm_email,
        );

        $token;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/easy-manage/wp-json/em/v1/pm');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($updated_pm));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response === false) {
            wp_die('Error: ' . curl_error($curl));
        } else {
            echo $response;
        }

        curl_close($curl);

        if ($httpCode === 200) {
            $result = json_decode($response);

            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Program Manager updated successfully.';
                ?>
                <script>
                    window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
                </script>
                <?php
                exit;
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
                        <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 " style="width:40vw;">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 " style="width:40vw;">
                                <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8" style="height:80vh; width:40vw; ">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size:16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center" style="color:#315B87">
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
                                                <label class="form-label" for="form2Example27" style="font-weight:600;">Username:</label>
                                                <input type="text" id="form2Example27" class="form-control form-control-md" placeholder="Enter project task" name="pm_name" value="<?php echo $user['user_name']; ?>" required />
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27" style="font-weight:600;">Email</label>
                                                <input type="email" id="form2Example27" class="form-control form-control-md" placeholder="Enter project task" name="pm_email" value="<?php echo $user['user_email']; ?>" required />
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27" style="font-weight:600;">Role:</label>
                                                <input type="text" id="form2Example27" class="form-control form-control-md" placeholder="Enter project task" name="pm_email" value="Program Manager" required />
                                            </div>

                                            <div class="pt-1 mb-4 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50 " style="background-color:#315B87 ;color:#FAFAFA" type="submit" name="updatebtn">Update</button>
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
