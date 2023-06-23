<?php get_header();

/**
 * Template Name: Individual Projects
 * 
 */

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-trainer'); ?>
    </div>


    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <a href="http://localhost/easy-manage/create-trainee/"
                    style="text-decoration:none;padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Create Trainee
                </a>
                <a href="http://localhost/easy-manage/create-project/"
                    style="text-decoration:none;padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Create Project
                </a>
                <?php echo do_shortcode('[search_bar]'); ?>
            </div>

            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Trainee</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
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
                            <p class="fw-normal mb-1">Custom Plugin</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Ongoing</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">30/09/2023</p>
                        </td>
                        <td>
                            <form method="POST">
                                <a href="http://localhost/easy-manage/update-trainee/" style="padding:6px"><img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                        style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                <input type="hidden" name="employee_id" value="">
                                <button type="submit" name="delete" value=""
                                    style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                        style="width:25px" alt=""></button>
                            </form>
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
                            <p class="fw-normal mb-1">Custom Plugin</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Ongoing</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">30/09/2023</p>
                        </td>
                        <td>
                            <form method="POST">
                                <a href="http://localhost/easy-manage/update-trainee/" style="padding:6px"><img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                        style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                <input type="hidden" name="employee_id" value="">
                                <button type="submit" name="delete" value=""
                                    style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                        style="width:25px" alt=""></button>
                            </form>
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
                            <p class="fw-normal mb-1">Custom Plugin</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Ongoing</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">30/09/2023</p>
                        </td>
                        <td>
                            <form method="POST">
                                <a href="http://localhost/easy-manage/update-trainee/" style="padding:6px"><img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                        style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                <input type="hidden" name="employee_id" value="">
                                <button type="submit" name="delete" value=""
                                    style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                        style="width:25px" alt=""></button>
                            </form>
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
                            <p class="fw-normal mb-1">Custom Plugin</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Ongoing</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">30/09/2023</p>
                        </td>
                        <td>
                            <form method="POST">
                                <a href="http://localhost/easy-manage/update-trainee/" style="padding:6px"><img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                        style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                <input type="hidden" name="employee_id" value="">
                                <button type="submit" name="delete" value=""
                                    style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                        style="width:25px" alt=""></button>
                            </form>
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
                            <p class="fw-normal mb-1">Custom Plugin</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Ongoing</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">30/09/2023</p>
                        </td>
                        <td>
                            <form method="POST">
                                <a href="http://localhost/easy-manage/update-trainee/" style="padding:6px"><img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png"
                                        style="width:25px;" alt=""></a> &nbsp;&nbsp;
                                <input type="hidden" name="employee_id" value="">
                                <button type="submit" name="delete" value=""
                                    style="padding:5px;border:none;background-color:#FAFAFA" onclick=""> <img
                                        src="http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png"
                                        style="width:25px" alt=""></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>