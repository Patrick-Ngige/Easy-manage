<?php
get_header();

/**
 * Template Name: Trainer Create Group Project
 * 
 */

$errors = array();
$success_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();
    if (empty($_POST['assigned_members'])) {
        $errors[] = 'Assigned members are required';
    }
    if (empty($_POST['group_project'])) {
        $errors[] = 'Project is required';
    }
    if (empty($_POST['project_task'])) {
        $errors[] = 'Project task is required';
    }
    if (empty($_POST['due_date'])) {
        $errors[] = 'Due date is required';
    }
    if (isset($_POST['creategrp'])) {
        $assigned_members = $_POST['assigned_members'];
        $group_project = $_POST['group_project'];
        $project_task = $_POST['project_task'];
        $group_due_date = $_POST['due_date'];
        $group_members = json_decode(stripslashes($assigned_members));
        $created_group_project = array(
            'assigned_members' => $group_members,
            'group_project' => $group_project,
            'project_task' => $project_task,
            'due_date' => $group_due_date,
        );
        $token = $_COOKIE['token'];
        $args = array(
            'method' => 'POST',
            'body' => json_encode($created_group_project),
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            )
        );
        $response = wp_remote_post('http://localhost/easy-manage/wp-json/em/v1/projects/group', $args);
        if (is_wp_error($response)) {
            echo 'Error: ' . $response->get_error_message();
        } else {
            $response_code = wp_remote_retrieve_response_code($response);
            $response_body = wp_remote_retrieve_body($response);
            $decoded_result = json_decode($response_body, true);
            if ($response_code === 200) {
                if ($decoded_result && isset($decoded_result['success'])) {
                    $_SESSION['success_message'] = 'Group project created successfully.';
                    ?>
                    <script>
                        window.location.href = '<?php echo esc_url(add_query_arg('success', 'true')); ?>';
                    </script>
                    <?php
                    exit;
                }
            } else {
                echo 'Error: ' . $response_body;
            }
        }
    }
}
?>
<div class="main-div">
    <div class="page-trainer-sidenav">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div class="main-div-2">
        <div class="members-available">
            <h6>Select Group Members</h6>
            <?php
            $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/trainees/dropdown';
            $response = wp_remote_get($endpoint_url);
            if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                $trainees = json_decode(wp_remote_retrieve_body($response));
                foreach ($trainees as $trainee) {
                    $trainee_name = $trainee->username;
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $trainee_name; ?>"
                            id="flexCheckDefault" />
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $trainee_name; ?>
                        </label>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="select-btn">
                <button id="select-btn" onclick="selectMembers()" name="selectbtn">Select</button>
            </div>
        </div>
        <div class="create-group">
            <div class="container">
                <div class="div-1">

                        <div class="card">

                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <h2>
                                                    Create Group Project
                                                </h2>
                                                <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Group Project created successfully.
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-outline">
                                                    <label class="form-label" for="form2Example27">
                                                        Assigned Members:
                                                    </label>
                                                    <input type="text" id="form2Example27" readonly
                                                        class="form-control form-control-md"
                                                        placeholder="assigned names" name="assigned_members" value="" />
                                                    <?php if (in_array('Assigned members are required.', $errors)) { ?>
                                                        <p class="text-danger">Assigned members are required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-outline">
                                                    <label class="form-label" for="form2Example27">
                                                        Project Name:
                                                    </label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="group_project"
                                                        value="<?php echo isset($_GET['group_project']) ? $_GET['group_project'] : ''; ?>" />
                                                    <?php if (in_array('Project is required.', $errors)) { ?>
                                                        <p class="text-danger">Project is required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-outline">
                                                    <label class="form-label" for="form2Example27">
                                                        Project Task:
                                                    </label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="project_task"
                                                        value="<?php echo isset($_GET['project_task']) ? $_GET['project_task'] : ''; ?>" />
                                                    <?php if (in_array('Project task is required.', $errors)) { ?>
                                                        <p class="text-danger">Project task is required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div>
                                                    <label class="form-label" for="form2Example27">
                                                        Due Date:
                                                    </label>
                                                    <input type="date" id="form2Example27"
                                                        class="form-control form-control-md" name="due_date"
                                                        value="<?php echo isset($_GET['due_date']) ? $_GET['due_date'] : ''; ?>"
                                                        min="<?php echo date('Y-m-d'); ?>" />
                                                    <?php if (in_array('Due date is required.', $errors)) { ?>
                                                        <p class="text-danger">Due date is required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="button">
                                                    <button id="btn" type="submit" name="creategrp">Create</button>
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
        </div>
    </div>
</div>

<script>
    function selectMembers() {
        var checkboxes = document.querySelectorAll('.form-check-input');
        var assignedMembersInput = document.querySelector('input[name="assigned_members"]');
        var selectedMembers = [];
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                selectedMembers.push(checkbox.value);
            }
        });
        if (selectedMembers.length > 3) {
            checkboxes.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    checkbox.disabled = true;
                }
            });
        } else {
            assignedMembersInput.value = JSON.stringify(selectedMembers);
            checkboxes.forEach(function (checkbox) {
                checkbox.disabled = false;
            });
        }
        var createBtn = document.querySelector('button[name="creategrp"]');
        createBtn.disabled = (selectedMembers.length === 0);
    }
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

    .main-div-2 {
        display: flex;
        flex-direction: row
    }

    .members-available {
        background-color: #FAFAFA;
        width: 20vw;
        height: 15rem;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: .5rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 2rem;
        margin: 2rem 0 0rem 2rem;
        position: relative;
    }

    .members-available h6 {
        color: #315B87;
        position: fixed;
        background-color: #FAFAFA;
        margin-top: -2rem;
        padding: 5px
    }

    .select-btn {
        position: absolute;
        bottom: 1rem;
        left: 25%;
        right: 20%;
    }

    #select-btn {
        background-color: #315B87;
        color: #FAFAFA;
        border-radius: 5px;
        border: none;
        padding: 5px;
        width: 80%;
    }

    .create-group {
        height: 88vh;
        margin-left: auto;
        margin-right: auto;
        padding: 1rem
    }

    .container {
        padding: .8rem 0rem;
        height: auto
    }

    .div-1 {
        flex-direction: row;
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
    }

    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 40vw;
    }

    .card-body {
        padding: 0rem 2rem 1rem 2rem;
        color: black;
    }

    form {
        font-size: 16px
    }

    form h2 {
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #315B87;
    }

    .form-outline {
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .button {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1rem
    }

    #btn {
        background-color: #315B87;
        color: #FAFAFA;
        width: 20vw;
        padding: .5rem 1.5rem;
        font-size: 18px;
        border: none;
        border-radius: 5px;
    }
</style>