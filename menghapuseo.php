<?php 
session_start();
require 'functions.php';

$nama = $_GET["nama"];

if(hapuseo($nama) > 0)
{
	echo 
	"
		<script> alert ('Data Berhasil Dihapus');
		</script>
	";
	session_unset("eo");
	$_SESSION = [];
	header("location: index.php");
	exit;
}
else
{
	echo 
	"
		<script> alert ('Data Tidak Berhasil Dihapus');
		</script>
	";
}


 ?>