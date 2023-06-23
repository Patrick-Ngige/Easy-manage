<?php
/**
 * Template Name: Trainer Create Project
 */

ob_start();

get_header();

$errors = array();
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['project_name'])) {
        $errors[] = 'Project name is required.';
    }

    if (empty($_POST['project_task'])) {
        $errors[] = 'Project task is required.';
    }

    if (empty($_POST['assignee'])) {
        $errors[] = 'Assignee is required.';
    }

    if (empty($_POST['due_date'])) {
        $errors[] = 'Due date is required.';
    }

    if (isset($_POST['createbtn'])) {
        $project_name = $_POST['project_name'];
        $project_task = $_POST['project_task'];
        $assignee = $_POST['assignee'];
        $due_date = $_POST['due_date'];

        $created_project = array(
            'project_name' => $project_name,
            'project_task' => $project_task,
            'assignee' => $assignee,
            'due_date' => $due_date,
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/easy-manage/wp-json/em/v1/projects/individual');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($created_project));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response === false) {
            echo 'Error: ' . curl_error($curl);
        } else {
            echo $response;
        }

        curl_close($curl);

        if ($httpCode === 200) {
            $result = json_decode($response);

            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Project created successfully.';
                ?>
                <script>
                    window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
                </script>
                <?php
                exit;
            }
        }
    }
}

ob_end_flush();
?>


<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>

    <div style="padding:1rem ;height:88vh;margin-left:10%;display:flex;flex-direction:row ">
        <div style="padding:1rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <a href="http://localhost/easy-manage/trainer-group-projects/"
                    style="text-decoration:none;padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Group Project
                </a>
            </div>
        </div>

        <section style="height:88vh;">
            <div class="container py-1 h-auto">
                <div class="row d-flex justify-content-center align-items-center h-auto">
                    <div class="col col-xl-10" style="width:40vw;">
                        <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50"
                                style="width:40vw;">
                                <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50"
                                    style="width:40vw;">
                                    <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                        style="height:fit-content; width:40vw;">
                                        <div class="card-body p-2 p-lg-5 text-black">
                                            <form action="" method="POST" style="font-size:16px">
                                                <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                    style="color:#315B87;margin-top:-2rem">
                                                    Create Project
                                                </h2>
                                                <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Project created successfully.
                                                    </div>
                                                <?php endif; ?>


                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="project_name"
                                                        style="font-weight:600;">Project Name:</label>
                                                    <input type="text" id="project_name"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project name" name="project_name"
                                                        value="<?php echo isset($_POST['project_name']) ? $_POST['project_name'] : ''; ?>" />
                                                    <?php if (in_array('Project name is required.', $errors)) { ?>
                                                        <p class="text-danger">Project name is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="project_task"
                                                        style="font-weight:600;">Project Task:</label>
                                                    <input type="text" id="project_task"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="project_task"
                                                        value="<?php echo isset($_POST['project_task']) ? $_POST['project_task'] : ''; ?>" />
                                                    <?php if (in_array('Project task is required.', $errors)) { ?>
                                                        <p class="text-danger">Project task is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="assignee"
                                                        style="font-weight: 600;">Assignee:</label>
                                                    <select id="assignee" class="form-control form-control-md"
                                                        name="assignee">
                                                        <option value="">Select Assignee</option>
                                                        <?php
                                                        global $wpdb;
                                                        $table_name = $wpdb->prefix . 'users';
                                                        $projects_table = $wpdb->prefix . 'group_projects';
                                                        $max_projects = 3;
                                                        
                                                        $query = $wpdb->prepare(
                                                            "SELECT ID, user_login
                                                            FROM {$wpdb->users} AS u
                                                            WHERE u.ID NOT IN (
                                                                SELECT user_id
                                                                FROM {$wpdb->prefix}group_projects
                                                                WHERE project_type = 'group' OR project_type = 'individual'
                                                                GROUP BY user_id
                                                                HAVING COUNT(*) >= %d
                                                            )
                                                            AND u.user_status = 0",
                                                            $max_projects
                                                        );
                                                        
                                                        $trainees = $wpdb->get_results($query);
                                                        ?>
                                                        
                                                        <div class="form-outline mb-2">
                                                            <label class="form-label" for="assignee" style="font-weight:600;">Assignee:</label>
                                                            <select id="assignee" class="form-control form-control-md" name="assignee">
                                                                <option value="">Select Assignee</option>
                                                                <?php foreach ($trainees as $trainee) {
                                                                    $user_info = get_userdata($trainee->ID);
                                                                    if ($user_info) {
                                                                        $username = $user_info->user_login;
                                                                        ?>
                                                                        <option value="<?php echo $trainee->ID; ?>"><?php echo $username; ?></option>
                                                                        <?php
                                                                    }
                                                                } ?>
                                                            </select>
                                                            <?php if (in_array('Assignee is required.', $errors)) { ?>
                                                                <p class="text-danger">Assignee is required.</p>
                                                            <?php } ?>
                                                        </div>
                                                        



                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="due_date"
                                                        style="font-weight:600;">Due Date:</label>
                                                    <input type="date" id="due_date"
                                                        class="form-control form-control-md" placeholder="Due date"
                                                        name="due_date" min="<?php echo date('Y-m-d'); ?>"
                                                        value="<?php echo isset($_POST['due_date']) ? $_POST['due_date'] : ''; ?>" />
                                                    <?php if (in_array('Due date is required.', $errors)) { ?>
                                                        <p class="text-danger">Due date is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="pt-1 mb-2 w-100 d-flex justify-content-center align-items-center"
                                                    style="padding-top:0;">
                                                    <button class="btn btn-lg btn-block w-50"
                                                        style="background-color:#315B87 ;color:#FAFAFA;margin-bottom:-2rem"
                                                        type="submit" name="createbtn">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>