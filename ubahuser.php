<?php 

require 'functions.php';

$nama = $_GET["nama"];

$user = query("SELECT * FROM user WHERE nama_user = '$nama'")[0];

$password = $user["password_user"];

if(isset($_POST["ubah"]))
{
	if($_POST["passwordlama"] === $password)
	{
		if(ubahuser($_POST) > 0)
		{
			echo 
			"
				<script> alert('Perubahan Data Berhasil Dilakukan');
				documet.location.href: 'datauser.php'
				</script>
			";
		}
		else
		{
			echo
			"
				<script> alert('Perubahan Data Gagal Dilakukan');
				</script>
			";
		}
	}
}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Marketing Event Expo Indonesia</title>
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
		.ubahuser{
			margin-top: 200px;
			width: 500px;
			background-color: lightblue;
			padding: 50px;
			border-radius: 30px;

		}
	</style>
</head>
<body>

<div class="header">
	<h1 class="title is-3">Ubah Data User</h1>
	<ul>
		<li><a href="indexadmin.php" class="active">Home</a></li>
		<li><a href="datauser.php">Data User</a></li>
		<li><a href="dataeo.php">Data EO</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>


<center>
<div class="ubahuser">
<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
	<table>
		<tr>
			<td>Nama : </td>
			<td><input type="text" name="nama" value="<?php echo $user["nama_user"]; ?>"></td>
		</tr>
		<tr>
			<td>Alamat : </td>
			<td><input type="text" name="alamat" value="<?php echo $user["alamat_user"]; ?>"></td>
		</tr>
		<tr>
			<td>Nomor Telepon : </td>
			<td><input type="text" name="notlp" value="<?php echo $user["notlp_user"]; ?>"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email" value="<?php echo $user["email_user"]; ?>"></td>
		</tr>
		<tr>
			<td>Username : </td>
			<td><input type="text" name="username" value="<?php echo $user["username_user"]; ?>"></td>
		</tr>
		<tr>
			<td>Password Lama : </td>
			<td><input type="password" name="passwordlama"></td>
		</tr>
		<tr>
			<td>Password Baru : </td>
			<td><input type="password" name="passwordbaru1"></td>
		</tr>
		<tr>
			<td>Konfirmasi Password : </td>
			<td><input type="password" name="passwordbaru2"></td>
		</tr>
		<tr>
			<td><button type="submit" name="ubah">Submit</button></td>
		</tr>
	</table>
</form>
</div>
</center>
<br><br><br><br><br><br>
</body>
</html>