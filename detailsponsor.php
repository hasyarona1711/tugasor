<?php 
session_start();

require 'functions.php';

if(!isset($_SESSION["eo"]))
{
	header("location:logineo.php");
	exit;
}
$nama = $_GET["nama"];

$pembeli = query("SELECT * FROM pembeli WHERE nama_marketing = '$nama'");


?>



<!DOCTYPE html>
<html>
<head>
	<title>Detail User yang Memilih sponsor</title>
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
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexeo.php" class="active">Home</a></li>
		<li><a href="mengubaheo.php">Edit Profile</a></li>
		<li><a href="menghapuseo.php?id=<?php echo $eo["id"]; ?>" onclick="return confirm('yakin?');">Hapus Akun</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>

	</ul>
</div>

<h1 class="title is-4">User yang Memilih <?php echo $nama; ?></h1>

<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
	<tr>
		<td><strong>Nama Penyewa</strong></td>
		<?php foreach($pembeli as $beli) : ?>
			<td align="center"><a href="detailuser.php?namauser=<?php echo$beli["nama_user"]; ?>"><?php echo $beli["nama_penyewa"]; ?></a></td>
		<?php endforeach; ?>
	</tr>
</table>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>