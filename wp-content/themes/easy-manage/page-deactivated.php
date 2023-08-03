<?php
get_header();

/**
 * Template Name: Admin PM List
 */

$token = $_COOKIE['token'];

$request_url = 'http://localhost/easy-manage/wp-json/em/v1/pm';
$response = wp_remote_get(
    $request_url,
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        )
    )
);

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $users = json_decode(wp_remote_retrieve_body($response), true);
}

$endpoint_url = '';
if (isset($_POST['restore_user'])) {
    $user_id = $_POST['user_id'];
    $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/restore_user/' . $user_id;
}

$ch = curl_init($endpoint_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Authorization: Bearer ' . $token
    )
);

$result = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_status === 200) {
    $result = json_decode($result);

    if ($result && isset($result->success)) {
        $_SESSION['success_message'] = 'User restored successfully.';
        ?>
        <script>
            window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
        </script>
        <?php
        exit;
    }
}

curl_close($ch);
?>

<div class="deactivated-main-div">
    <div class="page-admin-dashboard">
        <?php get_template_part('sidenav-admin'); ?>
    </div>

    <div class="deactivated-div-1">
        <div class="deactivated-div-2">
            <div class="deactivated-div-3">
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle table-hover">
                <thead class="bg-light">
                    <tr class="table-tr">
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Restore</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($users)) {
                        foreach ($users as $user) {
                            ?>
                            <tr>
                                <td>
                                    <div class="td-div-1">
                                        <div class="td-div-2">
                                            <p>
                                                <?php echo $user['user_login'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td-2">
                                    <p>
                                        <?php echo $user['user_email'] ?>
                                    </p>
                                </td>
                                <td class="td-3">
                                    <p> Deactivated</p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['ID']; ?>">
                                        <button type="submit" name="restore_user" class="activate-user" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="activate user">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png"
                                                alt="activate user button">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">No deactivated users available</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .deactivated-main-div {
        width: 100vw;
        height: 90vh;
        display: flex;
        flex-direction: row;
        margin-top: -2.45rem;
    }

    .page-admin-dashboard {
        margin-top: -1.99rem;
        width: 20vw;
    }

    .deactivated-div-1 {
        padding: 1rem;
        width: 80vw;
        margin-left: 0rem
    }

    .deactivated-div-2 {
        margin-top: 1rem;
        padding: 1rem;
    }

    .deactivated-div-3 {
        display: flex;
        align-items: center;
        justify-content: end;
        margin-bottom: 1rem;
    }

    .deactivated-floating-btn {
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        background-color: #FAFAFA;
        border: none;
        color: #315B87;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 90%;
        margin-left: 5%;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin-top: 3%;
        background-color: #FAFAFA;
        margin-bottom: 0;
    }

    .table-tr {
        font-size: large;
        color: #315B87;
        padding-left: 2rem
    }

    .td-div-1 {
        display: flex;
        align-items: center;
    }

    .td-div-2 {
        margin-left: 1rem;
    }

    .td-div-2 p {
        margin-bottom: 1rem;
    }

    .td-2,
    .td-3 {
        font-weight: normal;
        margin-bottom: 1rem;
    }

    .td-3 p {
        color: red;
    }

    .activate-user {
        padding: 6px;
        border: none
    }

    .activate-user img {
        width: 25px;
        border: none
    }

    .edit-btn img {
        width: 25px;
    }
</style>


<?php get_footer(); ?>
<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>