<?php
/*
Template Name: Login Page
*/

session_start();

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$error_message = '';
$show_attempts = false;

$remaining_attempts = 3 - (int) $_SESSION['login_attempts'];

$login_attempts = $_SESSION['login_attempts'];

$wait_times = [0, 60, 180, 300];
$wait_time = isset($wait_times[$login_attempts]) ? $wait_times[$login_attempts] : end($wait_times);

if ($login_attempts >= count($wait_times)) {
    $last_attempt_time = isset($_SESSION['last_attempt_time']) ? $_SESSION['last_attempt_time'] : 0;
    $remaining_time = $wait_time - (time() - $last_attempt_time);

    if ($remaining_time > 0) {
        $error_message = 'You have exceeded the maximum number of login attempts. Please try again later.';
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
            $error_message = 'Please enter both email and password.';
            $show_attempts = true;
        } else {
            // Check if the user has user_status = 1
            $user = get_user_by('email', $email);
            if ($user && $user->user_status === '1') {
                $error_message = 'You are not allowed to log in.';
                $show_attempts = true;
            } else {
                $user = wp_authenticate($email, $password);

                if (is_wp_error($user)) {
                    $login_attempts++;
                    $_SESSION['login_attempts'] = $login_attempts;
                    $_SESSION['last_attempt_time'] = time();

                    if ($login_attempts < count($wait_times)) {
                        $remaining_time = $wait_times[$login_attempts];
                        $error_message = 'Invalid email or password. Please try again.';
                        $show_attempts = true;
                    } else {
                        $remaining_time = $wait_times[$login_attempts];
                        $error_message = 'You have exceeded the maximum number of login attempts. Please try again later.';
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

<style>
    .form-container.login {
        height: 97vh;
        background-color: #E3E3EE;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 1rem;
        overflow-y: hidden;
    }

    .form-container.login > div:nth-child(1) {
        z-index: 1;
        width: 24vw;
        position: fixed;
        height: 13rem;
        background-color: #315B87;
        display: flex;
        align-self: flex-end;
        top: 0;
        right: 0;
    }

    .form-container.login > div:nth-child(2) {
        z-index: 1;
        width: 24vw;
        position: fixed;
        height: 13rem;
        background-color: #315B87;
        display: flex;
        align-self: flex-start;
        bottom: 0;
        left: 0;
    }

    .login-card {
        z-index: 9999;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 75%;
        border-radius: 20px;
    }

    .login-card > div:nth-child(1) {
        width: 30%;
        height: 70vh;
        background-color: #315B87;
        color: #FAFAFA;
        font-size: large;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }

    .login-card > div:nth-child(1) h2 {
        color: #315B87;
        font-weight: 600;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 5%;
        margin-left: -10%;
    }

    .login-card > div:nth-child(1) .error-message {
        color: #ff5252;
        opacity: 1;
        text-align: center;
    }

    .login-card > div:nth-child(2) {
        width: 70%;
        display: flex;
        flex-direction: column;
        background-color: #FAFAFA;
        border-radius: 10px;
        height: 70vh;
        justify-content: center;
        align-items: center;
    }

    .login-card > div:nth-child(2) form {
        width: 70%;
        display: flex;
        flex-direction: column;
    }

    .login-card > div:nth-child(2) form h2 {
        color: #315B87;
        font-weight: 600;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 5%;
        margin-left: -10%;
    }

    .login-card > div:nth-child(2) form .attempts {
        text-align: center;
        color: #ff5252;
        margin-bottom: 1rem;
    }

    .login-card > div:nth-child(2) form .attempts #countdown {
        font-weight: bold;
    }

    .login-card > div:nth-child(2) form input[type="email"],
    .login-card >div:nth-child(2) form input[type="password"] {
        width: 90%;
        margin-bottom: 1rem;
        padding: 0.5rem;
        border-radius: 10px;
        border: 2px solid #315B87;
    }

    .login-card > div:nth-child(2) form .attempts {
        text-align: center;
        color: #ff5252;
        margin-bottom: 1rem;
    }

    .login-card > div:nth-child(2) form .attempts #countdown {
        font-weight: bold;
    }

    .login-card > div:nth-child(2) form button[type="submit"] {
        width: 90%;
        padding: 0.5rem;
        background-color: #315B87;
        color: #FAFAFA;
        border-radius: 10px;
        border: none;
        font-weight: 600;
    }
</style>

<div class="form-container login">
    <div></div>
    <div></div>
    <div class="login-card">
        <div>
            <?php
            date_default_timezone_set('Africa/Nairobi');
            $currentTime = date('H:i:s');
            $hour = (int) date('H');
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
                <?php if ($error_message): ?>
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
                <?php if ($show_attempts): ?>
                    <div class="attempts">
                        <?php if ($remaining_time > 0): ?>
                            Please wait
                            <span id="countdown">
                                <?php echo $remaining_time; ?>
                            </span>
                            seconds before trying again.
                        <?php else: ?>
                            You have
                            <?php echo $remaining_attempts; ?> attempt(s) remaining.
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
