<?php get_header(); 

/**
 * Template Name: Trainer Create Project
 * 
 */

?>
<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>

    <div style="padding:1rem;height:88vh;margin-left:20% ">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <a href="http://localhost/easy-manage/trainer-group-projects/"
                    style="text-decoration:none;padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Group Project
                </a>
            </div>
        </div>
        <section style="height:88vh; ">
            <div class="container py-1 h-auto">
                <div class="row d-flex justify-content-center align-items-center h-auto">
                    <div class="col col-xl-10" style="width:40vw;">
                        <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                style="width:40vw;">
                                <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                    style="width:40vw;">
                                    <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                        style="height:70vh; width:40vw; ">
                                        <div class="card-body p-4 p-lg-5 text-black">

                                            <?php
                                            $errors = array(); // Store validation errors
                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                // Validate form fields
                                                if (empty($_POST['pm-name'])) {
                                                    $errors[] = 'Username is required.';
                                                }

                                                if (empty($_POST['pm-email'])) {
                                                    $errors[] = 'Email is required.';
                                                }

                                                // Process the form data here
                                                if (empty($errors)) {
                                                    // Retrieve the form data
                                                    $pmName = $_POST['pm-name'];
                                                    $pmEmail = $_POST['pm-email'];
                                                    $pmRole = $_POST['pm-role'];

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
                                                    Create PM</h2>

                                                <?php
                                                if (!empty($errors)) {
                                                    foreach ($errors as $error) {
                                                        echo '<p class="text-danger">' . $error . '</p>';
                                                    }
                                                }
                                                ?>

                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Username:</label>
                                                    <input type="text" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="pm-name"
                                                        value="<?php echo isset($_POST['pm-name']) ? $_POST['pm-name'] : ''; ?>"
                                                        required />
                                                </div>

                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="form2Example27"
                                                        style="font-weight:600;">Email</label>
                                                    <input type="email" id="form2Example27"
                                                        class="form-control form-control-md"
                                                        placeholder="Enter project task" name="pm-email"
                                                        value="<?php echo isset($_POST['pm-email']) ? $_POST['pm-email'] : ''; ?>"
                                                        required />
                                                </div>

                                                <div>
                                                    <label>Role: </label><br>

                                                    <select class="form-select" aria-label="Default select example"
                                                        name="pm-role" style="font-weight:600;">
                                                        <option selected>Jon Doe</option>
                                                        <option selected>Jon Doe</option>
                                                        <option selected>Jon Doe</option>
                                                        <option selected>Jon Doe</option>


                                                    </select>

                                                </div>

                                                <div
                                                    class="pt-1 mb-4 w-100 d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-lg btn-block w-50 "
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
