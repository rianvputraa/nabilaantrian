<?php
include "../koneksi.php";

$move = mysqli_query($konek, "INSERT INTO tbl_historydaftar (id_pendaftaran, counter, no_pasien, nama_pasien, alamat, nama_dokter, poliklinik, waktu, bulan) SELECT id_pendaftaran, counter, no_pasien, nama_pasien, alamat, nama_dokter, poliklinik, waktu, MONTHNAME(waktu) FROM tbl_pendaftaran");

$truncate2 = mysqli_query($konek, "TRUNCATE data_antrian");

$truncate = mysqli_query($konek, "TRUNCATE tbl_pendaftaran");




if ($move) {
	header("Location: index.php?pendaftaran");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>

