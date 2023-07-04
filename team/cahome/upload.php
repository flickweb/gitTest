<?php
// データベース設定ファイルを含む
include("../dbConnect.php");
include("../functions.php");
session_start();

// 保存先のディレクトリパス
$targetDir = "./img";

// アップロードされたファイルの情報を取得
$uploadedFile = $_FILES['image']['tmp_name'];
$fileName = $_FILES['image']['name'];
$targetFilePath = $targetDir.$fileName;
echo $uploadedFile, "<br>";
echo $fileName; 

// ファイルを指定のディレクトリに移動
move_uploaded_file($uploadedFile, $targetFilePath);

// 成功メッセージを表示
echo "画像がアップロードされました。";
?>
