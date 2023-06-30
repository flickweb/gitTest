<?php
// データベース設定ファイルを含む
include("../dbConnect.php");
include("../functions.php");
session_start();

echo $_FILES['image']['name'];
echo $_FILES['image']['tmp_name'];

if (isset($_POST['upload'])) { //送信ボタンが押された場合
    $pass = $_FILES['image']['name'];
    $caid = $_SESSION['CAid'];
    $up = $_POST['upload'];

    $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
    $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
    $file = "images/$image";


    $query = "UPDATE causer SET filepass = $pass where caid = $caid";

    if (!empty($_FILES['image']['name'])) { //ファイルが選択されていれば$imageにファイル名を代入
        move_uploaded_file($_FILES['image']['tmp_name'],"./img/$pass"); //imagesディレクトリにファイル保存
        if (exif_imagetype($file)) { //画像ファイルかのチェック
            $message = '画像をアップロードしました';
            mysqli_query($conn, $query);
        } else {
            $message = '画像ファイルではありません';
        }
    }
}
?>