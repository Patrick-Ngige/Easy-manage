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

<div class="main-div">
    <div class="page-pm-sidenav" >
        <?php get_template_part('sidenav-pm'); ?>
    </div>
    <div class="div-1">
        <div class="div-2">
            <div class="search-bar">
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>
            <table class="table align-middle table-hover">
                <thead class="bg-light">
                    <tr class="table-tr">
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
                                    <div class="td-div-1">
                                        <div class="td-div-2">
                                            <p class="td-div-3">
                                                <?php echo $User['user_login'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td-2">
                                    <p>
                                        <?php echo $User['user_email'] ?>
                                    </p>
                                </td>
                                <td class="td-3">
                                    <p> Deleted</p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $User['ID']; ?>">
                                        <button type="submit" name="restore" class="btn-soft-delete">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png"
                                                 alt="">
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

<style>
.main-div{
    width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem
}
.page-pm-sidenav{
    margin-top:-1.99rem;width:20vw
}
.div-1{
    padding:1rem;width:80vw;margin-left:0rem
}
.div-2{
    padding:1rem;
}
.search-bar{
    display: flex; align-items: center; justify-content: end; margin-bottom: 1rem;
}
.table{
    background-color:#FAFAFA;width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;
}
.table-tr{
    font-size:large;color:#315B87;padding-left:2rem;
}
.td-div-1{
    display:flex; align-items:center;
}
.td-div-2{
    margin-left: 1rem;
}
.td-div-3{
    margin-bottom: .8rem;
}
.td-2{
    font-weight:normal; margin-bottom: .8rem;
}
.td-3{
    font-weight:normal; margin-bottom: .8rem;color:red;
}
.btn-soft-delete{
    padding:2px;border:none;
}
button img{
    width:2.5vw;top:0;
}
</style>

<?php get_footer(); ?>