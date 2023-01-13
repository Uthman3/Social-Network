<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook</title>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png">

</head>

<body>

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

    </div>
    <!-- Header wrapper ends here -->

    <div class="con">
      <div class="title">Registration</div>
      <div class="content">
        <form action="#" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" name="u_name" placeholder="Enter your name" required>
            </div>

            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" name="u_email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
              <span class="details">Country</span>
              <input type="text" name="u_country" placeholder="Enter your number" required>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" name="u_pass" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
              <span class="details">Date of Birth</span>
              <input type="date" name="u_date" require placeholder="Enter a DateOfBirth">
            </div>
            <div class="input-box">
              <span class="details">Photo</span>
              <input type="file" name="u_image" placeholder="Enter your Email" required style="padding: 10px;">
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="u_gender" id="dot-1">
            <input type="radio" name="u_gender" id="dot-2">
            <input type="radio" name="u_gender" id="dot-3">
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Prefer not to say</span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" name="sign_up" value="Register">
          </div>
        </form>
      </div>
    </div>
    <?php include "insert.php" ?>
    <?php include "login.php" ?>

  </div>
  <!-- <div id="footer">
            <h2>&copy; usmanzai.com</h2>
        </div>
    </div> -->


  <!-- content area end -->

</body>

</html>