<?php
get_header();

/**
 * Template Name: Trainer Create Group Project
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    // Validate fields
    if (empty($_POST['pm-name'])) {
        $errors[] = 'Username is required';
    }

    if (empty($_POST['pm-email'])) {
        $errors[] = 'Email is required';
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

<div style="width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;">
    <!-- Left Sidebar -->
    <div class="page-trainee-dashboard" style="margin-top: -1.99rem; width: 20vw;">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>

    <!-- Content Section -->
    <div style="display: flex; flex-direction: row;">
        <!-- Group Members Section -->
        <div style="background-color: #FAFAFA; width: 20vw; height: 13rem; overflow: auto; border-radius: .5rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); padding: 2rem; margin: 2rem 0 0rem 2rem;">
            <!-- Checkbox options -->
            <h6 style="color:#315B87;position:fixed;background-color:#FAFAFA;margin-top:-2rem;padding:5px">Select Group
                Members</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Jon Doe</label>
            </div>

            <!-- Checked checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Jon Doe</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Jon Doe</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Jon Doe</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Jon Doe</label>
            </div>
    
            <div style="position:relative;background-color:#FAFAFA">
                <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off" />
                <label class="btn " style="background-color:#315B87;color:#FAFAFA" for="btn-check">Select</label>
            </div>
        </div>

        <!-- Card and Form Section -->
        <div style="height: 88vh; margin-left: 1rem; padding: 1rem;">
            <div class="container py-3 h-auto">
                <div class="row d-flex justify-content-center align-items-center h-auto">
                    <div class="col col-xl-10" style="width: 40vw;">
                        <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="" method="POST" style="font-size: 16px">
                                    <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center" style="color: #315B87">
                                        Create Group Project
                                    </h2>

                                    <?php
                                    if (!empty($errors)) {
                                        foreach ($errors as $error) {
                                            echo '<p class="text-danger">' . $error . '</p>';
                                        }
                                    }
                                    ?>

                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="form2Example27" style="font-weight: 600;">Group Members:</label>
                                        <input type="text" id="form2Example27" readonly class="form-control form-control-md" placeholder="Group Names" name="group-members" required value="<?php echo isset($_POST['group-members']) ? $_POST['group-members'] : ''; ?>" />
                                    </div>

                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="form2Example27" style="font-weight: 600;">Project:</label>
                                        <input type="email" id="form2Example27" class="form-control form-control-md" placeholder="Enter Project Task" name="group-project" required value="<?php echo isset($_POST['group-project']) ? $_POST['group-project'] : ''; ?>" />
                                    </div>

                                    <div>
                                        <label class="form-label mb-3" for="form2Example27" style="font-weight: 600;">Due Date:</label>
                                        <input type="date" id="form2Example27" class="form-control form-control-md" name="group-due-date" required min="<?php echo date('Y-m-d'); ?>" />
                                    </div>

                                    <div class="pt-1 mt-3 w-100 d-flex justify-content-center align-items-center">
                                        <button class="btn btn-lg btn-block w-50" style="background-color: #315B87; color: #FAFAFA" type="submit" name="creategrp">Create</button>
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
