<?php get_header();

/**
 * Template Name: Analtics Dashboard
 */

?>

<div style="width:100vw;height:90vh;display:flex;flex-direction:row;margin-top:-2.45rem">

    <div class="page-trainee-dashboard" style="margin-top:-1.99rem;width:20vw">
        <?php get_template_part('sidenav-pm'); ?>
    </div>


    <div style="padding:1rem;width:70vw;margin-left:5rem;overflow-y:auto;z-index:100;height:fit-content;margin-top:3rem">


            <style>

                .stat-item {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 10px;
                }

                .stat-item p {
                    font-size: 16px;
                }

                .table th,
                .table td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }
            </style>

            <div style=" display: flex; justify-content: space-between; align-items: flex-start;">


              <!-- Projects Analytics-->
              <div style="flex: 1;margin-right: 20px; padding: 10px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;">
                    <h2 style=" font-size: 20px; margin-bottom: 1rem;color:#315B87">Projects</h2>
                    <div class="stat-item">
                        <p>Total Individual Projects</p>
                        <p>150</p>
                    </div>
                    <div class="stat-item">
                        <p>Total Group Projects</p>
                        <p>100</p>
                    </div>
                    <div class="stat-item">
                        <p>Ongoing Projects</p>
                        <p>200</p>
                    </div>
                    <div class="stat-item">
                        <p>Completed Projects</p>
                        <p>50</p>
                    </div>
                </div>

                <!-- Card: Users Analytics -->
                <div style="flex: 1;margin-right: 10px; padding: 10px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;">
                <h2 style=" font-size: 20px; margin-bottom: 1rem;color:#315B87">Trainers and Trainees</h2>
                
                    <div class="stat-item">
                        <p>Total Trainers</p>
                        <p>50</p>
                    </div>
                    <div class="stat-item">
                        <p>Total Trainees</p>
                        <p>200</p>
                    </div>
                </div>

              
            </div>

            <div style="width:67vw;display:flex; flex-direction:row;gap:10px">
            <!-- Individual Projects -->
            <div class="table" style="width:32.5vw;margin-top: 20px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 10px;" >
                <h2 style="  font-size: 20px; margin-bottom: 10px;color:#315B87" >Recently Assigned Individual Projects</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Assignee </th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project A</td>
                            <td>User A</td>
                            <td>2023-06-01</td>
                        </tr>
                        <tr>
                            <td>Project B</td>
                            <td>User B</td>
                            <td>2023-06-02</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--  Group Projects -->
            <div class="table" style="width:32.5vw;margin-top: 20px; background-color: #FAFAFA; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 10px;" >
            <h2 style="  font-size: 20px; margin-bottom: 10px;color:#315B87" >Recently Assigned Group Projects</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Project </th>
                            <th>Group Assigned</th>
                            <th>Date Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project C</td>
                            <td>Group X</td>
                            <td>2023-06-03</td>
                        </tr>
                        <tr>
                            <td>Project D</td>
                            <td>Group Y</td>
                            <td>2023-06-04</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>

    </div>
</div>