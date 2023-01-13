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
    <table class="content-table">
        <thead>
            <tr id="table">
                <th>Rank</th>
                <th>Topic Name</th>
                <th>Delete</th>
                <th>Edit</th>


            </tr>
            <?php include "../connection.php";

            $sel_com = "select * from topics ORDER by 1 DESC";
            $run_com = mysqli_query($con, $sel_com);


            $i = 0;
            while ($row_topic = mysqli_fetch_array($run_com)) {;
                $id = $row_topic['topic_id'];
                $topic_name = $row_topic['topic_user'];

                $i++;


            ?>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $topic_name ?></td>
                <td><a href="index.php?view_topics&delete=<?php echo $id ?>">Delete</a></td>
                <td><a href="index.php?view_topics&edit=<?php echo $id ?>">Edit</a></td>

            </tr>
        <?php }
        ?>
        </tbody>
    </table>
    <?php
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        $sel_posts = "select * from topics where topic_id='$edit_id'";
        $run_posts = mysqli_query($con, $sel_posts);

        $row_posts = mysqli_fetch_array($run_posts);

        $topic_new_id = $row_posts['topic_id'];
        $topic_name = $row_posts['topic_user'];



    ?>
        <center>
            <form id="f" action="" class="tof" method="post">
                <h2>Edit Your Topic:</h2>
                <input type="text" name="title" value="<?php echo $topic_name ?>" /><br>

                <input type="submit" name="update" style="padding: 10px; margin:10px;background-color: #287bff; color:#fff ; border:none;font-size:18px" value="Update Topic">

            </form>
        </center>
    <?php } ?>

    <?php
    if (isset($_POST['update'])) {
        $title = $_POST['title'];




        $update_post = "update topics set topic_user='$title' where topic_id='$id'";

        $run_update = mysqli_query($con, $update_post);

        if ($run_update) {
    ?>

            <script>
                alert("Topic has been Update");
                window.open("index.php?view_topics", "_self");
            </script>
        <?php
        }
    }



    if (isset($_GET['delete'])) {
        $get_id = $_GET['delete'];

        $del = "delete from topics where topic_id='$get_id'";

        $run = mysqli_query($con, $del);
        ?>
        <script>
            alert("Comment has been delete");

            window.open("index.php?view_topics", "_self");
        </script>

    <?php
    }
    ?>




</body>

</html>