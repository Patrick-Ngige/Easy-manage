<?php get_header();

/**
 * Template Name: Trainer Create trainee
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();
    if (empty($_POST['trainee_name'])) {
        $errors[] = 'Trainee name is required';
    }
    if (empty($_POST['trainee_email'])) {
        $errors[] = 'Email is required';
    }
    if (empty($_POST['trainee_role'])) {
        $errors[] = 'Role is required';
    }
    if (empty($_POST['trainee_password'])) {
        $errors[] = 'Password is required';
    }
    if (isset($_POST['createbtn'])) {
        $pm_name = $_POST['trainee_name'];
        $pm_email = $_POST['trainee_email'];
        $pm_role = $_POST['trainee_role'];
        $pm_password = $_POST['trainee_password'];
        $created_trainee = array(
            'trainee_name' => $pm_name,
            'trainee_email' => $pm_email,
            'trainee_role' => $pm_role,
            'trainee_password' => $pm_password
        );
        $token = $_COOKIE['token'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/easy-manage/wp-json/em/v1/trainee');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($created_trainee));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ));
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode === 200) {
            $result = json_decode($response);
            if ($result && isset($result->success)) {
                $_SESSION['success_message'] = 'Trainer created successfully.';
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

<div class="main-div">
    <div class="page-trainer-sidenav">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>
    <div class="div-1">
        <div class="container">
            <div class="div-2">
                <div class="div-3">
                    <div class="card">
                        <div class="div-4">
                            <div class="div-4">
                                <div class="div-5">
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <h2>
                                                Create trainee
                                            </h2>
                                            <?php if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                                                <div class="alert alert-success" role="alert">
                                                    Trainer created successfully.
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-outline ">
                                                <label class="form-label" for="form2Example27"
                                                    >Trainee:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee name" name="trainee_name"
                                                    value="<?php echo isset($_GET['trainee_name']) ? $_GET['trainee_name'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Trainee name is required', $errors)) {
                                                    echo '<p class="text-danger">Trainee name is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline ">
                                                <label class="form-label" for="form2Example27"
                                                    >Email:</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee email" name="trainee_email"
                                                    value="<?php echo isset($_GET['trainee_email']) ? $_GET['trainee_email'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Email is required', $errors)) {
                                                    echo '<p class="text-danger">Email is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline ">
                                                <label class="form-label" for="form2Example27"
                                                    >Role:</label>
                                                <input type="text" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee role" name="trainee_role"
                                                    value="<?php echo isset($_GET['trainee_role']) ? $_GET['trainee_role'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Role is required', $errors)) {
                                                    echo '<p class="text-danger">Role is required</p>';
                                                } ?>
                                            </div>
                                            <div class="form-outline">
                                                <label class="form-label" for="form2Example27"
                                                    >Password:</label>
                                                <input type="password" id="form2Example27"
                                                    class="form-control form-control-md"
                                                    placeholder="Enter trainee role" name="trainee_password"
                                                    value="<?php echo isset($_GET['trainee_password']) ? $_GET['trainee_password'] : ''; ?>" />
                                                <?php if (isset($errors) && in_array('Password is required', $errors)) {
                                                    echo '<p class="text-danger">Passsword is required</p>';
                                                } ?>
                                            </div>
                                            <div
                                                class="button">
                                                <button class="create-btn"
                                                   type="submit"
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
<style>
    .main-div{
        width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;
    }
    .page-trainer-sidenav{
        margin-top: -1.99rem; width: 20vw;
    }
    .div-1{
        height: 80vh; margin-left: 15rem;
    }
    .container{
        padding:3rem 0rem;
    }
    .div-2{
        flex-direction: row; display:flex; justify-content:center; align-items:center;
    }
    .div-3{
        flex-direction:column; width: 40vw;
    }
    .card{
        border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    .div-4{
        flex-direction:row; gap:0; display:flex; justify-content:center; align-items:center; width: 40vw;
    }
    .div-5{
        display:flex; justify-content:center; align-items:center; height: 75vh; width: 40vw;
    }
    .card-body{
        padding:2rem; color:black
    }
    form{
        font-size: 16px
    }
    form h2{
        font-weight:bold; display:flex; justify-content:center; align-items:center;color: #315B87;margin-top:-2rem;
    }
    .form-outline{
        margin-bottom:1rem;
    }
    .form-label{
        font-weight: 600;
    }
    .button{
        padding-top:1rem; margin-top: 1 rem; display:flex; justify-content:center; align-items:center;
    }
    .create-btn {
        background-color: #315B87;
        color: #FAFAFA;
        margin-bottom: -2rem;
        border: none;
        border-radius: 5px;
        padding: .4rem 3.5rem;
        font-size: large;
    }
</style>

<?php get_footer(); ?>