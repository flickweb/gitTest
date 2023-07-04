<?php

    session_start();

    define( "DB_HOST", "localhost" );
    define( "DB_USER", "dbuser" );
    define( "DB_PASS", "ecc" );
    define( "DB_NAME", "studb" );
    define( "DB_CHARSET", "utf8mb4" );

    $instance1 = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

    if( ! $instance1 -> connect_error ) {
        $instance1 -> set_charset(DB_CHARSET);
        $sql = "SELECT y.CAid,s.name,y.data,y.time,y.connect
                FROM Suser as s
                JOIN yoyaku as y ON(s.Sid = y.Sid)
                WHERE y.CAid = 1;";
        if($kekka = $instance1 -> query($sql)){
            //SQLが成功した時の処理
            $result["status"] = true;
            while( $row = $kekka -> fetch_array( MYSQLI_ASSOC ) ) {
                $result[ "resu" ][]= $row;
            }
            $kekka -> close();
        }
        $instance1 -> close();
    }

    foreach($result["resu"] as $re) {
        $name = $re["name"];
        $data = $re["data"];
        $time = $re["time"];
        $conn = $re["connect"];

        $nam[] = $name;
        $dai[] = $data;
        $tim[] = $time;
        $con[] = $conn;
    }

    for($u = 0; $u < 31; $u++) {
        $nam[] = "none";
    }

    for($u = 0; $u < 31; $u++) {
        $dai[] = 0;
    }

    for($u = 0; $u < 31; $u++) {
        $tim[] = "none";
    }

    for($u = 0; $u < 31; $u++) {
        $con[] = "none";
    }

    // タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');

    // 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
    if (isset($_GET['ym'])) {
        $ym = $_GET['ym'];
    } else {
        // 今月の年月を表示
        $ym = date('Y-m');
    }

    // タイムスタンプを作成し、フォーマットをチェックする
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    // 今日の日付 フォーマット　例）2021-06-3
    $today = date('Y-m-j');

    // カレンダーのタイトルを作成　例）2021年6月
    $html_title = date('Y年m月', $timestamp);

    // 前月・次月の年月を取得
    // 方法１：mktimeを使う mktime(hour,minute,second,month,day,year)
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

    // 方法２：strtotimeを使う
    // $prev = date('Y-m', strtotime('-1 month', $timestamp));
    // $next = date('Y-m', strtotime('+1 month', $timestamp));

    // 該当月の日数を取得
    $day_count = date('t', $timestamp);

    // １日が何曜日か　0:日 1:月 2:火 ... 6:土
    // 方法１：mktimeを使う
    $youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
    // 方法２
    // $youbi = date('w', $timestamp);


    // カレンダー作成の準備
    $weeks = [];
    $week = '';

    $catego = [];
    $cat = '';

    // 第１週目：空のセルを追加
    // 例）１日が火曜日だった場合、日・月曜日の２つ分の空セルを追加する
    $week .= str_repeat('<td></td>', $youbi);

    // foreach($result["resu"] as $re) {
    //     $data = $re["data"];
    //     $name = $re["name"];

    //     //echo $re["data"];
    // }

    for ( $day = 1; $day <= $day_count; $day++, $youbi++) {
        // 2021-06-3
        if($day < 10) {
            $date = $ym.'-'."0".$day;    
        } else {
            $date = $ym.'-'.$day;
        }

        $a = 0;
   
        for($i = 0; $i < 31; $i++) {
            if($today == $date && $dai[$i] == $date) {
                $week .= '<td class="today">'.$day.'<br>'.'<div id="sc">'.'<div>'.$nam[$i].'</div>'.'<div>'.$tim[$i].'</div>';
                if($con[$i] == 0) {
                    $week .= '<div>チャット</div>'.'</div>';
                } elseif($con[$i] == 1) {
                    $week .= '<div>通話</div>'.'</div>';
                } elseif($con[$i] == 2) {
                    $week .= '<div>ビデオ通話</div>'.'</div>';
                }
                $a = 1;
            } else if($dai[$i] == $date) {
                $week .= '<td>'.$day.'<br>'.'<div id="sc">'.'<div>'.$nam[$i].'</div>'.'<div>'.$tim[$i].'</div>';
                if($con[$i] == 0) {
                    $week .= '<div>チャット</div>'.'</div>';
                } elseif($con[$i] == 1) {
                    $week .= '<div>通話</div>'.'</div>';
                } elseif($con[$i] == 2) {
                    $week .= '<div>ビデオ通話</div>'.'</div>';
                }
                $a = 1;
            }
        }

        if($a == 0) {
            $week .= '<td>'.$day;
        }

        $week .= '</td>';
        
        // 週終わり、または、月終わりの場合
        if ($youbi % 7 == 6 || $day == $day_count) {

            if ($day == $day_count) {
                // 月の最終日の場合、空セルを追加
                // 例）最終日が水曜日の場合、木・金・土曜日の空セルを追加
                $week .= str_repeat('<td></td>', 6 - $youbi % 7);
            }

            // weeks配列にtrと$weekを追加する
            $weeks[] = '<tr>' . $week .'</tr>';

            // weekをリセット
            $week = '';
        }

    }

?>

<link rel="stylesheet" href="css/test2.css">

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PHPカレンダー</title>
    </head>

    <body>
        <div class="container">
            <div class="mb-5">
                <a href="?ym=<?php echo $prev; ?>">&lt;</a> 
                <?php echo $html_title; ?> 
                <a href="?ym=<?php echo $next; ?>">&gt;</a>
            </div>

            <table>
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                    }
                ?>
            </table>
        </div>
    </body>
</html>