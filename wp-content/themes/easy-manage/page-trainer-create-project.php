<?php
/**
 * Template Name: Trainer Create Project
 */

session_start();

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
        $token = $_COOKIE['token'];
        $endpoint = 'http://localhost/easy-manage/wp-json/em/v1/projects/individual';
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($created_project));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode === 200) {
            $result = json_decode($response);
            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Individual project created successfully.';
                header("Location: http://localhost/easy-manage/individual-projects/");
                exit;
            } else {
                echo "Failed to create individual project";
            }
        }
    }
}
ob_end_flush();
?>
<div class="main-div">
    <div class="page-trainer-sidenav">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div class="main-div-2">
        <div class="floating-div">
            <div class="floating-btn">
                <a href="http://localhost/easy-manage/trainer-group-projects/">
                    Group Project
                </a>
            </div>
        </div>
        <section class="form-section">
            <div class="container">

                <div class="div-2">
                    <div class="card">

                        <div class="card-body">
                            <form action="" method="POST">
                                <h2>
                                    Create Project
                                </h2>
                                <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                    <div class="alert alert-success" role="alert">
                                        Project created successfully.
                                    </div>
                                <?php endif; ?>
                                <div class="form-outline ">
                                    <label class="form-label" for="project_name">Project Name:</label>
                                    <input type="text" id="project_name" class="form-control form-control-md"
                                        placeholder="Enter project name" name="project_name"
                                        value="<?php echo isset($_POST['project_name']) ? $_POST['project_name'] : ''; ?>" />
                                    <?php if (in_array('Project name is required.', $errors)) { ?>
                                        <p class="text-danger">Project name is required.</p>
                                    <?php } ?>
                                </div>

                                <div class="form-outline ">
                                    <label class="form-label" for="project_task">Project Task:</label>
                                    <input type="text" id="project_task" class="form-control form-control-md"
                                        placeholder="Enter project task" name="project_task"
                                        value="<?php echo isset($_POST['project_task']) ? $_POST['project_task'] : ''; ?>" />
                                    <?php if (in_array('Project task is required.', $errors)) { ?>
                                        <p class="text-danger">Project task is required.</p>
                                    <?php } ?>
                                </div>
                                <div class="form-outline ">
                                    <label class="form-label" for="assignee" style="font-weight: 600;">Assignee:</label>
                                    <select id="assignee" class="form-control form-control-md" name="assignee">
                                        <option value="">Select Assignee</option>
                                        <?php
                                        $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/trainees/dropdown';
                                        $response = wp_remote_get($endpoint_url);
                                        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                                            $trainees = json_decode(wp_remote_retrieve_body($response));
                                            foreach ($trainees as $trainee) {
                                                $selected = (isset($_POST['assignee']) && $_POST['assignee'] == $trainee->username) ? 'selected' : '';
                                                ?>
                                                <option value="<?php echo $trainee->username; ?>" <?php echo $selected; ?>><?php echo $trainee->username; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php if (in_array('Assignee is required.', $errors)) { ?>
                                        <p class="text-danger">Assignee is required.</p>
                                    <?php } ?>
                                </div>
                                <div class="form-outline ">
                                    <label class="form-label" for="due_date">Due Date:</label>
                                    <input type="date" id="due_date" class="form-control form-control-md"
                                        placeholder="Due date" name="due_date" min="<?php echo date('Y-m-d'); ?>"
                                        value="<?php echo isset($_POST['due_date']) ? $_POST['due_date'] : ''; ?>" />
                                    <?php if (in_array('Due date is required.', $errors)) { ?>
                                        <p class="text-danger">Due date is required.</p>
                                    <?php } ?>
                                </div>
                                <div class="button">
                                    <button class="create-btn" type="submit" name="createbtn">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

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
        padding-top: 2rem;
        height: 88vh;
        margin-left: 10%;
        display: flex;
        flex-direction: row
    }

    .floating-div {
        padding: 1rem;
    }

    .floating-btn {
        padding: 0.5rem 1rem;
        border-radius: 10px;
        background-color: #FAFAFA;
        border: none;
        color: #315B87;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .floating-btn a {
        text-decoration: none;
        color: #315B87
    }

    .floating-btn a:hover {
        background-color: #315B87;
        color: #FAFAFA;
    }

    .form-section {
        height: 88vh;
    }

    .container {
        padding: 1rem 0rem;
        height: auto
    }


    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: .8rem;
        height: 72vh;
        width: 40vw;
    }

    .card-body {
        padding: 1rem;
        color: black;
        width: 35vw;
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
    }

    .form-label {
        font-weight: 600;
    }

    .button {
        padding-top: 1rem;
        margin-bottom: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 0;
    }

    .create-btn {
        background-color: #315B87;
        color: #FAFAFA;
        margin-bottom: -2rem;
        border: none;
        border-radius: 5px;
        padding: .3rem 4rem;
        font-size: larger;
    }
</style>

<?php get_footer(); ?>