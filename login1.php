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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" href="./css/login.css">
	<link rel="stylesheet" href="index.html">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container" id="container">
<div class="form-container sign-up-container">
<form method="post">
	<h1>Log In</h1>
	<div class="social-container">
		<a href="https://www.facebook.com" class="social"><i class="fa fa-facebook"></i></a>
		<a href="https://www.google.com/" class="social"><i class="fa fa-google"></i></a>
	</div>
			<input id="text" type="text" name="user_name" placeholder="Name">
			<input id="text" type="password" name="password" placeholder="Password">
			<input id="button" type="submit" value="Login">
</form>
</div>
<div class="form-container sign-in-container">
	<form action="">
		<h1>Create account</h1>
		<div class="social-container">
		<a href="https://www.facebook.com" class="social"><i class="fa fa-facebook"></i></a>
		<a href="https://www.google.com/" class="social"><i class="fa fa-google"></i></a>
	</div>
	<span>or use your account</span>
			<a href="signup.php">Click to Sign Up</a>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
		<h1>E-Reading Portal</h1>
			<h2>Hello, Friend!</h2>
			<p>If you want to Explore and Read more Books please Click Sign Up</p>
			<div class="logo">
				<img src="images/2.png" alt="logo" height="80" width="70">
				</div>	
			<button class="ghost" id="signIn">Sign Up</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>E-Reading Portal</h1>
		<h2>Welcome Back!</h2>
			<p>If you already have an existing account please Click Sign In </p>
			<div class="logo">
				<img src="images/2.png" alt="logo" height="130" width="90">
			</div>
			<button class="ghost" id="signUp">Sign In</button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');
	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
</body>
</html>