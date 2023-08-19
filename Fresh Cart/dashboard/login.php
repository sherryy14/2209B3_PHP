<?php 

include 'config.php';

session_start();

if(isset($_SESSION['user'])){
	header("location: index.php");
}

if(isset($_POST['login'])){
	$username  = $_POST['username'];
	$password  = $_POST['pass'];


	$fetch = "SELECT * FROM `admin` WHERE `username` = '{$username}' AND `password` = '{$password}'";
	$res = mysqli_query($conn,$fetch);

	if(mysqli_num_rows($res)==1){
		$_SESSION["user"]=$username;

		header("location: index.php");

	}else{
		$error  = "Incorrect Username Or Password";
	}

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fresh Cart Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../assets/images/login/icons/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">

	<meta name="robots" content="noindex, follow">
</head>

<body>
	<div class="container-login100" style="background-image: url('../assets/images/login/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-37">
					Admin Login
				</span>

				<div><?php echo @$error?></div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="username" placeholder="username or email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
					<input class="input100" type="password" name="pass" placeholder="password">
					<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type='submit' name='login'>
						Login
					</button>
				</div>
				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>
				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>
					<a href="#" class="login100-social-item">
						<img src="../assets/images/login/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>

			</form>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

</body>

</html>