<?php get_header();

/**
 * Template Name: Group Projects
 * 
 */

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainee'); ?>
    </div>

    <div style="padding:1rem;width:80vw;margin-left:0rem;margin-top:1rem">
    <?php echo do_shortcode('[search_bar]'); ?>
    <table class="table align-middle mb-0 bg-white table-hover"
            style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
            <thead class="bg-light">
                <tr style="font-size:large;color:#315B87;padding-left:2rem">
                    <th>Project</th>
                    <th>Assignees</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="mb-1">Easy-manage website
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>

                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">29/06/2023</p>
                    </td>
                    <td>
                        <form method="POST">
                            <a href="#" style="padding:6px"><img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/check.png"
                                    style="width:25px;" alt=""></a> &nbsp;&nbsp;
                            <!-- <input type="hidden" name="employee_id" value="">
                            <button type="submit" name="delete" value=""
                                style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                    style="width:25px" alt=""></button> -->
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="mb-1">Easy-manage website
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>

                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">29/06/2023</p>
                    </td>
                    <td>
                        <form method="POST">
                            <a href="#" style="padding:6px"><img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/check.png"
                                    style="width:25px;" alt=""></a> &nbsp;&nbsp;
                            <!-- <input type="hidden" name="employee_id" value="">
                            <button type="submit" name="delete" value=""
                                style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                    style="width:25px" alt=""></button> -->
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="mb-1">Easy-manage website
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>

                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">29/06/2023</p>
                    </td>
                    <td>
                        <form method="POST">
                            <a href="#" style="padding:6px"><img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/check.png"
                                    style="width:25px;" alt=""></a> &nbsp;&nbsp;
                            <!-- <input type="hidden" name="employee_id" value="">
                            <button type="submit" name="delete" value=""
                                style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                    style="width:25px" alt=""></button> -->
                        </form>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="mb-1">Easy-manage website
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>
                        <p class="fw-normal mb-1">Jon Doe</p>

                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">29/06/2023</p>
                    </td>
                    <td>
                        <form method="POST">
                            <a href="#" style="padding:6px"><img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/check.png"
                                    style="width:25px;" alt=""></a> &nbsp;&nbsp;
                            <!-- <input type="hidden" name="employee_id" value="">
                            <button type="submit" name="delete" value=""
                                style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                    style="width:25px" alt=""></button> -->
                        </form>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>