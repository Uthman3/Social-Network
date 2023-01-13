<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "socialmedia";

$con = mysqli_connect($server, $user, $password);
$select_db = mysqli_select_db($con, $db);
