<!-- <?php
// session_start();
// $result = "";
// if (isset($_POST['man'])) {
//     $result = "登録しました";
// }
// echo $result

define ("DB_HOST", "localhost" );
define ("DB_USER", "dbuser" );
define ("DB_PASS", "ecc" );
define ("DB_NAME", "studb" );
define ("DB_CHARSET", "utf8mb4" );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?> -->

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
        <a href="/diagnose/diagnose2.php"><button type="submit" name="man" value="1">男性</button></a><br>
        <a href="/diagnose/diagnose2.php"><button type="submit" name="woman" value="2">女性</button></a><br>
        <a href="/diagnose/diagnose2.php"><button type="submit" name="other" value="3">その他</button></a><br>
    </form>
</body>

</html>