<?php
    ob_start();
    include 'connection.php';
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/login-style.css">
    <title>Pharmacy : Login </title>
</head>

<body>
    <div class="box">
        <div class="header">
            <h2>LOGIN</h2>
        </div>
        <div class="fail-login">
            <?php
            if (isset($_POST['submit'])) {
                $user = $_POST['username'];
                $password = md5($_POST['password']);

                $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
                $result = mysqli_query($con, $sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: dashboard.php");
                } else {
                    echo "invalid password or username";
                }
            }
            ?>
        </div>
        <form action="" method="POST">
            <div class="input-text-outer">
                <input type="text" class="input-text" name="username" placeholder="Username" required>
            </div>
            <div class="input-text-outer">
                <input type="password" class="input-text" name="password" placeholder="Password" required>
            </div>
            <button class="button-submit" type="submit" name="submit" value="submit">
                SIGN IN
            </button>
        </form>
    </div>
</body>

</html>