<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

if (isset($_POST['submit'])) {
    $title = $_POST['Name'];
    $Description = $_POST['Description'];
    $enroll = $_SESSION['enroll'];

    $sql1 = "insert into recommendations (Name,Description,User_Id) values ('$title','$Description','$enroll')";



    if ($con->query($sql1) === TRUE) {


        echo "<script type='text/javascript'>alert('Success')</script>";
    } else { //echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
    }
}
