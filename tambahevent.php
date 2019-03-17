<?php 

//koneksi database
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"]))
{
	//cek apakah data berhasil ditambahkan atau tidak
	if(tambah($_POST) > 0)
	{
		echo 
		"
			<script> alert('data berhasil ditambahkan!');
			document.location.href = 'indexeo.php' </script>
		";
	}
	//maksud document.location.href itu adalah pindah page dengan bahasa javascript kalau php pakai header
	else
	{
		echo 
		"
			<script> alert('data gagal ditambahkan!');
			 </script>
		";
	}

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Event Indonesia</title>
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
		.formtambah{
			margin-top: 100px;
			width: 550px;
			background-color: lightblue;
			padding: 50px;
			border-radius: 30px;
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
	</ul>
</div>

<center>
<div class="formtambah">
<form action="" method="post" enctype="multipart/form-data">
	<table>
	<tr>
		<td>
			<label for="nama">Nama Event</label>
		</td>
		<td>
			<input type="text" name="nama" id="nama" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="eventorganizer">Event Organizer</label>
		</td>
		<td>
			<input type="text" name="eventorganizer" id="eventorganizer" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="periode">Tanggal Dilaksanakan</label>
		</td>
		<td>
			<input type="text" name="periode" id="periode" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="daerah">Daerah Event</label>
		</td>
		<td>
			<input type="text" name="daerah" id="daerah" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="lokasi">Lokasi Event</label>
		</td>
		<td>
			<input type="text" name="lokasi" id="lokasi" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="gambar">Gambar Event</label>
		</td>
		<td>
			<input type="file" name="gambar" id="gambar">
		</td>
	</tr>
	<tr>
		<td>
			<label for="sponsor">Gambar List Harga Sponsor</label>
		</td>
		<td>
			<input type="file" name="sponsor" id="sponsor">
		</td>
	</tr>
	<tr>
		<td>
			<label for="konsep">Gambar Konsep Design</label>
		</td>
		<td>
			<input type="file" name="konsep" id="konsep">
		</td>
	</tr>	
	<tr>
		<td>
			<label for="stand">Gambar List Harga Stand</label>
		</td>
		<td>
			<input type="file" name="stand" id="stand">
		</td>
	</tr>
	<tr>
		<td>
			<label for="layout">Gambar Layout Event</label>
		</td>
		<td>
			<input type="file" name="layout" id="layout">
		</td>
	</tr>
	<tr>
		<td>
			<button type="submit" name="submit" class="button is-primary">Add</button>
		</td>
	</tr>
	</table>
</form>
</div>
</center>
<br><br><br>
</body>
</html>