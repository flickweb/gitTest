<?php
include("../dbConnect.php");
include("../functions.php");
session_start();


$g = $_SESSION['gender'];
$n = $_SESSION['name'];
$p = $_SESSION['pass'];
$ssid = $_SESSION['Sid'];
$_SESSION['worries'] = $_POST['worries'];
$worries[] = $_SESSION['worries'];

if (!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['Sid'])) {
  echo "ログインしてください";
} else {
  echo "ようこそ" . $_SESSION['name'] . "さん";
}

$sql1 = "SELECT Sid FROM Suser WHERE Sid = $ssid";
mysqli_query($conn, $sql1);
$sql2 = "SELECT Sid FROM Scategory WHERE Sid = $ssid";
mysqli_query($conn, $sql2);
if (isset($sql1) && !isset($sql2)) {
  if (isset($_POST['worries']) && is_array($_POST['worries'])) {
    foreach ($_POST['worries'] as $value) {
      echo "{$value}, ";
      $scategoryQuery = "INSERT into scategory(sid, ctnum) VALUES((select sid from suser where sid=$ssid), $value)";
      mysqli_query($conn, $scategoryQuery);
    }
  }
  echo '</p>';
}



#CTNUMまだやってない
$query = "UPDATE Suser
          SET gender = $g
          WHERE Sid = $ssid";
$res = mysqli_query($conn, $query);

$newSid = mysqli_insert_id($conn);
$_SESSION['a'] = $newSid;

// $scategoryQuery = "INSERT into scategory(sid, ctnum) VALUES((select sid from suser where sid=$ssid), $value)";
// 			mysqli_query($conn, $scategoryQuery);


// $user = 'dbuser';

// $password = 'ecc';
// $pdo = new PDO('mysql:dbname=studb;host=localhost', $user, $password);

// $sql = $pdo->prepare("INSERT INTO Suser(gender) VALUES (:g)");
// $sql->bindValue(':g', $_SESSION['gender']);
// 
header('Location: ../maching.php');
