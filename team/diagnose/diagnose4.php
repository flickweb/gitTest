<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

if (!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['Sid'])) {
    echo "ログインしてください";
} else {
    echo "ようこそ" . $_SESSION['name'] . "さん";
}



if (isset($_POST['caman'])) {
    $_SESSION["caman"] = $_POST["caman"];
    $_SESSION['cag'] = $_SESSION['caman'];
} elseif (isset($_POST['cawoman'])) {
    $_SESSION["cawoman"] = $_POST["cawoman"];
    $_SESSION['cag'] = $_SESSION['cawoman'];
} elseif (isset($_POST['caother'])) {
    $_SESSION["caother"] = $_POST["caother"];
    $_SESSION['cag'] = $_SESSION['caother'];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="/team/diagnose/diagnose1111.php">
        <p>相談したいテーマを選択してください(複数選択可)<br>
            <input type="checkbox" name="worries[]" value="1">恋愛<br>
            <input type="checkbox" name="worries[]" value="2">家族・親族<br>
            <input type="checkbox" name="worries[]" value="3">勉強の不安<br>
            <input type="checkbox" name="worries[]" value="4">漠然とした不安<br>
            <input type="checkbox" name="worries[]" value="5">対人関係<br>
            <input type="checkbox" name="worries[]" value="6">自己理解<br>
        </p>
        <p><input type="submit" name="send" value="送信"></p>
    </form>

</body>

</html>