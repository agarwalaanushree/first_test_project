<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');


$bookid = $_GET['id1'];

$enroll = $_GET['id2'];

$sql = "delete from return1 where User_Id='$enroll' and bookid='$bookid'";

if ($con->query($sql) === TRUE) {
    $sql1 = "insert into message (User_Id,Msg,Date,Time) values ('$enroll','Your request for return of bookid: $bookid  has been rejected',curdate(),curtime())";
    $result = $con->query($sql1);
    echo "<script type='text/javascript'>alert('Success')</script>";
    header("Refresh:0.01; url=issue_requests.php", true, 303);
} else {
    echo "<script type='text/javascript'>alert('Error')</script>";
    header("Refresh:0.01; url=issue_requests.php", true, 303);
}
