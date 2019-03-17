<?php 
session_start();

require 'functions.php';

if(!isset($_SESSION["eo"]))
{
	header("location:logineo.php");
	exit;
}

$eo = $_SESSION["eo"][0];

$nama = $_GET["nama"];

$datauser = query("SELECT * FROM user WHERE nama_user = '$nama'")[0];


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data user</title>
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
		<li><a href="menghapuseo.php?nama=<?php echo $eo["nama_eo"]; ?>" onclick="return confirm('yakin?');">Hapus Akun</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>

 <table border="1" cellspacing="0" cellpadding="10" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
 	<tr>
 		<th>Nama</th>
 		<th>Alamat</th>
 		<th>Nomor Telepon</th>
 		<th>Email</th>
 	</tr>
 	<tr>
 		<td><?php echo $datauser["nama_user"]; ?></td>
 		<td><?php echo $datauser["alamat_user"]; ?></td>
 		<td><?php echo $datauser["notlp_user"]; ?></td>
 		<td><?php echo $datauser["email_user"]; ?></td>
 	</tr>
 </table>
 <br>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 </body>
 </html>