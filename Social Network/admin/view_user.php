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
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Edit</th>

            </tr>
            <?php include "../connection.php";

            $sel_users = "select * from users ORDER by 1 DESC";
            $run_users = mysqli_query($con, $sel_users);


            $i = 0;
            while ($row = mysqli_fetch_array($run_users)) {;
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_country = $row['user_conutry'];
                $user_gender = $row['user_gender'];
                $user_image = $row['user_image'];
                $register_date = $row['user_reg_date'];
                $last_login = $row['user_last_login'];
                $status = $row['status'];
                $i++;

            ?>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $user_name ?></td>
                <td><?php echo $user_country ?></td>
                <td><?php echo $user_gender ?></td>
                <td><img src="../image/<?php echo $user_image ?>" width="50" height="50" alt=""></td>
                <td><?php echo $status ?></td>
                <td><a href="delete_user.php?delete=<?php echo $user_id ?>">Delete</a></td>
                <td><a href="index.php?view_users&edit=<?php echo $user_id ?>">Edit</a></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>


    <?php
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        $sel_users = "select * from users where user_id='$edit_id'";
        $run_users = mysqli_query($con, $sel_users);

        $row_users = mysqli_fetch_array($run_users);

        $user_id = $row_users['user_id'];
        $user_name = $row_users['user_name'];
        $user_country = $row_users['user_conutry'];
        $user_gender = $row_users['user_gender'];
        $user_image = $row_users['user_image'];
        $register_date = $row_users['user_reg_date'];
        $last_login = $row_users['user_last_login'];
        $user_email = $row_users['user_email'];
        $user_pass = $row_users['user_pass'];
        $status = $row_users['status'];


    ?>
        <center>
            <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
                <table style="border: 1px solid;" id="edit">
                    <tr align="center">
                        <td colspan="6">
                            <h2>Edit User</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Name:</td>
                        <td><input type="text" name="u_name" require="required" class="ipu" value="<?php echo $user_name ?>"></td>
                    </tr>

                    <tr>
                        <td align="right">Password:</td>
                        <td><input type="password" name="u_pass" require="required" class="ipu" value="<?php echo $user_pass ?>"></td>
                    </tr>
                    <tr>
                        <td align="right">Email:</td>
                        <td><input type="email" name="u_email" require="required" class="ipu" value="<?php echo $user_email ?>"></td>
                    </tr>

                    <tr>
                        <td align="right">Country:</td>
                        <td><select name="u_country" id="" class="ipu" style="margin-left: 11px;">
                                <option> <?php echo $user_country ?></option>
                                <option>Afghasistan</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>United States</option>
                                <option>United Arab</option>


                            </select></td>
                    </tr>

                    <tr>
                        <td align="right">Gender:</td>
                        <td><select name="u_gender" id="" class="ipu" style="margin-left: 11px;">
                                <option> <?php echo $user_gender ?></option>
                                <option>Male</option>
                                <option>Female</option>



                            </select></td>
                    </tr>

                    <tr>
                        <td align="right">Status:</td>
                        <td><input type="text" name="u_status" class="ipu" require="required" value="<?php echo $status ?>"></td>
                    </tr>
                    <tr>
                        <td align="right">Photo:</td>
                        <td><input type="file" name="u_image" class="ipu" require="required"> </td>

                    </tr>

                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" class="update" name="update" onclick="update()" require="required" value="Update">
                        </td>

                    </tr>
                </table>

            </form>
        </center>

    <?php } ?>


    <?php

    if (isset($_POST['update'])) {
        $u_name = $_POST['u_name'];
        $u_pass = $_POST['u_pass'];
        $u_email = $_POST['u_email'];
        $u_country = $_POST['u_country'];
        $u_gender = $_POST['u_gender'];
        $u_status = $_POST['u_status'];
        $u_image = $_FILES['u_image']['name'];
        $image_tmp = $_FILES['u_image']['tmp_name'];


        move_uploaded_file($image_tmp, "../image/$u_image");
        $update = "update users set user_name='$u_name', user_pass='$u_pass',user_email='$u_email',user_conutry='$u_country',
 user_gender='$u_gender', status='$u_status', user_image='$u_image' where user_id='$user_id'";

        $run = mysqli_query($con, $update);

        if ($run) {
    ?>
            <script>
                alert("Your Profile is Update")
                window.open("index.php?view_users", "_self")
            </script>

    <?php
        }
    }
    ?>


</body>

</html>