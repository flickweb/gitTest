<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image">
        <button><input type="submit" name="upload" value="送信"></button>
    </form>
    
    <img src="images/<?php echo $image['name']; ?>" width="300" height="300">

    <p>名前</p>
    <?php echo $_SESSION['name']; ?>

    <p>性別</p>
    <?php if ($_SESSION['cagender'] == 1) {
        echo "男";
    } elseif ($_SESSION['cagender'] == 2) {
        echo "女";
    } elseif ($_SESSION['cagender'] == 3) {
        echo "その他";
    }
    ?>

    <p id="pass">パスワード</p>
    <?php echo $_SESSION['pass']; ?><br>

    <p id="pass">ユーザーID</p>
    <?php echo $_SESSION['CAid']; ?><br>

    <p id="pass">得意分野</p>
    <?php if (isset($wo) && is_array($wo)) {
        foreach ($wo as $wos) {
            echo $wos . "<br>";
        }
    } ?><br>
    <a href="/team/casinnki/diagnose5_CA.php">得意分野の変更</a>
</body>

</html>