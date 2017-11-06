<?php
session_start();
include "koneksi.php";

$Username = $_POST["username"];
$Password = md5($_POST['password']);

$query = mysqli_query ($konek, "SELECT * FROM tbl_user WHERE username='$Username' AND password='$Password'");

// Validasi Login
if ($_POST){

	$queryuser = mysqli_query ($konek, "SELECT * FROM tbl_user WHERE username ='$Username' AND password='$Password'");

	$row_akun = mysqli_fetch_array ($queryuser);

	if($row_akun){
			if (md5($Password, $row_akun["password"])){

				$_SESSION['akun_username'] 			= $row_akun['username'];
				$_SESSION['akun_password'] 			= $row_akun['password'];
				$_SESSION['akun_id']      			= $row_akun['id_user'];
				$_SESSION['akun_nama']      		= $row_akun['nama_user'];
				$_SESSION['akun_previlleges'] 		= $row_akun['akses'];
				$_SESSION['Login'] 		            = true;

				if ($_SESSION["akun_previlleges"] == "admin"){
					header ("location: admin/index.php?".$_SESSION['akun_nama']."");
					exit();
				}else if ($_SESSION["akun_previlleges"] == "dokter"){
					header ("location: dokter/index.php?".$_SESSION['akun_nama']."");
					exit();
				}else if ($_SESSION["akun_previlleges"] == "monitor"){
					header ("location: monitor/index.php?".$_SESSION['akun_nama']."");
					exit();
				}else{
					header("Location :pagenotfound.php");
					exit();
				}
			}
			else
			{
				header ("Location: index.php?Err=4");
				exit();
			}
	}
	else if (empty ($Username) && empty ($Password)){
		header ("Location: index.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: index.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: index.php?Err=3");
		exit();
	}
	else{
		header ("Location: index.php?Err=5");
		exit();
	}
}

?>
