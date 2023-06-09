<?php
get_header();

/**
 * Template Name: Update Group Project
 * 
 */
$project_id = $_GET['id'];
$token = $_COOKIE['token'];

$response = wp_remote_get(
    'http://localhost/easy-manage/wp-json/em/v1/group_project/'. $project_id,
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        ),
        'cookies' => array(
            'token' => $token
        )
    )
);

if (is_wp_error($response)) {
    $error = $response->get_error_message();
} else {
    $project = json_decode(wp_remote_retrieve_body($response), true);
}

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

    if (isset($_POST['updategrp'])) {
        $assigned_members = $_POST['assigned_members']; 
        $group_project = $_POST['group_project'];
        $project_task = $_POST['project_task'];
        $group_due_date = $_POST['due_date'];
        $group_members = json_decode(stripslashes($assigned_members));

        var_dump($group_members);

        $update_group_project = array(
            'assigned_members' =>  $group_members,
            'group_project' => $group_project,
            'project_task' => $project_task,
            'due_date' => $group_due_date,
            'project_id' => $project_id,
        );

        $args = array(
            'method' => 'PATCH',
            'body' => json_encode($update_group_project),
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
                        window.location.href = '<?php echo esc_url("http://localhost/easy-manage/group-projects/"); ?>';
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


<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div style="display:flex;flex-direction:row">

        <div
            style="background-color:#FAFAFA;width:20vw;height:15rem;overflow-y:auto;overflow-x:hidden; border-radius: .5rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);padding:2rem;margin:2rem 0 0rem 2rem; position: relative;">
            <h6 style="color:#315B87;position:fixed;background-color:#FAFAFA;margin-top:-2rem;padding:5px">Select Group
                Members</h6>
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
            <div style="position: absolute; bottom: 1rem; left: 25%;right:20%;">
                <button class="selectbtn"
                    style="background-color:#315B87;color:#FAFAFA;border-radius:5px;border:none;padding:5px;width: 80%;"
                    onclick="selectMembers()" name="selectbtn">Select</button>
            </div>
        </div>

        <div style="height:88vh;margin-left:1rem;padding:1rem ">
            <div class="container py-3 h-auto">
                <div class="row d-flex justify-content-center align-items-center h-auto">
                    <div class="col col-xl-10" style="width:40vw;">
                        <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                style="width:40vw;">
                                <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                    style="width:40vw;">
                                    <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                        style="height:fit-content; width:40vw; ">
                                        <div class="card-body p-4 p-lg-5 text-black">
                                            <form action="" method="POST" style="font-size:16px">
                                                <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                    style="color:#315B87;margin-top:-2rem">
                                                    Update Group Project
                                                </h2>
                                                <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Group Project updated successfully.
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">
                                                        Assigned Members:
                                                    </label>
                                                    <input type="text" id="form2Example27" readonly
                                                        class="form-control form-control-md"
                                                        placeholder="assigned names" name="assigned_members" value="<?php echo $project['assigned_members'] ?>" />
                                                    <?php if (in_array('Assigned members are required.', $errors)) { ?>
                                                        <p class="text-danger">Assigned members are required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">
                                                        Project Name:
                                                    </label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="group_project"
                                                        value="<?php echo $project['project_name'] ?>" />
                                                    <?php if (in_array('Project is required.', $errors)) { ?>
                                                        <p class="text-danger">Project is required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">
                                                        Project Task:
                                                    </label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="project_task"
                                                        value="<?php echo $project['project_task'] ?>" />
                                                    <?php if (in_array('Project task is required.', $errors)) { ?>
                                                        <p class="text-danger">Project task is required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div>
                                                    <label class="form-label mb-3" for="form2Example27"
                                                        style="font-weight:600;">
                                                        Due Date:
                                                    </label>
                                                    <input type="date" id="form2Example27"
                                                        class="form-control form-control-md" name="due_date"
                                                        value="<?php echo $project['due_date'] ?>"
                                                        min="<?php echo date('Y-m-d'); ?>" />
                                                    <?php if (in_array('Due date is required.', $errors)) { ?>
                                                        <p class="text-danger">Due date is required.</p>
                                                    <?php } ?>
                                                </div>
                                                <div
                                                    class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-lg btn-block w-50 "
                                                        style="background-color:#315B87 ;color:#FAFAFA;margin-bottom:-2rem"
                                                        type="submit" name="updategrp">Update</button>
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