<?php
    session_start();
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
    <form method="post" action="/diagnose/diagnose2.php">
        <button type="submit" name="man" value="1" formaction="/diagnose/diagnose2.php">男性</button><br>
        <button type="submit" name="woman" value="2">女性</button><br>
        <button type="submit" name="other" value="3">その他</button><br>
    </form>
</body>

</html>