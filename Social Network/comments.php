<?php
// include "connection.php"
@$get_id = $_GET['posts_id'];
$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";

$run_com = mysqli_query($con, $get_com);

while ($row = mysqli_fetch_array($run_com)) {
    $com = $row['comment'];
    $com_name = $row['comment_auther'];
    $date = $row['date'];


    echo "
    <div id='comments'>

    <h4> $com_name</h4><span><i>Said</i> on$date </span>
    <p style='font-size: 20px;''>$com</p>
</div>
";
}
