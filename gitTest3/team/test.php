<?php 
    include_once 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="jp">
    <head>
    </head>
    <body>

    <?php
        $sql="SELECT * FROM Suser;";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0){
            while($row=mysqli_fetch_assoc($result)){
                echo $row['Sid']."<br>";
                echo $row['pass']."<br>";
                
            }
        }

        $sql="SELECT * FROM category;";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0){
            while($row=mysqli_fetch_assoc($result)){
                echo $row['ctnum']."<br>";
                echo $row['category']."<br>";
                
            }
        }
    ?>
</body>
</html>