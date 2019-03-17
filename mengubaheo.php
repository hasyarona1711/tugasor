<?php 

session_start();
require 'functions.php';

if(!isset($_SESSION["eo"]))
{
	header("location: logineo.php");
	exit;
}

$username = $_SESSION["eo"][0];

$eo = query("SELECT * FROM eo WHERE username_eo = '$username'")[0];

$password = $eo["password_eo"];

if(isset($_POST["ubah"]))
{
	//cek apakah password lama sama dengan password
	if($_POST["passwordlama"] === $password)
	{
		if(ubaheo($_POST) > 0)
		{
			echo 
			"
				Data Berhasil Diubah!
			";
		}
		else
		{
			echo
			"
				Data Gagal Diubah!
			";
		}
	}
	else
	{
		$error = true;
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
		.header ul{
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: grey;
		}
		.header li{
			float: left;
			border-right:1px solid black;
			
		}
		.header li a{
			display: block;
			color: black;
			text-align: center;
			padding: 5px 6px;
			text-decoration: none;
		}
		.header li a:hover:not(.active){
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
		.ubaheo{
			margin-top: 100px;
			width: 500px;
			background-color: lightblue;
			padding: 50px;
			border-radius: 30px;

		}
		label{
			display: block;
		}
		p{
			color: red;
			font-style: italic;
		}
		.menuedit{
			background-color: grey;
			color: black;
			border: none;
			cursor: pointer;
			padding:8px 6px;
			text-align: center; 
		}
		.dropdown{
			position: relative;
			display: inline-block;
		}
		.dropdown-child{
			display: none;
			background-color: white;
		}
		.dropdown-child a{
			color: black;
			padding: 5px 6px;
			text-decoration: none;
			display: block;
		}
		.dropdown:hover .dropdown-child{
			display: block;
		}


	</style>
</head>
<body>
<?php if(isset($error)) : ?>
	<p>Username / Password salah</p>
<?php endif; ?>
<div class="header">
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexeo.php" class="active">Home</a></li>
		<div class="dropdown">
			<button class="menuedit">Edit Profile</button>
			<div class="dropdown-child">
			<a href="menghapuseo.php?nama=<?php echo $eo["nama_eo"]; ?>" onclick="return confirm('yakin?');">Hapus Akun</a>
			</div>
		</div>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

<center>
<div class="ubaheo">
<form action="" method="post">
	<ul>
		<li>
			<label>Nama : </label>
			<input type="text" name="nama" value="<?php echo $eo["nama_eo"]; ?>">
		</li>
		<li>
			<label>Alamat : </label>
			<input type="text" name="alamat" value="<?php echo $eo["alamat_eo"]; ?>">
		</li>
		<li>
			<label>Nomor Telepon : </label>
			<input type="text" name="notlp" value="<?php echo $eo["notlp_eo"]; ?>">
		</li>
		<li>
			<label>Email : </label>
			<input type="text" name="email" value="<?php echo $eo["email_eo"]; ?>">
		</li>
		<li>
			<label>Username : </label>
			<input type="text" name="username" value="<?php echo $eo["username_eo"]; ?>">
		</li>
		<li>
			<label>Password Lama : </label>
			<input type="password" name="passwordlama">
		</li>
		<li>
			<label>Password Baru : </label>
			<input type="password" name="passwordbaru1">
		</li>
		<li>
			<label>Konfirmasi Password : </label>
			<input type="password" name="passwordbaru2">
		</li>
		<button type="submit" name="ubah">Submit</button>
	</ul>
</form>
</div>
</center>
<br><br>
</body>
</html>