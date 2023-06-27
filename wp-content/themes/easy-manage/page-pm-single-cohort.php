<?php get_header()
    /*
    Template Name: single Page
    */
    ?>

<div style="width: 100vw; height: 90vh; display: flex; flex-direction: row; margin-top: -2.45rem;">

    <div class="page-trainee-dashboard" style="margin-top: -1.99rem; width: 20vw;">
        <?php get_template_part('sidenav-pm'); ?>
    </div>

    <div>

        <div style="margin-left:50%;width:40vw;margin-top:30vh;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:5px">

            <div class="card " style="height: fit-content;display:flex;">

                <div class="card-header h5" style="display:flex;justify-content:space-between;background-color:#315B87;border-radius:5px">
                    <h4 style="color:#FAFAFA;margin-left:auto;margin-right:auto">Cohort</h4>

                </div>
                <div class="card-body">
                    <h5 class="card-title" style="color: #315B87;">WordPress</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div style="display:flex;justify-content:space-between">
                    <p><span style="color: #315B87;font-weight:500">Starting Date:</span> 30/07/2023</p>
                    <p><span style="color: #315B87;font-weight:500">Ending Date: </span> 30/07/2023</p>
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
</div>

<?php get_footer(); ?>