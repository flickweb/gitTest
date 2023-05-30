<?php
session_start();
$_SESSION["age"] = $_POST["age"]
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
    <p>担当のカウンセラー</p>
    <form method="post" action="/diagnose/diagnose4.php">
        <a href="/diagnose/diagnose4.php"><button type="submit" name="caman" value="1">男性</button></a><br>
        <a href="/diagnose/diagnose4.php"><button type="submit" name="cawoman" value="2">女性</button></a><br>
        <a href="/diagnose/diagnose4.php"><button type="submit" name="caother" value="3">どちらでも</button></a><br>
    </form>
</body>

</html>