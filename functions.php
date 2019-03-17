<?php 

//koneksi ke database
$db = mysqli_connect("localhost","root","","tugaslea");




function query($query)
{
	global $db;
	$result = mysqli_query ($db , $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}

	return $rows;
}

function registrasiuser($data)
{
	global $db;
	$nama = $data["nama"];
	$alamat = $data["alamat"];
	$notlp = $data["notlp"];
	$email = $data["email"];
	$username = $data["username"];
	$password = $data["password"];
	$password2 = $data["password2"];
	
	//cek apakah username sudah dipakai atau belum
	$result = mysqli_query($db, "SELECT * FROM user WHERE username_user = '$username'" );
	if(mysqli_fetch_assoc($result))
	{
		echo "<script> alert ('username sudah terdaftar')</script>";
		return false;
	}

	//cek konfirmasi password
	if($password !== $password2)
	{
		echo "<script> alert ('konfirmasi password tidak sesuai!') </script>";
		return false;
	}


	//tambah data user ke dalam database
	mysqli_query($db, "INSERT INTO user VALUES ($nama','$alamat','$notlp','$email','$username','$password')");
	var_dump($db);
	die;

	return mysqli_affected_rows($db);

}

function registrasieo($data)
{
	global $db;
	$namapt = $data["nama_eo"];
	$alamat = $data["alamat_eo"];
	$notlp = $data["notlp_eo"];
	$email = $data["email_eo"];
	$username = $data["username_eo"];
	$password = $data["password_eo"];
	$password2 = $data["password2_eo"];

	//cek apakah username sudah pernah digunakan

	$result = mysqli_query($db , "SELECT * FROM eo WHERE username_eo = '$username'");
	if(mysqli_fetch_assoc($result))
	{
		echo "<script> alert ('Username telah Terdaftar') </script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $password2)
	{
		echo "<script> alert('Konfirmasi Password tidak sesuai!') </script>";
		return false;
	}

	// tambah data eo kedalam database
	mysqli_query($db , "INSERT INTO eo VALUES ('$namapt','$alamat','$notlp','$email','$username','$password')");

	return mysqli_affected_rows($db);
}

function tambah($data)
{
	global $db;
	$nama = $data["nama"];
	$eventorganizer = $data["eventorganizer"];
	$periode = $data["periode"];
	$daerah = $data["daerah"];
	$lokasi = $data["lokasi"];
	$proposal = $data["proposal"];
	//upload gambar
	$gambar = uploadgambar();
	if(!$gambar)
	{
		return false;
	}
	$sponsor = uploadsponsor();
	if(!$sponsor)
	{
		return false;
	}
	$konsep = uploadkonsep();
	if(!$konsep)
	{
		return false;
	}
	$stand = uploadstand();
	if(!$stand)
	{
		return false;
	}
	$layout = uploadlayout();
	if(!$layout)
	{
		return false;
	}

	// query data
	$query = "INSERT INTO event VALUES ('$nama','$eventorganizer','$periode','$daerah','$lokasi','$gambar','$sponsor','$konsep','$stand','$layout','$proposal')";

	mysqli_query($db , $query);

	return mysqli_affected_rows($db);
}

function uploadgambar()
{
	$namafile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	//tmpname itu adalah tempat sementara dari file yang kita upload
	$tmpname = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4)
	{
		echo "<script> 
				alert('pilih gambar terlebih dahulu!')
				</script>";
	}
	//cek apakah yang diupload gambar atau bukan
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	//strtolower berfungsi agar teks yang dimasukkan otomatis jadi huruf kecil
	// end berfungsi untuk mengambil kata terakhir dari $ekstensigambar
	$ekstensigambar = strtolower(end($ekstensigambar));
	//!in_array(needle,hackstay) maksudnya adalah jarum yang dicari didalam jerami tidak dapat
	if(!in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script> 
				alert('yang anda upload bukan gambar!')
				</script>";
	}
	//uniqid berfungsi untuk membuat nama file baru dengan random sistem
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	//memindahkan file yang telah diupload ke dalam folder baru
	//parameter nya 1.tmpname nya 2.gambarnya dipindahkan kemana
	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;
}

function uploadsponsor()
{
	$namafile = $_FILES["sponsor"]['name'];
	$error = $_FILES["sponsor"]['error'];
	$tmpname = $_FILES["sponsor"]['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4)
	{
		echo "<script> 
				alert('pilih gambar terlebih dahulu!')
				</script>";
	}

	//cek apakah yang diupload gambar atau bukan
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));

	if(!in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script> 
				alert('yang anda upload bukan gambar!')
				</script>";
	}

	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;
}

function uploadkonsep()
{
	$namafile = $_FILES["konsep"]['name'];
	$error = $_FILES["konsep"]['error'];
	$tmpname = $_FILES["konsep"]['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4)
	{
		echo "<script> 
				alert('pilih gambar terlebih dahulu!')
				</script>";
	}

	//cek apakah yang diupload gambar atau bukan
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	
	if(!in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script> 
				alert('yang anda upload bukan gambar!')
				</script>";
	}
	
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;
}


function uploadstand()
{
	$namafile = $_FILES["stand"]['name'];
	$error = $_FILES["stand"]['error'];
	$tmpname = $_FILES["stand"]['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4)
	{
		echo "<script> 
				alert('pilih gambar terlebih dahulu!')
				</script>";
	}
	//cek apakah yang diupload gambar atau bukan
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	
	if(!in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script> 
				alert('yang anda upload bukan gambar!')
				</script>";
	}
	
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;
}

function uploadlayout()
{
	$namafile = $_FILES["layout"]['name'];
	$error = $_FILES["layout"]['error'];
	$tmpname = $_FILES["layout"]['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4)
	{
		echo "<script> 
				alert('pilih gambar terlebih dahulu!')
				</script>";
	}
	//cek apakah yang diupload gambar atau bukan
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	
	if(!in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script> 
				alert('yang anda upload bukan gambar!')
				</script>";
	}
	
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/'. $namafilebaru);

	return $namafilebaru;
}


function ubah($data)
{
	global $db;
	$nama = $data["nama"];
	$eventorganizer = $data["eventorganizer"];
	$periode = $data["periode"];
	$daerah = $data["daerah"];
	$lokasi = $data["lokasi"];
	$gambarlama = $data["gambar"];
	$sponsorlama = $data["sponsor"];
	$konseplama = $data["konsep"];
	$standlama = $data["stand"];
	$layoutlama = $data["layout"];
	

	//cek apakah gambar,sponsor,konsep,stand,layout diganti atau tidak
	if($_FILES['gambar']['error'] === 4)
	{
		$gambar = $gambarlama;
	}
	else
	{
		$gambar = uploadgambar();
	}

	if($_FILES['sponsor']['error'] === 4)
	{
		$sponsor = $sponsorlama;
	}
	else
	{
		$sponsor = uploadsponsor();
	}

	if($_FILES['konsep']['error'] === 4)
	{
		$konsep = $konseplama;
	}
	else
	{
		$konsep = uploadkonsep();
	}

	if($_FILES['stand']['error'] === 4)
	{
		$stand = $standlama;
	}
	else
	{
		$stand = uploadstand();
	}

	if($_FILES['layout']['error'] === 4)
	{
		$layout = $layoutlama;
	}
	else
	{
		$layout = uploadlayout();
	}
	$query = "UPDATE event SET
				nama_event = '$nama' , 
				nama_eo = '$eventorganizer' ,
				periode_eo = '$periode' , 
				daerah_eo = '$daerah' ,
				lokasi_eo = '$lokasi' ,
				gambar_eo = '$gambar' ,
				sponsor_eo = '$sponsor' , 
				konsep_eo = '$konsep' ,
				stand_eo = '$stand' ,
				layout_eo = '$layout'
				WHERE nama_event = '$nama'
				";

	mysqli_query($db , $query);
	
	return mysqli_affected_rows($db);

}


function hapusevent($nama)
{
	global $db;
	mysqli_query($db , "DELETE FROM event WHERE nama_event = '$nama'");
	return mysqli_affected_rows($db);
}

function hapussponsor($nama)
{
	global $db;
	mysqli_query($db , "DELETE FROM marketing WHERE nama_marketing = '$nama'");
	return mysqli_affected_rows($db);
}

function hapusstand($nama)
{
	global $db;
	mysqli_query($db , "DELETE FROM marketing WHERE nama_marketing = '$nama'");
	return mysqli_affected_rows($db);
}


function tambahmarketing($data)
{
	global $db;
	$namaevent = $data["namaevent"];
	$jenismarketing = $data["jenismarketing"];
	$namamarketing = $data["namamarketing"];
	$harga = $data["harga"];

	$query = "INSERT INTO marketing VALUES ('$namamarketing','$jenismarketing','$namaevent','$harga')";

	mysqli_query($db , $query);

	return mysqli_affected_rows($db);
}

function tambahmarketingstand($data)
{
	global $db;
	$namauser = $data["namauser"];
	$namapenyewa = $data["namapenyewa"];
	$namastand = $data["namastand"];

	//memasukkan data jenismarketing dan namaevent ke db
	$marketing = query("SELECT jenis_marketing FROM marketing WHERE nama_marketing = '$namastand'")[0];
	$jenismarketing = $marketing["jenis_marketing"];
	$event = query("SELECT nama_event FROM marketing WHERE nama_marketing = '$namastand'")[0];
	$namaevent = $event["nama_event"];

	//memasukkan data data ke db
	$query = "INSERT INTO pembeli VALUES ('$namauser','$namapenyewa','$namastand','$jenismarketing','$namaevent')";

	mysqli_query($db,$query);

	return mysqli_affected_rows($db);
}

function tambahmarketingsponsor($data)
{
	global $db;
	$namauser = $data["namauser"];
	$namapenyewa = $data["namapenyewa"];
	$namasponsor = $data["namasponsor"];

	$query = "INSERT INTO pembeli VALUES ('$namauser','$namapenyewa','$namasponsor','','')";
	
	mysqli_query($db,$query);

	return mysqli_affected_rows($db);
}

function ubaheo($data)
{
	global $db;
	$nama = $data["nama"];
	$alamat = $data["alamat"];
	$notlp = $data["notlp"];
	$email = $data["email"];
	$username = $data["username"];

	//tambah data kedalam db
	$query = "UPDATE eo SET
				nama_eo = '$nama' , 
				alamat_eo = '$alamat' , 
				notlp_eo = '$notlp' ,
				email_eo = '$email' 
				WHERE username_eo = '$username'
				";
	mysqli_query($db , $query);

	return mysqli_affected_rows($db);
}

function hapuseo($nama)
{
	global $db;
	mysqli_query($db , "DELETE FROM eo WHERE nama_eo = '$nama'");
	return mysqli_affected_rows($db);
}

function hapususer($id)
{
	global $db;
	mysqli_query($db , "DELETE FROM user WHERE id = '$id'");
	return mysqli_affected_rows($db);
}

function ubahuser($data)
{
	global $db;
	$nama = $data["nama"];
	$alamat = $data["alamat"];
	$notlp = $data["notlp"];
	$email = $data["email"];
	$username = $data["username"];
	$password1 = $data["passwordbaru1"];
	$password2 = $data["passwordbaru2"];


	//cek apakah password sama dengan konfirmasi
	if($password1 !== $password2)
	{
		echo 
		"
			<script> alert('Konfirmasi Password Tidak Sesuai!');
			</script>
		";
		return false;
	}

	//tambah data kedalam db
	$query = "UPDATE user SET
				nama_user = '$nama' , 
				alamat_user = '$alamat' , 
				notlp_user = '$notlp' ,
				email_user = '$email' , 
				username_user = '$username' , 
				password_user = '$password1'
				WHERE username_user = '$username'
				";
	mysqli_query($db , $query);

	return mysqli_affected_rows($db);

}

function ubahpasseo($data)
{
	global $db;
	$nama = $data["nama"];
	$usernamelama = $data["usernamelama"];
	$usernamebaru = $data["username"];
	$password = $data["password1"];

	//cek apakah username diganti atau tidak
	if($usernamelama === $usernamebaru)
	{
		//tambah kedalam tb
		$query = "UPDATE eo SET 
				username_eo = '$usernamelama',
				password_eo = '$password'
				WHERE nama_eo = '$nama'
				";
		mysqli_query($db,$query);

		return mysqli_affected_rows($db);
	}
	else
	{
		$result = mysqli_query($db,"SELECT * FROM eo WHERE username_eo = '$usernamebaru'");
		if(mysqli_fetch_assoc($result))
		{
			echo "<script> alert ('username sudah terdaftar')</script>";
			return false;
		}
	}
}



 ?>
