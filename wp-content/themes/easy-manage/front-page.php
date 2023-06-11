<?php
/*
Template Name: Login Page
*/

$error_message = '';

if (isset($_POST['login'])) {
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    $user = wp_authenticate($email, $password);

    if (is_wp_error($user)) {
        $error_message = $user->get_error_message();
    } else {
        $user_id = $user->ID;
        $user_info = get_userdata($user_id);
        $user_roles = $user_info->roles;

        if (in_array('administrator', $user_roles)) {
            wp_redirect('http://localhost/easy-manage/admin-dashboard/');
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
        <div style="width: 30%; height: 70vh; background-color: #315B87; color: #FAFAFA; font-size: large; display: flex; align-items: center; justify-content: center; border-bottom-left-radius: 10px; border-top-left-radius: 10px;">
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
                <h2 style="color: #315B87; font-weight: 600; font-size: 2rem; text-align: center;margin-bottom:5%">Login</h2>
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
                <button type="submit" class="btnlog" name="login"
                    style="width: 50%; padding: 0.5rem; border-radius: 10px; background-color: #315B87; border: none; color: #FAFAFA; font-size: 1.1em; font-weight: 600; margin-left: auto; margin-right: auto;"
                    onmouseover="this.style.backgroundColor='#144770';"
                    onmouseout="this.style.backgroundColor='#315B87';">
                    Login
                </button>


            </form>
        </div>
    </div>
</div>