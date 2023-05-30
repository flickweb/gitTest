<?php
session_start();
$result = "";

if (isset($_POST['man'])) {
    $_SESSION["man"] = $_POST["man"];
    $result = $_SESSION['man'];
}elseif(isset($_POST['woman'])){
    $_SESSION["woman"] = $_POST["woman"];
    $result = $_SESSION['woman'];
}elseif(isset($_POST['other'])){
    $_SESSION["other"] = $_POST["other"];
    $result = $_SESSION['other'];
}
echo $result
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
<form method="post" action="/diagnose/diagnose3.php">
    <p>あなたの年齢は？</p>
    <select name = "age">
    <?php for ($i=18; $i<=99; $i++) : ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor; ?>
    </select>
    <a href="/diagnose/diagnose3.php"><button type="submit">送信</button></a><br>
</form>    
</body>
</html>