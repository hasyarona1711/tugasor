<?php 

session_start();
//cek session
if(!isset($_SESSION["admin"]))
{
	header("location: loginadmin.php");
	exit;
}

require 'functions.php';

$dataeo = query("SELECT * FROM eo");



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Data Event Organizer</title>
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
	</style>
</head>
<body>

<div class="header">
	<h1 class="title is-3">Data User</h1>
	<ul>
		<li><a href="indexadmin.php" class="active">Home</a></li>
		<li><a href="datauser.php">Data User</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
	<tr>
		<th>Nama Event Organizer</th>
		<th>Alamat</th>
		<th>Nomor Telepon</th>
		<th>Email</th>
		<th>Username</th>
		<th>Ubah/Hapus</th>
	</tr>
	<?php foreach($dataeo as $eo) : ?>
	<tr>
		<td><?php echo $eo["nama_eo"]; ?></td>
		<td><?php echo $eo["alamat_eo"]; ?></td>
		<td><?php echo $eo["notlp_eo"]; ?></td>
		<td><?php echo $eo["email_eo"]; ?></td>
		<td><?php echo $eo["username_eo"]; ?></td>
		<td><button class="button is-primary"><a href="ubaheo.php?nama=<?php echo $eo["nama_eo"]; ?>">Ubah</a></button> <br><br> <button class="button is-primary"><a href="hapuseo.php?nama=<?php echo $eo["nama_eo"]; ?>" onclick="return confirm('yakin?');">Hapus</a></button></td>
	</tr>
	<?php endforeach; ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>