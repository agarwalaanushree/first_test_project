<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="theme1.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="las la-book-reader la-2x"></span>
                <span>LMS</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="homepage1.php" class="active">
                        <span class="las la-home la-2x"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="message.php">
                        <span class="las la-user-circle la-2x"></span>
                        <span>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="student.php">
                        <span class="las la-book la-2x"></span>
                        <span>Manage Students</span>
                    </a>
                </li>
                <li>
                    <a href="booklist.php">
                        <span class="las la-book-reader la-2x"></span>
                        <span>All Books List</span>
                    </a>
                </li>
                <li>
                    <a href="addbook.php">
                        <span class="las la-calendar-day la-2x"></span>
                        <span>Add Book</span>
                    </a>
                </li>
                <li>
                    <a href="requests_page.php">
                        <span class="las la-list-ul la-2x"></span>
                        <span>Issue/Return Requests</span>
                    </a>
                </li>
                <li>
                    <a href="recommend1.php">
                        <span class="las la-pen-fancy la-2x"></span>
                        <span>Book Recommendations</span>
                    </a>
                </li>
                <li>
                    <a href="issued_books.php">
                        <span class="las la-phone la-2x"></span>
                        <span>Currently Issued Books</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="las la-sign-out-alt la-2x"></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <main>
            <div class="">
                <form class="form-horizontal row-fluid" action="issued_books.php" method="post">
                    <div class="control-group">
                        <label class="control-label" for="Search"><b>Search:</b></label>
                        <div class="controls">
                            <input type="text" id="title" name="title" placeholder="Enter Book Id." class="span8" required>
                            <button type="submit" name="submit" class="btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <br>
                <?php
                if (isset($_POST['submit'])) {
                    $s = $_POST['Name'];
                    $sql = "select record.bookid,User_Id,Name,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from record,books where (Date_of_Issue is NOT NULL and Date_of_Return is NULL and books.bookid = record.bookid) and (User_Id='$s' or record.bookid='$s' or Name like '%$s%')";
                } else
                    $sql = "select record.bookid,User_Id,Name,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from record,books where Date_of_Issue is NOT NULL and Date_of_Return is NULL and books.bookid = record.bookid";
                $result = $con->query($sql);
                $rowcount = mysqli_num_rows($result);

                if (!($rowcount))
                    echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                else {


                ?>
                    <table class="content-table" id="tables">
                        <thead>
                            <tr>
                                <th>User_Id</th>
                                <th>Book id</th>
                                <th>Book name</th>
                                <th>Issue Date</th>
                                <th>Due date</th>
                                <th>Dues</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php



                            //$result=$conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $enroll = $row['User_Id'];
                                $bookid = $row['bookid'];
                                $name = $row['Name'];
                                $issuedate = $row['Date_of_Issue'];
                                $duedate = $row['Due_Date'];
                                $dues = $row['x'];

                            ?>

                                <tr>
                                    <td><?php echo $enroll; ?></td>
                                    <td><?php echo $bookid ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $issuedate ?></td>
                                    <td><?php echo $duedate ?></td>
                                    <td><?php if ($dues > 0)
                                            echo "<font color='red'>" . $dues . "</font>";
                                        else
                                            echo "<font color='green'>0</font>";
                                        ?>
                                </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
            </div>
        </main>
</body>

</html>