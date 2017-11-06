<?php

include "../koneksi.php";

$id_pendaftaran = $_GET["id_pendaftaran"];

if($delete = mysqli_query($konek, "DELETE FROM tbl_pendaftaran WHERE id_pendaftaran='$id_pendaftaran'")){
	header("Location: index.php?pendaftaran");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>