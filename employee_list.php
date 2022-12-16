<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <div class="box">
        <div class="Header">
            <h2>EMPLOYEE LIST</h2>
        </div>
        <?php
        include "connection.php";
        $sql = "SELECT * FROM Employee";
        $result = mysqli_query($con, $sql);
        ?>
        <table class="table">
            <thead class="table-header">
                <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Roles</th>
                    <th>option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                while ($td = mysqli_fetch_assoc($result)) {
                    echo "      <tr>
                                        <td>{$num}</td>
                                        <td>{$td['employee_id']}</td>
                                        <td>{$td['name']}</td>
                                        <td>{$td['address']}</td>
                                        <td>{$td['roles']}</td>
                                        <td>
                                            <a class='link-black' href='edit_Employee_data.php?id={$td['employee_id']}'>Edit</a>
                                            <a class='link-red' href='delete_Employee_data.php?id={$td['employee_id']}'
                                                onclick='return confirm(\"Are you sure want to delete {$td['name']} [{$td['employee_id']}]? \") '
                                            >Delete</a>
                                        </td>
                                    </tr>";
                    $num++;
                }

                ?>
            </tbody>
        </table>
        <a class="button" href="dashboard.php">
            <div>
                back
            </div>
        </a>
    </div>
</body>
</html>