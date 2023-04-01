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
                <form class="form-horizontal row-fluid" action="student.php" method="post">
                    <div class="control-group">
                        <label class="control-label" for="Search"><b>Search:</b></label>
                        <div class="controls">
                            <input type="text" id="title" name="title" placeholder="Enter Book Name/Book Id." class="span8" required>
                            <button type="submit" name="submit" class="btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <br>
                <?php
                if (isset($_POST['submit'])) {
                    $s = $_POST['name'];
                    $sql = "select * from userdata where (User_Id='$s' or Name like '%$s%') and User_Id<>'ADMIN'";
                } else
                    $sql = "select * from userdata where User_Id<>'ADMIN'";

                $result = $con->query($sql);
                $rowcount = mysqli_num_rows($result);

                if (!($rowcount))
                    echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                else {


                ?>
                    <table class="content-table" id="tables">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User_Id</th>
                                <th>Email id</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {

                                $email = $row['Email Id'];
                                $name = $row['Name'];
                                $enroll = $row['User_Id'];
                            ?>
                                <tr>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $enroll ?></td>
                                    <td><?php echo $email ?></td>
                                    <td>
                                        <center>
                                            <a href="student_details.php?id=<?php echo $enroll; ?>" class="btn-primary">Details</a>
                                            <a href="remove_student.php?id=<?php echo $enroll; ?>" class="btn-primary">Remove</a>
                                        </center>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
            </div>

        </main>
    </div>
</body>

</html>