<?php
    $drug_id = $_POST['drug_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $input = $_POST['input'];

    include "connection.php";
    $check = mysqli_fetch_array(mysqli_query($con,"select * from drug where drug_id = $drug_id"));
    if ($check[0]>0){
        $msg = "drug is already exists";
    }
    elseif ($input == "update") {
        $sql = "update drug set
                drug_id = $drug_id, 
                name = $name,
                price = $price
                where drug_id = $drug_id
                ";
        $result = mysqli_query($con, $sql);
    } else {
        $sql = "insert into drug 
                (drug_id, name, price)
                values
                ('$drug_id','$name','$price')";
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
            <?php
                if($check[0]>0){
                     echo "<h2>".$msg."</h2>";
                } else {
                    echo "<h2>Data Saved</h2>";
                }
            ?>
        </div>
        <?php
            if ($input == "UPDATE") {
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