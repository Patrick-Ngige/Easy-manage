<?php
get_header();

/**
 * Template Name: deactivated trainers
 */

$token = $_COOKIE['token'];

if (isset($_POST['restore'])) {
    $user_id = $_POST['user_id'];
    $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/restore_user/' . $user_id;

    $restore_response = wp_remote_request(
        $endpoint_url,
        array(
            'method' => 'POST',
            'headers' => array(
                'Authorization' => 'Bearer ' . $token
            )
        )
    );

    if (is_wp_error($restore_response)) {
        echo 'Error restoring user: ' . $restore_response->get_error_message();
    } else {
        $response = wp_remote_get(
            'http://localhost/easy-manage/wp-json/em/v1/trainer',
            array(
                'headers' => array(
                    'Authorization' => 'Bearer ' . $token
                )
            )
        );
    }
} else {
    $response = wp_remote_get(
        'http://localhost/easy-manage/wp-json/em/v1/trainer',
        array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $token
            )
        )
    );
}

if (is_wp_error($response)) {
    echo 'Error retrieving user data: ' . $response->get_error_message();
} else {
    $user_data = wp_remote_retrieve_body($response);
    $user = json_decode($user_data, true);

    if (empty($user)) {
        echo 'No users available.';
    }
}

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>

    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">

            <div style="display: flex; align-items: center; justify-content: end; margin-bottom: 1rem;">

                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!empty($user)) {
                        foreach ($user as $User) { ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1">
                                                <?php echo $User['user_login'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $User['user_email'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1" style="color:red"> Deleted</p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $User['ID']; ?>">
                                        <button type="submit" name="restore" class="btn-soft-delete"
                                            style="padding:6px;border:none;">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png"
                                            style="width:3vw;" alt="">
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">No deleted trainers available</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>