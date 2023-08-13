<?php get_header();
    /*
    Template Name: single Page
    */

 $cohort_id = $_GET['id'];
 $token = $_COOKIE['token'];
 $response = wp_remote_get(
    'http://localhost/easy-manage/wp-json/em/v1/projects/cohorts/'. $cohort_id,
    array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token
        ),
        'cookies' => array(
            'token' => $token
        )
    )
);
if (is_wp_error($response)) {
    $error = $response->get_error_message();
} else {
    $cohort = json_decode(wp_remote_retrieve_body($response), true);
}
?>

<div class="main-div">
    <div class="page-pm-sidenav" >
        <?php get_template_part('sidenav-pm'); ?>
    </div>
    <div>
        <div class="div-1">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $cohort['cohort'] ?> Cohort</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cohort['cohort'] ?></h5>
                    <p class="card-text"><?php echo $cohort['cohort_info'] ?></p>
                    <div style="display:flex;justify-content:space-between">
                    <p><span style="color: #315B87;font-weight:500">Starting Date:</span> <?php echo $cohort['starting_date'] ?></p>
                    <p><span style="color: #315B87;font-weight:500">Ending Date: </span><?php echo $cohort['ending_date'] ?></p>
                    </div>
                    <a href="http://localhost/easy-manage/cohorts/" class="floating-btn"
                        style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 8px; background-color: #315B87; border: none; color: #FAFAFA; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);margin-left:auto;margin-right:auto;">
                        back to cohort
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .main-div{
        width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;
    }
    .page-pm-sidenav{
        margin-top: -1.99rem; width: 20vw;
    }
    .div-1{
        margin-left:50%;width:40vw;margin-top:30vh;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:5px
    }
    .card{
        height: fit-content;display:flex;
    }
    .card-header{
        display:flex;justify-content:space-between;background-color:#315B87;border-radius:5px
    }
    .card-header h4{
        color:#FAFAFA;margin-left:auto;margin-right:auto
    }
    .card-title{
        color: #315B87;
    }
</style>

<?php get_footer(); ?>