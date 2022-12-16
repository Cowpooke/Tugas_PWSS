<?php
    $drug_id = $_POST['drug_id'];
    $stock = $_POST['stock'];
    $date = date("Y-m-d H:i:s");
    $input = $_POST['input'];

    include "connection.php";

    $check = "select * from stock where drug_id = $drug_id";
    $res = mysqli_fetch_array(mysqli_query($con,$check));
    $cur_stock = $res[1] + $stock;
    if ($res[0]>0){
        $sql = "update stock set  
                stock = $cur_stock,  
                date_modified = '$date'
                where drug_id = '$drug_id'
                ";
        $result = mysqli_query($con, $sql);
    } elseif ($input == "update") {
        $sql = "update stock set  
                stock = $stock,  
                date_modified = '$date'
                where drug_id = '$drug_id'
                ";
        $result = mysqli_query($con, $sql);
    } else {
        $sql = "insert into stock 
                (drug_id, stock, date_modified)
                values
                ('$drug_id',$stock,'$date')";
        $result = mysqli_query($con, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="box">
        <div class='header'>
            <h2>Data Saved</h2>
        </div>
        <?php
        if ($input == "update") {
            echo "
                    <a href='show_stock.php'>
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
                        <a href='show_stock.php'>
                            <div class='button'>
                                SHOW LIST
                            </div>
                        </a>
                        <a onclick='history.back()'>
                            <div class='button'>
                                INPUT AGAIN
                            </div>
                        </a>
                    ";
        }
        ?>
    </div>
</body>
</html>