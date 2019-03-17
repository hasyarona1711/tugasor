<?php 

session_start();

if(isset($_SESSION["user"]))
{
	header("location: indexuser.php");
	exit;
}


require 'functions.php';

if(isset ($_POST["login1"]))
{
	$username = $_POST["username"];
	$password = $_POST["password"];

	$user = ["$username","$password"];


	$result = mysqli_query($db,"SELECT * FROM user WHERE username_user = '$username'");

	//cek username
	if(mysqli_num_rows($result) === 1)
	{
		//cek password
		$pass = mysqli_fetch_assoc($result);

		if($password === $pass["password_user"])
		{
			$event = query("SELECT * FROM event");
			//set session
			$_SESSION["user"] = $user;
			// login sukses, beralih ke halaman indexuser
			header("location: indexuser.php");
			exit;
		}

	}
	$error = true;			
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login User</title>
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
	<h3 class="title is-3">Login User</h3>
	</div>
<div class="kembali">
	<h6 class="title is-6"><a href="index.php">Kembali</a></h6>
</div>
</div>

<center>
<div class="login">	
	<?php if(isset($error)) : ?>
	<p>Username / Password Salah!</p>
	<?php endif ?>
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
				<td><button type="submit" name="login1" class="button">LOGIN</button></td>
				<td><button type="button" name="daftar" class="button is-primary" ><a href="registrasiuser.php">Belum Punya Akun?</a>
				</button></td>
			</tr>
		</table>
			
		</form>
</div>

</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>