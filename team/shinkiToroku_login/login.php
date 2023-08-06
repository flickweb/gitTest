<?php 

session_start();

	include ("../dbConnect.php");
	include("../functions.php");

// echo $_SESSION['a'];
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['name'];
		$password = $_POST['pass'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			 $query = "SELECT * FROM Suser WHERE name = '$user_name' limit 1";
			 $result = mysqli_query($conn, $query);
             $checkCTNUM = "SELECT ctnum FROM Suser WHERE name = '$user_name' limit 1";
             $resultCTNUM = mysqli_query($conn, $checkCTNUM);

            

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass'] === $password)
					{

						// $_SESSION['user_id'] = $user_data['id'];
                        $_SESSION['name'] = $user_data['name'];
                        $_SESSION['Sid'] = $user_data['Sid'];
                        $_SESSION['pass'] = $user_data['pass'];
                        $_SESSION['gender'] = $user_data['gender'];


                        #if udah isi, lgsg ke home
                        if($resultCTNUM && mysqli_num_rows($resultCTNUM) > 0){
                            header("Location: ../home/homeTwo.php");
                        }

						header("Location: ../diagnose/diagnose1.php");
						
					}
				}
			}
			
			echo "ユーザー名またはパスワードの間違い!";
		}else
		{
			echo "ユーザー名またはパスワードの間違い!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
     <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'><link rel="stylesheet" href="../css/loginStyle.css">
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
        width: 50%;
        color: white;
        background-color: rgb(255, 145, 0);
        border: none;
        text-align: center;
        text-decoration: none;
	}

	#box{
        background-color: whitesmoke;
        margin: 100px auto;
        width: 400px;
        /* display: flex; */
        /* padding: 20px; */
        flex-direction: column;
        border-radius: 5px;
        box-shadow: 0 2px 25px rgb(0 0 0 / 20%);
	}

    h1{
        /* padding :10px 5px 5px 5px; */
        padding: 35px 35px 0 35px;
        font-size: 2em;
        font-weight: 300;
        margin: 0;
    }

    .content{
        /* padding: 5px 5px 5px 10px;  */
        padding: 35px;
        text-align: center;
    }

    .input-field{
        padding: 0px;
    }

    .input-field input{
    background-color: whitesmoke;
    font-size: 16px;
    display: block;
    font-family: 'Rubik', sans-serif;
    width: 100%;
    padding: 10px 1px;
    border: 0;
    border-bottom: 1px solid #747474;
    outline: none;
    transition: all .2s;
    }

    .action{
    display: flex;
    flex-wrap: nowrap;
    /* -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    flex-direction: row; */
}
	</style>

	<div id="box">
		
		<form method="post">
			<h1>ログイン</h1>
            <div class="content">
                <div class="input-field">
			        <input type="text" type="text" name="name" placeholder="ユーザー"><br><br>
			    </div>
                <div class="input-field">
                    <input type="password" type="password" name="pass" id="myInput" placeholder="パスワード"><br><br>
                </div>
                <input type="checkbox" onclick="myFunction()">パスワード表示
                <script src="login.js"></script>
            </div>

            <div class="action">
				<a id="button" href="signup.php">新規登録ページへ</a>
                <input id="button" type="submit" value="ログイン">
                
            
            </div>
		</form>
	</div>
</body>
</html>