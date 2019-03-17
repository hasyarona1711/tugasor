<?php 

require 'functions.php';

if(isset($_POST["submit"]))
{
	if(registrasieo($_POST)>0)
	{
		echo "<script> alert('EO Berhasil Ditambahkan') </script>";
	}
	else
	{
		echo mysqli_error($db);
	}
}



 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<style>
	.tulisanregistrasi{
		background-color: lightblue;
		padding-bottom: 50px;
	}
	body{
		background-image: url(bahan/folk-pattern.png);
	}
	.kembali{
		float: right;
		padding-right: 10px;
	}
	.tulisanregisuser{
		padding-top: 30px;
	}
	.regis{
		margin-top: 200px;
		width: 450px;
		background-color: lightblue;
		padding: 50px;
		border-radius: 30px;	
	}
	</style>
</head>
<body>

<div class="tulisanregistrasi">
	<div class="tulisanregiseo">
	<h3 class="title is-3">Silahkan Mendaftar,Event organizer</h3>
	</div>
<div class="kembali">
	<h6 class="title is-6"><a href="index.php">Kembali</a></h6>
</div>
</div>

<center>
<div class="regis">
<form action="" method="post">
	<table>
	<tr>
		<td>
			<label for="nama">Nama Perusahaan : </label>
		</td>
		<td>
			<input type="text" name="nama_eo" id="nama" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>			
			<label for="alamat">Alamat Perusahaan : </label>
		</td>
		<td>
			<input type="text" name="alamat_eo" id="alamat" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="notlp">Nomor Telepon : </label>
		</td>
		<td>
			<input type="text" name="notlp_eo" id="notlp" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="email">Email Perusahaan : </label>
		</td>
		<td>
			<input type="text" name="email_eo" id="email" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="username">Username : </label>
		</td>
		<td>
			<input type="text" name="username_eo" id="username" autocomplete="off">
		</td>
	</tr>
	<tr>
		<td>
			<label for="password">Password : </label>
		</td>
		<td>
			<input type="password" name="password_eo" id="password">
		</td>
	</tr>
	<tr>
		<td>
			<label for="password2">Konfirmasi Password : </label>
		</td>
		<td>
			<input type="password" name="password2_eo" id="password2">
		</td>
	</tr>
	<tr>
		<td>
			<button type="submit" name="submit">Submit</button>
		</td>
		<td>
			<button type="button" name="login"><a href="logineo.php">Login</a></button>
		</td>
	</tr>
	</table>
</form>
</div>
</center>
<br><br><br><br><br>
</body>
</html>