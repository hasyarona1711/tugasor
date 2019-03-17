<?php 

session_start();

if(isset($_SESSION["user"]))
{
	header("location: indexuser.php");
	exit;
}
else
{
	if(isset($_SESSION["eo"]))
	{
		header("location: indexeo.php");
		exit;
	}
	else
	{
		if(isset($_SESSION["admin"]))
		{
			header("location: indexadmin");
			exit;
		}
	}
}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login sebagai</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<style>
		.box{
			padding-top: 30px;
			padding-bottom: 100px;
			background-color: lightblue;
		}
		.tombol_pilihan{
			margin-top: 200px;
		}
		.index{
			background-image: url(bahan/folk-pattern.png);
		}
	</style>
</head>
<body class="index">
<div class="box">
<h1 class="title is-3">Marketing Event Expo Indonesia</h1>
</div>
<center>	
	<div class="tombol_pilihan">
	<a href="loginuser.php"><button class="button is-primary" >USER</button></a>
	<a href="loginadmin.php"><button class="button is-primary">ADMIN</button></a>
	<a href="logineo.php"><button class="button is-primary">EVENT ORGANIZER</button></a>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</center>
</body>
</html>