<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png">
</head>

<body>
    <!-- Container starts from here -->
    <div class="container">
        <div id="header_wrapper">
            <!-- Header start here -->
            <div id="header">
                <img src="image/images.png" alt="">
                <form method="post" action="" id="form1">
                    <strong>Email:</strong>
                    <input type="email" name="email" placeholder="Email" require />
                    <strong>Password:</strong>
                    <input type="password" name="Password" placeholder="Password" require />
                    <button name="login">Login</button>
                </form>

            </div>
            <?php include "login.php" ?>
            <!-- Header end here -->

</body>

</html>