<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

$id = $_GET['id'];

$enroll = $_SESSION['enroll'];

$sql = "insert into return1 (User_Id,bookid) values ('$enroll','$id')";

if ($con->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
    header("Refresh:0.01; url=curr_books.php", true, 303);
} else {
    echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header("Refresh:0.01; url=curr_books.php", true, 303);
}
