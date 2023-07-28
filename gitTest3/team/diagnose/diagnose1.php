<?php
    include("../dbConnect.php");
    include("../functions.php");
    session_start();

    if(!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['Sid'])){
        echo "ログインしてください";
    }else{
        echo "ようこそ" . $_SESSION['name'] . "さん";
    } 


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="diagnoseS.css">
</head>

<body>
    <h2>あなたの性別は？</h2>
    <form method="post" action="/team/diagnose/diagnose3.php">
    <div class="button005">
        <button type="submit" name="man" value="1">男性</button><br>
        <button type="submit" name="woman" value="2">女性</button><br>
        <button type="submit" name="other" value="3">その他</button><br>
    </div>
    </form>
</body>

</html>