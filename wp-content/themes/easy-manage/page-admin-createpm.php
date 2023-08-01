<?php
session_start();
get_header();
/**
 * Template Name: Admin Create PM
 */
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();
    if (empty($_POST['pm_name'])) {
        $errors[] = 'Username is required';
    }
    if (empty($_POST['pm_email'])) {
        $errors[] = 'Email is required';
    }
    if (empty($_POST['pm_password'])) {
        $errors[] = 'Password is required';
    }
    if (isset($_POST['createbtn'])) {
        $pm_name = $_POST['pm_name'];
        $pm_email = $_POST['pm_email'];
        $pm_role = 'program_manager';
        $pm_password = $_POST['pm_password'];
        $created_pm = array(
            'pm_name' => $pm_name,
            'pm_email' => $pm_email,
            'pm_role' => $pm_role,
            'pm_password' => $pm_password
        );
        require_once(ABSPATH . 'wp-load.php');
        $token = $_COOKIE['token'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/easy-manage/wp-json/em/v1/pm');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($created_pm));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            )
        );
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode === 200) {
            $result = json_decode($response);
            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Program Manager created successfully.';
                ?>
                <script>
                    window.location.href = '<?php echo esc_url("http://localhost/easy-manage/admin-pm-list/"); ?>';
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
<div class="main-div">
    <div class="page-admin-dashboard">
        <?php get_template_part('sidenav-admin'); ?>
    </div>
    <div class="div-1">
        <div class="container">
            <div class="div-2 ">
                <div class="div-3 ">
                    <div class="card">
                        <div class="div-4">
                            <div class=" div-5">
                                <div class="div-6">
                                    <div class="div-7 card-body">
                                        <form action="" method="POST">
                                            <h2>
                                                Create PM
                                            </h2>
                                            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                <div class="alert alert-success" role="alert">
                                                    Program manager created successfully.
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-outline">
                                                <label class="form-label" for="form2Example27">Username:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control"
                                                    placeholder="Enter project task" name="pm_name"
                                                    value="<?php echo isset($_GET['pm_name']) ? $_GET['pm_name'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Username is required', $errors)) {
                                                    echo '<p class="text-danger">Username is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline ">
                                                <label class="form-label" for="form2Example27">Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control"
                                                    placeholder="Enter project task" name="pm_email"
                                                    value="<?php echo isset($_GET['pm_email']) ? $_GET['pm_email'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline">
                                                <label class="form-label" for="form2Example27">Password:</label>
                                                <input type="password" id="form2Example27"
                                                    class="form-control" placeholder="********"
                                                    name="pm_password"
                                                    value="<?php echo isset($_GET['pm_password']) ? $_GET['pm_password'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Password is required', $errors)) {
                                                    echo '<p class="text-danger">Password is required</p>';
                                                } ?>
                                            </div>
                                            <div
                                                class="div-button">
                                                <button class="btn "
                                                    type="submit" name="createbtn">Create</button>
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


    <style>
        .main-div {
            width: 100vw;
            height: 90vh;
            display: flex;
            flex-direction: row;
            margin-top: -2.45rem
        }

        .page-admin-dashboard {
            margin-top: -1.99rem;
            width: 20vw
        }

        .div-1 {
            height: 88vh;
            margin-left: auto;
            margin-right: auto;
        }
        .container {
            margin-top: 3rem; padding: .5rem 1rem
        }

        .div-2 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 40vw;
        }

        .div-3 {
            display: flex;
            flex-direction: column;
            width: 60vw;
        }

        .div-4 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .div-5 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .div-6 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-left: 5vw;
        }

        .div-7 {
            padding: 4rem;
            color: black;
        }
        .form-outline{
            margin-bottom: 1rem;
        }
        .form-label{
            font-weight:600;
        }
        .div-button{
            padding-top: 1rem; display: flex;justify-content: center;align-items:center
        }
        .btn{
            background-color:#315B87 ;color:#FAFAFA;margin-bottom:-2rem;padding: .5rem 1.5rem;font-size: large;
        }
      

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        form {
            font-size: 16px;
        }

        form h2 {
            color: #315B87;
            margin-top: -2rem;
            font-weight: bold;
            display: flex;
            align-items: end;
            justify-content: center;
        }
    </style>
    <?php get_footer(); ?>
</div>