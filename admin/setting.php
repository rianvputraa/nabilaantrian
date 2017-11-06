<?php
ob_start();
session_start();
if(isset($_SESSION['akun_id']));
include "../koneksi.php";

if (!isset($_SESSION["id_pendaftaran"])) {
$_SESSION["id_pendaftaran"] = NULL;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Admin : Queue</title>
	    <link href="../assert/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/css/jumbotron-narrow.css" rel="stylesheet">
		<script src="../assert/js/jquery.min.js"></script>
	</head>
  	<body>
    <div class="container">
   <center><a href="index.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span></button></a></center>
	 <br>
	 <form>
		 <div class="jumbotron">
			 <h1 class="next">
				 <span class="glyphicon glyphicon-book"></span>
			 </h1>
			 <button type="button" class="btn btn-primary next_getway">Next <span class="glyphicon glyphicon-chevron-right"></span></button>
			 </div>
			 <br>
			 <label for="exampleInputEmail1">Jumlah Ruangan</label>
		 <div class="alert alert-info alert-dismissible peringatan" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <strong>Info !</strong> Jumlah Ruangan berhasil disave
	 </div>
			 <input type="text" class="form-control loket" placeholder="Jumlah Loket">
			 <br/>
			 <label for="exampleInputEmail1">Reset DB</label>
			 <div class="reset_status">
	 </div>
			 <button type="button" class="btn btn-primary reset">Reset</button>
	 <br/>
	 </form>
    	<br/>
      	<footer class="footer">
        <p>&copy; NABILA SKINCARE <?php echo date("Y");?></p>
      	</footer>
    </div>
  	</body>
		<script type="text/javascript">
	$("document").ready(function()
	{
		$('.peringatan').hide();

		// GET JUMLAH LOKET
	    $.post( "../apps/admin_server.php", function( data ) {
			$(".loket").val(data['jumlah_loket']);
		},"json");

		// NUMBER LOKET
	    $('form input').data('val',  $('form input').val() );
	    $('form input').change(function() {
	    	//set seassion or save
	    	var data = {"jmlloket": $(".loket").val()};
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "../apps/admin_server.php",//request
				data: data,
				success: function(data) {
					if (data["status"])
					{
						$('.peringatan').show();
					}
				}
			});
	    });
	    $('form input').keyup(function() {
	        if( $('form input').val() != $('form input').data('val') ){
	            $('form input').data('val',  $('form input').val() );
	            $(this).change();
	        }
	    });

	    // RESET
		$(".reset").click(function(){
			$.post( "../apps/admin_reset.php", function( data ) {
			var alert = '<div class="alert alert-info alert-dismissible reset_status" role="alert">'+data['status']+'</div>';
			$(".reset_status").html(alert);
			},"json");
		});

	});
	</script>
  	<script type="text/javascript">
	$("document").ready(function()
	{

		// GET LAST COUNTER
	    $.post( "../apps/admin_getway.php", function( data ) {
			$(".next").html(data['next']);
		},"json");


	    // RESET
		$(".next_getway").click(function(){
			var next_current = $(".next").text();
			$.post( "../apps/admin_getway.php", {"next_current": next_current}, function( data ) {
				$(".next").html(data['next']);
			},"json");
		});

	});
	</script>
</html>
<?php
	mysqli_close($konek);
	ob_end_flush();
?>
