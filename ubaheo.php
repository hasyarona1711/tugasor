<?php 

require 'functions.php';

$nama = $_GET["nama"];

$eo = query("SELECT * FROM eo WHERE nama_eo = '$nama'")[0];

if(isset($_POST["ubah"]))
{
	if(ubaheo($_POST) > 0)
	{
		echo 
		"
			<script> alert('Perubahan Data Berhasil Dilakukan');
				documet.location.href: 'dataeo.php'
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
	</style>
</head>
<body>
<div class="header">
	<h1 class="title is-3">Ubah Data EO</h1>
	<ul>
		<li><a href="indexadmin.php" class="active">Home</a></li>
		<li><a href="datauser.php">Data User</a></li>
		<li><a href="dataeo.php">Data EO</a></li>
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
			<input type="hidden" name="username" value="<?php echo $eo["username_eo"]; ?>">
		</li>
		<button type="submit" name="ubah">Submit</button>
		<button name="ubahpass"><a href="ubahpasseo.php?nama=<?php echo $eo["nama_eo"]; ?>">Ubah Password</a></button>
	</ul>
</form>
</div>
</center>
<br><br><br><br><br><br><br><br><br>
</body>
</html>