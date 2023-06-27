<?php

#CTNUMまだやってない
#CTNUMまだやってない
#CTNUMまだやってない


include("../dbConnect.php");
include("../functionsCA.php");
session_start();

if (isset($_POST['caman'])) {
    $_SESSION["caman"] = $_POST["caman"];
    $_SESSION['cagender'] = $_SESSION['caman'];
} elseif (isset($_POST['cawoman'])) {
    $_SESSION["cawoman"] = $_POST["cawoman"];
    $_SESSION['cagender'] = $_SESSION['cawoman'];
} elseif (isset($_POST['caother'])) {
    $_SESSION["caother"] = $_POST["caother"];
    $_SESSION['cagender'] = $_SESSION['caother'];
}

if (!isset($_SESSION['username'], $_SESSION['pass'], $_SESSION['CAid'])) {
    echo "ログインしてください";
} else {
    echo "ようこそ" . $_SESSION['username'] . "さん";
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
    <form method="post" action="diagnose1111_CA.php">
        <p>得意なテーマを選択してください(複数選択可)<br>
            <input type="checkbox" name="worries[]" value="1">恋愛面<br>
            <input type="checkbox" name="worries[]" value="2">家族・親族<br>
            <input type="checkbox" name="worries[]" value="3">勉強<br>
            <input type="checkbox" name="worries[]" value="4">メンタルヘルス（漠然とした不安）<br>
            <input type="checkbox" name="worries[]" value="5">対人関係<br>
            <input type="checkbox" name="worries[]" value="6">自己理解<br>
        </p>
        <p><input type="submit" name="send" value="送信"></p>
    </form>

</body>

</html>