<?php
    session_start();

    define( "DB_HOST", "localhost" );
    define( "DB_USER", "dbuser" );
    define( "DB_PASS", "ecc" );
    define( "DB_NAME", "studb" );
    define( "DB_CHARSET", "utf8mb4" );


    $instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
    if( ! $instance -> connect_error ) {
      //正常に接続できた場合の処理
      $instance -> set_charset(DB_CHARSET);
        $sql = "SELECT * FROM CAuser;";
      if($kekka = $instance -> query($sql)){
        //SQLが成功した時の処理
        $result["status"] = true;
        while( $row = $kekka -> fetch_array( MYSQLI_ASSOC ) ) {
          $result[ "result" ][]= $row;
        }
        $kekka -> close();
      }
      $instance -> close();
    }

  $Sid = $_SESSION["Sid"];
  $_SESSION['Sid'] = $Sid;

  $da = date('Y-m-d');

?>

<link href="css/scedulekanri.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>スケジュール管理画面</title>
    </head>

    <body>
        <div id="ido">

            <div id="ca">カウンセラーを選択してください</div><br>


            <input type="hidden" name="Sid" id="Sid" value="<?= $Sid ?>">
              
            <form action="schedulekanri2.php" method="POST">
                <div>
                    <select name="cuser" id="cuser">
                        <?php foreach($result["result"] as $re): ?>
                            <option><?= $re["username"]?></option>
                        <?php endforeach ?>    
                    
                    </select>
                </div><br>

                <div id="day">予約の日時を入力してください</div><br>
                
                <input type="date" name="date" id="date" min=<?= $da ?> required></input><br><br>
                <select name="hou" id="hou">
                    <?php 
                        for($i = 9; $i <= 23; $i++) {
                            echo "<option>{$i}</option>";
                        }
                    ?>
                </select>時

                <select name="mini" id="mini">
                    <?php 
                        for($i = 0; $i <= 50; $i+=10) {
                            echo "<option>{$i}</option>";
                        }
                    ?>
                </select>分<br><br>

                <div id="con">ご希望の連絡方法を選択してください</div><br>
                <select name="contact" id="contact">
                    <option value="0">チャット</option>
                    <option value="1">通話</option>
                    <option value="2">ビデオ通話</option>
                </select><br><br>

                <button type="submit" id="bu">決定</button><br><br>

            </form>

            <a href="test2.php" id="a">戻る</a>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="js/schedulekanri.js"></script>
    </body>

</html>