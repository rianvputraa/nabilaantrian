				<thead>
					<tr>
						<th>Username</th>
						<th>Previleges</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryuser = mysqli_query ($konek, "SELECT id_user, username, password, id_previlleges_user, id_previlleges, previlleges FROM tbl_user INNER JOIN tbl_previlleges ON id_previlleges_user=id_previlleges");
						if($queryuser == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($user = mysqli_fetch_array ($queryuser)){

							echo "
								<tr>
									<td>$user[username]</td>
									<td>$user[previlleges]</td>
									<td>
								";
								if($user["id_user"]==$_SESSION["akun_id"]){
									echo "
										<a href='#'><button type='button' class='btn btn-danger' disabled><i class='fa fa-trash-o'></i></button></a>";
								}else{
									echo "
									  <a href='user_pegawai_edit.php?id_user=$user[id_user]'><button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button></a>
										<a href='#' onClick='confirm_delete(\"user_delete.php?id_user=$user[id_user]\")'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a>";
								}
							echo
								"
									</td>
								</tr>";
						}
					?>
				</tbody>
