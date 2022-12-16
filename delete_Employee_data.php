<?php
    if ((!isset($_GET['id']))){
        header("location: employee_list.php");
    }

    $id   = $_GET['id'];

    include "connection.php";
    $sql = "DELETE * FROM employee WHERE employee_id = '$id'";
    $result = mysqli_query($con, $sql);
    if (!$result){
        die("fail");   
    }

    header("location:employee_list.php");