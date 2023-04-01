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
                    <a href="homepage.php" class="active">
                        <span class="las la-home la-2x"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="message1.php">
                        <span class="las la-user-circle la-2x"></span>
                        <span>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="books.php">
                        <span class="las la-book la-2x"></span>
                        <span>All Book List</span>
                    </a>
                </li>
                <li>
                    <a href="curr_books.php">
                        <span class="las la-calendar-day la-2x"></span>
                        <span>Issued Books</span>
                    </a>
                </li>
                <li>
                    <a href="recommend.php">
                        <span class="las la-calendar-day la-2x"></span>
                        <span>Book Recommendations</span>
                    </a>
                </li>
                <li>
                    <a href="contact.php">
                        <span class="las la-phone la-2x"></span>
                        <span>Contacts Us</span>
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
                <form class="" action="curr_books.php" method="post">
                    <div class="search-wrapper">
                        <label class="search-wrapper" for="Search"><b>Search:</b></label>
                        <div class="controls">
                            <input type="text" id="title" name="title" placeholder="Enter Book Name/Book Id." class="span8" required>
                            <button type="submit" name="submit" class="btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <br>
                <?php
                if (isset($_POST['submit'])) {
                    $s = $_POST['Name'];
                    $sql = "select * from userregistration.books ";
                } else
                    $sql = "select * from userregistration.books ";

                $result = $con->query($sql);
                $rowcount = mysqli_num_rows($result);

                if (!($rowcount))
                    echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                else {


                ?>
                    <table class="content-table" id="tables">
                        <thead>
                            <tr>
                                <th>Book id</th>
                                <th>Book name</th>
                                <th>Author</th>
                                <th>Publicaton</th>
                                <th>Department</th>
                                <th>Edition</th>
                                <th>Availability</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = $result->fetch_assoc()) {
                                $bookid = $row['bookid'];
                                $name = $row['Name'];
                                $author = $row['Author'];
                                $publi = $row['Publication'];
                                $dept = $row['Department'];
                                $edition = $row['Edition'];
                                $sts = $row['Status'];

                            ?>
                                <tr>
                                    <td><?php echo $bookid ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $author ?></td>
                                    <td><?php echo $publi ?></td>
                                    <td><?php echo $dept ?></td>
                                    <td><?php echo $edition ?></td>
                                    <td><?php echo $sts ?></td>



                                    <td>
                                        <center><a href="book_details.php?bookid=<?php echo $bookid; ?>" class="btn-primary1">Details</a>
                                            <?php
                                            if ($sts > 0)
                                                echo "<a href=\"issue_request.php?bookid=" . $bookid . "\" class=\"btn-primary1\">Issue</a>";
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
            </div>
    </div>
</body>

</html>