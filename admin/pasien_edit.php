<?php
include "../koneksi.php";

$id_pasien					= $_POST["id_pasien"];
$no_pasien					= $_POST["no_pasien"];
$nama_pasien				= $_POST["nama_pasien"];
$alamat						  = $_POST["alamat"];
$nama_dokter				= $_POST["nama_dokter"];
$poliklinik						  = $_POST["poliklinik"];

if($edit = mysqli_query($konek, "UPDATE tbl_pasien SET id_pasien='$id_pasien', no_pasien='$no_pasien',
          nama_pasien='$nama_pasien', alamat='$alamat', nama_dokter='$nama_dokter', poliklinik='$poliklinik'
          WHERE id_pasien='$id_pasien'")){
		header("Location: index.php?data-pasien");
		exit();
	}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
