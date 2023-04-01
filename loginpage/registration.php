<?php

session_start();
header('location:user_login.php');

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

$enroll = $_POST['enroll'];
$name = $_POST['name'];
$branch = $_POST['branch'];
$Course = $_POST['course'];
$phone = $_POST['phone'];
$Email = $_POST['email'];
$pass = $_POST['password'];
$cpass = $_POST['confirmpassword'];

$s = "select * from userdata where User_Id='$enroll'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
    echo "User Id already exists";
} else {
    $reg = "insert into userdata values('$enroll','$name','$branch','$Course','$phone','$Email','$pass','$cpass')";
    mysqli_query($con, $reg);
    echo "Registration Successful";
}
