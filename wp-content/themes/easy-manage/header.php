<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy-Manage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <?php wp_head(); ?>

</head>

<body style="background-color:#E3E3EE;height:80vh;overflow-y:hidden;display:flex;margin-top:0rem">

        <div style="display:flex;flex-direction:column;width:80vw;">
            <div style="width:100%;height:10vh;margin-left:20vw;display: flex; justify-content: space-between; align-items: center; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 0px 20px 0px 20px; ">
                <div>
                    <h5>Dashboard</h5>
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
                    <a href="<?php echo wp_logout_url(home_url()); ?>" style="color:red;text-decoration:none;font-weight:600"> <img
                            src='http://localhost/easy-manage/wp-content/uploads/2023/06/logout.png'
                            style="width:1rem;height:1rem;" /> Logout</a>

                </div>

            </div> <br>