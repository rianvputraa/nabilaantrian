<?php
include "../koneksi.php";
$nama_dokter				= $_POST["nama_dokter"];
$poliklinik					= $_POST["poliklinik"];
$ruangan				    = $_POST["ruangan"];
$username				    = $_POST["username"];
$password					= md5($_POST["password"]);
$akses				        = $_POST["akses"];


$add = mysqli_query($konek, "INSERT INTO tbl_dokter (nama_dokter, poliklinik, ruangan) VALUES
	('$nama_dokter','$poliklinik','$ruangan')");

$antrian = mysqli_query($konek, "INSERT INTO client_antrian (client, nama_dokter) VALUES
	('$ruangan','$nama_dokter')");

$user = mysqli_query($konek, "INSERT INTO tbl_user (username, password, nama_user, akses) VALUES
	('$username','$password','$nama_dokter','$akses')");

if ($add) {
	header("Location: index.php?data-dokter");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>

