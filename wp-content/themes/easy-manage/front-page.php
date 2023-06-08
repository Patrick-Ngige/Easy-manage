<?php wp_head();

/**
 * Template Name: Login form
 * 
 */

?>

<?php
/*
Template Name: Login Page
*/

$error_message = '';

// Function to track login attempts

?>

<?php wp_head(); ?>

<div class="form-container"
    style="height:100vh; background-color: #E3E3EE;display:flex;justify-content:center;align-items:center;margin-top:-1.99rem">

    <div
        style="z-index:1;width:24rem;position:fixed;height:13rem;background-color:#315B87;display:flex;align-self:flex-end;margin-left:-64rem">
    </div>

    <div
        style="z-index:1;width:24rem;position:fixed;height:13rem;background-color:#315B87;display:flex;align-self:flex-start;margin-left:64rem">
    </div>

    <div
        style="z-index: 9999; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;display:flex;justify-content:center;align-items:center;width:75%;border-radius:20px">

        <div
            style="width:30%;height:70vh;background-color:#315B87;color:#FAFAFA;font-size:large;display:flex;align-items:center;justify-content:center;border-bottom-left-radius:10px;border-top-left-radius:10px;">
            <?php
            $currentTime = date('H:i:s');
            $hour = (int) date('H');
            $message = "Welcome to Easy-Manage!";

            if ($hour < 12) {
                $salutation = 'Good morning! <br>' . $message;
            } elseif ($hour < 18) {
                $salutation = 'Good afternoon! <br>' . $message;
            } else {
                $salutation = 'Good evening! <br>' . $message;
            }

            echo $salutation;
            ?>
        </div>
        <div style="width:70%;height:70vh;">
            <form action="" method="POST"
                style="background-color:#FAFAFA;height:70vh;display:flex;flex-direction:column;border-radius:10px">
                <div class="form"
                    style="width:80%;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:4rem 2rem 5rem 8rem">
                    <h2 style="color:#315B87;font-weight:600;font-size:xxx-large;margin-bottom:2rem">Login</h2>

                    <?php if ($error_message): ?>
                        <div class="error-message">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <input type="email" placeholder="Enter email" name="email"
                            style="width:38vw;margin-bottom:2rem;padding:7px;border-radius:10px;border-color: #315B87;border: 2px solid #315B87;">
                    </div>
                    <div>
                        <input type="password" placeholder="Enter password" name="password"
                            style="width:38vw;margin-bottom:2rem;padding:7px;border-radius:10px;border-color: #315B87;border: 2px solid #315B87;">
                    </div>
                    <button type="submit" class="btnlog" name="login"
                        style="width:20vw;padding: 5px;border-radius:10px;background-color:#315B87;border:none;color:#FAFAFA;font-size:20px;font-weight:600">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>