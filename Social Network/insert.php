<?php
include "connection.php";

if (isset($_POST['sign_up'])) {
    $name = mysqli_real_escape_string($con, $_POST["u_name"]);
    $password = mysqli_real_escape_string($con, $_POST["u_pass"]);
    $email = mysqli_real_escape_string($con, $_POST["u_email"]);
    $country = mysqli_real_escape_string($con, $_POST["u_country"]);
    $gender = mysqli_real_escape_string($con, $_POST["u_gender"]);
    $birthday = mysqli_real_escape_string($con, $_POST["u_date"]);
    $u_image = mysqli_real_escape_string($con, $_POST["u_image"]);
    $date = date('h:i:s', time());
    $status = "unverified";
    $posts = "no";
    $ver_code = mt_rand();

    if (strlen($password) < 8) {

        echo "<script>alert('min 8 Charactar')</script>";
        exit();
    }

    $check_email = "select * from users where user_email='$email'";
    $run_email = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "<script>alert('Email Already Please Try Another email')</script>";
        exit();
    }

    $insert = "insert into users (user_name,user_pass,user_email,user_conutry,user_gender,user_birthday,user_image,user_last_login,user_reg_date,status,ver_code,posts) values ('$name','$password','$email','$country','$gender','$birthday','$u_image','$date',NOW(),'$status','$ver_code','$posts')";

    $query = mysqli_query($con, $insert);

    if ($query) {
        echo "<h3 style='width:400px';> Hi, $name congration, Registration is almost complete Please check your email for final verification</h3>";
    } else {
        echo "failed";
    }
}
