				<thead>
					<tr>
						<th>Nama Dokter</th>
						<th>Poliklinik</th>
						<th>Ruangan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_dokter, nama_dokter, poliklinik, ruangan FROM tbl_dokter ORDER BY ruangan");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[nama_dokter]</td>
									<td>$spl[poliklinik]</td>
									<td>$spl[ruangan]</td>
									<td>
									    <a href='edit_dokter.php?nama_dokter=$spl[nama_dokter]'><button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>
										<a href='dokter_delete.php?nama_dokter=$spl[nama_dokter]' class='delete-link'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
