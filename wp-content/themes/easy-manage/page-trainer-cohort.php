<?php get_header();

/**
 * Template Name: Trainer Cohort
 * 
 */

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:0rem">

  <div style="margin-top:-4.4rem;width:20vw">
    <?php get_template_part('sidenav-trainer'); ?>
  </div>
  
  <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
          
          
  <!-- <div style="padding:1rem;width:80vw;margin-left:0rem"> -->
  <div style="display:flex;flex-direction:column;">
    <h5 style="color:#315B87;padding-left:2rem;background-color:#FAFAFA;width:fit-content;">Assigned Cohort:</h5>
    <div
      style="margin-left:15rem;width:40vw;height:fit-content;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;border-radius:10px">
      <!-- Card -->
      <div class="card" style="background-color: #F7F7F7; border: none; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);border-radius:10px">

        <div style="background-color: #315B87; color: #FAFAFA; padding: 10px; border-radius: 10px 10px 0 0;">
          <h4 class="card-title" style="margin: 0; font-weight: bold;">Quality Assurance & Quality Engineering</h4>
        </div>

        <div class="card-body" style="padding: 10px;">
          <h6><span style="color: #315B87; font-weight: bold;">Starting Date:</span> 03/07/2023</h6>
          <h6><span style="color: #315B87; font-weight: bold;">Ending Date:</span> 30/09/2023</h6>

          <p class="card-text" style="margin-top: 10px;"> JavaScript testing using tools like Jasmine and Cypress</p>

          <div style="display: flex; justify-content: center;">
            <a href="#" class="btn btn-primary"
              style="background-color: #315B87; color: #FAFAFA; border: none; font-weight: bold;">Mark Complete</a>
          </div>
        </div>

      </div>

    </div>
    <!-- Card -->
    <h5 style="color:#315B87;padding-left:2rem">Completed Cohorts:</h5>
    <div style="padding:1rem;width:75vw;margin-left:0rem;">
      <table class="table align-middle mb-0 bg-white table-hover;"
        style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <thead class="bg-light">
          <tr style="width:60%;font-size:large;color:#315B87;padding-left:2rem;">
            <th>Cohort Name</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody style="overflow:auto;">

          <tr>
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <p class="fw-bold mb-1">WordPress
                  </p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">03/04/2023</p>
            </td>
            <td>
              <p class="fw-normal mb-1">30/06/2023</p>
            </td>
            <td>
              <p style="color:green">Completed</p>
            </td>
          </tr>


        </tbody>
      </table>
    </div>
  </div>

</div>