<?php get_header();

/**
 * Template Name: Trainer trash
 * 
 */

?>

<div overflow-y:hidden style="width:80vw;height:90vh;">
    <div style="padding:1rem;">
        <table class="table align-middle mb-0 bg-white table-hover"
            style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">
            <thead class="bg-light">
                <tr style="font-size:large">
                    <th>Trainees</th>
                    <th>Emails</th>
                    <th>Project</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
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
                        <p class="fw-normal mb-1"></p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Active</p>
                    </td>
                    <td>
                        <form method="POST">
                            <a href="#"
                                style="background-color: #006b0c;color:white; border-radius:3px;text-decoration:none;padding:6px;border: #006b0c;border-radius:3px;">Update</a>
                            <input type="hidden" name="employee_id" value="" />
                            <button type="submit" name="delete" value=""
                                style="background-color: #fd434c;color:white; border-radius:3px;padding:5px;border:none;"
                                onclick="">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>