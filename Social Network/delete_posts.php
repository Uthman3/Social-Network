<?php
include "connection.php";

if (isset($_GET['posts_id'])) {
    $posts_id = $_GET['posts_id'];

    $delete_post = "delete from posts where posts_id='$posts_id'";

    $run_delete = mysqli_query($con, $delete_post);

    if ($run_delete) {
?>

        <script>
            alert("A post has been Delete");
            window.open("index.php", "_self");
        </script>
<?php
    }
}
