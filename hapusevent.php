<?php 

require 'functions.php';

$nama = $_GET["nama"];

if(hapusevent($id) > 0)
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