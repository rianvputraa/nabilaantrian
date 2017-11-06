<?php

include "../koneksi.php";

$id_user	= $_GET["id_user"];

if($delete = mysqli_query($konek, "DELETE FROM tbl_user WHERE id_user='$id_user'")){
	header("Location: index.php?data-user");
	exit();
}
die("Terapat Kesalahan :". mysqli_error($konek));

?>
