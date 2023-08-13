<?php
get_header();

/**
 * Template Name: Admin PM List
 */

$token = $_COOKIE['token'];
$response = wp_remote_get(
    'http://localhost/easy-manage/wp-json/wp/v2/users/me',
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        ),
        'cookies' => array(
            'token' => $token
        )
    )
);

if (isset($_POST['soft_delete'])) {
    $user_id = $_POST['user_id'];
    $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/soft_delete/' . $user_id;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $token
    ));
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
    }
    curl_close($curl);  
}
?>
<div class="main-div">
    <div class="page-pm-sidenav">
        <?php get_template_part('sidenav-pm'); ?>
    </div>
    <div class="div-1">
        <div class="div-2">
            <div class="div-3">
            <a href="http://localhost/easy-manage/deleted-trainers/" class="floating-btn"
                    >
                    Deactivated Trainers
                </a>
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>
            <table class="table"
               >
                <thead class="bg-light">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $request_url = 'http://localhost/easy-manage/wp-json/em/v1/users/trainers';
                  $response = wp_remote_get(
                      $request_url,
                      array(
                          'headers' => array(
                              'Authorization' => 'Bearer ' . $token
                          )
                      )
                  );
                  $users = wp_remote_retrieve_body($response);
                  $users = json_decode($users, true);                  
                    $users = wp_remote_retrieve_body($response);
                    $users = json_decode($users, true);
                    if (is_array($users)) {
                        foreach ($users as $user) { ?>
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
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $user['user_email'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"> Trainer</p>
                                </td>
                                <td>
                                    <form method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $user['ID']; ?>">
                                        <button type="submit" name="soft_delete" class="btn-soft-delete"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            style="padding:6px;border:none;">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                                style="width:25px;" alt="">
                                        </button>
                                        <a href="http://localhost/easy-manage/update-form/?id=<?php echo $user['ID'] ?>"
                                            style="padding:6px" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Edit"><img
                                                src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                                style="width:25px;" alt=""></a> &nbsp;&nbsp;       
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">No trainers available</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .main-div {
        width: 100vw;
        height: 90vh;
        display: flex;
        flex-direction: row;
        margin-top: -2.45rem;
    }

    .page-pm-sidenav {
        margin-top: -1.99rem;
        width: 20vw;
    }

    .div-1 {
        padding: 1rem;
        width: 80vw;
        margin-left: 0rem
    }

    .div-2 {
        margin-top: 1rem;
        padding: 1rem;
    }

    .div-3 {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
        padding-left: 1rem;
    }

    .floating-btn {
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        background-color: #FAFAFA;
        border: none;
        color: #315B87;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .floating-btn:hover{
        background-color: #315B87;
        color: #FAFAFA;
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

    .btn-soft-delete {
        padding: 6px;
        border: none
    }

    .btn-soft-delete img {
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