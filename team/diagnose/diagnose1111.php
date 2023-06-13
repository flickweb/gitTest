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
$g = $_SESSION['gender'];
$n = $_SESSION['name'];
$p = $_SESSION['pass'];
$ssid = $_SESSION['Sid'];
$_SESSION['worries'] = $_POST['worries'];
$worries[] = $_SESSION['worries'];


#CTNUMまだやってない
$query = "UPDATE Suser
          SET gender = $g
          WHERE Sid = $ssid";
$res = mysqli_query($conn, $query);

$scategoryQuery = "UPDATE scategory
                    SET ctnum = $value
                    WHERE Sid = $ssid";
			mysqli_query($conn, $scategoryQuery);


// $user = 'dbuser';

// $password = 'ecc';
// $pdo = new PDO('mysql:dbname=studb;host=localhost', $user, $password);

// $sql = $pdo->prepare("INSERT INTO Suser(gender) VALUES (:g)");
// $sql->bindValue(':g', $_SESSION['gender']);
// ?>