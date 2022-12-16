<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <div class="box">
        <form action="save_stock.php" method="POST">
            <div class="Header">
                <h2>INPUT STOCK</h2>
            </div>
            <div class="text">Drug ID</div>
            <div class="input_text">
                <input type="text" name="drug_id" required>
            </div>
            <div class="text">Stock</div>
            <div class="input_text">
                <input type="text" name="stock" required>
            </div>
            <button class="button" type="submit" value="SUBMIT" name="input">
                SUBMIT
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