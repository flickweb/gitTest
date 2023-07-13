<?php
session_start();
session_destroy();
header('Location: shinkiToroku_login/login.php');
exit;
?>