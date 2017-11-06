<?php 
include "../koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tbl_pendaftaran WHERE status='3' ORDER BY no_pendaftaran LIMIT 1");
if(mysqli_num_rows($sql)>0) {
	while($row = mysqli_fetch_array($sql))
		{
			echo '<div class="col-xs-4">';
	           echo ' <center><h4>'.$row["no_pendaftaran"].'</h4></center> ';
	        echo '</div>';
	        echo '<div class="col-xs-4">';
	           echo ' <center><h4>'.$row["nama_pasien"].'</h4></center> ';
	        echo '</div>';
	        echo '<div class="col-xs-4">';
	           echo ' <center><h4>'.$row["counter"].'</h4></center> ';
	        echo '</div>';
		}
}
?>