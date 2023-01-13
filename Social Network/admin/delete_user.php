<?php

include "../connection.php";


if (isset($_GET['delete'])) {
    $get_id = $_GET['delete'];

    $del = "delete from users where user_id='$get_id'";

    $run_delete = mysqli_query($con, $del);

    $del_posts = "delete from posts where user_id='$get_id'";

    $run_posts = mysqli_query($con, $del_posts);

?>
    <script>
        alert("User has been delete");

        window.open("index.php?view_users", "_self");
    </script>

<?php
}
