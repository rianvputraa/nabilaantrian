<?php
include "../koneksi.php";

$id_pasien					= $_POST["id_pasien"];
$no_pasien					= $_POST["no_pasien"];
$nama_pasien				= $_POST["nama_pasien"];
$alamat						= $_POST["alamat"];

if($edit = mysqli_query($konek, "UPDATE tbl_pasien SET no_pasien='$no_pasien', nama_pasien='$nama_pasien', alamat='$alamat'
    WHERE id_pasien='$id_pasien'")){
		header("Location: index.php?data-pasien");
		exit();
	}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>