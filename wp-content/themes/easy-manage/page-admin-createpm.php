<?php
get_header();

/**
 * Template Name: Admin Create PM
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['pm-name'])) {
        $errors[] = 'Username is required';
    }

    if (empty($_POST['pm-email'])) {
        $errors[] = 'Email is required';
    }

    if (empty($_POST['pm-role'])) {
        $errors[] = 'Role is required';
    }

    // If there are no errors, process the form
    if (empty($errors)) {
        // Process the form data here
        // ...

        // Redirect to another page after processing the form
        header('Location: /success-page');
        exit;
    }
}
?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-admin'); ?>
    </div>


    <div style="height:88vh;margin-left:15rem">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col col-xl-10" style="width:40vw;">
                    <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                            style="width:40vw;">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                style="width:40vw;">
                                <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                    style="height:80vh; width:40vw;  ">
                                    <div class="card-body p-4 p-lg-5 text-black;">

                                        <form action="" method="POST" style="font-size:16px;">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color:#315B87">
                                                Create PM</h2>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Username:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter project task" name="pm-name"
                                                    value="<?php echo isset($_POST['pm-name']) ? $_POST['pm-name'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Username is required', $errors)) {
                                                    echo '<p class="text-danger">Username is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter project task" name="pm-email"
                                                    value="<?php echo isset($_POST['pm-email']) ? $_POST['pm-email'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>

                                            <div>
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Role:</label>

                                                <select class="form-select" aria-label="Default select example"
                                                    name="pm-role" style="font-weight:600;">
                                                    <option value="">Select a role</option>
                                                    <option value="Jon Doe" <?php echo isset($_POST['pm-role']) && $_POST['pm-role'] === 'Jon Doe' ? 'selected' : ''; ?>>Jon Doe
                                                    </option>
                                                    <option value="Jon Doe" <?php echo isset($_POST['pm-role']) && $_POST['pm-role'] === 'Jon Doe' ? 'selected' : ''; ?>>Jon Doe
                                                    </option>
                                                    <option value="Jon Doe" <?php echo isset($_POST['pm-role']) && $_POST['pm-role'] === 'Jon Doe' ? 'selected' : ''; ?>>Jon Doe
                                                    </option>
                                                </select>
                                                <?php if (isset($errors) && in_array('Role is required', $errors)) {
                                                    echo '<p class="text-danger">Role is required</p>';
                                                } ?>
                                            </div>

                                            <div
                                                class="pt-1 w-100 mt-3 d-flex justify-content-center align-items-center">
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
    </div>

    <?php get_footer(); ?>