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
    <link rel="stylesheet" href="demo.css">
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
                <div class="title">Recommend a Book</div>
                <div class="content">
                    <form action="recommendation.php" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Book Title</span>
                                <input type="text" name="Name" placeholder="Enter book title" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" name="Description" placeholder="Enter description" required>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Submit Recommendation">
                        </div>
                    </form>
                </div>
            </div>
        </main>
</body>

</html>