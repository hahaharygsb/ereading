<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login1.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="./css/login.css">
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
		padding: 5px;
		width: 90px;
		color: white;
		background-color: skyblue;
		border: none;
	}
	#box{
		background-color: black;
		margin: auto;
		width: 300px;
		padding: 8px;
	}

	</style>
	<div id="box">
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<h2>User Name</h2>
			<input id="text" type="text" name="user_name"placeholder="User Name">
			<h2>Password</h2>
			<input id="text" type="password" name="password"placeholder="Password">
			<input id="button" type="submit" value="Signup">
			<a href="login1.php">Click here to Sign In</a><br>
		</form>
	</div>
</body>
</html>