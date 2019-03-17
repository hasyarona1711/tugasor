<?php 

require 'functions.php';

$id = $_GET["id"];

if(hapuseo($id) > 0)
{
	echo 
	"
		<script> alert ('Data Berhasil Dihapus');
		document.location.href = 'indexadmin.php'
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