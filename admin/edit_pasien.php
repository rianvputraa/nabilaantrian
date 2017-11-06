<?php

ob_start();
session_start();
if(isset($_SESSION['akun_id']));
include "../koneksi.php";

$id_pasien	= $_GET["id_pasien"];

$querypasien = mysqli_query($konek, "SELECT * FROM tbl_pasien WHERE id_pasien='$id_pasien'");
if($querypasien == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($pasien = mysqli_fetch_array($querypasien)){

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
        <b><p class="login-box-msg">Edit Data Pasien</p></b>
		<form action="#" name="modal_popup" enctype="multipart/form-data" method="post">

        <form action="pasien_edit.php" method="post">
					<div class="form-group has-feedback" hidden>
						<input name="id_pasien" class="form-control" value="<?php echo $pasien["id_pasien"]; ?>" readonly>
						</input>
					</div>
      <div class="form-group has-feedback">
        <input name="no_pasien" class="form-control" value="<?php echo $pasien["no_pasien"]; ?>" readonly>
				</input>
      </div>
      <div class="form-group has-feedback">

      </div>
			<div class="form-group has-feedback">
				<input type="text" name="nama_pasien" class="form-control" value="<?php echo $pasien["nama_pasien"]; ?>" required>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="alamat" class="form-control" value="<?php echo $pasien["alamat"]; ?>" required>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="nama_dokter" class="form-control" value="<?php echo $pasien["nama_dokter"]; ?>" readonly>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="poliklinik" class="form-control" value="<?php echo $pasien["poliklinik"]; ?>" readonly>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label></label>
							<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Edit</button>
							<a href="index.php?data-pasien"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Back</button></a>
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
