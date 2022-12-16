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
            $sql = "SELECT * FROM drug ";
            $result = mysqli_query($con,$sql);
        ?>
        <table>
            <thead>
                <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $num = 1;
                while ($td = mysqli_fetch_assoc($result)){
                    echo "      <tr>
                                    <td>{$num}</td>
                                    <td>{$td['drug_id']}</td>
                                    <td>{$td['name']}</td>
                                    <td>{$td['price']}</td>
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