<?php  
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pharmacy</title>
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>   
    <nav>
        <h2 class='msg'>WELCOME <?=$_SESSION['username']?></h2>
        <a href="logout.php">
            <div class="button">
                Logout
            </div>
        </a>
    </nav>
    <div class="box">
            <div class="header">
        </div>
        <?php
            if($_SESSION['username'] == "admin") {
                echo '
                    <a href="input_Employee.php">
                    <div class="button">
                        Input Employee Data
                    </div>
                    </a>
                    <a href="Employee_list.php">
                        <div class="button">
                            Employee List
                        </div>
                    </a>
                    <a href="input_stock.php">
                        <div class="button">
                            Input Stock
                        </div>
                    </a>
                    <a href="show_stock.php">
                        <div class="button">
                            Show Stock
                        </div>
                    </a>
                    <a href="input_drug.php">
                        <div class="button">
                            Input Drug
                        </div>
                    </a>
                    <a href="drug_list.php">
                        <div class="button">
                            Drug List
                        </div>
                    </a>
                    <a href="input_sales_data.php">
                        <div class="button">
                            Input Sales Data
                        </div>
                    </a>
                    <a href="sales_report.php">
                        <div class="button">
                            Sales Report
                        </div> 
                    </a>              
                    ';
            } elseif ($_SESSION['username'] == "pharmacist") {
                echo '
                    <a href="input_stock.php">
                    <div class="button">
                        Input Stock
                    </div>
                    </a>
                    <a href="show_stock.php">
                        <div class="button">
                            Show Stock
                        </div>
                    </a>
                    </a>
                    <a href="input_drug.php">
                        <div class="button">
                            Input Drug
                        </div>
                    </a>
                    <a href="drug_list.php">
                        <div class="button">
                            Drug List
                        </div>
                    </a>
                    <a href="input_sales_data.php">
                        <div class="button">
                            Input Sales Data
                        </div>
                    </a>
                    <a href="sales_report.php">
                        <div class="button">
                            Sales Report
                        </div>
                    </a>
                ';
            } elseif ($_SESSION['username'] == "assistant"){
                echo '
                    <a href="input_sales_data.php">
                    <div class="button">
                        Input Sales Data
                    </div>
                    </a>
                    <a href="sales_report.php">
                        <div class="button">
                            Sales Report
                        </div>
                    </a>
                    <a href="drug_list.php">
                        <div class="button">
                            Drug List
                        </div>
                    </a>
                    ';
            }
        ?>
    </div>
</body>
</html>