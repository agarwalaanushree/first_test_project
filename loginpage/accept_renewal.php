<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

$bookid = $_GET['id1'];
$enroll = $_GET['id2'];

$sql = "select Name from userdata where User_Id='$enroll'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$sql1 = "update record set Due_Date=date_add(Due_Date,interval 60 day),Renewals_left=0 where bookid='$bookid' and User_Id='$enroll'";

if ($con->query($sql1) === TRUE) {
    $sql3 = "delete from renew where bookid='$bookid' and User_Id='$enroll'";
    $result = $con->query($sql3);

    $sql5 = "insert into message (User_Id,Msg,Date,Time) values ('$rollno','Your request for renewal of BookId: $bookid  has been accepted',curdate(),curtime())";
    $result = $con->query($sql5);
    echo "<script type='text/javascript'>alert('Success')</script>";
    header("Refresh:0.01; url=renew_requests.php", true, 303);
} else {
    echo "<script type='text/javascript'>alert('Error')</script>";
    header("Refresh:0.01; url=renew_requests.php", true, 303);
}
