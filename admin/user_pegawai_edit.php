<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<?php

include "../koneksi.php";

$user	= $_GET["Id_User"];

$queryuser = mysqli_query($konek, "SELECT * FROM user WHERE Id_User='$user'");
if($queryuser == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($user = mysqli_fetch_array($queryuser)){

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
        <b>CV. SAP</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <b><p class="login-box-msg">Edit User Pegawai</p></b>
        <form action="user_add_pegawai.php" method="post">
        <div class="form-group has-feedback">
        <input name="User_Pegawai" class="form-control" value="<?php echo $user["Nama_Pegawai"]; ?>" readonly>
				</input>
      </div>
      <div class="form-group has-feedback">
      
      </div>
			<div class="form-group has-feedback">
				<input type="text" name="Username" class="form-control" value="<?php echo $user["Username"]; ?>" readonly>
				<span class="form-control-feedback"><i class="fa fa-user"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="Password" class="form-control" placeholder="Password">
				<span class="form-control-feedback"><i class="fa fa-unlock"></i></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="Password_Verify" class="form-control" placeholder="Password Verify">
				<span class="form-control-feedback"><i class="fa fa-unlock"></i></span>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label></label>
							<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add User</button>
							<a href="user.php"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i> Back</button></a>
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