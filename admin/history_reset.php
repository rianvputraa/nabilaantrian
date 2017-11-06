<?php
include "../koneksi.php";

$truncate = mysqli_query($konek, "TRUNCATE tbl_historydaftar");

if ($truncate) {
	header("Location: index.php?pendaftaran");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>

