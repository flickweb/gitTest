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
    <link rel="stylesheet" href="diagnoseCA.css">
</head>

<body>
    <form method="post" action="diagnose1111_CA.php">
        <h2>得意なテーマを選択してください(複数選択可)</h2><br>
        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="1">
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">恋愛面</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="2">
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">家族・親族</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="3">
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">勉強</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="4">
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">メンタルヘルス（漠然とした不安</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="5">
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">対人関係</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="6">
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">自己理解</span>
        </label>
        
        <div class="button005">
            <button type="submit" name="send">送信</button>
        </div>
    </form>

</body>

</html>