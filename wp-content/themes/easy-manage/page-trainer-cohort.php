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

  <!-- <div style="padding:1rem;width:80vw;margin-left:0rem"> -->
  <div style="display:flex;flex-direction:column;">
  <h5 style="color:#315B87;padding-left:2rem">Assigned Cohort:</h5>
    <div
      style="margin:0rem 20rem;width:30vw;height:fit-content;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
      <!-- Card -->
      <div class="card">

        <!-- Card image -->


        <!-- Card content -->
        <div class="card-body">

          <!-- Title -->
          <h4 class="card-title" style="color:#315B87"><a>Cohort</a></h4>
          <!-- Text -->
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <!-- Button -->
          <a href="#" class="btn " style="background-color:#315B87;color:#FAFAFA;margin-left: auto; margin-right: auto;border:none">Mark Complete</a>

        </div>

      </div>
    </div>
    <!-- Card -->
    <h5 style="color:#315B87;padding-left:2rem">Completed Cohorts:</h5>
    <div style="padding:1rem;width:80vw;margin-left:0rem;">
      <table class="table align-middle mb-0 bg-white table-hover;"
        style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <thead class="bg-light">
          <tr style="width:60%;font-size:large;color:#315B87;padding-left:2rem;">
            <th>Program Managers</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody style="overflow:auto;" >
          
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <p class="fw-bold mb-1">Jon Doe
                  </p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">Program Manager</p>
            </td>
            <td>
              <p class="fw-normal mb-1">Active</p>
            </td>
            <td>
              <form method="POST">
                <a href="#" style="padding:6px"><img
                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png" style="width:25px;"
                    alt=""></a>
                &nbsp;&nbsp;
                <input type="hidden" name="employee_id" value="">
                <button type="submit" name="delete" value="" style="padding:5px;border:none;background-color:#FAFAFA"
                  onclick=""> <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                    style="width:25px" alt=""></button>
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <p class="fw-bold mb-1">Jon Doe
                  </p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">Program Manager</p>
            </td>
            <td>
              <p class="fw-normal mb-1">Active</p>
            </td>
            <td>
              <form method="POST">
                <a href="#" style="padding:6px"><img
                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png" style="width:25px;"
                    alt=""></a>
                &nbsp;&nbsp;
                <input type="hidden" name="employee_id" value="">
                <button type="submit" name="delete" value="" style="padding:5px;border:none;background-color:#FAFAFA"
                  onclick=""> <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                    style="width:25px" alt=""></button>
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <p class="fw-bold mb-1">Jon Doe
                  </p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">Program Manager</p>
            </td>
            <td>
              <p class="fw-normal mb-1">Active</p>
            </td>
            <td>
              <form method="POST">
                <a href="#" style="padding:6px"><img
                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png" style="width:25px;"
                    alt=""></a>
                &nbsp;&nbsp;
                <input type="hidden" name="employee_id" value="">
                <button type="submit" name="delete" value="" style="padding:5px;border:none;background-color:#FAFAFA"
                  onclick=""> <img src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                    style="width:25px" alt=""></button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>