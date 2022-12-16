<?php
$id   = $_GET['id'];

include "connection.php";
$sql = "SELECT * FROM stock WHERE drug_id = '$id'";
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
        <form action="save_stock.php" method="POST">
            <div class="Header">
                <h2>EDIT STOCK</h2>
            </div>
            <div class="text">Drug ID</div>
            <div class="input_text">
                <input type="text" name="drug_id" readonly value="<?= $td['drug_id'] ?>">
            </div>
            <div class="text">Stock</div>
            <div class="input_text">
                <input type="text" name="stock" required value="<?= $td['stock'] ?>">
            </div>
            <button class="button" type="submit" value="update" name="input">
                UPDATE
            </button>
        </form>
        <a href="show_stock.php">
            <div class="button">
                BACK TO LIST
            </div>
        </a>
    </div>
</body>

</html>