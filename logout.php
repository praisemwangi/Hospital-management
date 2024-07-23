<?php
//create connection with database and session
include('connection.php');
include('cookies.php');
//destroy session
session_destroy();
//redirect
header("location:login.html");
exit();


?>