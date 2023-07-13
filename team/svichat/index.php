<?php
define( "DB_HOST", "localhost" );
define( "DB_USER", "dbuser" );
define( "DB_PASS", "ecc" );
define( "DB_NAME", "studb" );
define( "DB_CHARSET", "utf8mb4" );

session_start();

//$idの中身をセッションで持ってきたidに変更してください
echo $_SESSION["mach"];

$id = $_SESSION["Sid"];

$instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
if( ! $instance -> connect_error ) {
  $instance -> set_charset(DB_CHARSET);
  $sql = "SELECT Sid,name FROM Suser WHERE '$id' = Sid;";
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



$param = $result["result"];

$name = $param[0]["name"];

$param2 = 'S'.$param[0]["Sid"];

$param_json = json_encode($param2); //JSONエンコード

$param_json2 = json_encode($name); //JSONエンコード


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
          <img src="camera_off.jpg" id="cameraimg" class="con" alt="カメラ オン:オフ" title="カメラ オン:オフ" width="150" height="100">
          
          <img src="mic_off.jpg" id="micimg" class="mic" alt="マイク オン:オフ" title="マイク オン:オフ" width="100" height="100">
          <p>Your ID: <span id="js-local-id"></span></p>
          <input type="text" placeholder="ここに相手のIDを入力" id="js-remote-id">
          <button class="A" id="js-connect-trigger">Connect</button>
          <button id="js-close-trigger">カウンセリングを終了する</button>
        </div>
        <div class=”line__contents>
          <pre  class="messages" scroll id="js-messages"></pre>
          <!-- <pre class=”line__contents scroll id="js-messages"></pre> -->
          <!-- <input type="text" id="js-local-text"> -->
          <textarea type="text" id="js-local-text"></textarea>
          <button id="js-send-trigger">送信</button>
        </div>

        <div class="btn">
          <form action="/team/home/homeTwo.php" method="post">
          <!-- <button type="submit" id="next">&laquo; -->
          <button class="btn" type="submit" id="prev">ホームに戻る</button>
          </form>
        </div>

        <!-- <div class="box">
          <p>表示したい文字列</p>
        </div> -->

      </div>
      <p class="meta" id="js-meta"></p>
    </div>

    <script>
      const param = JSON.parse('<?php echo $param_json; ?>');
      const param2 = JSON.parse('<?php echo $param_json2; ?>');
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