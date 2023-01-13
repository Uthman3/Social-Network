<table class="content-table">
    <thead>
        <tr>
            <th>Sender</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Status</th>
            <th>Reply</th>

        </tr>

    </thead>

    <?php


    $sel_msg = "select * from messages where sender='$user_id' ORDER by 1 DESC";

    $run_msg = mysqli_query($con, $sel_msg);

    $count_msg = mysqli_num_rows($run_msg);

    while ($row_msg = mysqli_fetch_array($run_msg)) {

        $msg_id = $row_msg['msg_id'];
        $msg_receiver = $row_msg['receiver'];
        $msg_sender = $row_msg['sender'];
        $msg_sub = $row_msg['msg_sub'];
        $msg_topic = $row_msg['msg_topic'];
        $msg_date = $row_msg['msg_date'];
        $status = $row_msg['status'];

        $get_sender = "select * from users where user_id='$msg_receiver'";

        $run_sender = mysqli_query($con, $get_sender);

        $row = mysqli_fetch_array($run_sender);

        $user_name = $row['user_name']

    ?>
        <tbody>
            <tr>
                <td><a href="user_profile.php?u_id=<?php echo $msg_sender ?>" target="blank"> <?php echo   $user_name ?></a></td>
                <td> <a href="reply.php?inbox&msg_id=<?php echo $msg_id ?>"><?php echo $msg_sub; ?></a></td>
                <td><?php echo $msg_date ?></td>
                <td><?php echo $status ?></td>
                <td> <a href="reply.php?inbox&msg_id=<?php echo $msg_id ?>">Reply</a></td>

            </tr>
        <?php }

        ?>
        </tbody>
</table>


</div>