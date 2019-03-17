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


// tampil data event
$event = query("SELECT * FROM event");



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>List Event Expo Indonesia</title>
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

<div class="header">
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexeo.php" class="active">Home</a></li>
		<div class="dropdown">
			<button class="menuedit">Edit Profile</button>
			<div class="dropdown-child">
			<a href="mengubaheo.php">Ubah Akun</a>
			<a href="menghapuseo.php?nama=<?php echo $eo["nama_eo"]; ?>" onclick="return confirm('yakin?');">Hapus Akun</a>
			</div>
		</div>
		<li class="logout"><a href="logout.php">Logout</a></li>
		<li><a href="tambahevent.php">Tambah Event Indonesia</a></li>
	</ul>
</div>
<br><br>
<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
	<tr>
		<th>Ubah/Hapus</th>
		<th>Nama Event</th>
		<th>Event Organizer</th>
		<th>Tanggal Dilaksanakan</th>
		<th>Daerah</th>
		<th>Lokasi Event</th>
		<th>Gambar Event</th>
		<th>Harga Sponsor</th>
		<th>Konsep Design Event</th>
		<th>Harga Stand</th>
		<th>Layout Event</th>
	</tr>
	<?php foreach ($event as $evt) : ?>
	<tr>
		<td>
			<button class="button is-primary"><a href="ubah.php?nama=<?php echo $evt["nama_event"]; ?>">Ubah</a></button> <br><br>
			<button class="button is-primary"><a href="hapusevent.php?nama=<?php echo $evt["nama_event"]; ?>" onclick="return confirm('yakin?');">Hapus</a></button>
		</td>
		<td><?php echo $evt["nama_event"]; ?></td>
		<td><?php echo $evt["nama_eo"]; ?></td>
		<td><?php echo $evt["periode_event"]; ?></td>
		<td><?php echo $evt["daerah_event"]; ?></td>
		<td><?php echo $evt["lokasi_event"]; ?></td>
		<td><img src="img/<?php echo $evt["gambar_event"]; ?>" width="200"></td>
		<td>
			<a href="sponsoreo.php?nama=<?php echo $evt["nama_event"]; ?>"><img src="img/<?php echo $evt["sponsor_event"]; ?>" width="200"></a>
		</td>
		<td><img src="img/<?php echo $evt["konsep_event"]; ?>" width="200"></td>
		<td>
			<a href="standeo.php?nama=<?php echo $evt["nama_event"]; ?>"><img src="img/<?php echo $evt["stand_event"]; ?>" width="200">
			</a>
		</td>
		<td><img src="img/<?php echo $evt["layout_event"]; ?>" width="200"></td>
	</tr>
	<?php endforeach; ?>
	
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>