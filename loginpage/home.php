<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <section id="banner">
        <div class="banner-text">
            <h1>Library Management System</h1>
            <div class="banner-btn">
                <a href="admin_login.php" class="bn3637 bn37">ADMIN LOGIN</a>
                <a href="user_login.php" class="bn3637 bn37">USER LOGIN</a>
            </div>
        </div>
    </section>

</body>

</html>