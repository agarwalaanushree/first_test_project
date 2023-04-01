<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

if (isset($_POST['submit'])) {
    $enroll = $_POST['enroll'];
    $message = $_POST['Message'];

    $sql1 = "insert into message (User_Id,Msg,Date,Time) values ('$enroll','$message',curdate(),curtime())";

    if ($con->query($sql1) === TRUE) {
        echo "<script type='text/javascript'>alert('Success')</script>";
    } else { //echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
    }
}
