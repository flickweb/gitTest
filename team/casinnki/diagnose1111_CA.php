<?php
include("../dbConnect.php");
include("../functionsCA.php");
session_start();


$g = $_SESSION['gender'];
$n = $_SESSION['name'];
$p = $_SESSION['pass'];
$caid = $_SESSION['CAid'];
$_SESSION['worries'] = $_POST['worries'];
$worries[] = $_SESSION['worries'];

if (!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['CAid'])) {
  echo "ログインしてください";
} else {
  echo "ようこそ" . $_SESSION['name'] . "さん";
}

if (isset($_POST['worries']) && is_array($_POST['worries'])) {
  foreach ($_POST['worries'] as $value) {
      echo "{$value}, ";
      $scategoryQuery = "INSERT into CAcategory(caid, ctnum) VALUES((select caid from CAuser where caid=$caid), $value)";
			var_dump($scategoryQuery);
      mysqli_query($conn, $scategoryQuery);
  }
}
echo '</p>';



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
?>
!