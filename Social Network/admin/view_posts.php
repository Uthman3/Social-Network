<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table class="content-table" id="table">
        <thead>
            <tr id="table">
                <th>Rank</th>
                <th>Title</th>
                <th>Name</th>
                <th>Date</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>

            </tr>
            <?php include "../connection.php";

            $sel_psot = "select * from posts ORDER by 1 DESC";
            $run_post = mysqli_query($con, $sel_psot);


            $i = 0;
            while ($row_post = mysqli_fetch_array($run_post)) {;
                $post_id = $row_post['posts_id'];
                $user_id = $row_post['user_id'];
                $post_title = $row_post['post_title'];
                $post_date = $row_post['post_date'];
                $post_image = $row_post['post_image'];


                $i++;
                $sel_users = "select * from users where user_id='$user_id'";
                $run_users = mysqli_query($con, $sel_users);

                $row_users = mysqli_fetch_array($run_users);

                $user_id = $row_users['user_id'];
                $user_name = $row_users['user_name'];

            ?>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $post_title ?></td>
                <td><?php echo $user_name ?></td>
                <td><?php echo $post_date ?></td>
                <td><img src="../image/<?php echo $post_image ?>" width="50" height="50" alt=""></td>
                <td><a href="index.php?view_posts&delete=<?php echo $post_id ?>">Delete</a></td>
                <td><a href="index.php?view_posts&edit=<?php echo $post_id ?>">Edit</a></td>

            </tr>
        <?php }
        ?>
        </tbody>
    </table>


    <?php
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        $sel_posts = "select * from posts where posts_id='$edit_id'";
        $run_posts = mysqli_query($con, $sel_posts);

        $row_posts = mysqli_fetch_array($run_posts);

        $post_new_id = $row_posts['posts_id'];
        $post_title = $row_posts['post_title'];
        $post_content = $row_posts['post_content'];
        $image = $row_posts['post_image'];


    ?>
        <center>
            <form id="f" action="" method="post" class="fff" enctype="multipart/form-data">
                <h2>Edit Your Post:</h2>
                <input type="text" name="title" value="<?php echo $post_title ?>" /><br>
                <textarea name="content" id="" cols="83" rows="4"><?php echo $post_content ?></textarea><br>
                <input type="file" name="image" class="image" src="<?php echo $image ?>" alt=""><br>
                <select name="topic" id="">
                    <option value="">Select Topic</option>
                    <?php getTopic() ?>
                </select>
                <input type="submit" name="update" class="update" value="Update Post">

            </form>
        <?php } ?>
        <?php
        if (isset($_POST['update'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $topic = $_POST['topic'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];


            move_uploaded_file($image_tmp, "image/$image");

            $update_post = "update posts set post_title='$title', post_content='$content', topic_id='$topic', post_image='$image' where posts_id='$post_new_id'";

            $run_update = mysqli_query($con, $update_post);

            if ($run_update) {
        ?>

                <script>
                    alert("Post has been Update");
                    window.open("index.php?view_posts", "_self");
                </script>
            <?php
            }
        }

        if (isset($_GET['delete'])) {
            $get_id = $_GET['delete'];

            $del = "delete from posts where posts_id='$get_id'";

            $run = mysqli_query($con, $del);
            ?>
            <script>
                alert("User has been delete");

                window.open("index.php?view_posts", "_self");
            </script>

        <?php
        }
        ?>




</body>

</html>