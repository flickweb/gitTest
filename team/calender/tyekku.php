<?php
    header('Content-Type: application/json; charset=utf-8');
    define( "DB_HOST", "localhost" );
    define( "DB_USER", "dbuser" );
    define( "DB_PASS", "ecc" );
    define( "DB_NAME", "studb" );
    define( "DB_CHARSET", "utf8mb4" );

    if(!empty($_GET)) {
        $Sid2 = $_GET["Sid"];
        $data = $_GET["data"];

        $Sid = $_SESSION["Sid"];
        $_SESSION['Sid'] = $Sid;


        $instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
        if( ! $instance -> connect_error ) {
        //正常に接続できた場合の処理
        $instance -> set_charset(DB_CHARSET);
            $sql = "SELECT count(*) AS cnt FROM yoyaku WHERE Sid = ".$Sid." AND data = '".$data."';";
        if($kekka = $instance -> query($sql)){
            //SQLが成功した時の処理
            $result["status"] = true;
            while( $row = $kekka -> fetch_array( MYSQLI_ASSOC ) ) {
                if($row["cnt"] == 1){
                    $result["status"] = false;
                }
            }
            $kekka -> close();
        }
        $instance -> close();
        }

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        
    }else{
        echo '{"status": "no post"}';
    }









?>