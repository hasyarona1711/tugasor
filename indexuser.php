<?php 

session_start();

require 'functions.php';

if(!isset($_SESSION["user"]))
{
	header("location: loginuser.php");
	exit;
}

$username = $_SESSION["user"][0];

$user = query("SELECT * FROM user WHERE username_user = '$username'")[0];


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
	</style>
</head>
<body>


<div class="header">
	<h1 class="title is-3">Event Expo Indonesia</h1>
	<ul>
		<li><a href="indexuser.php" class="active">Home</a></li>
		<li><a href="mengubahuser.php">Edit Profile</a></li>
		<li><a href="menghapususer.php?nama=<?php echo $user["nama_user"]; ?>" onclick="return confirm('yakin?');">Hapus Akun</a></li>
		<li class="logout"><a href="logout.php">Logout</a></li>
	</ul>
</div>
<br>
<table border="1" cellpadding="10" cellspacing="0" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
	<tr>
		<th>Nama Event</th>
		<th>Periode Event</th>
		<th>Tempat Dilaksanakan</th>
		<th>Proposal Event</th>
	</tr>
	<?php foreach ($event as $evt) : ?>
	<center>
	<tr>
		<td align="center">
			<button name="detail"><a href="detail.php?nama=<?php echo $evt["nama_event"]; ?>"><?php echo $evt["nama_event"]; ?></a></button>
		</td>
		<td align="center"><?php echo $evt["periode_event"]; ?></td>
		<td align="center"><?php echo $evt["daerah_event"]; ?></td>
		<td><a href="<?php echo $evt["proposal_event"]; ?>"target="_blank"><img src="img/<?php echo $evt["gambar_event"]; ?>" width="200"></a></td>
	</tr>
	</center>
	<?php endforeach; ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>



