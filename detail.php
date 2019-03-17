<?php 

session_start();
require 'functions.php';
if(!isset($_SESSION["user"]))
{
	header("location: loginuser.php");
	exit;
}

$username = $_SESSION["user"][0];


//ambil data yang di url
$nama = $_GET["nama"];

//query data dari event berdasarkan id
$detail = query("SELECT * FROM event WHERE nama_event = '$nama'")[0];

$namaeo = $detail["nama_eo"];

$eo = query("SELECT * FROM eo WHERE nama_eo LIKE '%$namaeo%'");


if(isset($_POST["detail"]))
{

	$username = $_POST["username"];

	var_dump($username);
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Event Expo</title>
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
		.pilihmarketing a{
			color: black;
		}
		table td{
			text-align: center;
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
<br><br>
<table border="1" cellspacing="0" cellpadding="10" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
	<tr>
		<th>Nama</th>
		<th>Event Organizer</th>
		<th>Tanggal Dilaksanakan</th>
		<th>Daerah</th>
		<th>Lokasi Event</th>
		<th>Gambar Event</th>
	</tr>
	<tr>
		<td><?php echo $detail["nama_event"]; ?></td>
		<td><?php echo $detail["nama_eo"]; ?></td>
		<td><?php echo $detail["periode_event"]; ?></td>
		<td><?php echo $detail["daerah_event"]; ?></td>
		<td><?php echo $detail["lokasi_event"]; ?></td>
		<td><img src="img/<?php echo $detail["gambar_event"] ?>" width="300"></td>
	</tr>
</table>
<div class="pilihmarketing">
<center>
<form action="" method="post">
	<label><h4 class="title is-4">Pilih Jenis Marketing</h4></label><br>
	<button name="stand" class="button is-primary"><a href="standuser.php?nama=<?php echo $detail["nama_event"]; ?>">STAND</a></button>
	<button name="sponsor" class="button is-primary"><a href="sponsoruser.php?nama=<?php echo $detail["nama_event"]; ?>">SPONSOR</a></button>
</form>
</center>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>