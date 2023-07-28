<?php
include("../dbConnect.php");
include("../functionsCA.php");
session_start();

$caid = $_SESSION['CAid'];
$wo = array();

if (empty($_SESSION['worries']) || in_array("1", $_SESSION['worries'])) {
    array_push($wo, "恋愛面");
}

if (empty($_SESSION['worries']) || in_array("2", $_SESSION['worries'])) {
    array_push($wo, "家族・親族");
}

if (empty($_SESSION['worries']) || in_array("3", $_SESSION['worries'])) {
    array_push($wo, "勉強");
}

if (empty($_SESSION['worries']) || in_array("4", $_SESSION['worries'])) {
    array_push($wo, "メンタルヘルス（漠然とした不安）");
}

if (empty($_SESSION['worries']) || in_array("5", $_SESSION['worries'])) {
    array_push($wo, "対人関係");
}

if (empty($_SESSION['worries']) || in_array("6", $_SESSION['worries'])) {
    array_push($wo, "自己理解");
}

$query = "select filepass from causer where caid = $caid";
$res = mysqli_query($conn, $query);
$k = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homeTwoCA.css">
    <script src="https://kit.fontawesome.com/d901136042.js" crossorigin="anonymous"></script>
    <title>Document</title>
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
                    <li><a href="../logout.php">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="heroLeft">
            <div class="heroBoxLeft">
                <div class="titleBoxLeft">
                    <h2 class="title">プロフィール</h2>
                </div>
                <div class="contentBoxLeft">
                    <div class="imageBoxLeft">
                        <div class="profilePic">
                            <img src="/team/img/<?php echo $k[0]; ?>" width="180" height="180"
                                style="border-radius: 50%;">
                        </div>
                        <div class="profileSetup">
                            <form method="post" action="/team/img/upload.php" enctype="multipart/form-data">
                                <input type="file" name="image">
                                <button><input type="submit" name="upload" value="送信"></button>
                            </form>
                        </div>
                    </div>
                    <div class="infoBoxLeft">
                        <div class="infoBoxName">
                            <h3>
                                <?php echo $_SESSION['username']; ?>
                            </h3>
                        </div>
                        <div class="infoBoxStatus">
                            <div class="infoBoxContentUp">
                                <div class="infoBoxOne">
                                    <div class="infoBoxDetailName">
                                        <h3>特徴</h3>
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
                                        <h3>Password</h3>
                                    </div>
                                    <div class="infoBoxDetail">
                                        Password :
                                        <?php echo $_SESSION['pass']; ?><br>
                                    </div>
                                </div>
                                <div class="infoBoxTwo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="heroRight">
            <div class="heroBoxRight" onclick="location.href='../cavichat/index.php'">
                <div class="iconBoxChat">
                    <div class="icon">
                        <i class="fa-regular fa-calendar-check fa-4x margin-top-sm"></i>
                    </div>
                </div>
                <div class="textBoxChat">
                    <div class="titleBoxChat">
                        <input type="button" value="チャット" class="chat">
                    </div>
                    <div class="descBoxChat">
                        <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>

            </div>
            <div class="heroBoxRight" onclick="location.href='../calendar/CAusercale.php'">
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
                        <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>
            </div>
            <div class="heroBoxRight" onclick="location.href='/team/casinnki/diagnose5_CA.php'">
                <div class="iconBox">
                    <div class="icon">
                        <i class="fa-regular fa-user fa-4x"></i>
                    </div>
                </div>
                <div class="textBox">
                    <div class="titleBox">
                        <input type="button" value="得意分野の変更" class="profile">
                    </div>
                    <div class="descBox">
                        <p>部ふラ松割ヌニ必9村之ヨ年長ヌノヒネ庫球ヘ出74年ぐだ容要レでち。</p>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>