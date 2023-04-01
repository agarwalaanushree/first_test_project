<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="demo.css">
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
            <div class="container">
                <div class="title">Add Book</div>
                <div class="content">
                    <form action="bookadd.php" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Book Title</span>
                                <input type="text" name="name" placeholder="Enter book title" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Author</span>
                                <input type="text" name="author" placeholder="Enter author name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Publication</span>
                                <input type="text" name="publication" placeholder="Enter publication" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Department</span>
                                <input type="text" name="department" placeholder="Enter the department" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Edition</span>
                                <input type="text" name="edition" placeholder="Enter edition" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Availability</span>
                                <input type="text" name="status" placeholder="Enter number of books available" required>
                            </div>
                        </div>

                        <div class="button">
                            <input type="submit" name="submit" value="Add Book">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>