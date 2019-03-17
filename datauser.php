<?php 

session_start();
//cek session
if(!isset($_SESSION["admin"]))
{
	header("location: loginadmin.php");
	exit;
}

require 'functions.php';

$datauser = query("SELECT * FROM user");


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
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
		<li><a href="dataeo.php">Data EO</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
	<tr>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Nomor Telepon</th>
		<th>Email</th>
		<th>Username</th>
		<th>Ubah/Hapus</th>
	</tr>
	<?php foreach($datauser as $user) : ?>
	<tr>
		<td><?php echo $user["nama_user"]; ?></td>
		<td><?php echo $user["alamat_user"]; ?></td>
		<td><?php echo $user["notlp_user"]; ?></td>
		<td><?php echo $user["email_user"]; ?></td>
		<td><?php echo $user["username_user"]; ?></td>
		<td><button class="button is-primary"><a href="ubahuser.php?nama=<?php echo $user["nama_user"]; ?>">Ubah</a></button> <br><br> <button class="button is-primary"><a href="hapususer.php?nama=<?php echo $user["nama_user"]; ?>" onclick="return confirm('yakin?');">Hapus</a></button></td>
	</tr>
	<?php endforeach; ?>	
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>