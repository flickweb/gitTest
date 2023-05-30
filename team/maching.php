<?php 
    session_start();
    include_once 'dbConnect.php';

    if (isset($_POST['worries']) && is_array($_POST['worries'])) {
        $_SESSION['worries'] = $_POST['worries'];

        foreach( $_SESSION['worries'] as $value ){
            echo "{$value}, ";
        }
    }
    echo '</p>';

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

    
</body>
</html>