<?php
get_header();

/**
 * Template Name: Admin PM List
 */

 $token = $_COOKIE['token'];

 $response = wp_remote_get(
     'http://localhost/easy-manage/wp-json/wp/v2/users/me',
     array(
         'headers' => array(
             'Authorization' => 'Bearer ' . $token
         )
     )
 );
 
 if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
     $user_data = json_decode(wp_remote_retrieve_body($response));
 
    
 }
 
 
 if (isset($_POST['soft_delete'])) {
     $project_id = $_POST['user_id'];
     $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/individual_project/soft_delete/' . $project_id;
 
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $endpoint_url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         'Authorization: Bearer ' . $token
     ));
     $response = curl_exec($curl);
 
     if ($response === false) {
         echo 'Error: ' . curl_error($curl);
     }
 
 
     curl_close($curl);
 
     
 }

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>


    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">

            <a href="http://localhost/easy-manage/group-projects/" class="floating-btn"
                    style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Group projects
                </a>
                <a href="http://localhost/easy-manage/create-trainee/" class="floating-btn"
                    style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Create Trainee
                </a>

                <a href="http://localhost/easy-manage/trainees-list/" class="floating-btn"
                    style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    View Trainees
                </a>

                <a href="http://localhost/easy-manage/create-project/" class="floating-btn"
                    style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Create Project
                </a>

                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Trainee</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $request_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/individual';
                    $response = wp_remote_get($request_url);
                    $projects = wp_remote_retrieve_body($response);
                    $projects = json_decode($projects, true);

                    if (is_array($projects)) {
                        foreach ($projects as $project) { ?>

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1">
                                                <?php echo $project['assignee'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $project['project_name'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo ($project['project_status'] == 0 ? 'Ongoing' : 'Completed') ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $project['due_date'] ?>
                                    </p>
                                </td>
                                <td>
                                    <form method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $project['project_id']; ?>">
                                        <button type="submit" name="soft_delete" class="btn-soft-delete"
                                            style="padding:6px;border:none">
                                            <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                                style="width:25px;" alt="">
                                        </button>
                                        <a href="http://localhost/easy-manage/admin-update-form/?id=?<?php echo $project['project_id'] ?>"
                                            style="padding:6px"><img
                                                src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                                style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                       
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">Noindividual peojects available</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>