<?php
    include("../dbConnect.php");
    include("../functionsCA.php");
    session_start();

    if(!isset($_SESSION['username'], $_SESSION['pass'], $_SESSION['CAid'])){
        echo "ログインしてください";
    }else{
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
    <p>あなたの性別は？</p>
    <form method="post" action="diagnose4_CA.php">
        <button type="submit" name="caman" value="1">男性</button><br>
        <button type="submit" name="cawoman" value="2">女性</button><br>
        <button type="submit" name="caother" value="3">その他</button><br>
    </form>
</body>

</html>