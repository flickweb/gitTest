<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

//変更と追加
if (isset($_POST["mach"])) {
    $_SESSION["mach"] = $_POST["mach"];
}
if (isset($_SESSION["mach"])) {
    // session_destroy();
    $mach = $_SESSION["mach"];

    $sql = "SELECT caid from causer where realname = '$mach'";
    $res = mysqli_query($conn, $sql);
    $k = mysqli_fetch_assoc($res);

    // $sql2 = "SELECT ctnum from cacategory where caid = $k[0]";
    // $res2 = mysqli_query($conn, $sql2);
    // $k2 = mysqli_fetch_array($res2);
}


$wo = array();
$wo2 = array();

$sql = "SELECT caid from causer where realname = '$mach'";
$res = mysqli_query($conn, $sql);
$k = mysqli_fetch_array($res);

$sql2 = "SELECT category.category from cacategory 
inner join category on cacategory.ctnum = category.ctnum
where caid = $k[0]";
$res2 = mysqli_query($conn, $sql2);
$k2 = mysqli_fetch_assoc($res2);
    

$sql3 = "SELECT gender from causer where realname = '$mach'";
$res3 = mysqli_query($conn, $sql3);
$k3 = mysqli_fetch_assoc($res3);

// if($k2[0] = 1){

// }if($k2[0] = 1){

// }if($k2[0] = 1){

// }if($k2[0] = 1){

// }if($k2[0] = 1){

// }if($k2[0] = 1){

// }


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
<nav class="navbar">
        <div class="navContainer">
            <div class="logoContainer">
                <!-- <img src="assets/logoDemo.jpg" alt="logo" id="logo" /> -->
                <a href="/team/home/homeTwo.php">
                    <h1>Mimamoru-kun</h1>
                </a>
            </div>


            <div class="nav-links">
                <ul>
                    <li><a href="../profile/profile.php">プロフィール</a></li>
                    <li><a href="../logout.php">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav>

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
                                        <?php 
                                        foreach ($k2 as $value) {
                                            echo $value, "\n";
                                        } 
                                        ?><br>
                                    </div>
                                    
                                </div>
                                <div class="infoBoxTwo">
                                    <div class="infoBoxDetailName">
                                        <h3>性別</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        
                                    </div>
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
            <div class="heroBoxRight"  onclick="location.href='../svichat/index.php'">
                <div class="iconBoxChat">
                    <div class="icon">
                        
                        <i class="fa-regular fa-message fa-4x"></i>
                        
                    </div>
                </div>
                    <div class="textBoxChat">
                        <div class="titleBoxChat">
                            <input type="button" value="チャット" class="chat">
                        </div>
                        <div class="descBoxChat">
                            <p>メッセージのやり取りやビデオ通話ができます</p>
                        </div>
                    </div>
                
            </div>
            <div class="heroBoxRight"  onclick="location.href='../calender/test2.php'">
                <div class="iconBox">
                    <div class="icon">
                        <i class="fa-regular fa-calendar-check fa-4x"></i>                        
                    </div>
                </div>
                <div class="textBox">
                    <div class="titleBox">
                        <input type="button" value="予約" class="yoyaku">
                    </div>
                    <div class="descBox">
                        <p>予約ができます</p>
                    </div>
                </div>
            </div>
            <div class="heroBoxRight" onclick="location.href='../profile/profile.php'">
                <div class="iconBox">
                    <div class="icon">
                        <i class="fa-regular fa-user fa-4x"></i>
                    </div>
                </div>
                <div class="textBox">
                    <div class="titleBox">
                        <input type="button" value="プロフィール" class="profile">
                    </div>
                    <div class="descBox">
                        <p>カウンセラーの変更ができます</p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>