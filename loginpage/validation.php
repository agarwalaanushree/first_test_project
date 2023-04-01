<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

$enroll = $_POST['enroll'];
$pass = $_POST['password'];


$s = "select * from userdata where User_Id='$enroll' and  Password='$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION["enroll"] = $enroll;
    header('location:homepage.php');
} else {
    header('location:user_login.php');
}
