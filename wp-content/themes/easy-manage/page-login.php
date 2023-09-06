<?php
/*
Template Name: Login Page
*/

session_start();


if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$error_message = '';
$remaining_time = '';
$show_attempts = false;

$remaining_attempts = 3 - (int)$_SESSION['login_attempts'];

$login_attempts = $_SESSION['login_attempts'];

$wait_times = [0, 60, 180, 300];
$wait_time = isset($wait_times[$login_attempts]) ? $wait_times[$login_attempts] : end($wait_times);

if ($login_attempts >= count($wait_times)) {
    $last_attempt_time = isset($_SESSION['last_attempt_time']) ? $_SESSION['last_attempt_time'] : 0;
    $remaining_time = $wait_time - (time() - $last_attempt_time);

    if ($remaining_time > 0) {
        $error_message = '<span style="color:#d11a2a">You have exceeded the maximum number of login attempts. Please try again later.</span>';
        $show_attempts = true;
    } else {
        unset($_SESSION['login_attempts']);
        unset($_SESSION['last_attempt_time']);
    }
} else {
    if (isset($_POST['login'])) {
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error_message = '<span style="color:#d11a2a">Please enter both email and password.</span>';
            $show_attempts = true;
        } else {
            $user = get_user_by('email', $email);
            if ($user && $user->user_status === '1') {
                $error_message = '<span style="color:#d11a2a">You are not allowed to log in. Please contact the Administrator.</span>';
                $show_attempts = true;
            } else {
                $user = wp_authenticate($email, $password);

                if (is_wp_error($user)) {
                    $login_attempts++;
                    $_SESSION['login_attempts'] = $login_attempts;
                    $_SESSION['last_attempt_time'] = time();

                    if ($login_attempts < count($wait_times)) {
                        $remaining_time = $wait_times[$login_attempts];
                        $error_message = '<span style="color:#d11a2a">Invalid email or password. Please try again.</span>';
                        $show_attempts = true;
                    } else {
                        $remaining_time = $wait_times[$login_attempts];
                        $error_message = '<span style="color:#d11a2a">You have exceeded the maximum number of login attempts. Please try again later.</span>';
                        $show_attempts = true;
                    }
                } else {

                    $credentials = [
                        'username' => $email,
                        'password' => $password
                    ];

                    $args = [
                        'method' => 'POST',
                        'body' => $credentials
                    ];

                    $result = wp_remote_post('http://localhost/easy-manage/wp-json/jwt-auth/v1/token', $args);

                    if (!is_wp_error($result) && wp_remote_retrieve_response_code($result) === 200) {
                        $token_data = json_decode(wp_remote_retrieve_body($result));

                        if (isset($token_data->token)) {
                            $token = $token_data->token;
                            setcookie('token', $token, time() + (86400 * 30), '/', 'localhost');
                            echo "Token: " . $token;
                        }
                    } else {
                        echo "Error generating token.";
                    }

                    if (isset($user->roles) && is_array($user->roles)) {
                        $user_roles = $user->roles;

                        if (in_array('administrator', $user_roles)) {
                            wp_redirect('http://localhost/easy-manage/admin-pm-list/');
                            exit;
                        } elseif (in_array('program_manager', $user_roles)) {
                            wp_redirect('http://localhost/easy-manage/pm-dashboard/');
                            exit;
                        } elseif (in_array('trainer', $user_roles)) {
                            wp_redirect('http://localhost/easy-manage/trainer-dashboard/');
                            exit;
                        } elseif (in_array('trainee', $user_roles)) {
                            wp_redirect('http://localhost/easy-manage/trainee-dashboard/');
                            exit;
                        } else {
                            wp_redirect('http://localhost/easy-manage');
                            exit;
                        }
                    }
                }
            }
        }
    }
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/custom/styles.css">

<div class="form-container login">
    <div></div>
    <div></div>
    <div class="login-card">
        <div>
            <?php
            date_default_timezone_set('Africa/Nairobi');
            $currentTime = date('H:i:s');
            $hour = (int)date('H');
            $message = "Welcome to Easy-Manage!";

            if ($hour < 12) {
                $salutation = 'Good morning! <br>' . $message;
            } elseif ($hour < 16) {
                $salutation = 'Good afternoon! <br>' . $message;
            } else {
                $salutation = 'Good evening! <br>' . $message;
            }

            echo $salutation;
            ?>
        </div>

        <div>
            <form action="" method="POST">
                <h2>Login</h2>
                <?php if ($error_message) : ?>
                    <div class="error-message">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <input type="email" placeholder="Enter email" name="email">
                </div>
                <div>
                    <input type="password" placeholder="Enter password" name="password">
                </div>
                <?php if ($show_attempts) : ?>
                    <div class="attempts">
                        <?php
                        if ($remaining_time > 0) : ?>
                            Please wait
                            <span id="countdown">
                                <?php echo $remaining_time; ?>
                            </span>
                            seconds before trying again.
                        <?php else : ?>
                            You have
                            <?php echo $remaining_attempts; ?> attempt(s) remaining.
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div >
                    <button id="login-btn" type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>



<style>
    #login-btn{
    cursor: pointer;
}
</style>
