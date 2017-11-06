<?php
include "../koneksi.php";

$no_pasien = $_GET["no_pasien"];

$delete 	  = mysqli_query($konek, "DELETE FROM tbl_pasien WHERE no_pasien='$no_pasien'");
$delete_rekam = mysqli_query($konek, "DELETE FROM tbl_rekamedis WHERE no_pasien='$no_pasien'");
if ($delete) {
	header("Location: index.php?data-pasien");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>

