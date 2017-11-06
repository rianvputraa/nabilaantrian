<?php
include "../koneksi.php";

$id_pendaftaran				= $_POST["id_pendaftaran"];
$no_pendaftaran				= $_POST["no_pendaftaran"];
$counter					= $_POST["counter"];
$no_pasien					= $_POST["no_pasien"];
$nama_pasien				= $_POST["nama_pasien"];
$alamat						= $_POST["alamat"];
$nama_dokter				= $_POST["nama_dokter"];
$poliklinik					= $_POST["poliklinik"];

$add = mysqli_query($konek, "INSERT INTO tbl_pendaftaran (id_pendaftaran, no_pendaftaran, counter, no_pasien, nama_pasien, alamat, nama_dokter, poliklinik, status) VALUES
	('$id_pendaftaran','$no_pendaftaran','$counter', '$no_pasien', '$nama_pasien', '$alamat','$nama_dokter','$poliklinik','3')");

$antrian = mysqli_query($konek, "INSERT INTO data_antrian (id, counter, status,nama_pasien,no_pasien) VALUES
	('$no_pendaftaran','0','3','$nama_pasien','$no_pasien')");

if ($add) {
	header("Location: index.php?pendaftaran");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>

