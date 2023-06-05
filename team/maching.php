<?php
include_once 'dbConnect.php';
session_start();

// if (isset($_POST['worries']) && is_array($_POST['worries'])) {
//     $_SESSION['worries'] = $_POST['worries'];

//     foreach ($_SESSION['worries'] as $value) {
//         echo "{$value}, ";
//     }
// }
// echo '</p>';

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    $sql = "SELECT causer.name
    from scategory
    inner join cacategory on scategory.ctnum = cacategory.ctnum
    inner join causer on cacategory.caid = causer.caid
    where scategory.sid = 3";
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

</html>