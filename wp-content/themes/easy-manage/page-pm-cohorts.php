<?php
get_header();

/**
 * Template Name: PM Cohorts
 */

 $token = $_COOKIE['token'];

 $response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
     'headers' => array(
         'Authorization' => 'Bearer ' . $token
     )
 )
 );
 
 if (isset($_POST['soft_delete'])) {
     $cohort_id = $_POST['cohort_id'];
     $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/soft_delete/' . $cohort_id;
 
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

<div class="pm-cohorts-main-div">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>


    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content:end; margin-bottom: 1rem;">
                
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Cohort</th>
                        <th>Trainer</th>
                        <th>Ending date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $request_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/cohorts';
                    $response = wp_remote_get($request_url);
                    $cohort = wp_remote_retrieve_body($response);
                    $cohort = json_decode($cohort, true);

                    if (!empty($cohort)) {
                        foreach ($cohort as $Cohort) { ?>

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1">
                                                <?php echo $Cohort['cohort'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $Cohort['trainer'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <?php echo $Cohort['ending_date'] ?>
                                    </p>
                                </td>
                                <td>
                                    <form method="POST">
                                        <a href="http://localhost/easy-manage/single-page/?id=<?php echo $Cohort['cohort_id'] ?>"
                                            style="padding:6px" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="More"><img
                                                src="http://localhost/easy-manage/wp-content/uploads/2023/06/arrow-right.png"
                                                style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                        <input type="hidden" name="" value="">
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo 'No cohorts available';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .pm-cohorts-main-div {
        width: 100vw;
        height: 90vh;
        display: flex;
        flex-direction: row;
        margin-top: -2.45rem;
    }

    .page-admin-dashboard {
        margin-top: -1.99rem;
        width: 20vw;
    }

    .pm-cohorts-div-1 {
        padding: 1rem;
        width: 80vw;
        margin-left: 0rem
    }

    .pm-cohorts-div-2 {
        margin-top: 1rem;
        padding: 1rem;
    }

    .pm-cohorts-div-3 {
        display: flex;
        align-items: center;
        justify-content: end;
        margin-bottom: 1rem;
    }

    .pm-cohorts-floating-btn {
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        background-color: #FAFAFA;
        border: none;
        color: #315B87;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 90%;
        margin-left: 5%;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin-top: 3%;
        background-color: #FAFAFA;
        margin-bottom: 0;
    }

    .table-tr {
        font-size: large;
        color: #315B87;
        padding-left: 2rem
    }

    .td-div-1 {
        display: flex;
        align-items: center;
    }

    .td-div-2 {
        margin-left: 1rem;
    }

    .td-div-2 p {
        margin-bottom: 1rem;
    }

    .td-2,
    .td-3 {
        font-weight: normal;
        margin-bottom: 1rem;
    }

    .td-3 p {
        color: red;
    }

    .activate-user {
        padding: 6px;
        border: none
    }

    .activate-user img {
        width: 25px;
        border: none
    }

    .edit-btn img {
        width: 25px;
    }
</style>


<?php get_footer(); ?>
<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>