<?php
include_once 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>

<body>
    <?php

    $sql = "SELECT causer.name
             from scategory
             inner join cacategory on scategory.ctnum = cacategory.ctnum
             inner join causer on cacategory.caid = causer.caid
             where scategory.sid = 2";
            //ログイン情報があったら使う    
            //where scategory.sid = " .$sid;
    

    if ($result = mysqli_query($conn, $sql)) {
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row['name'] . "<br>";
                // echo $row['caid'] . "<br>";
            }
        }
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
    ?>

</body>
</head>


</html>