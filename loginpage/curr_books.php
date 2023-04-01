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
    <link rel="stylesheet" href="theme.css">
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
                $enroll = $_SESSION['enroll'];
                if (isset($_POST['submit'])) {
                    $s = $_POST['name'];
                    $sql = "select * from record,books where User_Id = '$enroll' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and books.bookid = record.bookid and (record.bookid='$s' or Name like '%$s%')";
                } else
                    $sql = "select * from record,books where User_Id= '$enroll' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and books.bookid = record.bookid";

                $result = $con->query($sql);
                $rowcount = mysqli_num_rows($result);


                if (!($rowcount))
                    echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                else {


                ?>
                    <table class="content-table" id="tables">
                        <thead>
                            <tr>
                                <th>Book Id</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            while ($row = $result->fetch_assoc()) {
                                $bookid = $row['bookid'];
                                $name = $row['Name'];
                                $issuedate = $row['Date_of_Issue'];
                                $duedate = $row['Due_Date'];
                                $renewals = $row['Renewals_left'];

                            ?>

                                <tr>
                                    <td><?php echo $bookid ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $issuedate ?></td>
                                    <td><?php echo $duedate ?></td>
                                    <td>
                                        <center>
                                            <?php
                                            if ($renewals)
                                                echo "<a href=\"renew_request.php?id=" . $bookid . "\" class=\"btn btn-success\">Renew</a>";
                                            ?>
                                            <a href="return_request.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Return</a>
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