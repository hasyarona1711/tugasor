<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["user"]))
{
	header("location: loginuser.php");
	exit;
}

$username = $_SESSION["user"][0];

$nama = $_GET["nama"];

$namasponsor = query("SELECT * FROM marketing WHERE nama_marketing = '$nama'")[0];

if(isset($_POST["submit"]))
{
	if(tambahmarketingsponsor($_POST) > 0)
	{
		echo 
		"
			<script> alert ('Pemilihan Sponsor Berhasil, Silahkan Hubungi EO yang Bersangkutan!');
			</script>
		";
	}
	else
	{
		echo mysqli_error($db);
	}
}

if(isset($_POST["home"]))
{
	header("location: indexuser.php");
	exit;
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pilih Sponsor</title>
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
		.header li.logout{
			float: right;
			border-style: none;

		}
		.formpenyewa{
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
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexuser.php" class="active">Home</a></li>
		<li><a href="mengubahuser.php">Edit Profile</a></li>
		<li><a href="menghapususer.php">Hapus Akun</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

 <center>
<div class="formpenyewa">
<form action="" method="post">
	<table>
	<input type="hidden" name="namauser" value="<?php echo $username; ?>">
	<tr>
			<td><label>Nama Penyewa : </label></td>
			<td><input type="text" name="namapenyewa" autofocus="" autocomplete="off"></td>
	</tr>
	<tr>
			<td><label>Nama Sponsor yang Dipilih : </label></td>
			<td><input type="text" name="namasponsor" value="<?php echo $namasponsor["nama_marketing"]; ?>"></td>
	</tr>
	<tr>
		<td><center><button type="submit" name="submit">Submit</button></center>
	</tr>
	</table>
</form>
</div>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br>
 </body>
 </html>