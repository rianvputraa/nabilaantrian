				<thead>
					<tr>
						<th>Ruangan</th>
						<th>Nomor Pasien</th>
						<th>Nama Pasien</th>
						<th>Nama Dokter</th>
						<th>poliklinik</th>
						<th>Bulan</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_pendaftaran, counter, nama_pasien, no_pasien, nama_dokter, poliklinik, waktu, DAYNAME(waktu) as hari, bulan FROM tbl_historydaftar");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[counter]</td>
									<td>$spl[no_pasien]</td>
									<td>$spl[nama_pasien]</td>
									<td>$spl[nama_dokter]</td>
									<td>$spl[poliklinik]</td>
									<td>$spl[bulan]</td>
									<td>$spl[hari],    $spl[waktu]</td>
								</tr>";
						}
					?>
				</tbody>
