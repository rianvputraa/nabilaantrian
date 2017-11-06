<?php 
include "../koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tbl_pendaftaran WHERE status='3' ORDER BY no_pendaftaran LIMIT 1");
if(mysqli_num_rows($sql)>0) {
	while($row = mysqli_fetch_array($sql))
		{
	           echo ' <h4>'.$row["no_pendaftaran"].'</h4> ';
	           echo ' <span class="description-text">Nomor Pasien</span>';
		}
}
?>