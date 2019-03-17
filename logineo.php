<?php 

session_start();
require 'functions.php';

if(isset($_SESSION["eo"]))
{
	header("location: indexeo.php");
	exit;
}


if(isset($_POST["login2"]))
{
	$username = $_POST["username"];
	$password = $_POST["password"];

	$eo = ["$username","$password"];

	$result = mysqli_query($db , "SELECT * FROM eo WHERE username_eo = '$username'");

	//cek username
	if(mysqli_num_rows($result) === 1)
	{
		//cek password
		$pass = mysqli_fetch_assoc($result);

		if($password === $pass["password_eo"])
		{
			//set session
			$_SESSION["eo"] = $eo;
			header("location: indexeo.php");
			exit;
		}
	}
	$error = true;

}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login EO</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<style>
		.tulisanlogin{
		background-color: lightblue;
		padding-bottom: 50px;
		}
		body{
			background-image: url(bahan/folk-pattern.png);
		}
		.login{
			margin-top: 200px;
			width: 400px;
			background-color: lightblue;
			padding: 50px;
			border-radius: 30px;	
		}
		.kembali{
			float: right;
			padding-right: 10px;
		}
		.tulisanloginuser{
			padding-top: 30px;
		}
		.login a{
			color: black;
		}
		p{
			font-style: italic;
			color: red;
		}
	</style>
</head>
<body>

<div class="tulisanlogin">
	<div class="tulisanloginuser">
		<h3 class="title is-3">Login Event Organizer</h3>
	</div>
	<div class="kembali">
		<h6 class="title is-6"><a href="index.php">Kembali</a></h6>
	</div>
</div>

<?php if(isset($error)) : ?>
	<p>Username / Password Salah!</p>
<?php endif; ?>
<center>
<div class="login">	
		<form action="" method="post">
		<table>
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" name="username" id="username" autofocus="" autocomplete="off"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password" id="password"></td>
			</tr>
			<tr>
				<td><button type="submit" name="login2" class="button">LOGIN</button></td>
				<td><button type="button" name="daftar" class="button is-primary" ><a href="registrasieo.php">Belum Punya Akun?</a>
				</button></td>
			</tr>
		</table>
			
		</form>
</div>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>