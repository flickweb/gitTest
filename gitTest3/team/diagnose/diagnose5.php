<?php

#CTNUMまだやってない
#CTNUMまだやってない
#CTNUMまだやってない


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
    <link rel="stylesheet" href="diagnoseS.css">
</head>

<body>
    <form method="post" action="/team/diagnose/diagnose1111.php">
    <h2>悩みを選択してください(複数選択可)</h2><br>
        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="1" 
            <?php if(empty($_SESSION['worries'])||in_array("1",$_SESSION['worries'])) echo 'checked'?>>
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">恋愛面</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="2"
            <?php if(empty($_SESSION['worries'])||in_array("2",$_SESSION['worries'])) echo 'checked'?>>
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">家族・親族</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="3"
            <?php if(empty($_SESSION['worries'])||in_array("3",$_SESSION['worries'])) echo 'checked'?>>
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">勉強</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="4"
            <?php if(empty($_SESSION['worries'])||in_array("4",$_SESSION['worries'])) echo 'checked'?>>
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">メンタルヘルス（漠然とした不安</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="5"
            <?php if(empty($_SESSION['worries'])||in_array("5",$_SESSION['worries'])) echo 'checked'?>>
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">対人関係</span>
        </label>

        <label class="ECM_CheckboxInput">
            <input class="ECM_CheckboxInput-Input" type="checkbox" name="worries[]" value="6"
            <?php if(empty($_SESSION['worries'])||in_array("6",$_SESSION['worries'])) echo 'checked'?>>
            <span class="ECM_CheckboxInput-DummyInput"></span>
            <span class="ECM_CheckboxInput-LabelText">自己理解</span>
        </label>
        
        <div class="button005">
            <button type="submit" name="send">送信</button>
        </div>
    </form>

</body>

</html>