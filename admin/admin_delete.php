<?php

include "../koneksi.php";

$id_user = $_GET["id_user"];

$delete = mysqli_query($konek, "DELETE FROM tbl_user WHERE id_user='$id_user'");

if ($delete) {
	header("Location: index.php?data-dokter");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
?>