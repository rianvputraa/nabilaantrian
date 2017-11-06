<?php

	ob_start();
	session_start();
	include "../koneksi.php";
	include "auth_user.php";
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
	  }else if (isset($_GET['rekamedis'])){
		 include "rekamedis.php";
	  }else if (isset($_GET['logout'])){
		 include "../../logout.php";
	  }else if (isset($_GET['readmail'])){
		 include "mailbox/read-mail.php";
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
