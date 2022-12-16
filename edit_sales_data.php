<?php
$id = $_GET['id'];

include "connection.php";
$sql = "SELECT * FROM sales_detail WHERE id_sales = '$id'";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("fail");
}
$td = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <div class="box">
        <form action="save_sales_data.php" method="POST">
            <div class="Header">
                <h2>INPUT DATA</h2>
            </div>
            <div class="input_text">
                <input type="text" name="id_sales" hidden>
            </div>
            <div class="input_text">
                <input type="text" name="cust_id" hidden>
            </div>
            <div class="text">Customer Name</div>
            <div class="input_text">
                <input type="text" name="name" required>
            </div>
            <div class="text">Phone</div>
            <div class="input_text">
                <input type="text" name="phone" required>
            </div>
            <div class="text">drug_id</div>
            <div class="input_text">
                <input type="text" name="drug_id" required>
            </div>
            <div class="text">Quantities</div>
            <div class="input_text">
                <input type="text" name="quantities" required>
            </div>
            <button type="submit" name="input" value="input">
                <div class="button-submit">
                    SUBMIT
                </div>
            </button>
        </form>
        <a onclick="history.back()">
            <div class="button">
                BACK TO MENU
            </div>
        </a>
    </div>
</body>

</html>