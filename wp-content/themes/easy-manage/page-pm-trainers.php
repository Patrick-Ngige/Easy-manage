<?php get_header();

/**
 * Template Name: PM Trainers
 * 
 */
$current_user = wp_get_current_user();

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>

    

    <table class="table align-middle  bg-white table-hover"
        style="width:70%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;height:fit-content">
        <thead class="bg-light">
            <tr style="font-size:large;color:#315B87;padding-left:2rem;">
                <th class="ms-3">Trainer</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-normal mb-1">Jon Doe
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">jon@yopmail.com</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">Trainer</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-normal mb-1">Jon Doe
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">jon@yopmail.com</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">Trainer</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-normal mb-1">Jon Doe
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">jon@yopmail.com</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">Trainer</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-normal mb-1">Jon Doe
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">jon@yopmail.com</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">Trainer</p>
                </td>
            </tr>

        </tbody>
    </table>
</div>
</div>

<?php get_footer(); ?>