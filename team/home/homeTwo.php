<?php
include("../dbConnect.php");
include("../functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homeTwo.css" />
    <title>Document</title>
</head>
<body>
<nav class="navbar">
      <div class="navContainer">
        <div class="logoContainer">
          <img src="assets/logoDemo.jpg" alt="logo" id="logo" />
        </div>
        <div class="nav-links">
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#aboutme">About Me</a></li>
            <li>
              <ul class="ulInside">
                <li><a class="lang" href="#skills" style="text-decoration: underline;" >en</a></li>
                <li><a class="lang" href="#skills">jp</a></li>
                <li><a class="lang" href="#skills">id</a></li>
                </ul>
            </li>
            <li><button class="connectBtnNav">Contact me</button></li>
          </ul>
        </div>
      </div>
    </nav>    



</body>
</html>