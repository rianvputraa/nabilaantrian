<?php

include "../koneksi.php";

$akses	                = $_POST["akses"];
$nama_user				= $_POST["nama_user"];
$username 				= $_POST["username"];
$password				= md5($_POST["password"]);

$register = mysqli_query ($konek, "INSERT INTO tbl_user (akses, username, password, nama_user) VALUES ('$akses', '$username', '$password', '$nama_user')");

if ($register) {
	header("Location: index.php?data-dokter");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>