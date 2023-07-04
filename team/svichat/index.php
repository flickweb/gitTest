<?php
define( "DB_HOST", "localhost" );
define( "DB_USER", "dbuser" );
define( "DB_PASS", "ecc" );
define( "DB_NAME", "studb" );
define( "DB_CHARSET", "utf8mb4" );

session_start();

$id = 2;

$instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
if( ! $instance -> connect_error ) {
  $instance -> set_charset(DB_CHARSET);
  $sql = "SELECT Sid FROM Suser WHERE '$id' = Sid;";
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

// print_r($result["result"]);

$param = $result["result"];

$param2 = 'S'.$param[0]["Sid"];

$param_json = json_encode($param2); //JSONエンコード

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>カウンセリングチャット</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1 class="heading">カウンセリングチャット</h1>

      <div class="flexbox">
        <div><video id="js-local-stream"></video></div>
        <div><video id="js-remote-stream"></video></div>
      </div>

      <div class="p2p-data">

        <div class="video">
          <img src="camera.jpg" id="cameraimg" class="con" alt="カメラオン" title="カメラオン" width="150" height="100">
          <img src="mic.jpg" id="micimg" class="mic" alt="マイクオン" title="マイクオン" width="100" height="100">

          <p>Your ID: <span id="js-local-id"></span></p>
          <input type="text" placeholder="ここに相手のIDを入力" id="js-remote-id">
          <button class="A" id="js-connect-trigger">Connect</button>
          <button id="js-close-trigger">カウンセリングを終了する</button>
        </div>
        <div class=”line__contents scroll>
          <pre  class="messages" id="js-messages"></pre>
          <!-- <pre class=”line__contents scroll id="js-messages"></pre> -->
          <input type="text" id="js-local-text">
          <button id="js-send-trigger">送信</button>
        </div>

        <!-- <div class="box">
          <p>表示したい文字列</p>
        </div> -->

      </div>
      <p class="meta" id="js-meta"></p>
    </div>

    <script>
      const param = JSON.parse('<?php echo $param_json; ?>');
    </script>
    <script src="//cdn.webrtc.ecl.ntt.com/skyway-4.4.5.js"></script>
    <script src="key.js"></script>
    <script src="./script.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <style>
      .C{
        display: none;
      }
    </style>

  </body>
</html>