<?php get_header();

/**
 * Template Name: PM Create Cohort
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    if (empty($_POST['cohort'])) {
        $errors[] = 'Cohort name is required';
    }

    if (empty($_POST['cohort_info'])) {
        $errors[] = 'Cohort information is required';
    }

    if (empty($_POST['trainer'])) {
        $errors[] = 'Trainer is required';
    }

    if (empty($_POST['starting_date'])) {
        $errors[] = 'Starting adte  is required';
    }

    if (empty($_POST['ending_date'])) {
        $errors[] = 'Ending date is required';
    }

    if (isset($_POST['createbtn'])) {
        $cohort = $_POST['cohort'];
        $cohort_info = $_POST['cohort_info'];
        $trainer = $_POST['trainer'];
        $starting_date = $_POST['starting_date'];
        $ending_date = $_POST['ending_date'];

        $created_cohort = array(
            'cohort' => $cohort,
            'cohort_info' => $cohort_info,
            'trainer' => $trainer,
            'starting_date' => $starting_date,
            'ending_date' => $ending_date
        );
    
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/easy-manage/wp-json/em/v1/cohorts');
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($created_cohort));
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
                    $_SESSION['success_message'] = 'Cohort created successfully.';
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
?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>

    <div style="height:75vh;margin-left:15rem ">
        <div class="container py-4 ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col col-xl-10" style="width:40vw;">
                    <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                            style="width:40vw;">
                            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 "
                                style="width:40vw;">
                                <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                                    style="height:fit-content; width:40vw; ">
                                    <div class="card-body p-2 p-lg-5 text-black">

                                        <form action="" method="POST" style="font-size:16px">

                                            <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center"
                                                style="color:#315B87;margin-top:-2rem">
                                                Create Cohort</h2>

                                            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                <div class="alert alert-success" role="alert">
                                                    Cohort created successfully.
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-outline mb-1">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Cohort:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md" placeholder="Enter Cohort name"
                                                    name="cohort"
                                                    value="<?php echo isset($_GET['cohort']) ? $_GET['cohort'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Cohort name is required', $errors)) {
                                                    echo '<p class="text-danger">Cohort name is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-1">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Cohort info:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter Cohort information" name="cohort_info"
                                                    value="<?php echo isset($_GET['cohort_info']) ? $_GET['cohort_info'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('cohort information is required', $errors)) {
                                                    echo '<p class="text-danger">Cohort information is required</p>';
                                                } ?>
                                            </div>

                                            <div>
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Trainer</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="trainer" style="font-weight:600;"
                                                    value="<?php echo isset($_GET['trainer']) ? $_GET['trainer'] : ''; ?>">
                                                    <option value="">Select a trainer</option>
                                                    <?php
                                                    $trainers = get_users(array('role' => 'trainer'));
                                                    foreach ($trainers as $trainer) {
                                                        $trainer_name = $trainer->display_name;
                                                        $selected = isset($_GET['trainer']) && $_GET['trainer'] === $trainer_name ? 'selected' : '';
                                                        echo '<option value="' . $trainer_name . '" ' . $selected . '>' . $trainer_name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-outline mb-1">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Starting Date:</label>
                                                <input type="date" id="form2Example27"
                                                    class="form-control form-control-md" name="starting_date" required
                                                    min="<?php echo date('Y-m-d'); ?>"
                                                    value="<?php echo isset($_GET['starting_date']) ? $_GET['starting_date'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('starting_date is required', $errors)) {
                                                    echo '<p class="text-danger">Starting date is required</p>';
                                                } ?>
                                            </div>

                                            <div class="form-outline mb-1">
                                                <label class="form-label" for="form2Example27"
                                                    style="font-weight:600;">Ending Date:</label>
                                                <input type="date" id="form2Example27"
                                                    class="form-control form-control-md" name="ending_date" required
                                                    min="<?php echo date('Y-m-d'); ?>"
                                                    value="<?php echo isset($_GET['ending_date']) ? $_GET['ending_date'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('ending_date is required', $errors)) {
                                                    echo '<p class="text-danger">Ending date is required</p>';
                                                } ?>
                                            </div>

                                            <div
                                                class="pt-1 mt-2 w-100 d-flex justify-content-center align-items-center">
                                                <button class="btn btn-lg btn-block w-50 "
                                                    style="background-color:#315B87 ;color:#FAFAFA;margin-bottom:-2rem" type="submit"
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
</div>
<?php get_footer(); ?>