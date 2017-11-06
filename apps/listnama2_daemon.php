<?php 
include "../koneksi.php";

$sql = mysqli_query($konek, "SELECT id, nama_pasien, counter FROM data_antrian WHERE status='2' AND counter='2' ORDER BY id DESC LIMIT 1");

if(mysqli_num_rows($sql)>0) {
	while($row = mysqli_fetch_array($sql))
		{
	           echo ' <center><h2>'.$row["nama_pasien"].'</h2></center> ';
		}
}
?>