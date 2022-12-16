<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="box">
        <?php
            include "connection.php";
            $sql = "SELECT drug.drug_id,drug.name,date_modified,stock
                            FROM drug JOIN stock ON
                            drug.drug_id = stock.drug_id
                            ";
            $result = mysqli_query($con, $sql);
        ?>
        <table>
            <thead>
                <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Date Modified</th>
                    <th>option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                while ($td = mysqli_fetch_assoc($result)) {
                    echo "      <tr>
                                        <td>{$num}</td>
                                        <td>{$td['drug_id']}</td>
                                        <td>{$td['name']}</td>
                                        <td>{$td['stock']}</td>
                                        <td>{$td['date_modified']}</td>
                                        <td>";
                    if ($_SESSION['username'] == "admin") {
                        echo "<a class='link-black' href='edit_stock.php?id={$td['drug_id']}'>Edit</a>";
                    } elseif ($_SESSION['username'] == "pharmacist") {
                        echo "<a class='link-black' href='edit_stock.php?id={$td['drug_id']}'>Edit</a>";
                    } elseif ($_SESSION['username'] == "assistant") {
                    }
                    echo            "</td>
                                    </tr>";
                    $num++;
                }

                ?>
            </tbody>
        </table>
        <div>
            <a class="button" href="dashboard.php">back</a>
        </div>
    </div>
</body>
</html>