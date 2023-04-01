<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

$bookid = $_GET['id1'];
$enroll = $_GET['id2'];
$dues = $_GET['id3'];

$sql = "select Name from userdata where User_Id='$enroll'";
$result = $con->query($sql);
$row = $result->fetch_assoc();




$sql1 = "update record set Date_of_Return=curdate(),Dues='$dues' where bookid='$bookid' and User_Id='$enroll'";

if ($con->query($sql1) === TRUE) {
    $sql3 = "update books set Status=Status+1 where bookid='$bookid'";
    $result = $con->query($sql3);
    $sql4 = "delete from return1 where bookid='$bookid' and User_Id='$enroll'";
    $result = $con->query($sql4);
    $sql6 = "delete from renew where bookid='$bookid' and User_Id='$enroll'";
    $result = $con->query($sql6);
    $sql5 = "insert into message (User_Id,Msg,Date,Time) values ('$enroll','Your request for return of bookid: $bookid  has been accepted',curdate(),curtime())";
    $result = $con->query($sql5);
    echo "<script type='text/javascript'>alert('Success')</script>";
    header("Refresh:0.01; url=return_requests.php", true, 303);
} else {
    echo "<script type='text/javascript'>alert('Error')</script>";
    header("Refresh:1; url=return_requests.php", true, 303);
}
