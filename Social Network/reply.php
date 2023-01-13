<?php
include "connection.php";

if (isset($_GET['msg_id'])) {
    $get_id = $_GET['msg_id'];

    $sel_message = "select * from messages where msg_id='$get_id'";

    $run_message = mysqli_query($con, $sel_message);

    $row_message = mysqli_fetch_array($run_message);

    $msg_subject = $row_message['msg_sub'];
    $msg_topic = $row_message['msg_topic'];
    $reply_content = $row_message['reply'];

    // updating the unread message to read

    $update_unread = "update messages set status='read' where msg_id='$get_id'";

    $run_unread = mysqli_query($con, $update_unread);
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

            body {
                display: flex;
                align-items: center;
                justify-content: center;

                flex-direction: column;
                height: 50vh;
            }
        </style>
    </head>

    <body>
        <?php
        echo "
        <center>
            <h2><$msg_subject</h2>
            <p><b>Message: </b> $msg_topic</p>
            <p><b>Reply:</b> $reply_content </p>
        </center>";
        ?>
    </body>

    </html>

    <center>
        <form action="" method="post" id="f">
            <textarea style="resize: none; padding:10px; border-radius:3px;" cols='50' rows='2' name='reply'></textarea><br>
            <input type='submit' style="padding:10px; background:#1662a1;color:#fff;border:none; border-radius:3px;" name='msg_reply' value='Reply to this' />
        </form>
        <form action='' method='post'>

    </center>
<?php
}

if (isset($_POST['msg_reply'])) {
    $user_reply = $_POST['reply'];

    // if ($reply_content != 'no_reply') {
    //     echo "<h2 align='center'>This message was already replied</h2>";
    //     exit();
    // } 

    $update_msg = "update messages set reply='$user_reply' where msg_id='$get_id'";

    $run_update = mysqli_query($con, $update_msg);

    echo "<h2 align='center'>Message was replied!</h2>";
?>
    <script>
        window.open("my messages.php?inbox&msg_id", "_self");
    </script>
<?php
}

?>