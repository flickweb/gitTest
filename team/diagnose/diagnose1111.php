<?php
include("../dbConnect.php");
include("../functions.php");
session_start();

if (!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['Sid'])) {
  echo "ログインしてください";
} else {
  echo "ようこそ" . $_SESSION['name'] . "さん";
}



if (isset($_POST['worries']) && is_array($_POST['worries'])) {
  foreach ($_POST['worries'] as $value) {
    echo "{$value}, ";
  }
}
echo '</p>';
$user = 'dbuser';

$password = 'ecc';
$pdo = new PDO('mysql:dbname=studb;host=localhost', $user, $password);

$sql = $pdo->prepare("INSERT INTO Suser( name, pass, gender) VALUES (:n, :p, :g)");
$sql->bindValue(':g', $_SESSION['gender']);
$sql->bindValue(':p', $_SESSION['pass']);
$sql->bindValue(':n', $_SESSION['name']);
$sql->execute();
?>