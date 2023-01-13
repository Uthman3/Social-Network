<?php
session_start();
include "../connection.php";
include "../function.php";

if (!isset($_SESSION['admin_email'])) {
    header("location:admin_login.php");
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="admin.css">
        <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png">
    </head>

    <body>
        <div class="container">
            <div class="navigation" id="change">
                <ul>


                    <li>
                        <a href="index.php">
                            <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                            <span class="title">Facebook 2.0</span>


                        </a>
                    </li>


                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>


                        </a>
                    </li>


                    <li>
                        <a href="index.php?view_users">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title">View Users</span>


                        </a>
                    </li>


                    <li>
                        <a href="index.php?view_posts">
                            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                            <span class="title">View Posts</span>

                        </a>
                    </li>


                    <li>
                        <a href="index.php?view_comments">
                            <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                            <span class="title">View Comments</span>

                        </a>
                    </li>

                    <li>
                        <a href="index.php?view_topics">
                            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                            <span class="title">View Topic</span>

                        </a>
                    </li>

                    <li>
                        <a href="index.php?add_topic">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <span class="title">Add New Topic</span>

                        </a>
                    </li>

                    <li>
                        <a href="admin_logout.php">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Sign out</span>

                        </a>
                    </li>
                    <button onclick="theme()" id="theme">Dark Mode</button>
                </ul>
                <div>
                </div>
            </div>

        </div>

        <div class="" id="content">
            <!-- <h2 style="color: blue;"><?php echo $_GET['welcome'] ?>: Manage Your Content</h2> -->

            <?php
            if (isset($_GET['view_users'])) {
                include("view_user.php");
            }
            if (isset($_GET['view_posts'])) {
                include("view_posts.php");
            }

            if (isset($_GET['view_comments'])) {
                include("view_comments.php");
            }


            if (isset($_GET['view_topics'])) {
                include("view_topics.php");
            }

            if (isset($_GET['add_topic'])) {
                include("add_topic.php");
            }
            ?>
        </div>
        <script src="script.js"></script>

    </body>

    </html>


<?php } ?>