<?php
if (isset($_POST['age'])) {
    echo $_POST['age'];
}
$result = "";

if (isset($_POST['worries']) && is_array($_POST['worries'])) {
    foreach ($_POST['worries'] as $value) {
        echo "{$value}, ";
    }
}
echo '</p>';

if (isset($_POST["send"])) {
    if (!isset($_POST['worries'])) {
        $result = "選択してください";
        echo $result;
    }
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
    <form method="post" action="/diagnose/diagnose3.php">
        <p>相談したいテーマを選択してください(複数選択可)<br>
            <input type="checkbox" name="worries[]" value="1">進路（就職・進学）<br>
            <input type="checkbox" name="worries[]" value="2">勉強<br>
            <input type="checkbox" name="worries[]" value="3">容姿・体型<br>
            <input type="checkbox" name="worries[]" value="4">恋愛<br>
            <input type="checkbox" name="worries[]" value="5">人間関係<br>
        </p>
        <p><input type="submit" name="send" value="送信"></p>
    </form>
</body>

</html>