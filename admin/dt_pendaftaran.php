				<thead>
					<tr>
						<th>No Pendaftaran</th>
						<th>Nomor Pasien</th>
						<th>Nama Pasien</th>
						<th>Nama Dokter</th>
						<th>poliklinik</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_pendaftaran, no_pendaftaran, nama_dokter, no_pasien, nama_pasien, alamat, poliklinik FROM tbl_pendaftaran");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[no_pendaftaran]</td>
									<td>$spl[no_pasien]</td>
									<td>$spl[nama_pasien]</td>
									<td>$spl[nama_dokter]</td>
									<td>$spl[poliklinik]</td>
									<td>
										<a href='pendaftaran_delete.php?id_pendaftaran=$spl[id_pendaftaran]' class='delete-link'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
