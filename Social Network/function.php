<?php
// session_start();
include "connection.php";

function getTopic()
{
    global $con;

    $get_topic = "select * from topics";

    $run_topics = mysqli_query($con, $get_topic);

    while ($row = mysqli_fetch_array($run_topics)) {
        $topic_id = $row['topic_id'];
        $topic_user = $row['topic_user'];

        echo "<option value='$topic_id'>$topic_user</option>";
    }
}
function insertPost()
{
    if (isset($_POST['sub'])) {
        global $con;
        global $user_id;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $topic = $_POST['topic'];
        $filename = $_FILES["p_image"]["name"];
        $tempname = $_FILES["p_image"]["tmp_name"];


        move_uploaded_file($tempname, "image/$filename");



        if ($title == '' or $content == '') {
            echo "<h2>Please Enter title and Description</h2>";
        } else {
            $insert = "insert into posts (user_id,topic_id,post_title,post_content,post_date,post_image) values('$user_id','$topic','$title','$content',NOW(),'$filename')";

            $run = mysqli_query($con, $insert);

            if ($run) {
?>
                <h3>Posted to timeline Looks great!</h3>
<?php
                $update = "update users set posts='yes' where user_id='$user_id'";
                $run_update = mysqli_query($con, $update);
            }
        }
    }
};
function get_posts()
{
    global $con;

    $per_page = 100;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page;

    $get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from,$per_page";

    $run_posts = mysqli_query($con, $get_posts);

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        $post_id = $row_posts['posts_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = substr($row_posts['post_content'], 0, 150);
        $post_date = $row_posts['post_date'];
        $image = $row_posts['post_image'];

        // getting the user who has posted the thread
        $user = "select * from users where user_id='$user_id' AND posts='yes'";

        $run_user = mysqli_query($con, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];
        // getting the user session

        // now displaying all are once

        echo "<div class='box'>
        <div class='content-section'>
            <div class='card'>
            <a href='single.php?posts_id=$post_id'> <img src='image/$image' alt=''></a>
    
                <a href='user_profile.php?u_id=$user_id'><img src='image/$user_image' id='pro' alt=''></a>
                <h3><a href='user_profile.php?u_id=$user_id'><?php $user_name ?></a></h3>
<h2>$post_title</h2>
<p>$post_date</p>

<p>$content</p>
<a href='single.php?posts_id=$post_id'>Comment</a>

</div>




</div>
</div>

";
    }
    // include "pagination.php";
}

function single_post()
{
    if (isset($_GET['posts_id'])) {
        global $con;

        $get_id = $_GET['posts_id'];

        $get_posts = "select * from posts where posts_id='$get_id'";

        $run_posts = mysqli_query($con, $get_posts);

        while ($row_posts = mysqli_fetch_array($run_posts)) {;

            $post_id = $row_posts['posts_id'];
            $user_id = $row_posts['user_id'];
            $post_title = $row_posts['post_title'];
            $content = $row_posts['post_content'];
            $post_date = $row_posts['post_date'];
            $image = $row_posts['post_image'];



            // getting the user who has posted the thread
            $users = "select * from users where user_id='$user_id' AND posts='yes'";
            $run_users = mysqli_query($con, $users);

            $row_users = mysqli_fetch_array($run_users);
            $user_name = $row_users['user_name'];
            $user_image = $row_users['user_image'];

            // getting the user session
            $user_com = $_SESSION['user_email'];
            $get_com = "select * from users where user_email='$user_com'";
            $run_com = mysqli_query($con, $get_com);
            $row_com = mysqli_fetch_array($run_com);
            $user_com_id = $row_com['user_id'];
            $user_com_name = $row_com['user_name'];

            // now displaying all at once

            echo "<div class='box'>
    <div class='content-section'>
        <div class='card'>
            <img src='image/$image' alt=''>

            <a href='user_profile.php?u_id=$user_id'><img src='image/$user_image' id='pro' alt=''></a>
            <h3><a href='user_profile.php?u_id=$user_id'><?php $user_name ?></a></h3>
            <h2>$post_title</h2>
            <p>$post_date</p>

            <p>$content</p>
            <a href='single.php?posts_id=$post_id'>Comment</a>

        </div>




    </div>
</div>

";
            include "comments.php";
            echo ' <form action="" method="post" id="reply">
    <textarea cols="50" rows="2" name="comment" style="
   resize:none;
" placeholder="write Comment"></textarea><br />
    <input type="submit" style="
    padding: 10px 10px;
    background: #222;
    color: #fff;
    border: none;
    font-size: 15px;
    border-radius: 3px;
" class="comment" name="reply" value="Comment" />
</form>
';

            if (isset($_POST['reply'])) {
                $comment = $_POST['comment'];

                $insert = "insert into comments
(post_id,user_id,comment,comment_auther,date)values('$post_id','$user_id','$comment','$user_com_name',NOW())";




                $run = mysqli_query($con, $insert);

                // if ($run) {
                echo "<h2> Your Reply Has Been Added </h2>";
                // } else {
                // echo "<h2> Your Reply not Added </h2>";
                // }
            }
        }
    }
}


function members()
{
    global $con;
    // select all members
    $user = "select * from users";

    $run_user = mysqli_query($con, $user);
    while ($row_user = mysqli_fetch_array($run_user)) {
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];



        echo "
<div class='profile-card'>
    <div class='profile-content'>
        <div class='profile-image'>
            <a href='user_profile.php?u_id=$user_id'>
                <img src='image/$user_image' alt='$user_name'>
        </div>
        <div class='desc'>
            <h2>$user_name</h2>
            <!-- <p>Lorem ipsum dolor sit amet adipisicing elit. </p> -->
        </div>
        <div class='btn-div'>

            <a href='user_profile.php?u_id=$user_id'> <button class='btn'><i class='fa fa-facebook'
                        style='padding-right: 10px;'></i>Profile</button></a>
        </div>
    </div>
</div>
";
    }
}


// function for displaying users post
function user_posts()
{
    global $con;

    if (isset($_GET['u_id'])) {
        $u_id = $_GET['u_id'];
    }

    $get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

    $run_posts = mysqli_query($con, $get_posts);

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        @$post_id = $row_posts['posts_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $image = $row_posts['post_image'];

        // getting the user who has posted the thread

        $user = "select * from users where user_id='$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);

        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];

        // now displaying all at once
        echo "<div class='box'>
    <div class='content-section'>
        <div class='card'>
            <img src='image/$image' alt=''>

            <img src='../image/$user_image' id='pro' alt=''>
            <h3><a href'user_profile.php?u_id=$user_id'><?php $user_name ?></a></h3>
            <h2>$post_title</h2>
            <p>$post_date</p>
            <p>$content</p>

        </div>


        <a href='single.php?posts_id=$post_id'><button class='profile'>View</button></a>
        <a href='edit_post.php?posts_id=$post_id'><button class='profile'>Edit</button></a>
        <a href='delete_posts.php?posts_id=$post_id'><button class='profile'>Delete</button></a>


    </div>
</div>





";

        include "delete_posts.php";
    };
}


function user_profile()
{
    if (isset($_GET['u_id'])) {
        global $con;
        $user_id = $_GET['u_id'];
        $select = "select * from users where user_id='$user_id'";

        $run = mysqli_query($con, $select);

        $row = mysqli_fetch_array($run);


        $id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_country = $row['user_conutry'];
        $user_image = $row['user_image'];
        $register_date = $row['user_reg_date'];
        $last_login = $row['user_last_login'];
        $user_gender = $row['user_gender'];


        // if ($user_gender == "Male") {
        // $msg = "Send Him a message";
        // } else {
        $msg = "Send her a Message";
        // }

        echo "<div id='user_profile'>

    <img src='image/$user_image' width='100px' height='100px' alt=''>
    <h4><strong>Name: </strong>$user_name</h4><br>
    <h4><strong>Country: </strong>$user_country</h4><br>
    <h4><strong>Gender: </strong>$user_gender</h4><br>
    <h4><strong>Last Login: </strong>$last_login</h4><br>
    <h4><strong>Member: </strong>$register_date</h4><br>
    <br />

    <p><a href='messages.php?u_id=$id'><button
                style='padding:10px; background:#1662a1;color:#fff;border:none; border-radius:3px;'>$msg</button></a>
    </p><br>
</div>


";
    };
};


// function topic show
function show_topic()
{
    global $con;

    if (isset($_GET['topic'])) {
        $id = $_GET['topic'];
    }

    $get_posts = "select * from posts where topic_id='$id'";

    $run_posts = mysqli_query($con, $get_posts);

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        @$post_id = $row_posts['posts_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $image = $row_posts['post_image'];

        // getting the user who has posted the thread

        $user = "select * from users where user_id='$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);

        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];

        // now displaying all at once
        echo "<div class='box'>
    <div class='content-section'>
        <div class='card'>
            <a href='single.php?posts_id=$post_id'><img src='image/$image' alt=''></a>

            <a href'user_profile.php?u_id=$user_id'><img src='image/$user_image' id='pro' alt=''></a>
            <h3><a href'user_profile.php?u_id=$user_id'><?php $user_name ?></a></h3>
            <h2>$post_title</h2>
            <p>$post_date</p>
            <p>$content</p>

        </div>


        <a href='single.php?posts_id=$post_id'><button class='profile'>View</button></a>
        <a href='edit_post.php?posts_id=$post_id'><button class='profile'>Edit</button></a>
        <a href='delete_posts.php?posts_id=$post_id'><button class='profile'>Delete</button></a>


    </div>
</div>





";

        include "delete_posts.php";
    };
}

// function search
function results()
{
    global $con;

    if (isset($_GET['search'])) {
        $search_query = $_GET['user_query'];
    }

    $gets_posts = "select * from topics where topic_user LIKE '%{$search_query}%'";

    $runs_posts = mysqli_query($con, $gets_posts);



    while ($row_posts = mysqli_fetch_array($runs_posts)) {
        @$post_id = $row_posts['posts_id'];
        @$user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $image = $row_posts['post_image'];

        // getting the user who has posted the thread

        $user = "select * from users where user_id='$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);

        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];

        // now displaying all at once
        echo "<div class='box'>
    <div class='content-section'>
        <div class='card'>
            <a href='single.php?posts_id=$post_id'><img src='image/$image' alt=''></a>

            <a href'user_profile.php?u_id=$user_id'><img src='image/$user_image' id='pro' alt=''></a>
            <h3><a href'user_profile.php?u_id=$user_id'><?php $user_name ?></a></h3>
            <h2>$post_title</h2>
            <p>$post_date</p>
            <p>$content</p>

        </div>


        <a href='single.php?posts_id=$post_id'><button>View</button></a>
        <a href='edit_post.php?posts_id=$post_id'><button>Edit</button></a>
        <a href='delete_posts.php?posts_id=$post_id'><button>Delete</button></a>


    </div>
</div>





";

        include "delete_posts.php";
    };






    $get_posts = "select * from posts where post_title LIKE '%{$search_query}%' OR post_content LIKE '%{$search_query}%'";
    $run_posts = mysqli_query($con, $get_posts);

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        @$post_id = $row_posts['posts_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $image = $row_posts['post_image'];

        // getting the user who has posted the thread

        $user = "select * from users where user_id='$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);

        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_image'];

        // now displaying all at once
        echo "<div class='box'>
    <div class='content-section'>
        <div class='card'>
            <a href='single.php?posts_id=$post_id'><img src='image/$image' alt=''></a>

            <a href'user_profile.php?u_id=$user_id'><img src='image/$user_image' id='pro' alt=''></a>
            <h3><a href'user_profile.php?u_id=$user_id'><?php $user_name ?></a></h3>
            <h2>$post_title</h2>
            <p>$post_date</p>
            <p>$content</p>

        </div>


        <a href='single.php?posts_id=$post_id'><button>View</button></a>
        <a href='edit_post.php?posts_id=$post_id'><button>Edit</button></a>
        <a href='delete_posts.php?posts_id=$post_id'><button>Delete</button></a>


    </div>
</div>





";
        include "delete_posts.php";
    };


    $get_usersname = "select * from users where user_name LIKE '%{$search_query}%'";
    $run_usersname = mysqli_query($con, $get_usersname);

    while ($row_user = mysqli_fetch_array($run_usersname)) {
        $user_id = $row_user['user_id'];
        $user_image = $row_user['user_image'];
        $user_name = $row_user['user_name'];

        // getting the user who has posted the thread

        $users = "select * from users where user_id='$user_id' AND posts='yes'";
        $run_usesr = mysqli_query($con, $users);

        $row_userss = mysqli_fetch_array($run_usesr);
        $user_names = $row_user['user_name'];
        $user_images = $row_user['user_image'];

        // now displaying all at once
        echo "
<div class='profile-card'>
    <div class='profile-content'>
        <div class='profile-image'>
            <a href='user_profile.php?u_id=$user_id'>
                <img src='image/$user_images' alt='$user_names'>
        </div>
        <div class='desc'>
            <h2>$user_names</h2>
            <!-- <p>Lorem ipsum dolor sit amet adipisicing elit. </p> -->
        </div>
        <div class='btn-div'>

            <a href='user_profile.php?u_id=$user_id'> <button class='btn'><i class='fa fa-facebook'
                        style='padding-right: 10px;'></i>Profile</button></a>
        </div>
    </div>
</div>
";
        include "delete_posts.php";
    };
}
