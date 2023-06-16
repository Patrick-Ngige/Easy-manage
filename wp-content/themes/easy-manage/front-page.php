<?php
/*
Template Name: Login Page
*/



if (!is_user_logged_in()) {
    wp_redirect(home_url('/'));
    exit;
}

$error_message = '';
$show_attempts = false;
$remaining_attempts = 3 - (int) $_SESSION['login_attempts'];

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$login_attempts = $_SESSION['login_attempts'];

$wait_times = [0, 60, 180, 300]; // Wait times in seconds based on the number of attempts
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

        // Input validation
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
                    $remaining_time = $wait_time;
                    $error_message = 'You have exceeded the maximum number of login attempts. Please try again later.';
                    $show_attempts = true;
                }
            } else {
                $user_id = $user->ID;
                $user_info = get_userdata($user_id);
                $user_roles = $user_info->roles;

                if (in_array('administrator', $user_roles)) {
                    wp_redirect('http://localhost/easy-manage/admin-pm-list/');
                    exit;
                } elseif (in_array('editor', $user_roles)) {
                    wp_redirect('http://localhost/easy-manage/pm-dashboard/');
                    exit;
                } elseif (in_array('author', $user_roles)) {
                    wp_redirect('http://localhost/easy-manage/trainer-dashboard/');
                    exit;
                } else {
                    wp_redirect('http://localhost/easy-manage/trainee-dashboard/');
                    exit;
                }
            }
        }
    }
}
?>

<?php wp_head(); ?>

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

            echo nl2br($salutation);
            ?>
        </div>
        <div
            style="width: 70%; display: flex; flex-direction: column; background-color: #FAFAFA; border-radius: 10px; height: 70vh; justify-content: center; align-items: center;">
            <form action="" method="POST" style="width: 70%; display: flex; flex-direction: column;">
                <h2 style="color: #315B87; font-weight: 600; font-size: 2rem; text-align: center;margin-bottom:5%">Login
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
                            Please wait <span id="remaining-time">
                                <?php echo $remaining_time; ?>
                            </span> seconds before trying again.
                        <?php else: ?>
                            You have exceeded the maximum number of login attempts. Please try again later.
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <input type="submit" name="login" value="Login"
                        style="background-color: #315B87; color: #FAFAFA; border-radius: 10px; padding: 0.5rem; border: none; cursor: pointer;">
                </div>
            </form>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<script>
    const remainingTimeElement = document.getElementById('remaining-time');
    let remainingTime = parseInt(remainingTimeElement.innerHTML);

    function countdown() {
        remainingTime--;
        remainingTimeElement.innerHTML = remainingTime;

        if (remainingTime === 0) {
            window.location.reload();
        } else {
            setTimeout(countdown, 1000);
        }
    }

    if (remainingTime > 0) {
        countdown();
    }
</script>