<?php
session_start();
if (isset($_POST['worries']) && is_array($_POST['worries'])) {
  foreach( $_POST['worries'] as $value ){
      echo "{$value}, ";
  }
}
echo '</p>';$user = 'dbuser';

$password = 'ecc';
$pdo = new PDO('mysql:dbname=studb;host=localhost', $user, $password);

$sql = $pdo->prepare("INSERT INTO Suser(gender) VALUES (:g)");
$sql->bindValue(':g', $_SESSION['gender']);
$sql->execute();
?>