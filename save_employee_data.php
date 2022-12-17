<?php
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['name'];
    $employee_address = $_POST['address'];
    $employee_roles = $_POST['roles'];

    include "connection.php";
    $input = $_POST['input'];
    $check = mysqli_fetch_array(mysqli_query($con,"select * from employee where employee_id = $employee_id"));
    if ($check[0]>0){
        $msg = "id is already exists";
    } elseif($input == "UPDATE") {        
        $sql = "update employee set
            name = '$employee_name',
            address = '$employee_address',
            roles = '$employee_roles'
            where employee_id = '$employee_id' ";
        $result = mysqli_query($con,$sql);
    } elseif ($input == "SUBMIT") {
        $sql = "insert into employee 
            (employee_id, name, address, roles)
            values
            ('$employee_id','$employee_name','$employee_address','$employee_roles')";
        $result = mysqli_query($con,$sql);
    }    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style/styles.css">
    </head>
    <body>
        <div class="wrap">
            <div class="box">
                        <div class='header'>
                            <?php
                                if($check[0]>0){
                                    echo "<h2>".$msg."</h2>";
                                } else {
                                    echo "<h2>Data Saved</h2>";
                                }
                            ?>
                        </div>
                <?php
                    if ($input == "update") {
                        echo "
                        <a href='employee_list.php'>
                            <div class='button'>
                                BACK TO LIST
                            </div>
                        </a>
                        ";
                    } else {
                        echo "
                            <a href='dashboard.php'>
                                <div class='button'>
                                    BACK TO HOME
                                </div>
                            </a>
                            <a href='employee_list.php'>
                                <div class='button'>
                                    SHOW LIST
                                </div>
                            </a>
                            <a href='input_Employee.php'>
                                <div class='button'>
                                    INPUT AGAIN
                                </div>
                            </a>
                        ";
                    }
                ?>
            </div>
        </div>
    </body>
</html>

