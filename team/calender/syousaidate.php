<?php
    $Sid = $_POST["Sid"];
    $date = $_POST["data"];

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>予約の削除確認</title>
    </head>
    <body>
        <div>本当に削除しますか？</div>
        <form action="syousaidate2.php" method="post">
            <input type="hidden" name="Sid" value="<?= $Sid ?>">
            <input type="hidden" name="data" value="<?= $date ?>">
            <button type="submit" class="Gbutton">削除</button>
        </form>
        <a href="test2.php">戻る</a>
    </body>
</html>