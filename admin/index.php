<?php

	ob_start();
	session_start();
	if(isset($_SESSION['akun_id']));
	include "../koneksi.php";
	include "auth_user.php";

	if (!isset($_SESSION["id_pendaftaran"]))
	{
		$_SESSION["id_pendaftaran"] = 0;
	}
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>NABILA SKINCARE</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>

      <?php
    if (isset($_GET['tabel-user'])){
		  include "user.php";
	  }else if (isset($_GET['data-pasien'])){
		 include "pasien.php";
	  }else if (isset($_GET['antrian'])){
		 include "dd/index.php";
	  }else if (isset($_GET['data-user'])){
		 include "user.php";
	  }else if (isset($_GET['data-dokter'])){
		 include "dokter.php";
	  }else if (isset($_GET['pendaftaran'])){
		 include "pendaftaran.php";
	  }else if (isset($_GET['history-daftar'])){
		 include "history.php";
	  }else if (isset($_GET['edit-pasien'])){
		 include "edit_pasien.php";
	  }else if (isset($_GET['logout'])){
		 include "../logout.php";
	  }else{
		  include "dashboard.php";
	  }
	  ?>
	  </div>
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
<?php
	mysqli_close($konek);
	ob_end_flush();
?>
