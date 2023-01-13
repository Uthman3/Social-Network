<?php
session_start();
include "../connection.php";
include "../function.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        :root {
            --first-color: #1A73E8;
            --input-color: #808688;
            --border-color: #DADCE0;

            --body-font: 'Roboto', san-serif;
            --normal-font-size: 1rem;
            --small-font-sieze: .75rem;
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
        }

        h1 {
            margin: 0;
        }

        .l-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            width: 360px;
            padding: 4rem 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
        }

        .form_title {
            font-weight: 400;
            margin-bottom: 3rem;
        }

        .form_div {
            position: relative;
            height: 48px;
            margin-bottom: 1.5rem;
        }

        .form_input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-size: var(--normal-font-size);
            border: 1px solid var(--border-color);
            border-radius: .5rem;
            outline: none;
            padding: 1rem;
            background: none;
            z-index: 1;
        }

        .form_lable {
            position: absolute;
            left: 1rem;
            top: 1rem;
            padding: 0 .25rem;
            background: #fff;
            color: var(--input-color);
            font-size: var(--normal-font-size);
            transition: .3s;
        }

        .form_button {
            display: flex;
            margin-left: auto;
            padding: .75rem 2rem;
            outline: none;
            border: none;
            background-color: var(--first-color);
            color: #fff;
            font-size: var(--normal-font-size);
            border-radius: .5rem;
            cursor: pointer;
            transition: .3s;
        }

        .form_button:hover {
            box-shadow: 0 10px 36px rgba(0, 0, 0, .15);
        }

        .form_input:focus+.form_lable {
            top: -.5rem;
            left: .8rem;
            color: var(--first-color);
            font-size: var(--small-font-sieze);
            font-weight: 500;
            z-index: 10;
        }

        .form_input:not(:placeholder-shown).form_input:not(:focus)+.form_lable {
            top: -.5rem;
            left: .8rem;
            color: var(--first-color);
            font-size: var(--small-font-sieze);
            font-weight: 500;
            z-index: 10;

        }

        .form_input:focus {
            border: 2px solid var(--first-color);
        }
    </style>
</head>

<body>
    <div class="l-form">
        <form action="" class="form" method="post">
            <h1 class="form_title">Admin Login</h1>

            <div class="form_div">
                <input type="text" name="admin_email" class="form_input" placeholder=" ">
                <label for="" class="form_lable">Email</label>
            </div>

            <div class="form_div">
                <input type="password" name="admin_pass" class="form_input" placeholder=" ">
                <label for="" class="form_lable">Password</label>
            </div>
            <input type="submit" name="admin_login" class="form_button" value="Login">
        </form>

        <?php

        if (isset($_POST['admin_login'])) {
            $email = mysqli_real_escape_string($con, $_POST['admin_email']);
            $pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

            $get_admin = "select * from admin where admin_email='$email' AND admin_pass='$pass'";

            $run_admin = mysqli_query($con, $get_admin);
            $check_admin = mysqli_num_rows($run_admin);

            if ($check_admin == 0) {
        ?>
                <script>
                    alert("Email or Password incorrect");
                </script>
        <?php
            } else {
                $_SESSION['admin_email'] = $email;
                echo "
                <script>
                window.open('index.php?view_users', '_self')
                </script>
        ";
            }
        }
        ?>
    </div>

</body>

</html>