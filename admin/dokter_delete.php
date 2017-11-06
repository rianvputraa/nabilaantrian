<?php

include "../koneksi.php";

$nama_dokter = $_GET["nama_dokter"];

$delete = mysqli_query($konek, "DELETE FROM tbl_dokter WHERE nama_dokter='$nama_dokter'");
$delete_user = mysqli_query($konek, "DELETE FROM tbl_user WHERE nama_user='$nama_dokter'");
$delete_antrian = mysqli_query($konek, "DELETE FROM client_antrian WHERE nama_dokter='$nama_dokter'");

if ($delete) {
	header("Location: index.php?data-dokter");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>