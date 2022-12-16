<?php
    $cust_id = $_POST['cust_id'];
    $cust_name = $_POST['name'];
    $phone = $_POST['phone'];
    $drug_id = $_POST['drug_id'];
    $quantities = $_POST['quantities'];
    $date = date("Y-m-d H:i:s");
    $id_sales = $_POST['id_sales'];

    include "connection.php";

        //-------------------price--------------------------------
    $sql_data = "SELECT price,stock FROM drug
                 JOIN stock ON
                 drug.drug_id = stock.drug_id
                 WHERE drug.drug_id = '$drug_id'
                ";
    $data_s =  mysqli_fetch_assoc(mysqli_query($con,$sql_data));
    $stock = ($data_s['stock'] - $quantities);
    $price = $data_s['price'];
    $subtotal = ($quantities * $price);
        //--------------------------------------------------------
    if ($data_s['stock'] > 0) {
            
        $c_id = "SELECT customer_id FROM customer where name='$cust_name'";
        $cu_id = mysqli_fetch_assoc(mysqli_query($con,$c_id));
        $cus_id = $cu_id['customer_id'];

        $sum_row = mysqli_num_rows(mysqli_query($con,$c_id));
        if ($sum_row == 0) {
            $sql1 = "INSERT INTO customer 
                    (customer_id,name,phone)
                    VALUES 
                    ('$cust_id','$cust_name','$phone')";
            $input_to_cust = mysqli_query($con,$sql1);
            $c_id = "SELECT customer_id FROM customer where name='$cust_name'";
            $cu_id = mysqli_fetch_assoc(mysqli_query($con,$c_id));
            $cus_id = $cu_id['customer_id'];
        }

        $sales_table = "INSERT INTO sales  
                        (id_sales,customer_id,name,sale_date,total)
                        VALUES
                        ('$id_sales','$cus_id','$cust_name','$date','$subtotal')
                        ";
        $upt_sales = mysqli_query($con,$sales_table);

        $sql2 = "INSERT INTO sales_detail
                    (id_sales,drug_id,quantities,subtotal,date_modified)
                    VALUES 
                    ('$id_sales','$drug_id',$quantities,$subtotal,'$date')";
        $input_to_sale_d = mysqli_query($con,$sql2);

        $table_stock_upt = "UPDATE stock SET 
                            stock = $stock,
                            date_modified = '$date'
                            where drug_id = $drug_id
                            ";
        $upt_stock = mysqli_query($con,$table_stock_upt);
    } else {
        $msg = "Not Available";
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
            <h2>
                <?php
                    if ($data_s['stock'] > 0){
                        echo "Data Saved";
                    } else {
                        echo $msg;
                    }
                ?>
            </h2>
        </div>
            <a href='dashboard.php'>
                <div class='button'>
                    BACK TO HOME
                </div>
            </a>
            <a href='sales_report.php'>
                <div class='button'>
                    SHOW LIST
                </div>
            </a>
            <a href="input_sales_data.php">
                <div class='button'>
                    INPUT AGAIN
                </div>
            </a>
        </div>
    </div>
</body>
</html>

