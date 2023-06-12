<?php get_header();

/**
 * Template Name: PM Cohorts
 * 
 */
$current_user = wp_get_current_user();

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>

    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
          
            <?php echo do_shortcode('[search_bar]'); ?>
            
        <table class="table align-middle mb-0 bg-white table-hover"
            style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
            <thead class="bg-light">
            <tr style="font-size:large;color:#315B87;padding-left:2rem">
                <th>Cohort</th>
                <th>Cohort info</th>
                <th>Trainer</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-normal mb-1">WordPress
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Custom WordPress Development</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                    </td>
                    <td>
                    <p>03/04/2023</p>
                    </td>
                    <td>
                    <p>30/06/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-normal mb-1">WordPress
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Custom WordPress Development</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                    </td>
                    <td>
                    <p>03/04/2023</p>
                    </td>
                    <td>
                    <p>30/06/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-normal mb-1">WordPress
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Custom WordPress Development</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                    </td>
                    <td>
                    <p>03/04/2023</p>
                    </td>
                    <td>
                    <p>30/06/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-normal mb-1">WordPress
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Custom WordPress Development</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                    </td>
                    <td>
                    <p>03/04/2023</p>
                    </td>
                    <td>
                    <p>30/06/2023</p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<?php get_footer(); ?>