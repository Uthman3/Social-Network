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
            <tr>
                <th>Rank</th>
                <th>Comment</th>
                <th>Auther</th>
                <th>Date</th>
                <th>Delete</th>


            </tr>
            <?php include "../connection.php";

            $sel_com = "select * from comments ORDER by 1 DESC";
            $run_com = mysqli_query($con, $sel_com);


            $i = 0;
            while ($row_com = mysqli_fetch_array($run_com)) {;
                $com_id = $row_com['com_id'];
                $user_id = $row_com['user_id'];
                $com = $row_com['comment'];
                $date = $row_com['date'];
                $auther = $row_com['comment_auther'];

                $i++;


            ?>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $com ?></td>
                <td><?php echo $auther ?></td>
                <td><?php echo $date ?></td>
                <td><a href="index.php?view_comments&delete=<?php echo $com_id ?>">Delete</a></td>

            </tr>
        <?php }
        ?>
        </tbody>
    </table>


    <?php

    if (isset($_GET['delete'])) {
        $get_id = $_GET['delete'];

        $del = "delete from comments where com_id='$get_id'";

        $run = mysqli_query($con, $del);
    ?>
        <script>
            alert("Comment has been delete");

            window.open("index.php?view_comments", "_self");
        </script>

    <?php
    }
    ?>





</body>

</html>