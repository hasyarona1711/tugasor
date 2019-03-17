<?php 

require 'functions.php';

$id = $_GET["id"];

if(hapususer($id) > 0)
{
	echo 
	"
		<script> alert ('Data Berhasil Dihapus');
		document.location.href = 'indexeo.php'
		</script>
	";
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