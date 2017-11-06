				<thead>
					<tr>
						<th>Username</th>
						<th>Nama User</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryspl = mysqli_query ($konek, "SELECT id_user, username, nama_user, password, akses FROM tbl_user WHERE akses='admin' AND id_user = $_SESSION[akun_id]");
						if($queryspl == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($spl = mysqli_fetch_array ($queryspl)){

							echo "
								<tr>
									<td>$spl[username]</td>
									<td>$spl[nama_user]</td>
									<td>
									";
									if($spl["id_user"]==$_SESSION["akun_id"]){
									echo "
										<a href='#'><button type='button' class='btn btn-danger' disabled><i class='fa fa-trash-o'></i></button></a>
										<a href='edit_admin.php?id_user=$spl[id_user]'><button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>
										";
								}else{
									echo "
										<a href='admin_delete.php?id_user=$spl[id_user]' class='delete-link'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a>
										<a href='edit_admin.php?id_user=$spl[id_user]'><button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>

										";
								}
							echo
								"
									</td>
								</tr>";
								}
					?>		    
				</tbody>
