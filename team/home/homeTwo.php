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
    <link rel="stylesheet" href="homeTwo.css">
    <script src="https://kit.fontawesome.com/d901136042.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <nav class="navbar">
        <div class="navContainer">
            <div class="logoContainer">
                <!-- <img src="assets/logoDemo.jpg" alt="logo" id="logo" /> -->
                <h1>Mimamoru-kun</h1>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#profile">プロフィール</a></li>
                    <li><a href="#logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="heroLeft">
            <div class="heroBoxLeft"></div>
        </div>
        <div class="heroRight">
        <div class="heroBoxRight">
                <div class="iconBox">
                <i class="fa-regular fa-messages-question fa-4x"></i>
                </div>
                <div class="textBox">
                    <div class="titleBox">
                    <h3>チャット</h3>
                    </div>
                    <div class="descBox">
                    <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>
            </div>
            <div class="heroBoxRight">
                <div class="iconBox">
                <i class="fa-regular fa-calendar-check fa-4x"></i>
                </div>
                <div class="textBox">
                    <div class="titleBox">
                    <h3>予約</h3>
                    </div>
                    <div class="descBox">
                        <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>
            </div>
            <div class="heroBoxRight">
                <div class="iconBox"><i class="fa-regular fa-user fa-4x"></i></div>
                <div class="textBox">
                    <div class="titleBox">
                        <h3>プロフィール</h3>
                    </div>
                    <div class="descBox">
                    <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>