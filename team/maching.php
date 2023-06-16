<?php
include_once 'dbConnect.php';
include_once 'functions.php';
session_start();


if (!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['Sid'])) {
    echo "ログインしてください";
} else {
}

$n = $_SESSION['name'];
$ssid= $_SESSION['Sid'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
</head>

<body>
    <?php

    $sql = "SELECT DISTINCT causer.name
             from scategory
             inner join cacategory on scategory.ctnum = cacategory.ctnum
             inner join causer on cacategory.caid = causer.caid
             where scategory.sid = $ssid";
            //ログイン情報があったら使う    
            //where scategory.sid = " .$sid;
    

    if ($result = mysqli_query($conn, $sql)) {
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row['name'] . "<br>";
                
            }
        }
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
    ?>


</body>

</html>