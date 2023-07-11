<?php
include("../dbConnect.php");
include("../functionsCA.php");
session_start();


$g = $_SESSION['gender'];
$n = $_SESSION['username'];
$p = $_SESSION['pass'];
$caid = $_SESSION['CAid'];
$_SESSION['worries'] = $_POST['worries'];
$worries[] = $_SESSION['worries'];

if (!isset($_SESSION['username'], $_SESSION['pass'], $_SESSION['CAid'])) {
  echo "ログインしてください";
} else {
  echo "ようこそ" . $_SESSION['username'] . "さん";
}

$sql = "SELECT * FROM Cacategory WHERE Caid = $caid";
mysqli_query($conn, $sql);
if (!isset($sql)) {
if (isset($_POST['worries']) && is_array($_POST['worries'])) {
  foreach ($_POST['worries'] as $value) {
      echo "{$value}, ";
      $cacategoryQuery = "INSERT into CAcategory(caid, ctnum) VALUES((select caid from CAuser where caid=$caid), $value)";
			var_dump($cacategoryQuery);
      mysqli_query($conn, $cacategoryQuery);
  }
}
echo '</p>';
}



#CTNUMまだやってない
$query = "UPDATE CAuser
          SET gender = $g
          WHERE CAid = $caid";
$res = mysqli_query($conn, $query);

$newCAid = mysqli_insert_id($conn);
$_SESSION['a'] = $newCAid;

// $scategoryQuery = "INSERT into scategory(sid, ctnum) VALUES((select sid from suser where sid=$ssid), $value)";
// 			mysqli_query($conn, $scategoryQuery);


// $user = 'dbuser';

// $password = 'ecc';
// $pdo = new PDO('mysql:dbname=studb;host=localhost', $user, $password);

// $sql = $pdo->prepare("INSERT INTO Suser(gender) VALUES (:g)");
// $sql->bindValue(':g', $_SESSION['gender']);
//
header('Location: /team/cahome/cahome.php');
?>
!