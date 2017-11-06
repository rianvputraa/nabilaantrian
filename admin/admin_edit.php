<?php
include "../koneksi.php";

$id_user				= $_POST["id_user"];
$akses	                = $_POST["akses"];
$nama_user				= $_POST["nama_user"];
$username 				= $_POST["username"];
$password				= md5($_POST["password"]);

if($edit = mysqli_query($konek, "UPDATE tbl_user SET id_user='$id_user', akses='$akses', nama_user='$nama_user',username='$username', password='$password'
          WHERE id_user='$id_user'")){
		header("Location: index.php?data-dokter");
		exit();
	}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
