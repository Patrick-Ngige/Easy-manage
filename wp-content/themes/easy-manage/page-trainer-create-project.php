<?php
/**
 * Template Name: Trainer Create Project
 */

get_header();
?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">
    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>

    <div style="padding:1rem ;height:88vh;margin-left:10%;display:flex;flex-direction:row ">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
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
                                            <?php
                                            $errors = array(); // Store validation errors
                                            
                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                // Validate form fields
                                                if (empty($_POST['project-name'])) {
                                                    $errors[] = 'Username is required.';
                                                }

                                                if (empty($_POST['trainee-email'])) {
                                                    $errors[] = 'Email is required.';
                                                }

                                                if (empty($_POST['trainee-password'])) {
                                                    $errors[] = 'Password is required.';
                                                }

                                                // Process the form data here
                                                if (empty($errors)) {
                                                    // Retrieve the form data
                                                    $trainee_name = $_POST['traineename'];
                                                    $traineeEmail = $_POST['trainee-email'];
                                                    $traineeRole = $_POST['trainee-role'];

                                                    // TODO: Process the form data as needed
                                            
                                                    // Redirect to a success page
                                                    header('Location: /success-page');
                                                    exit();
                                                }
                                            }
                                            ?>

                                            <form action="" method="POST" style="font-size:16px">

                                                <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                    style="color:#315B87">
                                                    Create Project
                                                </h2>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Project Name:</label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project name" name="project-name"
                                                        value="<?php echo isset($_POST['project-name']) ? $_POST['project-name'] : ''; ?>" />
                                                    <?php if (in_array('project-name is required.', $errors)) { ?>
                                                        <p class="text-danger">Project name is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Project Task:</label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="project-task"
                                                        value="<?php echo isset($_POST['project-task']) ? $_POST['project-task'] : ''; ?>" />
                                                    <?php if (in_array('project-task is required.', $errors)) { ?>
                                                        <p class="text-danger">Project task is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Assignee:</label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md" placeholder="assignee"
                                                        name="assignee"
                                                        value="<?php echo isset($_POST['assignee']) ? $_POST['assignee'] : ''; ?>" />
                                                    <?php if (in_array('assignee is required.', $errors)) { ?>
                                                        <p class="text-danger">Assignee is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Due Date:</label>
                                                    <input type="date" id="form2Example27"
                                                        class="form-control form-control-md" placeholder="Due date"
                                                        name="due-date"
                                                        value="<?php echo isset($_POST['due-date']) ? $_POST['due-date'] : ''; ?>" />
                                                    <?php if (in_array('due-date is required.', $errors)) { ?>
                                                        <p class="text-danger">Due date is required.</p>
                                                    <?php } ?>
                                                </div>

                                             


                                                <div
                                                    class="pt-1 mb-2 w-100 d-flex justify-content-center align-items-center" style="padding-top:0;">
                                                    <button class="btn btn-lg btn-block w-50"
                                                        style="background-color:#315B87 ;color:#FAFAFA" type="submit"
                                                        name="createbtn">Create</button>
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