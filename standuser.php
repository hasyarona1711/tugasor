<?php 
session_start();

require 'functions.php';

if(!isset($_SESSION["user"]))
{
	header("location: loginuser.php");
	exit;
}

$username = $_SESSION["user"][0];

$user = query("SELECT * FROM user WHERE username_user = '$username'")[0];

$nama = $_GET["nama"];

$evt = query("SELECT * FROM event WHERE nama_event = '$nama'")[0];

$namaevent = $evt["nama_event"];

$infostand = query("SELECT * FROM marketing WHERE nama_event LIKE '$nama'");


 ?>





<!DOCTYPE html>
<html>
<head>
	<title>Marketing Jenis Stand</title>
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
		table td{
			text-align: center;
		}
		td a{
			color: black;
		}
	</style>
</head>
<body>

<div class="header">
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexuser.php" class="active">Home</a></li>
		<li><a href="mengubahuser.php">Edit Profile</a></li>
		<li><a href="menghapususer.php?nama=<?php echo $user["nama_user"]; ?>">Hapus Akun</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>
<center>
<img src="img/<?php echo $evt["stand_event"]; ?>" width="50%">
<img src="img/<?php echo $evt["layout_event"]; ?>" width="50%">
</center>
<form action="" method="post">
	<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

		<tr>
			<th></th>
			<th>Nama Event</th>
			<th>Nama Stand</th>
			<th>Harga Stand</th>
		</tr>
		<?php foreach($infostand as $info) : ?>
		<tr>
			<td><button class="button is-primary"><a href="marketingstand.php?nama=<?php echo $info["nama_marketing"]; ?>">Pilih</a></button></td>
			<td><?php echo $info["nama_event"]; ?></td>
			<td><?php echo $info["nama_marketing"]; ?></td>
			<td><?php echo $info["harga_marketing"]; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<br>
</form>
<br><br><br><br><br><br><br>
</body>
</html>