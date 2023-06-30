<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>名前</p>
    <?php echo $_SESSION['name']; ?>

    <p>性別</p>
    <?php if ($_SESSION['gender'] == 1) {
        echo "男";
    } elseif ($_SESSION['gender'] == 2) {
        echo "女";
    } elseif ($_SESSION['gender'] == 3) {
        echo "その他";
    }
    ?>

    <p>カウンセラーの希望の性別</p>
    <?php if ($_SESSION['hcag'] == 1) {
        echo "男";
    } elseif ($_SESSION['hcag'] == 2) {
        echo "女";
    } elseif ($_SESSION['hcag'] == 3) {
        echo "どちらでも";
    }
    ?>

    <p id="pass">パスワード</p>
    <?php echo $_SESSION['pass']; ?><br>

    <p id="pass">ユーザーID</p>
    <?php echo $_SESSION['Sid']; ?><br>

    <p id="pass">登録している悩み</p>
    <?php if (isset($wo) && is_array($wo)) {
        foreach ($wo as $wos) {
            echo $wos . "<br>";
        }
    } ?><br>
    <a href="/team/diagnose/diagnose5.php">悩みの変更</a>
</body>

</html>