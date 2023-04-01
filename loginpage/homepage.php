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

        <header>
            <div class="search-wrapper">
                <span class="las la-search la-2x"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="social-icons">
                <span class="las la-bell la-2x"></span>
                <span class="las la-comment la-2x"></span>
                <div></div>
            </div>
        </header>

        <main>

            <h2 class="dash-title">Overview</h2>

            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="las la-book la-2x"></span>
                        <div>
                            <h5>Total Books Issue</h5>
                            <?php
                            $enroll = $_SESSION['enroll'];
                            $sql = "select count(bookid) as isBook from record where User_Id='$enroll' and Date_of_Issue!='0000-00-00' and Dues=0";
                            $res = $con->query($sql);
                            $row = mysqli_fetch_assoc($res);
                            echo '<h4>' . $row["isBook"] . '</h4>';
                            ?>
                        </div>
                    </div>
                    <!--  <div class="card-footer">
                        <a href="">View all</a>
                    </div> -->
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <span class="las la-check-square la-2x"></span>
                        <div>
                            <h5>Total Book Returned</h5>
                            <?php
                            $enroll = $_SESSION['enroll'];
                            $sql2 = "select count(bookid) as isReturn from record where User_Id='$enroll' and  Date_of_Return != '0000-00-00'";
                            $res2 = $con->query($sql2);
                            $row = mysqli_fetch_assoc($res2);
                            echo '<h4>' . $row["isReturn"] . '</h4>';
                            ?>
                        </div>
                    </div>
                    <!--  <div class="card-footer">
                        <a href="">View all</a>
                    </div> -->
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <span class="las la-stop la-2x"></span>
                        <div>
                            <h5>Total Books Not Returned</h5>
                            <?php
                            $enroll = $_SESSION['enroll'];
                            $sql1 = "select count(bookid) as notReturn from record where  User_Id='$enroll' and  Date_of_Issue!='0000-00-00' and Date_of_Return IS  NULL";
                            $res1 = $con->query($sql1);
                            $row = mysqli_fetch_assoc($res1);
                            echo '<h4>' . $row["notReturn"] . '</h4>';

                            ?>
                        </div>
                    </div>
                    <!--  <div class="card-footer">
                        <a href="">View all</a>
                    </div> -->
                </div>
                </section>

        </main>

    </div>

</body>

</html>