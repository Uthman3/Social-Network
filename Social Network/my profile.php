<?php
session_start();
include "connection.php";
include "function.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@300&family=Poppins&family=Ubuntu&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }





        a {
            text-decoration: none;
            color: #fff;
            font-size: 15px;

        }



        .header {
            padding: 0 4.8rem;
            height: 6rem;
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
            background-color: #e7f5ff;
            position: fixed;
            z-index: 999;
            width: 100%;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;

        }

        .header.sticky {
            background-color: #e7f5ff;

        }

        .header .logo {
            height: 5px;
            margin-right: 20px;

        }

        .logo h2 a {
            color: #1662a1;

        }

        .navbar-list {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        .navbar-link:link,
        .navbar-link:visited {
            display: inline-block;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s;
            color: #1662a1;

        }

        li {
            margin-top: 14px;
            color: #1662a1;
            font-size: 18px;
        }

        li a {
            color: #1662a1;
            font-size: 18px;
            font-weight: 1000;

        }

        .navbar-link:hover,
        .navbar-link:active {
            color: #364fc7;
        }

        #profile {
            display: none;
        }

        .mobile-navbar-btn {
            display: none;
            background: transparent;
            cursor: pointer;
        }


        .mobile-nav-icon {
            margin-left: 200px;
            width: 4rem;
            height: 4rem;
            color: #212529;
        }

        .mobile-nav-icon[name="close-outline"] {
            display: none;
        }


        .user_timeline {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            height: 100vh;
            position: absolute;
            top: 90px;
            left: 45px;
        }

        #user_mention {
            background: #1877F2;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border: 2px solid rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 20px;
            width: 230px;
            margin: 0 auto;
            padding: 8px;
            color: #fff;

        }

        #user_mention img {
            margin-left: 50px;
            border: 2px solid;
            border-radius: 50%;
            object-fit: cover;
            width: 100px;
            height: 100px;
        }

        #user_mention h3 {

            padding: 10px 9px;

        }






        .content_timelime {
            position: absolute;
            left: 400px;
            top: 100px;
        }

        form {
            padding: 10px 0px;
            margin: 0px -2px;
        }

        li {
            margin-top: 12px;
        }

        .content_timelime input {
            padding: 6px 20px;
            margin: 1px 1px;
        }

        .content_timelime td {
            font-size: 20px;
        }

        .title {
            padding: 10px 10px;
            border-radius: 50px;
            font-size: 14px;
            margin: 0 -6px;
        }

        .content {
            padding: 10px 20px;
            margin: 10px -5px;
            resize: none;
            border-radius: 40px;
            font-size: 14px;

        }

        .topic {
            padding: 10px 10px;
            border-radius: 50px;
            margin: 3px 6px;
            font-size: 14px;

        }

        .image {
            border: 1px solid;
            padding: 10px 10px;
            margin: 5px 3px;
            border-radius: 50px;
            font-size: 14px;
        }

        .post {
            padding: 10px;
            background: #1877F2;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }


        .box {
            width: 100%;
            min-height: 100vh;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0px 90px;
        }

        .content-section {
            /* display: flex; */
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content-section .card {
            padding: 10px 10px;
            flex: 1;
            margin: 20px 20px;
            box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.7);
            border-radius: 5px;

        }

        .content-section .card img {
            padding: 10px 10px;
            width: 70%;
            height: auto;

        }

        .content-section .card h2 {
            margin: 15px 0px;
            font-size: 28px;
            color: #1662a1;
            font-family: sans-serif;
        }

        .content-section .card p {
            font-size: 16px;
            line-height: 1.5;
            padding: 0 10px;
            margin-bottom: 20px;
            font-family: sans-serif;
        }

        #pro {
            width: 50px;
            height: auto;
            margin-left: 117px;
            margin-bottom: 3px;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }

        .content-section .card h3 {
            margin-top: -33px;
            font-family: sans-serif;
        }

        .content-section .card a {
            display: flex;
            padding: 9px 11px;

            margin-left: 317px;


            color: #464545;

            text-decoration: none;
            font-size: 14px;
            outline: none;
        }

        .content-section .card a:hover {
            transition: all .3s ease;
            box-shadow: 0px 2px 5px 0px rgba(49, 49, 49, 0.7);
            border-radius: 3px;
        }

        #reply textarea {
            resize: none;
            border-radius: 50px;
            display: block;
            padding-left: 12px;
            padding-top: 5px;
            margin: 0px 23px;
        }

        .update {
            padding: 10px 10px;
            background: #1662a1;
            color: #fff;
            border-radius: 3px;
            margin-left: 300px;
            border: 1px solid #1877F2;

        }

        #comments {
            padding: 10px 10px;
            margin-left: 19px;
            display: inline-table;
            font-size: 13px;
            box-shadow: 0px 2px 5px 0px rgba(49, 49, 49, 0.7);

        }

        #comments h4 {
            padding: 5px 10px;
        }

        #pr {
            width: 18px;
            height: auto;
            position: relative;
            top: 23px;
            right: 43px;
            border-radius: 50px;
        }

        #content_timeline {
            position: absolute;
            left: 400px;
            top: 100px;
        }

        input {
            padding: 6px 26px;
            margin: 4px;
            font-size: 15px;
        }

        @media(max-width:690px) {
            .user_timeline {
                display: none;

            }

            #content_timelime {
                left: 63px;
            }

            .menu ul li {
                display: none;
            }

            #profile {
                display: block;
            }

            .mobile-navbar-btn {
                display: block;
                z-index: 999;
                /* border: 3px solid #212529; */
                /* color: #212529; */
            }

            .header {
                /* position: relative; */
            }

            .header .logo {
                width: 40%;
            }

            .navbar {
                /* display: none; */
                width: 100%;
                height: 100vh;
                background: #e7f5ff;
                position: absolute;
                top: 0;
                left: 0;

                display: flex;
                justify-content: center;
                align-items: center;

                /* to get the tranisition  */
                transform: translateX(100%);
                transition: all 0.5s linear;

                opacity: 0;
                visibility: hidden;
                pointer-events: none;
            }

            .navbar-list {
                flex-direction: column;
                align-items: center;
            }

            .active .navbar {
                transform: translateX(0);
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
            }

            .active .mobile-navbar-btn .mobile-nav-icon[name="close-outline"] {
                display: block;
            }

            .active .mobile-navbar-btn .mobile-nav-icon[name="menu-outline"] {
                display: none;
            }

        }

        @media screen and (max-width:768px) {
            .content-section {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <h2><a href="index.php">Facebook 2.0</a></h2>
        </div>
        <nav class="navbar">
            <ul class="navbar-list">

                <li><a class="navbar-link" href="members.php">Member</a></li>
                <li><strong>Topic : </strong>

                    <?php
                    $get_topics = "select * from topics";
                    $run_topics = mysqli_query($con, $get_topics);

                    while ($row = mysqli_fetch_array($run_topics)) {

                        $topic_id = $row['topic_id'];
                        $topic_user = $row['topic_user'];
                        echo "<li><a href='topic.php?topic=$topic_id'>$topic_user</a></li>";
                    }
                    ?>
                </li>
                <!-- <li><a class="navbar-link" href="#">PHP</a></li>
                    <li><a class="navbar-link" href="#">MYSQL</a></li>
                    <li><a class="navbar-link" href="#">JavaScript</a></li>
                    <li><a class="navbar-link" href="#">JQUERY</a></li>
                    <li><a class="navbar-link" href="#">Python</a></li> -->
                <li>
                    <a class="navbar-link" id="profile" href="profile.php" target="_blank">Profile</a>
                </li>

            </ul>
        </nav>

        <div class="mobile-navbar-btn">
            <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
            <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
        </div>
    </header>


    <div class="user_timeline">
        <div class="user_details">
            <?php
            $user = $_SESSION['user_email'];
            $get_user = "select * from users where user_email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_pass = $row['user_pass'];
            $user_email = $row['user_email'];
            $user_gender = $row['user_gender'];
            $user_country = $row['user_conutry'];
            $user_image = $row['user_image'];
            $register_date = $row['user_reg_date'];
            $last_login = $row['user_last_login'];

            $user_posts = "select * from posts where user_id='$user_id'";
            $run_posts = mysqli_query($con, $user_posts);
            $posts = mysqli_num_rows($run_posts);

            // getting the number unread message
            $sel_msg = "select * from  messages where receiver='$user_id' AND status='unread' ORDER by 1 DESC";
            $run_msg = mysqli_query($con, $sel_msg);
            $count_msg = mysqli_num_rows($run_msg);

            echo "


                <div id='user_mention'>
              
                <img src=
                '../image/$user_image'/>
               
                 <h3>Name:<strong>$user_name</strong> </h3>    
                 <h3>Country:<strong>$user_country</strong> </h3>    
                 <h3>last_login:<strong>$last_login</strong> </h3>    
                 <h3>Member Since:<strong>$register_date</strong> </h3>    
                 <h3><a href='my messages.php?inbox&u_id=$user_id '>Message : <strong> ($count_msg) </strong></h3></a>
                 <h3> <a href='myposts.php?u_id=$user_id'>My Post :<strong> ($posts) </strong></h3></a>
                 <h3><a href='my profile.php?u_id=$user_id'>Edit My Account </a></h3>
                 <h3><a href='content.php'>Logout</a></h3>  

               

                </div> 
                ";
            ?>

        </div>
    </div>
    <!-- User timeline ende here -->
    <div id="content_timeline">
        <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
            <table>
                <tr align="center">
                    <td colspan="6">
                        <h2>Edit Your Profile</h2>
                    </td>
                </tr>
                <tr>
                    <td align="right">Name:</td>
                    <td><input type="text" name="u_name" require="required" value="<?php echo $user_name ?>"></td>
                </tr>

                <tr>
                    <td align="right">Password:</td>
                    <td><input type="password" name="u_pass" require="required" value="<?php echo $user_pass ?>"></td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td><input type="email" name="u_email" require="required" value="<?php echo $user_email ?>"></td>
                </tr>
                <tr>
                    <td align="right">Country:</td>
                    <td><select name="u_country" id="" style="margin-left: 11px;">
                            <option> <?php echo $user_country ?></option>
                            <option>Afghasistan</option>
                            <option>India</option>
                            <option>Pakistan</option>
                            <option>United States</option>
                            <option>United Arab</option>


                        </select></td>
                </tr>
                <tr>
                    <td align="right">Gender:</td>
                    <td><input type="gender" name="u_gender" require="required" value="<?php echo $user_gender ?>"></td>
                </tr>

                <tr>
                    <td align="right">Photo:</td>
                    <td><input type="file" name="u_image" require="required" value="<img src='image/<?php $user_image ?>' alt='<?php $user_name ?>'>"> </td>

                </tr>

                <tr align="center">
                    <td colspan="6">
                        <input type="submit" class="update" name="update" require="required" value="Update">
                    </td>

                </tr>
            </table>

        </form>
        <?php
        if (isset($_POST['update'])) {
            $u_name = $_POST['u_name'];
            $u_pass = $_POST['u_pass'];
            $u_email = $_POST['u_email'];
            $u_country = $_POST['u_country'];
            $u_gender = $_POST['u_gender'];
            $u_image = $_FILES['u_image']['name'];
            $image_tmp = $_FILES['u_image']['tmp_name'];


            move_uploaded_file($image_tmp, "image/$u_image");
            $update = "update users set user_name='$u_name', user_pass='$u_pass',user_email='$u_email',user_conutry='$u_country',
     user_gender='$u_gender',user_image='$u_image' where user_id='$user_id'";

            $run = mysqli_query($con, $update);

            if ($run) {
        ?>
                <script>
                    alert("Your Profile is Update")
                    window.open("index.php", "_self")
                </script>

        <?php
            }
        }
        ?>

    </div>

    <!-- Content timeline ends -->
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector(".header");
            header.classList.toggle("sticky", window.scrollY > 0)
        })

        const mobile_nav = document.querySelector(".mobile-navbar-btn");
        const nav_header = document.querySelector(".header");

        const toggleNavbar = () => {
            // alert("Plz Subscribe ");
            nav_header.classList.toggle("active");
        };

        mobile_nav.addEventListener("click", () => toggleNavbar());
    </script>
</body>

</html>