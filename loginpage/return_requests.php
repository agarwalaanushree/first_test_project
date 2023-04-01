<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregistration');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="theme1.css">
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
                <center>
                    <a href="issue_requests.php" class="button-33">Issue Requests</a>
                    <a href="renew_requests.php" class="button-33">Renew Request</a>
                    <a href="return_requests.php" class="button-33">Return Requests</a>
                </center>
                <h1><i>Return Requests</i></h1>
                <table class="content-table" id="tables">
                    <thead>
                        <tr>
                            <th>User_Id</th>
                            <th>Book Id</th>
                            <th>Book Name</th>
                            <th>Dues</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select return1.bookid,return1.User_Id,Name,datediff(curdate(),Due_Date) as x from return1,books,record where return1.bookid=books.bookid and return1.bookid=record.bookid and return1.User_Id=record.User_Id";
                        $result = $con->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $bookid = $row['bookid'];
                            $enroll = $row['User_Id'];
                            $name = $row['Name'];
                            $dues = $row['x'];



                        ?>
                            <tr>
                                <td><?php echo $enroll; ?></td>
                                <td><?php echo $bookid ?></td>
                                <td><b><?php echo $name ?></b></td>
                                <td><?php
                                    if ($dues > 0)
                                        echo $dues;
                                    else
                                        echo 0; ?></td>
                                <td>
                                    <center>

                                        <a href="accept_return.php?id1=<?php echo $bookid; ?>&id2=<?php echo $enroll; ?>&id3=<?php echo $dues ?>" class="btn-primary1">Accept</a>

                                        <a href="reject_return.php?id1=<?php echo $bookid; ?>&id2=<?php echo $enroll; ?>" class="btn-primary1">Reject</a>
                                    </center>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
</body>

</html>