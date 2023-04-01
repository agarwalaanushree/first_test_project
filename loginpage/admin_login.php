<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <div class="container">
        <div class="myform">
            <h2>ADMIN LOGIN</h2>
            <form action="admin.php" method="post">
                <input type="integer" name="id" class="form-control" placeholder="Admin Id" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="image">
            <img src="images/image.jpeg">
        </div>
    </div>

</body>

</html>