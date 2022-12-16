<?php
$id   = $_GET['id'];

include "connection.php";
$sql = "SELECT * FROM employee WHERE employee_id = '$id'";
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
        <form action="save_employee_data.php" method="POST">
            <div class="Header">
                <h2>EDIT DATA</h2>
            </div>
            <div class="text-employee">Employee ID</div>
            <div class="input_text">
                <input type="text" name="employee_id" readonly value="<?= $td['employee_id']; ?>" style="background-color: lightgrey;">
            </div>
            <div class="text-employee">Name</div>
            <div class="input_text">
                <input type="text" name="name" required value="<?= $td['name']; ?>">
            </div>
            <div class="text-employee">Address</div>
            <div class="input_text">
                <input type="text" name="address" required value="<?= $td['address']; ?>">
            </div>
            <div class="text-employee">Roles</div>
            <div class="input_text">
                <select name="roles" id="roles" class="text-employee" required>
                    <option value="" selected disabled hidden>Select</option>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="phar_assist">Pharmacy assistant</option>
                    <option value="Phar_tech">Pharmacy technician</option>
                </select>
            </div>
            <button class="button" type="submit" value="UPDATE" name="input">
                UPDATE
            </button>
        </form>
        <a href="dashboard.php">
            <div class="button">
                BACK TO MENU
            </div>
        </a>
    </div>
</body>
</html>