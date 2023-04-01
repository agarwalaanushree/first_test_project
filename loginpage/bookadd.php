
<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');
$su = $_POST['submit'];

if (isset($su)) {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $publi = $_POST['publication'];
    $dept = $_POST['department'];
    $edit = $_POST['edition'];
    $sts = $_POST['status'];

    $s = "select * from books where name='$name'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        echo "book already exist";
    } else {

        $sql1 = "insert into books values(NULL,'$name','$author','$publi','$dept','$edit','$sts')";
        mysqli_query($con, $sql1);
        echo "book added";
    }
}

?>
