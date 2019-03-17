<?php 

require 'functions.php';

$nama = $_GET["nama"];

if(hapussponsor($nama) > 0)
{
	echo "<script> alert ('Data Berhasil Dihapus')
	document.location.href= 'indexeo.php' </script>";
}
else
{
	echo "<script> alert('Data Gagal Dihapus') </script>";
}


 ?>