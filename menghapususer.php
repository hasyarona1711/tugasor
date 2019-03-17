<?php 
session_start();

require 'functions.php';

$id = $_GET["id"];

if(hapususer($id) > 0)
{	
	echo 
	"
		<script> alert ('Data Berhasil Dihapus');
		</script>
	";
	session_unset("user");
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