<?php
// データベース設定ファイルを含む
include("../dbConnect.php");
include("../functions.php");
session_start();

$caid = $_SESSION['CAid'];

// 保存先のディレクトリパス
$targetDir = "./";

// アップロードされたファイルの情報を取得
$uploadedFile = $_FILES['image']['tmp_name'];
$fileName = $_FILES['image']['name'];
$targetFilePath = $targetDir.$fileName;
echo $uploadedFile, "<br>";
echo $fileName; 

// ファイルを指定のディレクトリに移動
move_uploaded_file($uploadedFile, $targetFilePath);

$query = "UPDATE CAuser
          SET filepass = '$fileName'
          WHERE CAid = $caid";
mysqli_query($conn, $query);

header('Location: /team/cahome/cahome.php');
?>
