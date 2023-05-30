<?php
include_once 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>

<body>

    <?php

    $sql = "SELECT scategory.sid, cacategory.caid
             from scategory
             inner join cacategory on scategory.ctnum = cacategory.ctnum
             ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($result = mysqli_query($conn, $sql)) {
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row['sid'] . "<br>";
                
                echo $row['caid'] . "<br>";
            }
        }

    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }



    // }
    ?>

</body>
</head>


</html>