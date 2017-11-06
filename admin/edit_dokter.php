<?php

ob_start();
session_start();
if(isset($_SESSION['akun_id']));
include "../koneksi.php";

$nama_dokter	= $_GET["nama_dokter"];

$querydokter = mysqli_query($konek, "SELECT id_dokter, nama_dokter, poliklinik, username, password, nama_user, id_user FROM tbl_dokter INNER JOIN tbl_user WHERE nama_user='$nama_dokter' AND nama_dokter='$nama_dokter' LIMIT 1");
if($querydokter == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($dokter = mysqli_fetch_array($querydokter)){

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
        <b><p class="login-box-msg">Edit Data Dokter</p></b>
		<form action="#" name="modal_popup" enctype="multipart/form-data" method="post"></form>

        <form action="dokter_edit.php" method="post">
					<div class="form-group has-feedback" hidden>
						<input name="id_dokter" class="form-control" value="<?php echo $dokter["id_dokter"]; ?>" readonly>
						</input>
					</div>
					<div class="form-group has-feedback" hidden>
						<input name="id_user" class="form-control" value="<?php echo $dokter["id_user"]; ?>" readonly>
						</input>
					</div>
			<div class="form-group has-feedback">
				<input type="text" name="nama_dokter" class="form-control" value="<?php echo $dokter["nama_dokter"]; ?>" required>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="poliklinik" class="form-control" value="<?php echo $dokter["poliklinik"]; ?>" required>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" value="<?php echo $dokter["username"]; ?>" required>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" required>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label></label>
							<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Edit</button>
							<a href="index.php?data-dokter"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Back</button></a>
					</div>
				</div><!-- /.col -->
			</div>
			<br>
				<center><font style="color:red;"></font></center>
			</br>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
<?php
			}

?>
