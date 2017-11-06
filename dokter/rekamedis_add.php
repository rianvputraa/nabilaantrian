<?php
include "../koneksi.php";

$no_pasien					= $_POST["no_pasien"];
$nama_pasien				= $_POST["nama_pasien"];
$alamat						= $_POST["alamat"];
$nama_dokter				= $_POST["nama_dokter"];
$diagnosis					= $_POST["diagnosis"];

$add_rekamedis = mysqli_query($konek, "INSERT INTO tbl_rekamedis (no_pasien, nama_pasien, alamat, nama_dokter, diagnosis) VALUES
	('$no_pasien', '$nama_pasien', '$alamat','$nama_dokter','$diagnosis')");

if ($add_rekamedis) {
	header("Location: index.php?rekamedis");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
