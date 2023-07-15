<?php
require_once(ABSPATH . 'wp-load.php');
setcookie('user_role', '', time() - 3600, '/');

// Rest of the code follows...
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy-Manage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-DaRm29U0BktG8LQMdGJtHuxPHm2blX/khLH3e+dPEwyYZUfZJZT1HR0sE+ueLsRxyZK1YskfFzjcgsCwM5im3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-c7xES9CZ5u+1oCG03V9NpdFTz9l6/UcxSyyHo5TWSFzX/h+Jd8kEh3OG2/ijg0f+b2Sd7nTdOahJF0kQQ4H98w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"
        integrity="sha512-VasBw1Lm6H0bABk4ncXo9yNugdYx5kWAXbt3cq6yGOLXEOODTtYz+rQABs64S6Hkav9JopVs6yaeRGQcWmhmIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php wp_head(); ?>
</head>

<body style="background-color:#E3E3EE;height:80vh;display:flex;margin-top:0rem;overflow:auto">

    <div style="display:flex;flex-direction:column;width:80vw;">
        <div
            style="width:100%;height:8vh;margin-left:20vw;display: flex; justify-content: space-between; align-items: center; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 0px 20px 0px 20px; ">
            <div
                style="background-color: #fafafa; border: 1.5px solid #315B87; display: inline-block; padding: 6px;font-weight:600">
                <span style="background-color: #315B87; padding: 6px 7px; color: #fafafa;">EASY</span>
                <span style="background-color: #FAFAFA; padding: 6px 7px; color: #315B87">MANAGE</span>
            </div>
            <div style="flex: 1; text-align: center;color:#4D7CAE">
                <?php

                date_default_timezone_set('Africa/Nairobi');
                $currentDateTime = date('Y-m-d g:i:s a');

                $currentTime = date('g:i a', strtotime($currentDateTime));
                $currentDay = date('l, jS F Y');

                echo "<h6>" . $currentTime . "<br>";
                echo $currentDay;
                "</h6>";
                ?>
            </div>


            <div>
                <a href="<?php echo wp_logout_url(home_url('/')); ?>"
                    style="color: red; text-decoration: none; font-weight: 600;">
                    <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/logout.png"
                        style="width: 1rem; height: 1rem;" />
                    Logout
                </a>
            </div>

        </div> <br>