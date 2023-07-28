<?php
include("../dbConnect.php");
include("../functions.php");

session_start();
session_destroy();
header('Location: shinkiToroku_login/signup.php');
exit;
?>