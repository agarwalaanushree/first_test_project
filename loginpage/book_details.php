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
            <div class="container">
                <div class="">

                    <div class="">
                        <div class="">
                            <h3>Book Details</h3>
                            <br>
                        </div>
                        <div class="">
                            <?php
                            $x = $_GET['bookid'];
                            $sql = "select * from books where bookid='$x'";
                            $result = $con->query($sql);
                            $row = $result->fetch_assoc();

                            $bookid = $row['bookid'];
                            $name = $row['Name'];
                            $publi = $row['Publication'];
                            $year = $row['Edition'];
                            $avail = $row['Status'];
                            $author = $row['Author'];
                            echo "<b>Book ID:</b> " . $bookid . "<br><br>";
                            echo "<b>Book Name:</b> " . $name . "<br><br>";
                            echo "<b>Author:</b> " . $author . "<br><br>";
                            echo "<b>Publication:</b> " . $publi . "<br><br>";
                            echo "<b>Edition:</b> " . $year . "<br><br>";
                            echo "<b>Availability:</b> " . $avail . "<br><br>";
                            ?>

                            <a href="books.php" class="btn-primary">Go Back</a>
                        </div>
                    </div>
                </div>
        </main>
</body>

</html>