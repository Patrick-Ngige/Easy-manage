<style>
    .container {
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #F7F7F7;
    }

    .dashboard {
        width: 90%;
        max-width: 1200px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        padding: 2rem;
        background-color: #FFFFFF;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .sidenav {
        background-color: #F5F5F5;
        padding: 2rem;
    }

    .content {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .analytics {
        display: flex;
        flex-direction: row;
        gap: 2rem;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
        background-color: #FFFFFF;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        text-align: center;
    }

    .table {
        padding: 2rem;
        background-color: #FFFFFF;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .table th,
    .table td {
        padding: 1rem;
        border-bottom: 1px solid #CCCCCC;
    }
</style>

<div class="container">
    <div class="dashboard">

        <div class="content">
            <div class="analytics">
                <div class="stat-item">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Total Projects</h2>
                    <p style="font-size: 24px; font-weight: bold;">250</p>
                </div>
                <div class="stat-item">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Total Users</h2>
                    <p style="font-size: 24px; font-weight: bold;">500</p>
                </div>
                <div class="stat-item">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Ongoing Projects</h2>
                    <p style="font-size: 24px; font-weight: bold;">100</p>
                </div>
                <div class="stat-item">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Completed Projects</h2>
                    <p style="font-size: 24px; font-weight: bold;">150</p>
                </div>
                <div class="stat-item">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Total Trainees</h2>
                    <p style="font-size: 24px; font-weight: bold;">300</p>
                </div>
                <div class="stat-item">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Total Trainers</h2>
                    <p style="font-size: 24px; font-weight: bold;">200</p>
                </div>
            </div>
            <div style="display:flex;gap:5rem">
                <div class="table">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Recently Assigned Individual
                        Projects</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Assignee</th>
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
                <div class="table">
                    <h2 style="font-size: 20px; margin-bottom: 1rem; color: #315B87;">Recently Assigned Group Projects
                    </h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Project</th>
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
</div>