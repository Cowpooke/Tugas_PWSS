<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <div class="box">
        <?php 
            include "connection.php";
            $sql = "SELECT drug.drug_id,drug.name,quantities,subtotal,customer.customer_id,sale_date,sales.id_sales
                            FROM drug JOIN sales_detail ON
                            drug.drug_id = sales_detail.drug_id
                            JOIN sales ON
                            sales_detail.id_sales = sales.id_sales
                            JOIN customer ON
                            sales.customer_id = customer.customer_id";
            $result = mysqli_query($con, $sql);
        ?>
        <table>
            <thead>
                <tr>
                    <th> </th>
                    <th>Sales id</th>
                    <th>Name</th>
                    <th>Drug id</th>
                    <th>Drug name</th>
                    <th>Quantities</th>
                    <th>total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                while ($td = mysqli_fetch_assoc($result)) {
                    $c_id = $td['customer_id'];
                    $fetch_name = "SELECT name FROM customer where customer_id='$c_id'";
                    $fetch = mysqli_fetch_assoc(mysqli_query($con, $fetch_name));
                    $c_name = $fetch['name'];
                    echo "      <tr>
                                        <td>{$num}</td>
                                        <td>{$td['id_sales']}</td>
                                        <td>{$fetch['name']}</td>
                                        <td>{$td['drug_id']}</td>
                                        <td>{$td['name']}</td>
                                        <td>{$td['quantities']}</td>
                                        <td>{$td['subtotal']}</td>
                                        <td>{$td['sale_date']}</td>
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