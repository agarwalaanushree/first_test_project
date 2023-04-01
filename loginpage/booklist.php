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
            <h2>List of Books</h2>
            <?php
            $res = mysqli_query($con, "SELECT * FROM `books`;");
            echo "<table class='content-table'>";
            echo "<tr style='background-color:white;'>";
            echo "<th>";
            echo "ID";
            echo "</th>";
            echo "<th>";
            echo "Book-Name";
            echo "</th>";
            echo "<th>";
            echo "Author";
            echo "</th>";
            echo "<th>";
            echo "Publication";
            echo "</th>";
            echo "<th>";
            echo "Department";
            echo "</th>";
            echo "<th>";
            echo "Edition";
            echo "</th>";
            echo "<th>";
            echo "Availability";
            echo "</th>";
            echo "</tr>";


            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>";
                echo $row['bookid'];
                echo "</td>";
                echo "<td>";
                echo $row['Name'];
                echo "</td>";
                echo "<td>";
                echo $row['Author'];
                echo "</td>";
                echo "<td>";
                echo $row['Publication'];
                echo "</td>";
                echo "<td>";
                echo $row['Department'];
                echo "</td>";
                echo "<td>";
                echo $row['Edition'];
                echo "</td>";
                echo "<td>";
                echo $row['Status'];
                echo "</td>";
                echo "<td>";



                echo "</tr>";
            }



            echo "</table>";




            ?>
        </main>
    </div>
</body>

</html>