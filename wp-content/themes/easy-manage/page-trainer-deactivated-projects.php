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
    // Successful response
    $response = json_decode($result, true);
    // Handle the response accordingly
} else {
    // Error occurred
    // Handle the error response
}

curl_close($ch);

?>
<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>

    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: end; margin-bottom: 1rem;">
              
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
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
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                        <p class="mb-1">
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
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $project['project_task'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1" style="color:red">
                                        Deleted
                                    </p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['ID']; ?>">
                                        <button type="submit" name="soft_delete" class="btn-soft-delete"
                                            style="padding:6px;border:none">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png"
                                                style="width:3vw;" alt="">
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
<?php

get_footer();
?>