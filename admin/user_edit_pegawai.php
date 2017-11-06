<?php

include "../koneksi.php";

$id_user	          = $_POST["id_user"];
$Username 					= $_POST["username"];
$nama_pegawai       = $_POST["nama_pegawai"];
$Password 					= md5($_POST["password"]);

$register = mysqli_query ($konek, "UPDATE tbl_user SET password='$password' WHERE id_user='$id_user'");
  header("Location: index.php?data-user");
		exit();
	}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
