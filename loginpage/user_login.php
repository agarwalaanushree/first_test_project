<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Panel</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <div class="container">
        <div class="myform">

            <h2>USER LOGIN</h2>
            <form action="validation.php" method="post">
                <input type="text" name="enroll" class="form-control" placeholder="User Id" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn btn-primary">Login</button>
                <button onclick="location.href='register.php'" type="button">REGISTER NOW</button>
            </form>
        </div>
        <div class="image">
            <img src="images/image.jpeg">
        </div>
    </div>

</body>

</html>