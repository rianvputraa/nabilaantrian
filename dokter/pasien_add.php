<?php
include "../koneksi.php";

$no_pasien					= $_POST["no_pasien"];
$nama_pasien				= $_POST["nama_pasien"];
$alamat						= $_POST["alamat"];
$nama_dokter				= $_POST["nama_dokter"];
$poliklinik						= $_POST["poliklinik"];

$add = mysqli_query($konek, "INSERT INTO tbl_pasien (no_pasien, nama_pasien, alamat, nama_dokter, poliklinik) VALUES
	('$no_pasien', '$nama_pasien', '$alamat','$nama_dokter','$poliklinik')");

$add_rekamedis = mysqli_query($konek, "INSERT INTO tbl_rekamedis (no_pasien, nama_pasien, alamat, nama_dokter, poliklinik) VALUES
	('$no_pasien', '$nama_pasien', '$alamat','$nama_dokter','$poliklinik')");

if ($add) {
	header("Location: index.php?data-pasien");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
