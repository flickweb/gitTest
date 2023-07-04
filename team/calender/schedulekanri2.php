<?php
    session_start();

    define( "DB_HOST", "localhost" );
    define( "DB_USER", "dbuser" );
    define( "DB_PASS", "ecc" );
    define( "DB_NAME", "studb" );
    define( "DB_CHARSET", "utf8mb4" );

    if(isset($_POST['cuser'])) {
        $cuser = $_POST['cuser'];
        $date = $_POST['date'];
        $hou = $_POST['hou'];
        $mini = $_POST['mini'];
        $conta = $_POST['contact'];
    }

    //$date = date('Y-n-j',strtotime($date)); 

    $suu = mb_strlen($mini);

    if($suu == 1) {
        $time = $hou."時"."0".$mini."分";
    } else {
        $time = $hou."時".$mini."分";
    }

    $r = 0;

    $instance1 = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
    if( ! $instance1 -> connect_error ) {
        //正常に接続できた場合の処理
        $instance1 -> set_charset(DB_CHARSET);
        $sql = "SELECT * FROM CAuser WHERE username = '$cuser';";
        if($kekka = $instance1 -> query($sql)){
            //SQLが成功した時の処理
            $result["status"] = true;
            while( $row = $kekka -> fetch_array( MYSQLI_ASSOC ) ) {
                $result[ "result" ][]= $row;
            }
            $kekka -> close();
        }
        $instance1 -> close();
    }

    foreach($result["result"] as $re) {
        $num = $re["CAid"];
    }

    $sid = 1;

    $instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
    if( ! $instance -> connect_error ) {
        $instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
        $instance -> set_charset(DB_CHARSET);
        $sql = "INSERT INTO yoyaku(Sid,CAid,connect,data,time) VALUES(?,?,?,?,?)";
        if( $stmt = $instance -> prepare( $sql )){
            $stmt -> bind_param("iiiss",$sid,$num,$conta,$date,$time);
            $stmt -> execute();
            if($stmt -> affected_rows == 1){
                $instance -> commit();
                $r = 1;
            } else {
                $instance -> rollback();
                $r = 2;
            }
            $stmt  -> close();
        }
        $instance -> close();
    }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>予約のページ</title>
    </head>
    <body>
        <?php if($r == 1): ?>
            <form action="test2.php" method="POST">
                <div>予約が完了しました</div>
                <button type="submit">トップに戻る</button>
            </form>
        <?php else : ?>
            <form action="schedulekanri.php" method="POST">
                <div>予約が失敗しました。</div>
                <button type="submit">予約画面に戻る</button>
            </form>
        <?php endif ?>    
    </body>
</html>