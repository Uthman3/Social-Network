<link rel="stylesheet" href="style.css">

<center>
    <form id="f" action="" method="post" style="position: absolute;
    top: 110px;">
        <h2 style="padding: 10px;">Add New Topic:</h2>
        <input type="text" name="title" style="padding: 10px;" /><br>

        <input type="submit" name="insert" style="padding: 10px; margin:10px;background-color: #287bff; color:#fff ; border:none;font-size:18px" value="Add new Topic">

    </form>
</center>


<?php
include "../connection.php";
if (isset($_POST['insert'])) {
    $title = $_POST['title'];


    $insert = "insert into topics (topic_user) values('$title')";


    if (mysqli_query($con, $insert)) {
?>

        <script>
            alert("Topic has been Add");
            window.open("index.php?add_topic", "_self");
        </script>
<?php
    }
}
?>