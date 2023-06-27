<?php
session_start();

include("../dbConnect.php");
include("../functionsCA.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// Something was posted
	$user_name = $_POST['username'];
	$password = $_POST['pass'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {


		// Save to database
		$query = "INSERT INTO causer (username, pass) VALUES('$user_name', '$password')";

		$res = mysqli_query($conn, $query);

		if ($res) {
			// Get the generated Sid from the Suser table
			// $newSid = mysqli_insert_id($conn);
			// $_SESSION['a'] = $newSid;


			// Insert the new Sid into the Scategory table
			// $scategoryQuery = "INSERT INTO Scategory (ctnum) VALUES (null)";
			// mysqli_query($conn, $scategoryQuery);

			header("Location: loginCA.php");

			// echo "登録完了！";
		} else {
			echo "登録失敗！";
		}
	} else {
		echo "アルファベットを含むユーザー名を入力してください。";
	}
}
?>




<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
</head>

<body>

	<style type="text/css">
		#text {

			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {

			padding: 10px;
			width: 50%;
			color: white;
			background-color: lightblue;
			border: none;
			text-align: center;
			text-decoration: none;
		}

		#box {
			background-color: whitesmoke;
			margin: 100px auto;
			width: 400px;
			/* display: flex; */
			/* padding: 20px; */
			flex-direction: column;
			border-radius: 5px;
			box-shadow: 0 2px 25px rgb(0 0 0 / 20%);
		}

		h1 {
			/* padding :10px 5px 5px 5px; */
			padding: 35px 35px 0 35px;
			font-size: 2em;
			font-weight: 300;
			margin: 0;
		}

		.content {
			/* padding: 5px 5px 5px 10px;  */
			padding: 35px;
			text-align: center;
		}

		.input-field {
			padding: 0px;
		}

		.input-field input {
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

		.action {
			display: flex;
			flex-wrap: nowrap;
		}
	</style>


	<div id="box">

		<form method="post">
			<h1>サインアップ カウンセラ</h1>
			<div class="content">
				<div class="input-field">
					<input type="text" type="text" name="username" placeholder="ユーザー"><br><br>
				</div>
				<div class="input-field">
				<input type="password" type="password" name="pass" id="myInput" placeholder="パスワード"
						pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
						oninvalid="setCustomValidity('8文字以上少なくとも1つの文字と1つの数字')"
						onchange="try{setCustomValidity('')}catch(e){}"><br><br>
				</div>
				<input type="checkbox" onclick="myFunction()">パスワード表示
				<script src="../shinkiToroku_login/signup.js"></script>
			</div>

			<div class="action">
				<a id="button" href="/team/casinnki/loginCA.php">ログインページへ</a>
				<a id="button" href="/team/shinkiToroku_login/signup.php">生徒</a>
				<input id="button" type="submit" value="新規登録">
			</div>
		</form>
	</div>

</body>

</html>