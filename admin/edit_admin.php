<?php

include "../koneksi.php";

$id_user	= $_GET["id_user"];

$queryadmin = mysqli_query($konek, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
if($queryadmin == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($admin = mysqli_fetch_array($queryadmin)){

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
        <form action="admin_edit.php" method="post">
			<input type="hidden" name="akses" value=admin />
			<input type="hidden" name="id_user" class="form-control" value="<?php echo $admin["id_user"]; ?>">
			<div class="form-group has-feedback">
				<input type="text" name="nama_user" class="form-control" value="<?php echo $admin["nama_user"]; ?>">
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" value="<?php echo $admin["username"]; ?>">
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
        </form>
		<form action="#" name="modal_popup" enctype="multipart/form-data" method="post">
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