<?php 
session_start();

if(!isset($_SESSION["admin"]))
{
	header("location: loginadmin.php");
	exit;
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<style>
		body{
			background-image: url(bahan/folk-pattern.png);
		}
		.logout{
			float: right;
		}
		.profile{
			float: left;
			margin-top: 30px;
			
		}
		.header{
			padding-bottom: 0;
			margin-bottom: 20px;
			background-color: lightblue;
		}
		.boxlogout{
			margin-top: 30px;	
		}
		ul{
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: grey;
		}
		li{
			float: left;
			border-right:1px solid black;
			
		}
		li a{
			display: block;
			color: black;
			text-align: center;
			padding: 5px 6px;
			text-decoration: none;
		}
		li a:hover:not(.active){
			bacground-color: white;
		}
		.active{
			bacground-color: #4caf50;
		}
		.tulisanheader{
			padding-left: 10px;
		}
		li.logout{
			float: right;
			border-style: none;
		}
		.pilihan{
			margin-top: 200px;
		}
	</style>
</head>
<body>

<div class="header">
	<h1 class="title is-3">Selamat Datang, Admin</h1>
	<ul>
		<li><a href="indexadmin.php" class="active">Home</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

<center>
<div class="pilihan">
	<button class="button is-primary"><a href="datauser.php">Data User</a></button>
	<button class="button is-primary"><a href="dataeo.php">Data EO</a></button>	
</div>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>