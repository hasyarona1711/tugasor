<?php 

session_start();

require 'functions.php';

if(isset($_SESSION["admin"]))
{
	header("location: indexadmin.php");
	exit;
}
if(isset($_POST["login3"]))
{
	$username = $_POST["username"];
	$password = $_POST["password"];

	$admin = ["$username","$password"];

	if($username === "admin" && $password === "123")
	{
		//set session
		$_SESSION["admin"] = $admin;
		header("location: indexadmin.php");
		exit;
	}
	$error = true;
}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
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
		.tulisanloginadmin{
			padding-top: 30px;
		}
		.login a{
			color: black;
		}
		label{
			display: block;
		}
		p{
			font-style: italic;
			color: red;
		}
	</style>
</head>
<body>

<div class="tulisanlogin">
	<div class="tulisanloginadmin">
		<h3 class="title is-3">Login Admin</h3>
	</div>
	<div class="kembali">
		<h6 class="title is-6"><a href="index.php">Kembali</a></h6>
	</div>
</div>
<?php if(isset($error)) : ?>
	<p>Anda Bukan Admin!</p>
<?php endif; ?>
<center>
	<div class="login">
<form action="" method="post">
	<ul>
		<li>
			<label>Username</label>
			<input type="text" name="username" autofocus="" autocomplete="off">
		</li>
		<li>
			<label>Password</label>
			<input type="password" name="password">
		</li>
		<li>
			<button type="submit" name="login3">Login</button>
		</li>
	</ul>
</form>
</div>
</center>
<br><br><br><br><br><br><br>
</body>
</html>