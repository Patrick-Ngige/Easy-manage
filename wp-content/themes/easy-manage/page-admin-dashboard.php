<?php get_header();

/**
 * Template Name: admin dashboard
 */


 $current_user = wp_get_current_user();

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

<div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-admin'); ?>
    </div>

    
    <div style="padding:1rem;width:80vw;margin-left:0rem">
        <div style="padding:1rem;">
            <!-- Add buttons and search bar here -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <a href="http://localhost/easy-manage/admin-update-form/" class="floating-btn" style="text-decoration:none;padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Update PM
                </a>
                <a href="http://localhost/easy-manage/admin-trainers-table/"  class="floating-btn" style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Trainers
                </a>
                <a href="http://localhost/easy-manage/admin-trainees-table/"  class="floating-btn" style="text-decoration:none; padding: 0.5rem 1rem; border-radius: 10px; background-color: #FAFAFA; border: none; color: #315B87; font-size: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Trainees
                </a>
                <input type="text" placeholder="Search" style="padding: 0.5rem; border-radius: 10px; border: 1px solid #315B87;">
            </div>
            
            <table class="table align-middle mb-0 bg-white table-hover"
                style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
                <thead class="bg-light">
                    <tr style="font-size:large;color:#315B87;padding-left:2rem">
                        <th>Program Managers</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="mb-1">Jon Doe
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">jon@yahoo.org</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                    <form method="POST">
                            <a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                    style="width:25px;" alt="">  </a> &nbsp;&nbsp;
                            <a href="#" style="padding:6px"><img
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
                                <p class="fw-bold mb-1">Jon Doe
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">jon@yahoo.org</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                    <form method="POST">
                            <a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                    style="width:25px;" alt="">  </a> &nbsp;&nbsp;
                            <a href="#" style="padding:6px"><img
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
                                <p class="fw-bold mb-1">Jon Doe
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">jon@yahoo.org</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                    <form method="POST">
                            <a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                    style="width:25px;" alt="">  </a> &nbsp;&nbsp;
                            <a href="#" style="padding:6px"><img
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
                                <p class="fw-bold mb-1">Jon Doe
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">jon@yahoo.org</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                    <form method="POST">
                            <a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                    style="width:25px;" alt="">  </a> &nbsp;&nbsp;
                            <a href="#" style="padding:6px"><img
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
                                <p class="fw-bold mb-1">Jon Doe
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">jon@yahoo.org</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                    <form method="POST">
                            <a href="#" style="padding:6px;text-decoration:none;color:#315B87"> <img
                                    src="http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png"
                                    style="width:25px;" alt="">  </a> &nbsp;&nbsp;
                            <a href="#" style="padding:6px"><img
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

<?php get_footer(); ?>