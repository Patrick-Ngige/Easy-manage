<?php
get_header();

/**
 * Template Name: Deactivated projects
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
$endpoint = '';
if (isset($_POST['restore_user'])) {
    $user_id = $_POST['user_id'];
    $endpoint = 'http://localhost/easy-manage/wp-json/em/v1/restore_user/' . $user_id;
}
$ch = curl_init($endpoint);
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
    $response = json_decode($result, true);
}

curl_close($ch);
?>
<div class="main-div">
    <div class="page-trainer-sidenav">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div class="main-container">
        <div class="container-1">
            <!-- Add buttons and search bar here -->
            <div class="search-bar">
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>
            <div class="scrollable-container" >
                <table class="table align-middle bg-white table-hover">
                    <thead class="bg-light fixed-thead">
                        <tr class="tr-head">
                            <th>Trainee</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Restore</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $request_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/deleted';
                        $response = wp_remote_get($request_url);
                        $projects = wp_remote_retrieve_body($response);
                        $projects = json_decode($projects, true);
                        if (is_array($projects)) {
                            foreach ($projects as $project) { ?>
                                <tr>
                                    <td>
                                        <div class="td-div-1">
                                            <div class="td-div-2">
                                                <p>
                                                    <?php
                                                    if ($project['project_type'] === 'individual') {
                                                        echo $project['assignee'];
                                                    } elseif ($project['project_type'] === 'group') {
                                                        echo is_array($project['assigned_members']) ? implode(', ', $project['assigned_members']) : $project['assigned_members'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="td-2">
                                        <p>
                                            <?php echo $project['project_task'] ?>
                                        </p>
                                    </td>
                                    <td class="td-2">
                                        <p style="color: red;">
                                            Deleted
                                        </p>
                                    </td>
                                    <td>
                                        <form method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo ($project['project_type'] === 'individual') ? $project['project_id'] : $project['group_id']; ?>">
                                            <button type="submit" name="restore_user" class="btn-restore">
                                                <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png"
                                                  alt="restore user">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo '<tr><td colspan="4" style="text-align: center;">No deactivated trainers available</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
?>
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
    .container-1{
        padding:1rem;
    }
    .search-bar{
        display: flex; align-items: center; justify-content: end; margin-bottom: 1rem;
    }
    .scrollable-container{
        height: 400px; overflow: auto;
    }
    .table{
        width: 90%; margin-left: 5%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; margin-top: 3%;
    }
    .tr-head{
        font-size: large; color: #315B87; padding-left: 2rem;
    }
    .td-div-1{
        font-size: large; color: #315B87; padding-left: 2rem;
    }
    .td-2{
        margin-bottom: .4rem
    }
    .btn-restore{
        padding: 6px; border: none;
    }
    .btn-restore img{
        width: 3vw;
    }
   .fixed-thead {
        position: sticky;
        top: 0;
        background-color: #fff;
        z-index: 1;
    }
    .scrollable-container {
        height: 400px;
        overflow: auto;
    }
    .scrollable-container::-webkit-scrollbar {
        width: 0.5rem;
    }
    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: transparent;
    }
    .scrollable-container::-webkit-scrollbar-track {
        background-color: transparent;
    }
</style>
