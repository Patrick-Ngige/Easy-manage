<?php
get_header();

/**
 * Template Name: Analytics Dashboard
 */

function get_total_individual_projects($project_status = null)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'individual_projects';
    $query = "SELECT COUNT(*) as total FROM $table_name";
    if ($project_status !== null) {
        $query .= " WHERE project_status = $project_status";
    }
    $result = $wpdb->get_row($query);
    return $result->total;
}

function get_total_group_projects($group_status = null)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'group_projects';
    $query = "SELECT COUNT(*) as total FROM $table_name";
    if ($group_status !== null) {
        $query .= " WHERE group_status = $group_status";
    }
    $result = $wpdb->get_row($query);
    return $result->total;
}
function get_ongoing_projects()
{
    $total_individual_projects = get_total_individual_projects();
    $total_group_projects = get_total_group_projects();
    $ongoing_individual_projects = get_total_individual_projects(0);
    $ongoing_group_projects = get_total_group_projects(0);
    $ongoing_projects = $ongoing_individual_projects + $ongoing_group_projects;
    return $ongoing_projects;
}

function get_completed_projects()
{
    global $wpdb;
    $individual_projects_table = $wpdb->prefix . 'individual_projects';
    $group_projects_table = $wpdb->prefix . 'group_projects';
    $query = "SELECT COUNT(*) as total FROM $individual_projects_table WHERE project_status = 1 UNION ALL SELECT COUNT(*) as total FROM $group_projects_table WHERE group_status = 1";
    $results = $wpdb->get_results($query);
    $completed_projects = 0;
    foreach ($results as $result) {
        $completed_projects += $result->total;
    }
    return $completed_projects;
}

function get_total_trainees()
{
    global $wpdb;
    $user_table = $wpdb->prefix . 'users';
    $usermeta_table = $wpdb->prefix . 'usermeta';
    $role = 'trainee';
    $user_ids_query = "SELECT user_id FROM $usermeta_table WHERE meta_key = 'wp_capabilities' AND meta_value LIKE '%$role%'";
    $user_ids = $wpdb->get_col($user_ids_query);
    $total_trainees_query = "SELECT COUNT(*) as total FROM $user_table WHERE ID IN (" . implode(',', $user_ids) . ")";
    $total_trainees_result = $wpdb->get_row($total_trainees_query);
    $total_trainees = $total_trainees_result->total;
    return $total_trainees;
}

function get_recent_individual_projects()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'individual_projects';
    $query = "SELECT * FROM $table_name ORDER BY project_id DESC LIMIT 1";
    $results = $wpdb->get_results($query);
    return $results;
}

function get_recent_group_projects()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'group_projects';
    $query = "SELECT * FROM $table_name ORDER BY group_id DESC LIMIT 1";
    $results = $wpdb->get_results($query);
    return $results;
}
?>

<div class="main-div">
    <div class="page-trainer-sidenav">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div
        class="main-div-1">

        <div class="search-bar">
            <?php echo do_shortcode('[search_bar]'); ?>
        </div>
        <div class="main-container-1">
            <div
                class="projects-stats">
                <h2>Projects</h2>
                <div class="stat-item">
                    <p>Total Individual Projects</p>
                    <p>
                        <?php echo get_total_individual_projects(); ?>
                    </p>
                </div>
                <div class="stat-item">
                    <p>Total Group Projects</p>
                    <p>
                        <?php echo get_total_group_projects(); ?>
                    </p>
                </div>
                <div class="stat-item">
                    <p>Ongoing Projects</p>
                    <p>
                        <?php echo get_ongoing_projects(); ?>
                    </p>
                </div>
                <div class="stat-item">
                    <p>Completed Projects</p>
                    <p>
                        <?php echo get_completed_projects(); ?>
                    </p>
                </div>
            </div>
            <div
                class="trainees-stats">
                <h2>Trainees</h2>
                <div class="stat-item">
                    <p>Total Trainees</p>
                    <p>
                        <?php echo get_total_trainees(); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="main-container-2">
            <div class="table">
                <h2>Recently Assigned Individual Projects
                </h2>
                <table>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Assignee</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $individual_projects = get_recent_individual_projects();
                        foreach ($individual_projects as $project) {
                            echo "<tr>";
                            echo "<td>" . $project->project_name . "</td>";
                            echo "<td>" . $project->assignee . "</td>";
                            echo "<td>" . $project->due_date . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="table">
                <h2>Recently Assigned Group Projects</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Group Assigned</th>
                            <th>Date Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $group_projects = get_recent_group_projects();
                        foreach ($group_projects as $project) {
                            echo "<tr>";
                            echo "<td>" . $project->project_name . "</td>";
                            echo "<td>" . $project->assigned_members . "</td>";
                            echo "<td>" . $project->due_date . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .main-div{
        width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem
    }
    .page-trainer-sidenav{
        margin-top:-1.99rem;width:20vw
    }
    .main-div-1{
        padding:1rem;width:70vw;margin-left:5rem;overflow-y:auto;z-index:100;height:fit-content;margin-top:1rem;
    }
    .search-bar{
        display:flex;justify-content:end;margin-bottom: 2rem
    }
    .main-container-1{
        display: flex; justify-content: space-between; align-items: flex-start;
    }
    .projects-stats{
        flex: 1;margin-right: 20px; padding: 10px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;
    }
    .projects-stats h2{
        font-size: 20px; margin-bottom: 1rem;color:#315B87
    }
    .trainees-stats{
        flex: 1;margin-right: 10px; padding: 10px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;
    }
    .trainees-stats h2{
        font-size: 20px; margin-bottom: 1rem;color:#315B87
    }
    .stat-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .stat-item p {
        font-size: 16px;
    }
    .main-container-2{
        width:67vw;display:flex; flex-direction:row;gap:10px
    }
    .table{
        width:32.5vw;margin-top: 20px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 10px;
    }
    .table h2{
        font-size: 20px; margin-bottom: 10px;color:#315B87
    }
    table{
        width: 100%; border-collapse: collapse;
    }
    .table th,
    .table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>