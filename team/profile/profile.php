<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

//追加
$mach = $_SESSION['mach'];
$_SESSION['mach'] = $mach;
//

$wo = array();

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
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/d901136042.js" crossorigin="anonymous"></script>
    <title>profile</title>
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
                    <li><a href="profile.php">プロフィール</a></li>
                    <li><a href="#logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- LEFT START -->
    <div class="hero">
        <div class="heroLeft">
            <div class="heroBoxLeft">
                <div class="titleBoxLeft">
                    <h2 class="title">プロフィール</h2>
                </div>
                <div class="contentBoxLeft">
                    <div class="imageBoxLeft"></div>
                    <div class="infoBoxLeft">
                        <div class="infoBoxName">
                            <h3>
                                <?php echo $_SESSION['name']; ?>
                            </h3>
                        </div>
                        <div class="infoBoxStatus">
                            <div class="infoBoxContentUp">
                                <div class="infoBoxOne">
                                    <div class="infoBoxDetailName">
                                        <h3>悩み</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        <?php if (isset($wo) && is_array($wo)) {
                                            foreach ($wo as $wos) {
                                                echo $wos . "<br>";
                                            }
                                        } ?>
                                    </div>
                                </div>
                                <div class="infoBoxTwo">
                                    <div class="infoBoxDetailName">
                                        <h3>性別</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        <?php if ($_SESSION['gender'] == 1) {
                                            echo "男";
                                        } elseif ($_SESSION['gender'] == 2) {
                                            echo "女";
                                        } elseif ($_SESSION['gender'] == 3) {
                                            echo "その他";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="infoBoxContentDown">
                                <div class="infoBoxOne">
                                    <div class="infoBoxDetailName">
                                        <h3>悩み変更 ?</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        <button href="/team/diagnose/diagnose5.php">変更</button>
                                    </div>
                                </div>
                                <div class="infoBoxTwo">
                                    <div class="infoBoxDetailName">
                                        <h3>Password</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        Password : <?php echo $_SESSION['pass']; ?><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>