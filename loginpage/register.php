<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="theme1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="registration.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">User_Id</span>
                        <input type="text" name="enroll" placeholder="Enter your user id" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="name" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Branch</span>
                        <input type="text" name="branch" placeholder="Enter your branch" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Course</span>
                        <input type="text" name="course" placeholder="Enter your course" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Phone_Number</span>
                        <input type="text" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Email Id</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="confirmpassword" placeholder="Confirm your password" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>

</body>

</html>