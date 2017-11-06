<?php 

include "../../koneksi.php";

$sql 	= mysqli_query($konek, "SELECT no_pasien, nama_pasien, alamat FROM tbl_pasien");
$result = array();

while($row = mysqli_fetch_array($sql)) {
	array_push($result, array('no_pasien' => $row[0], 'nama_pasien' => $row[1], 'alamat' => $row[2]));
}
echo json_encode(array("result" => $result));
?>