<?php

include "../koneksi.php";

$Id_Usergroup_User	= $_POST["Id_Usergroup_User"];
$Username 					= $_POST["Username"];
$Nama_Pegawai       = $_POST["Nama_Pegawai"];
$Password 					= $_POST["Password"];
$Password_Verify 		= $_POST["Password_Verify"];
$Password_Hash 			= password_hash($Password, PASSWORD_DEFAULT);

$register = mysqli_query ($konek, "INSERT INTO user (Id_Usergroup_User, Nama_Pegawai, Username, Password) VALUES ('$Id_Usergroup_User', '$Nama_Pegawai', '$Username', '$Password_Hash')");

// Validasi Register
if ($_POST){
	
	if(empty ($Username) && empty ($Password) && empty ($Level)){
		header ("Location: user_pegawai.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: user_pegawai.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: user_pegawai.php?Err=3");
		exit();
	}
	else if($Password != $Password_Verify){
		header ("Location: user_pegawai.php?Err=5");
		exit();
	}
	else{
		header ("Location: user.php?Notif=2");
		exit();
	}
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>