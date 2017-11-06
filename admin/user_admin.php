<?php

include "../koneksi.php";

// Notif Error
$Err = "";
if(isset ($_GET ["Err"]) && !empty ($_GET ["Err"])){
	switch ($_GET ["Err"]){
		case 1:
			$Err = "Username dan Password  Kosong";
		break;
		case 2:
			$Err = "Username Kosong";
		break;
		case 3:
			$Err = "Password Kosong";
		break;
		case 5:
			$Err = "Password tidak sama";
		break;
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Work Schedule</title>
	<?php 
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>NABILA SKINCARE</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <b><p class="login-box-msg">Tambah User Admin</p></b>
        <form action="user_add_admin.php" method="post">
			<input type="hidden" name="akses" value=admin />
			<div class="form-group has-feedback">
									
										<select name="nama_user" class="form-control">
										<?php
											
											$querydokter = mysqli_query($konek, "SELECT * FROM tbl_dokter");
											if ($querydokter == false){
												die ("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while ($dokter = mysqli_fetch_array($querydokter)){
												echo "<option value='$dokter[nama_dokter]'>$dokter[nama_dokter]</option>";
											}
										?>
										</select>
									
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" placeholder="Username">
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span class="form-control-feedback"><i class="fa fa-unlock"></i></span>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label></label>
							<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Admin</button>
							<a href="index.php?data-dokter"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Back</button></a>
					</div>
				</div><!-- /.col -->
			</div>
			<br>
				<center><font style="color:red;"><?php echo $Err ?></font></center>
			</br>
        </form>
		<form action="#" name="modal_popup" enctype="multipart/form-data" method="post">
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>