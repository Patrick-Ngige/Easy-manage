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

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $user_data = json_decode(wp_remote_retrieve_body($response));
    $username = strtolower($user_data->name);


    $projects_url = "http://localhost/easy-manage/wp-json/em/v1/group/user_project_ids?username=" . $username;
    $projects_response = wp_remote_get($projects_url);

    if (!is_wp_error($projects_response) && wp_remote_retrieve_response_code($projects_response) === 200) {
        $project_ids = json_decode(wp_remote_retrieve_body($projects_response));
        $group_projects = array();

        foreach ($project_ids as $project_id) {
            $project_url = "http://localhost/easy-manage/wp-json/em/v1/group_project/" . $project_id;
            $project_response = wp_remote_get($project_url);


            if (!is_wp_error($project_response) && wp_remote_retrieve_response_code($project_response) === 200) {
                $project = json_decode(wp_remote_retrieve_body($project_response));
                $group_projects[] = $project;
            }
        }
    }
}

?>
<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainee'); ?>
    </div>
    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <div style="display: flex; align-items: center; justify-content: end; margin-bottom: 1rem;">
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>
            <?php

            ?>
            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Assigned Members</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($group_projects)) {
                        foreach ($group_projects as $project) { ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1">
                                                <?php echo $project->assigned_members; ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $project->project_name; ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo ($project->group_status == 0 ? 'ongoing' : 'completed'); ?>
                                    </p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="group_id" value="<?php echo $project->group_id ?>">
                                        <button type="submit" name="mark_complete"
                                            style="border: none; background: none; padding: 0;margin-left:3rem">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/check.png"
                                                style="width: 25px;" alt="">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo 'No group projects assigned.';
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php

if (isset($_POST['mark_complete'])) {
    $group_id = $_POST['group_id'];

    $api_endpoint = 'http://localhost/easy-manage/wp-json/em/v1/group/mark_complete/' . $group_id;


    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $api_endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PATCH',
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        $error_message = curl_error($curl);
    }

    curl_close($curl);

    if ($response === false) {

    } else {

        $response_data = json_decode($response, true);
        if ($response_data['success']) {
            echo 'group project marked as complete';
        } else {
            echo 'group project not completed';
        }
    }
}
?>

<?php get_footer(); ?>