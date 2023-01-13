<?php
session_start();
include "connection.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);

    $select_user = "select * from users where user_email='$email' AND user_pass='$password' AND status='verified'";

    $query = mysqli_query($con, $select_user);

    $check_user = mysqli_num_rows($query);
    if ($check_user == 1) {
        $_SESSION['user_email'] = $email;
?>
        <script>
            window.open("index.php", '_self')
        </script>;
    <?php
    } else {
    ?>
        <script>
            alert("incorrect Details")
        </script>
<?php
    }
}
?>