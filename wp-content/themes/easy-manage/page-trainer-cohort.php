<?php
get_header();

/**
 * Template Name: Group Projects
 */

 require_once(ABSPATH . 'wp-load.php');

 $token = $_COOKIE['token'];
 
 $response = wp_remote_get('http://localhost/easy-manage/wp-json/wp/v2/users/me', array(
     'headers' => array(
         'Authorization' => 'Bearer ' . $token
     )
 ));
 
//  $user_data = null; // Initialize the user data variable
 
 if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
     $user_data = json_decode(wp_remote_retrieve_body($response));
 }

$endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/cohorts/' . $user_data->name;
$response = wp_remote_get($endpoint_url);
$cohort = wp_remote_retrieve_body($response);

var_dump($cohort);

preg_match('/\d+/', $cohort, $matches);
if (!empty($matches)) {
  $cohort_id = intval($matches[0]);
} else {

  $cohort_id = 0; 
}
var_dump($cohort_id);

if (is_wp_error($cohort_id)) {
  $cohort_data = null;
} else {

  $cohort_endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/cohorts/' . $cohort_id;
  $cohort_response = wp_remote_get($cohort_endpoint_url);
  $cohort_data = wp_remote_retrieve_body($cohort_response);
  $cohort_data = json_decode($cohort_data);
}

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

  <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
    <?php get_template_part('sidenav-trainer'); ?>
  </div>

  <div style="display: flex; justify-content: center; align-items: center; height: 100vh;margin-left:2em">
    <div
      style="max-width: 800px; background-color: #F7F7F7; border-radius: 10px; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2); padding: 2rem;">
      <h2 style="color: #315B87; margin-bottom: 1rem;">Assigned Cohort</h2>
      <div style="display: flex; justify-content: center;">
        <div
          style="max-width: 600px; background-color: #FAFAFA; border-radius: 10px; padding: 1rem; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);">

          <?php if ($cohort_data) { ?>
            <h4 style="color: #315B87; margin-bottom: 1rem; text-align: center;">
              <?php echo $cohort_data->cohort_info; ?>
            </h4>
            <p><span style="color: #315B87; font-weight: bold;">Starting Date:</span>
              <?php echo $cohort_data->starting_date; ?>
            </p>
            <p><span style="color: #315B87; font-weight: bold;">Ending Date:</span>
              <?php echo $cohort_data->ending_date ?>
            </p>
            <p style="margin-top: 1rem;">
              <?php echo $cohort_data->cohort_info; ?>
            </p>
            <div style="display: flex; justify-content: center; margin-top: 1rem;">
              <a href="#" class="btn btn-primary"
                style="background-color: #315B87; color: #FAFAFA; border: none; font-weight: bold;">Mark Complete</a>
            </div>
          <?php } else { ?>
            <p>No assigned cohort found for the user.</p>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>