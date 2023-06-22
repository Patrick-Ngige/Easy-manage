<?php get_header();


/**
 * Template Name: Group Projects
 * 
 */

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

  <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
    <?php get_template_part('sidenav-trainer'); ?>
  </div>
  <?php get_header(); ?>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;margin-left:2em">
  <div style="max-width: 800px; background-color: #F7F7F7; border-radius: 10px; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2); padding: 2rem;">
  <h2 style="color: #315B87; margin-bottom: 1rem;">Assigned Cohort</h2>
  <div style="display: flex; justify-content: center;">
    <div style="max-width: 600px; background-color: #FAFAFA; border-radius: 10px; padding: 1rem; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);">
      <h4 style="color: #315B87; margin-bottom: 1rem; text-align: center;">Quality Assurance & Quality Engineering</h4>
      <p><span style="color: #315B87; font-weight: bold;">Starting Date:</span> 03/07/2023</p>
      <p><span style="color: #315B87; font-weight: bold;">Ending Date:</span> 30/09/2023</p>
      <p style="margin-top: 1rem;">JavaScript testing using tools like Jasmine and Cypress</p>
      <div style="display: flex; justify-content: center; margin-top: 1rem;">
        <a href="#" class="btn btn-primary" style="background-color: #315B87; color: #FAFAFA; border: none; font-weight: bold;">Mark Complete</a>
      </div>
    </div>
  </div>
</div>
</div>

  <?php get_footer(); ?>