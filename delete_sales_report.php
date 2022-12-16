<?php
    if (!isset($_POST['id'])){
        header("location:sales_report.php");
    }

    $id   = $_GET['id'];
    
    include "connection.php";
    $sql = "DELETE FROM sales_detail WHERE id_sales = '$id'";
    $result = mysqli_query($con, $sql);
    

    header("location:sales_report.php");