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
            <div class="floating-btns">
                <div style="display: flex; align-items: center; gap:5vw; margin-bottom: 1rem;">
                    <a href="http://localhost/easy-manage/trainer-group-projects/"
                        style="text-decoration:none;padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        Creat Group Project
                    </a>
                    <a href="http://localhost/easy-manage/deactivated-projects" class="floating-btn"
                        style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        Deactivated projects
                    </a>
                </div>
                <div style="display: flex; align-items: center; justify-content: end;">
                    <?php echo do_shortcode('[search_bar]'); ?>
                </div>
            </div>
            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
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
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="mb-1">
                                            <?php echo $project['assigned_members'] ?>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">
                                    <?php echo $project['project_name'] ?>
                                </p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">
                                    <?php echo ($project['group_status'] == 0 ? '<span style="color:green;">Ongoing</span>' : 'Completed') ?>
                                </p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">
                                    <?php echo $project['due_date'] ?>
                                </p>
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="group_id" value="<?php echo $project['group_id']; ?>">
                                    <button type="submit" name="soft_delete" class="btn-soft-delete" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete" style="padding:6px;border:none">
                                        <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                            style="width:25px;" alt="">
                                    </button>
                                    <a href="http://localhost/easy-manage/update-group-project/?id=<?php echo $project['group_id'] ?>"
                                        style="padding:6px" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img
                                            src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                            style="width:25px;" alt=""></a> &nbsp;&nbsp;
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
    .main-div{
        width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem
    }
    .page-trainer-sidenav{
        margin-top:-1.99rem;width:20vw
    }
    .main-container{
        padding:1rem;width:80vw;margin-left:0rem
    }
    .div-1{
        padding:1rem;
    }
    .floating-btns{
        display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;
    }
</style>