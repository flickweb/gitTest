<link rel="stylesheet" href="css/syousaidate2.css">

<?php

    define( "DB_HOST", "localhost" );
    define( "DB_USER", "dbuser" );
    define( "DB_PASS", "ecc" );
    define( "DB_NAME", "studb" );
    define( "DB_CHARSET", "utf8mb4" );

    session_start();

    $Sid = $_SESSION["Sid"];
    $_SESSION['Sid'] = $Sid;
    $date = $_POST["data"];

    //echo $Sid,$date;

    $st = 0;

    $instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
    if( ! $instance -> connect_error ) {
        //正常に接続できた場合の処理
        $instance -> set_charset(DB_CHARSET);
        
        $sql = "DELETE FROM yoyaku WHERE Sid = ? AND data = ?;";

        if( $stmt = $instance -> prepare( $sql )){
            $stmt -> bind_param("is", $Sid,$date);
            $stmt -> execute();
            if($stmt -> affected_rows == 1){
                $st = 1;
                $instance -> commit();
            }else{
                $instance -> rollback();
            }
            $stmt -> close();
        }
        $instance -> close();
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>予約の削除</title>
    </head>
    <body>
        <?php if($st == 1): ?>
            <div id="yo">削除が完了しました</div>
            <form action="test2.php">
                <div id="ido">
                    <button type="submit" id="bu">戻る</button>
                </div>
            </form>
        <?php else: ?>
            <div id="yo">削除が失敗しました</div>
            <form action="test2.php">
                <div id="ido">
                    <button type="submit" id="bu">戻る</button>
                </div>
            </form>
        <?php endif ?>    
    </body>
</html>
