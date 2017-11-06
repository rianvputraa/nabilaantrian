<?php

include "../koneksi.php";

$id_pasien = $_GET["id_pasien"];

if($delete = mysqli_query($konek, "DELETE FROM tbl_pasien WHERE id_pasien='$id_pasien'")){
	header("Location: index.php?data-pasien");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>