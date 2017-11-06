<?php

include "../koneksi.php";

$id_rekamedis = $_GET["id_rekamedis"];

if($delete = mysqli_query($konek, "DELETE FROM tbl_rekamedis WHERE id_rekamedis='$id_rekamedis'")){
	header("Location: index.php?data-pasien");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>