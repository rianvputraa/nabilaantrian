				<thead>
					<tr>
						<th>No Pendaftaran</th>
						<th>Nomor Pasien</th>
						<th>Nama Pasien</th>
						<th>Ruangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_pendaftaran, no_pendaftaran, nama_dokter, no_pasien, nama_pasien, counter FROM tbl_pendaftaran");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[no_pendaftaran]</td>
									<td>$spl[no_pasien]</td>
									<td>$spl[nama_pasien]</td>
									<td>$spl[counter]</td>
								</tr>";
						}
					?>
				</tbody>
