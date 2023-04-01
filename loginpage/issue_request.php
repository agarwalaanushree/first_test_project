<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

$bookid = $_GET['bookid'];

$enroll = $_SESSION['enroll'];
echo $bookid . '--' . $enroll;

$sql11 = "select count(id) as che from record where bookid='$bookid' and User_Id='$enroll' and Dues = 0";
$res = $con->query($sql11);
$f = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $f = $row["che"];
}
if ($f == 0) {
    $sql = "insert into record (User_Id,bookid,Time) values('$enroll','$bookid',curtime())";

    if ($con->query($sql) == TRUE) {
        echo 'Request Sent to Admin.';
        header("Refresh:0.01; url=books.php", true, 303);
    } else {
        echo 'Request Already Sent';
        header("Refresh:0.01; url=books.php", true, 303);
    }
} else {
    echo "cannot be issued";
}
