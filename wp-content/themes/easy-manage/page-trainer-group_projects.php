<?php
get_header();

/**
 * Template Name: Admin PM List
 */


require_once(ABSPATH . 'wp-load.php');

$token = $_COOKIE['token'];

$response = wp_remote_get(
    'http://localhost/easy-manage/wp-json/wp/v2/users/me',
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        )
    )
);

if (isset($_POST['soft_delete'])) {
    $group_id = $_POST['group_id'];
    $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/group_project/soft_delete/' . $group_id;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        array(
            'Authorization: Bearer ' . $token
        )
    );
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
    }
    curl_close($curl);
}
?>

<div class="main-div">
    <div class="page-trainer-sidenav">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div class="main-container">
        <div class="div-1">
            <div class="floating-div">
                <div class="floating-btns">
                    <a href="http://localhost/easy-manage/trainer-group-projects/" id="float-btn">
                        Creat Group Project
                    </a>
                    <a href="http://localhost/easy-manage/deactivated-projects" id="float-btn">
                        Deactivated projects
                    </a>
                </div>
                <div class="search-bar">
                    <?php echo do_shortcode('[search_bar]'); ?>
                </div>
            </div>
            <table class="table align-middle table-hover">
                <thead class="bg-light">
                    <tr class="tr-head">
                        <th>Trainee</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $request_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/group';
                    $response = wp_remote_get($request_url);
                    $projects = wp_remote_retrieve_body($response);
                    $projects = json_decode($projects, true);

                    if (!empty($projects)) {
                        foreach ($projects as $project) { ?>

                            <tr></tr>
                            <td>
                                <div class="td-div-1">
                                    <div class="td-div-2">
                                        <p>
                                            <?php echo $project['assigned_members'] ?>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>
                                    <?php echo $project['project_name'] ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo ($project['group_status'] == 0 ? '<span style="color:green;">Ongoing</span>' : 'Completed') ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $project['due_date'] ?>
                                </p>
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="group_id" value="<?php echo $project['group_id']; ?>">
                                    <button type="submit" name="soft_delete" class="btn-soft-delete" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete">
                                        <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                            alt="delete button">
                                    </button>
                                    <a href="http://localhost/easy-manage/update-group-project/?id=<?php echo $project['group_id'] ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="edit-btn"><img
                                            src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                            alt="edit button"></a> &nbsp;&nbsp;
                                </form>
                            </td>
                            </tr>
                        <?php }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">No group projects available</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>
<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

<style>
    .main-div {
        width: 100vw;
        height: 90vh;
        display: flex;
        flex-direction: row;
        margin-top: -2.45rem
    }

    .page-trainer-sidenav {
        margin-top: -1.99rem;
        width: 20vw
    }

    .main-container {
        padding: 1rem;
        width: 80vw;
        margin-left: 0rem
    }

    .div-1 {
        padding: 1rem;
    }

    .floating-div {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .floating-btns {
        display: flex;
        align-items: center;
        gap: 5vw;
        margin-bottom: 1rem;
    }

    #float-btn {
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        background-color: #FAFAFA;
        border: none;
        color: #315B87;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #float-btn:hover {
        color: #FAFAFA;
        background-color: #315B87;
    }

    .search-bar {
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .table {
        width: 90%;
        margin-left: 5%;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin-top: 3%;
    }

    .tr-table {
        font-size: large;
        color: #315B87;
        padding-left: 2rem
    }

    .td-div-1 {
        display: flex;
        align-items: center
    }

    .td-div-2 {
        margin-left: 1rem;
    }

    td p {
        font-weight: normal;
        margin-bottom: 1rem
    }

    .btn-soft-delete,
    .edit-btn {
        padding: 6px;
        border: none
    }

    .btn-soft-delete img,
    .edit-btn img {
        width: 25px;
    }
</style>