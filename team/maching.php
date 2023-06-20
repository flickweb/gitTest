<?php
include_once 'dbConnect.php';
include_once 'functions.php';
session_start();


if (!isset($_SESSION['name'], $_SESSION['pass'], $_SESSION['Sid'])) {
    echo "ログインしてください";
} else {
}

$n = $_SESSION['name'];
$ssid = $_SESSION['Sid'];
$value = $_SESSION['worries'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
</head>

<body>

     <!-- FIX THIS PART -->
     <!-- 順番 -->
    <?php
    $sql ="SELECT causer.name, cacategory.ctnum,  COUNT(*) AS match_count
    FROM scategory
    INNER JOIN cacategory ON scategory.ctnum = cacategory.ctnum
    INNER JOIN causer ON cacategory.caid = causer.caid
    WHERE scategory.sid = $ssid
    GROUP BY causer.caid
    ORDER BY 
    CASE WHEN scategory.ctnum IN (" . implode(',', $value) . ") THEN 0 ELSE 1 END,
    match_count DESC";
    ;

    if ($result = mysqli_query($conn, $sql)) {
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['name'] . "<br>";
            }
        } else {
            echo "No matching CAusers found.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>


</body>

</html>