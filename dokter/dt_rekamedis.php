				<thead>
					<tr>
						<th>No Pasien</th>
						<th>Nama Pasien</th>
						<th>Alamat</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_rekamedis, no_pasien, nama_pasien, alamat, diagnosis, waktu, DAYNAME(waktu) as hari, DAY(waktu) as tgl, MONTHNAME(waktu) as bulan, YEAR(waktu) as tahun FROM tbl_rekamedis WHERE nama_dokter= '$_SESSION[akun_nama]' GROUP BY nama_pasien ORDER BY nama_pasien ");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[no_pasien]</td>
									<td>$spl[nama_pasien]</td>
									<td>$spl[alamat]</td>
									<td>
									<a href='view_rekamedis.php?no_pasien=$spl[no_pasien]'><button type='button' class='btn btn-success'><i class='fa fa-file'> </i>  Lihat Data</button></a>
   					                </td>
								</tr>";
						}
					?>
				</tbody>
