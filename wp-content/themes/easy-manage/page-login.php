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
                // Successful login
                // Regenerate token and set cookie
                $credentials = [
                    'username' => $email,
                    'password' => $password
                ];

                // Generate token using credentials
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

                // Redirect to desired page after successful login
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
?>
<div class="form-container"
    style="height: 100vh; background-color: #E3E3EE; display: flex; justify-content: center; align-items: center; padding: 0 1rem;">
    <div
        style="z-index: 1; width: 24rem; position: fixed; height: 13rem; background-color: #315B87; display: flex; align-self: flex-end; top: 0; right: 0;">
    </div>
    <div
        style="z-index: 1; width: 24rem; position: fixed; height: 13rem; background-color: #315B87; display: flex; align-self: flex-start; bottom: 0; left: 0;">
    </div>
    <div
        style="z-index: 9999; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; display: flex; justify-content: center; align-items: center; width: 75%; border-radius: 20px;">
        <div
            style="width: 30%; height: 70vh; background-color: #315B87; color: #FAFAFA; font-size: large; display: flex; align-items: center; justify-content: center; border-bottom-left-radius: 10px; border-top-left-radius: 10px;">
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

        <div
            style="width: 70%; display: flex; flex-direction: column; background-color: #FAFAFA; border-radius: 10px; height: 70vh; justify-content: center; align-items: center;">
            <form action="" method="POST" style="width: 70%; display: flex; flex-direction: column;">
                <h2
                    style="color: #315B87; font-weight: 600; font-size: 2rem; text-align: center;margin-bottom:5%;margin-left:-10%">
                    Login
                </h2>
                <?php if ($error_message): ?>
                    <div class="error-message" style="color: #ff5252; opacity: 1; text-align: center;">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <input type="email" placeholder="Enter email" name="email"
                        style="width: 90%; margin-bottom: 1rem; padding: 0.5rem; border-radius: 10px; border: 2px solid #315B87;">
                </div>
                <div>
                    <input type="password" placeholder="Enter password" name="password"
                        style="width: 90%; margin-bottom: 1rem; padding: 0.5rem; border-radius: 10px; border: 2px solid #315B87;">
                </div>
                <?php if ($show_attempts): ?>
                    <div class="attempts" style="text-align: center; color: #ff5252; margin-bottom: 1rem;">
                        <?php if ($remaining_time > 0): ?>
                            Please wait
                            <span id="countdown" style="font-weight: bold;">
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
                    <button type="submit" name="login"
                        style="width: 90%; padding: 0.5rem; background-color: #315B87; color: #FAFAFA; border-radius: 10px; border: none;font-weight:600">
                        login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
