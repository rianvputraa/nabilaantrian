<?php
include "mysql_connect.php";
		$data = array();
		$date = date("Y-m-d");
		// Jumlah Loket
		$results = $mysqli->query('SELECT  count(*) as jumlah_dokter FROM tbl_dokter');	
		$loket = $results->fetch_array();
		$data['jumlah_dokter'] = $loket['jumlah_dokter']; // set jumlah loket
		$client = $mysqli->query('SELECT nama_dokter From tbl_dokter'); // execution
		
		}

		//STATUS
		//======
		//2 done
		//1 wait
		//0 execution
		$result_wait = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE status=1'); // wait 1
		$wait = $result_wait->fetch_array();
		$count = $wait['count'];
		if ($count){
			//echo $count;
		}else{
			$result = $mysqli->query('SELECT id, counter, nama_pasien FROM data_antrian WHERE status=0 ORDER BY waktu ASC LIMIT 1'); // execution
			$rows = $result->fetch_array();
			if($rows['id']!=NULL)
			{
				$data['next'] = $rows['id'];	
				$data['counter'] = $rows['counter'];
				$data['nama_pasien'] = $rows['nama_pasien'];
				// set wait
				$_SESSION["next_server"][$rows['counter']] = $rows['id'];
				$_SESSION["counter_server"][$rows['counter']] = $rows['counter'];
				$mysqli->query('UPDATE data_antrian SET status= 1 WHERE id='. $rows['id'] .''); // update to wait 1
				$mysqli->query('UPDATE tbl_pendaftaran SET status= 1 WHERE no_pendaftaran='. $rows['id'] .''); // update to wait 1
			}
		}
		echo json_encode($data);
		include 'mysql_close.php';
	}
?>