<?php
include "../koneksi.php";

$id_dokter				        = $_POST["id_dokter"];
$nama_dokter				    = $_POST["nama_dokter"];
$poliklinik					    = $_POST["poliklinik"];
$username				        = $_POST["username"];
$password					    = md5($_POST["password"]);

$edit_dokter = mysqli_query($konek, "UPDATE tbl_dokter SET id_dokter='$id_dokter', nama_dokter='$nama_dokter', poliklinik='$poliklinik' WHERE id_dokter = '$id_dokter'");
$edit_user = mysqli_query($konek, "UPDATE tbl_user SET nama_user='$nama_dokter', username='$username', password='$password' WHERE nama_user='$nama_dokter'");

if ($edit_dokter) {
	header("Location: index.php?data-dokter");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>
