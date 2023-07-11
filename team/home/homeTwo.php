<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

$mach = $_POST["mach"];
$wo = array();
$wo2 = array();

$sql = "SELECT caid from causer where realname = '$mach'";
$res = mysqli_query($conn, $sql);
$k = mysqli_fetch_array($res);

$sql2 = "SELECT ctnum from cacategory where caid = $k[0]";
$res2 = mysqli_query($conn, $sql2);
$k2 = mysqli_fetch_array($res2);

if($k2[0] = 1){

}if($k2[0] = 1){

}if($k2[0] = 1){

}if($k2[0] = 1){

}if($k2[0] = 1){

}if($k2[0] = 1){

}


if (empty($_SESSION['worries']) || in_array("1", $_SESSION['worries'])) {
    array_push($wo, "恋愛");
}

if (empty($_SESSION['worries']) || in_array("2", $_SESSION['worries'])) {
    array_push($wo, "家族・親族");
}

if (empty($_SESSION['worries']) || in_array("3", $_SESSION['worries'])) {
    array_push($wo, "勉強の不安");
}

if (empty($_SESSION['worries']) || in_array("4", $_SESSION['worries'])) {
    array_push($wo, "漠然とした不安");
}

if (empty($_SESSION['worries']) || in_array("5", $_SESSION['worries'])) {
    array_push($wo, "対人関係");
}

if (empty($_SESSION['worries']) || in_array("6", $_SESSION['worries'])) {
    array_push($wo, "自己理解");
}


$n = $_SESSION['name'];
$ssid = $_SESSION['Sid'];
$value = $_SESSION['worries'];
$gender = $_SESSION['gender'];
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
    <!-- <nav class="navbar">
        <div class="navContainer">
            <div class="logoContainer">
                <h1>Mimamoru-kun</h1>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#profile">プロフィール</a></li>
                    <li><a href="#logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- LEFT START -->

    <?php

    $findCounselor = "SELECT causer.realname, causer.gender, cacategory.ctnum,  COUNT(*) AS match_count
    FROM scategory
    FROM scategory
    INNER JOIN cacategory ON scategory.ctnum = cacategory.ctnum
    INNER JOIN causer ON cacategory.caid = causer.caid
    WHERE scategory.sid = $ssid
    GROUP BY causer.caid
    ORDER BY 
    CASE WHEN scategory.ctnum IN (" . implode(',', $value) . ") THEN 0 ELSE 1 END,
    match_count DESC";
    ?>


    <div class="hero">
        <div class="heroLeft">
            <div class="heroBoxLeft">
                <div class="titleBoxLeft">
                    <h2 class="title">あなたのカウンセラー</h2>
                </div>
                <div class="contentBoxLeft">
                    <div class="imageBoxLeft"></div>
                    <div class="infoBoxLeft">
                        <div class="infoBoxName">
                            <h3>
                                <?php echo $mach; ?>
                            </h3>
                        </div>
                        <div class="infoBoxStatus">
                            <div class="infoBoxContentUp">
                                <div class="infoBoxOne">
                                    <div class="infoBoxDetailName">
                                        <h3>特徴</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        <?php echo $k[0]; ?><br>
                                        <?php echo $k2[0]; ?><br>
                                    </div>
                                    
                                </div>
                                <div class="infoBoxTwo">
                                    <div class="infoBoxDetailName">
                                        <h3>性別</h3>
                                    </div>
                                    <div class="infoBoxDetail"></div>
                                </div>
                            </div>
                            <div class="infoBoxContentDown">
                                <div class="infoBoxOne">
                                    <div class="infoBoxDetailName">
                                        <h3>年齢</h3>
                                    </div>
                                    <div class="infoBoxDetail"></div>
                                </div>
                                <div class="infoBoxTwo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT START -->

        <div class="heroRight">
            <div class="heroBoxRight">
                <div class="iconBoxChat">
                    <div class="icon">
                        <i class="fa-regular fa-calendar-check fa-4x margin-top-sm"></i>
                    </div>
                </div>
                <div class="textBoxChat">
                    <div class="titleBoxChat">
                        <h3>チャット</h3>
                    </div>
                    <div class="descBoxChat">
                        <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>
            </div>
            <div class="heroBoxRight">
                <div class="iconBox">
                    <div class="icon">
                        <i class="fa-regular fa-calendar-check fa-4x"></i>
                    </div>
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
                <div class="iconBox">
                    <div class="icon">
                        <i class="fa-regular fa-user fa-4x"></i>
                    </div>
                </div>
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