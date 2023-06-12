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
                                                if (empty($_POST['trainee-name'])) {
                                                    $errors[] = 'Username is required.';
                                                }

                                                if (empty($_POST['trainee-email'])) {
                                                    $errors[] = 'Email is required.';
                                                }

                                                if (empty($_POST['trainee-role'])) {
                                                    $errors[] = 'Role is required.';
                                                }

                                                if (empty($_POST['trainee-password'])) {
                                                    $errors[] = 'Password is required.';
                                                }

                                                // Process the form data here
                                                if (empty($errors)) {
                                                    // Retrieve the form data
                                                    $traineeName = $_POST['trainee-name'];
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

                                                <div>
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Trainee:</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="trainee-name" style="font-weight:600;">
                                                        <option selected></option>
                                                        <option>Jon Doe</option>
                                                        <option>Jon Doe</option>
                                                        <option>Jon Doe</option>
                                                    </select>
                                                    <?php if (in_array('Username is required.', $errors)) { ?>
                                                        <p class="text-danger">Username is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Email:</label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="trainee-email"
                                                        value="<?php echo isset($_POST['trainee-email']) ? $_POST['trainee-email'] : ''; ?>" />
                                                    <?php if (in_array('Email is required.', $errors)) { ?>
                                                        <p class="text-danger">Email is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Role:</label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="trainee-role"
                                                        value="<?php echo isset($_POST['trainee-role']) ? $_POST['trainee-role'] : ''; ?>" />
                                                    <?php if (in_array('Role is required.', $errors)) { ?>
                                                        <p class="text-danger">Role is required.</p>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Password:</label>
                                                    <input type="password" id="form2Example27"
                                                        class="form-control form-control-md" placeholder="**********"
                                                        name="trainee-password"
                                                        value="<?php echo isset($_POST['trainee-password']) ? $_POST['trainee-password'] : ''; ?>" />
                                                    <?php if (in_array('Password is required.', $errors)) { ?>
                                                        <p class="text-danger">Password is required.</p>
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