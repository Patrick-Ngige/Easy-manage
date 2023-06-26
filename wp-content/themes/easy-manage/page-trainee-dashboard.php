<?php
get_header();

/**
 * Template Name: Admin PM List
 */

require_once(ABSPATH . 'wp-load.php');

$token = $_COOKIE['token'];

$response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $token
    )
)
);

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $user_data = json_decode(wp_remote_retrieve_body($response));
    $username = $user_data->name;

    $projects_url = "http://localhost/easy-manage/wp-json/em/v1/user_project_ids?username=" . $username;
    $projects_response = wp_remote_get($projects_url);

    if (!is_wp_error($projects_response) && wp_remote_retrieve_response_code($projects_response) === 200) {
        $project_ids = json_decode(wp_remote_retrieve_body($projects_response));

        $group_projects = array();
        foreach ($project_ids as $project_id) {

            $project_url = "http://localhost/easy-manage/wp-json/em/v1/individual_project/" . $project_id;
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
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <?php
            if (!empty($group_projects)) { ?>
                <table class="table align-middle mb-0 bg-white table-hover"
                    style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                    <thead class="bg-light">
                        <tr style="font-size:large;color:#315B87;padding-left:2rem">
                            <th>Project</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($group_projects as $project) { ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1">
                                                <?php echo $project->assignee ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $project->project_name ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo ($project->project_status == 0 ? 'ongoing' : 'completed') ?>
                                    </p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <a href="http://localhost/easy-manage/admin-update-form/?id=<?php echo $project->project_id ?>"
                                            style="padding:6px"><img
                                                src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                                style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                echo 'No projects assigned.';
            }
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>