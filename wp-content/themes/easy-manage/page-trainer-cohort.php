<?php
get_header();

/**
 * Template Name: Group Projects
 */

require_once(ABSPATH . 'wp-load.php');

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
  $username = $user_data->name;

  $endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/cohort/' . $username;
  $response = wp_remote_get($endpoint_url);
  $cohort = wp_remote_retrieve_body($response);

  preg_match('/\d+/', $cohort, $matches);
  if (!empty($matches)) {
    $cohort_id = intval($matches[0]);
  } else {
    $cohort_id = 0;
  }
}

if (is_wp_error($cohort_id)) {
  $cohort_data = null;
} else {
  $cohort_endpoint_url = 'http://localhost/easy-manage/wp-json/em/v1/projects/cohorts/' . $cohort_id;
  $cohort_response = wp_remote_get($cohort_endpoint_url);
  $cohort_data = wp_remote_retrieve_body($cohort_response);
  $cohort_data = json_decode($cohort_data);
}

if (isset($_POST['cohortId'])) {
  $cohortId = $_POST['cohortId'];

  var_dump($cohort_id);
  print_r($cohort_id);
  $endpoint = 'http://localhost/easy-manage/wp-json/em/v1/cohort/mark_complete/' . $cohortId;

  $data = json_encode(array());

  $ch = curl_init($endpoint);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token,
  )
  );


  $response = curl_exec($ch);

  if ($response) {
    wp_send_json_success('Cohort marked as complete');
  } else {
    echo 'Failed to mark completed.';
  }

  curl_close($ch);
}
?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

  <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
    <?php get_template_part('sidenav-trainer'); ?>
  </div>

  <div style="margin: auto;height: 100vh;margin-top: 6rem;">
    <div
      style="width: 40vw; background-color: #F7F7F7; border-radius: 10px; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2); padding: 2rem; ">
      <h2 style="color: #315B87; margin-bottom: 1rem;">Assigned Cohort</h2>
      <div style="display: flex; justify-content: center;">
        <div
          style="width:35vw; background-color: #FAFAFA; border-radius: 10px; padding: 1rem; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);">
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
              <form method="PATCH" onsubmit="markComplete(event)">
                <input type="hidden" name="action" value="mark_complete">
                <input type="hidden" name="cohortId" value="<?php echo $cohort_data->id; ?>">
                <button type="submit" class="btn btn-primary"
                  style="background-color: #315B87; color: #FAFAFA; border: none; font-weight: bold;">Mark
                  Complete</button>
              </form>
            </div>
          <?php } else { ?>
            <p>No assigned cohort found for the user.</p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <script>
function markComplete(event) {
    event.preventDefault(); // Prevent the default form submission

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo esc_url(admin_url('admin-post.php')); ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                location.reload(); // Reload the page
            } else {
                console.log('Request failed. Status: ' + xhr.status);
            }
        }
    };
    xhr.send(new FormData(event.target)); // Send the form data

    return false;
}
</script>

  <?php get_footer(); ?>