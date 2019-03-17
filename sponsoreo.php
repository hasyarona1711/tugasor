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

$event = query("SELECT * FROM event WHERE nama_event = '$nama'")[0];

$jenismarketing = "sponsor";

$infosponsor = query("SELECT * FROM marketing WHERE nama_event = '$nama'");

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Marketing</title>
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

<center>
<img src="img/<?php echo $event["sponsor_event"]; ?>" width="50%">
<img src="img/<?php echo $event["konsep_event"]; ?>" width="50%">
</center>
<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">

	<tr>
		<th>Nama Event</th>
		<th>Nama Sponsor</th>
		<th>Harga</th>
		<th>Pilihan</th>
	</tr>
	<?php foreach($infosponsor as $info) : ?>
	<tr>
		<td><?php echo $info["nama_event"]; ?></td>
		<td><a href="detailsponsor.php?nama=<?php echo $info["nama_marketing"]; ?>"><?php echo $info["nama_marketing"]; ?></a></td>
		<td><?php echo $info["harga_marketing"]; ?></td>
		<td><button class="button is-primary"><a href="hapussponsor.php?nama=<?php echo $info["nama_marketing"];?>" onclick="return confirm('yakin?');">Hapus</a></button></td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<button><a href="tambahsponsor.php?nama=<?php echo $event["nama_event"] ?>">Tambah Info Sponsor</a></button>
</body>
</html>