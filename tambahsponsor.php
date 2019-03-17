<?php 
session_start();

require 'functions.php';

if(!isset($_SESSION["eo"]))
{
	header("location: logineo.php");
	exit;
}

$eo = $_SESSION["eo"][0];

$nama = $_GET["nama"];


// cek apakah tombol submit sudah ditekan atau belum

if(isset($_POST["submit"]))
{
	//cek apakah penambahan data berhasil atau tidak
	if(tambahmarketing($_POST) > 0)
	{
		echo 
		"
			<script> alert('Data Berhasil Ditambahkan!'); </script>
		";
	}
	else
	{
		echo 
		"
			<script> alert('Data Gagal Ditambahkan!'); </script>
		";
	}
}

if(isset($_POST["kembali"]))
{
	header("location: indexeo.php");
	exit;
}



 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Data Sponsor</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<style>
		label{
			display: block;
		}
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
		.header li.logout{
			float: right;
			border-style: none;

		}
		.tambahsponsor{
			margin-top: 200px;
			width: 450px;
			background-color: lightblue;
			padding: 50px;
			border-radius: 30px;
		}
	</style>
</head>
<body>

<div class="header">
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexeo.php" class="active">Home</a></li>
		<li><a href="mengubaheo.php">Edit Profile</a></li>
		<li><a href="menghapuseo.php">Hapus Akun</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

<center>
<div class="tambahsponsor">
<form action="" method="post">

	<ul>
		<li>
			<label for="namaevent">Nama Event</label>
			<input type="text" name="namaevent" id="namaevent" value="<?php echo $nama ?>" autocomplete="off">
		</li>
		<li>
			<label for="namamarketing">Nama Marketing</label>
			<input type="text" name="namamarketing" id="namamarketing" autocomplete="off">
		</li>
		<li>
			<label>Jenis Marketing</label>
			<input type="text" name="jenismarketing" autocomplete="off">
		</li>
		<li>
			<label for="harga">Harga Marketing</label>
			<input type="text" name="harga" id="harga" autocomplete="">
		</li>
		<button type="submit" name="submit">Submit</button>
	</ul>
	
</form>
</div>
</center>
<br><br><br><br><br>
</body>
</html>