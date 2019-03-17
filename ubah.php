<?php 
session_start();

require 'functions.php';
if(!isset($_SESSION["eo"]))
{
	header("location: logineo.php");
	exit;
}

// ambil data dari url
$nama = $_GET["nama"];
//query data event berdasarkan id
$evt = query("SELECT * FROM event WHERE nama_event = '$nama'")[0];
 
// cek apakah tombol edit sudah ditekan atau belum

if(isset($_POST["edit"]))
{	
	//cek apakah data event berhasil diubah atau tidak
	if(ubah($_POST) > 0)
	{
		echo 
		"
		<script> alert ('Data Berhasil Diubah');
		document.location.href = 'indexeo.php'
		</script>

		";
	}
	else
	{
		echo 
		"
		<script> alert ('Data Tidak Berhasil Diubah');
		</script>

		";
	}
}



 ?>







<!DOCTYPE html>
<html>
<head>
	<title>Mengubah Data Event</title>
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
		.ubahevent{
			background-color: lightblue;
			width: 600px;
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



<form action="" method="post" enctype="multipart/form-data">
<br>
<center>
<div class="ubahevent">
<table>
	<ul>
	<li>
		<input type="hidden" name="gambar" value="<?php echo $evt["gambar_event"]; ?>">
	</li>
	<li>
		<input type="hidden" name="sponsor" value="<?php echo $evt["sponsor_event"]; ?>">
	</li>
	<li>
		<input type="hidden" name="konsep" value="<?php echo $evt["konsep_event"]; ?>">	
	</li>
	<li>
		<input type="hidden" name="stand" value="<?php echo $evt["stand_event"]; ?>">
	</li>
	<li>
			<input type="hidden" name="layout" value="<?php echo $evt["layout_event"]; ?>">
	</li>
	</ul>
	<tr>
		<td><label for="nama">Nama Event</label></td>
		<td><input type="text" name="nama" id="nama" value="<?php echo $evt["nama_event"]; ?>"></td>		
	</tr>
	<br>
	<tr>
		<td><label for="eventorganizer">Event Organizer</label></td>
		<td>			<input type="text" name="eventorganizer" id="eventorganizer" value="<?php echo $evt["nama_eo"]; ?>"></td>
	</tr>
	<br>
	<tr>
		<td><label for="periode">Tanggal Dilaksanakan</label></td>
		<td>			<input type="text" name="periode" id="periode" value="<?php echo $evt["periode_event"]; ?>"></td>
	</tr>
	<br>
	<tr>
		<td><label for="daerah">Daerah Event</label></td>
		<td><input type="text" name="daerah" id="daerah" value="<?php echo $evt["daerah_event"]; ?>"></td>	
	</tr>
	<br>
	<tr>
		<td><label for="lokasi">Lokasi Event</label></td>
		<td><input type="text" name="lokasi" id="lokasi" value="<?php echo $evt["lokasi_event"]; ?>"></td>		
	</tr>
	<br>
	<tr>
		<td><img src="img/<?php echo $evt['gambar_event']; ?>" width="100"></td>
		<td><label for="gambar">Gambar Event</label></td>
		<td><input type="file" name="gambar" id="gambar"></td>
	</tr>
	<br>
	<tr>
		<td><img src="img/<?php echo $evt['sponsor_event']; ?>" width="100"></td>
		<td><label for="sponsor">Gambar List Harga Sponsor</label></td>
		<td><input type="file" name="sponsor" id="sponsor"></td>
	</tr>
	<br>
	<tr>
		<td><img src="img/<?php echo $evt['konsep_event']; ?>" width="100"></td>
		<td><label for="konsep">Gambar Konsep Event</label>
		</td>
		<td><input type="file" name="konsep" id="konsep"></td>
	</tr>
	<br>
	<tr>
		<td><img src="img/<?php echo $evt['stand_event']; ?>" width="100"></td>
		<td><label for="stand">Gambar List Harga Stand</label></td>
		<td><input type="file" name="stand" id="stand"></td>
	</tr>
	<br>
	<tr>
		<td><img src="img/<?php echo $evt['layout_event']; ?>" width="100"></td>
		<td><label for="layout">Gambar Layout Event</label></td>
		<td><input type="file" name="layout" id="layout"></td>
	</tr>
	<br>
	<tr>
		<center>
		<td><button type="submit" name="edit" class="button is-primary">EDIT</button></td>
		</center>	
	</tr>
	
</table>
</div>
</center>
</form>
<br><br><br><br>
</body>
</html>