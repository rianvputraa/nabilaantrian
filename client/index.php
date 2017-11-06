<?php 

	ob_start();
	session_start();
	if (!isset($_SESSION["loket_client"])) 
	{
		$_SESSION["loket_client"] = 0;
	}
	if(isset($_SESSION['akun_id']));
	include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Client : Queue</title>
	    <?php 

	    		include "../admin/bundle_css.php";

	     ?>
	</head>
  	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-black-light layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
      	 <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../admin/index.php"><i class="fa  fa-arrow-left"></i>  Kembali </a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>  NABILA</b>SKINCARE</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>

      <!-- Main content -->

      	<form action="pendaftaran_add.php" name="modal_popup" enctype="multipart/form-data" method="post"></form>
    	<center>
        <button class="btn btn-small btn-primary try_queue" type="button" style="float:right;padding:10px;">
            Ulangi Panggilan &nbsp;<span class="glyphicon glyphicon-volume-up"></span>    
        </button>
        </center>
       <div class="row">
       <div class="jumbotron">
       	<div class="alert alert-danger peringatan animated bounceIn" role="alert">
        		<strong>WARNING !!</strong>  Masukan Nomor Ruangan Anda.
        </div>
       <h1 class="counter">
        	0      
        </h1>
        <p>
	        <a class="btn btn-small btn-success next_queue" href="#" role="button">
	        	Next &nbsp;<span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
        </p>
        <form>
        	<label for="exampleInputEmail1" style="text-align: left;"><span class="glyphicon glyphicon-credit-card">&nbsp;</span>NOMOR RUANGAN</label> 
        	<select class="form-control loket" name="loket" required>
        		<option value="0">-PILIH NOMOR RUANGAN-</option>
			</select>
        	<br/>
    	</form>
      	</div>
        </div>
      <!-- /.row -->
	     <!-- /.col -->
        <div class="col-lg-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div id="load_antrian1" class="description-block-a">
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div id="load_antrian2" class="description-block-a">
                  
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div id="load_antrian3" class="description-block-a">
                   
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
	</div>
</div>
        <!-- /.box -->

      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
      </div>
      <strong>Copyright &copy; 2017 <a">Nabila Skincare</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
  	</body>
  	<script type="text/javascript">
	$("document").ready(function()
	{
		// LIST LOKET
		$.post("../apps/admin_init.php", function( data ){
			for (var i = 1; i <= data['client']; i++) { 					
				if ( i == <?php echo $_SESSION["loket_client"];?>)
				$('.loket').append('<option value="'+i+'" selected>'+i+'</option>');
				else
				$('.loket').append('<option value="'+i+'">'+i+'</option>');
			}
		}, "json"); 

		// SET EXSIST session LOKET
		<?php if ($_SESSION["loket_client"] != 0) { ?>
		    	$(".peringatan").hide();
		<?php } else {?>
		    	$(".peringatan").show();
		<?php } ?>
		
		// GET LAST COUNTER
		var data = {"loket": <?php echo $_SESSION["loket_client"];?>};
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "../apps/last_stage.php",//request
			data: data,
			success: function(data) {
				$(".jumbotron h1").html(data["next"]);
			}
		});

		// NUMBER LOKET
	    $('form select').data('val',  $('form select').val() );
	    $('form select').change(function() {
	    	//set seassion or save
	    	var data = {"loket": $(".loket").val()};
	    	if ( $(".loket").val() != 0 ) {
	    		$(".peringatan").hide();
	    	}else{
	    		$(".peringatan").show();
	    	}
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "../apps/set_loket.php",//request
				data: data,
				success: function(data) {
					$(".jumbotron h1").html(data["next"]);
				}
			});
	    });
	    $('form select').keyup(function() {
	        if( $('form select').val() != $('form select').data('val') ){
	            $('form select').data('val',  $('form select').val() );
	            $(this).change();
	        }
	    });

	    // GET NEXT COUNTER
		$(".next_queue").click(function()
		{
			var loket = $(".loket").val();
			if (loket==0) {
				$(".peringatan").show();
			}else{
				var data = {"loket" : loket};
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "../apps/daemon.php",//request
					data: data,
					success: function(data) {
						$(".jumbotron h1").html(data["next"]);
						if (data["idle"]=="TRUE") {
							$(".next_queue").hide();
							clearInterval(timerId_adik);
							adik_adudu(loket, data["next"]);
						}
					}
				});
				return false;
			}
			
		});

		var timerId=0;
		// ADUDU
		function adudu(loket, counter){
			timerId = setInterval(function() {
				 $.post("../apps/daemon_try_cek.php", { loket : loket, counter : counter }, function(msg){
					if(msg.huft == 2){
						$(".try_queue").show();
					}
				},'JSON');
			}, 1000);
		 }
		
		var timerId_adik=0;
		// ADIK_ADUDU
		function adik_adudu(loket, counter){
			timerId_adik = setInterval(function() {
				 $.post("../apps/daemon_cek.php", { loket : loket, counter : counter }, function(msg){
					if(msg.huft == 2){
						$(".next_queue").show();
					}
				},'JSON');
			}, 1000);
		}

		// TRY CALL
		$(".try_queue").click(function(){
			var loket = $(".loket").val();
			if (loket==0) {
	    		$(".peringatan").show();
			}else{
				var counter = $(".counter").text();
				$.post("../apps/daemon_try.php", { loket : loket, counter : counter }, function(msg){
					if(msg.huft == 0){
						$(".try_queue").hide();
						clearInterval(timerId);
						adudu(loket, counter);
					}
				},'JSON'); //request
				return false;
			}
		});	
		
	});
	setInterval(function() {
		$("#load_antrian1").load("../apps/daftar_daemon.php").fadeIn("slow");
	}, 1000);
	setInterval(function() {
		$("#load_antrian2").load("../apps/daftar1_daemon.php").fadeIn("slow");
	}, 1000);
	setInterval(function() {
		$("#load_antrian3").load("../apps/daftar2_daemon.php").fadeIn("slow");
	}, 1000);
	</script>
	 <?php
					include "../admin/bundle_script.php";
	 ?>
</html>

