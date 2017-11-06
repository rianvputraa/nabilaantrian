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
	    <title>Monitoring : Queue</title>
	    <link href="../assert/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/css/jumbotron-narrow-monitoring.css" rel="stylesheet">
		<script src="../assert/js/jquery.min.js"></script>
	</head>
  	<body>
    <div class="container">
    	<center>
	    	<div class="blog-header">
			    <a href="../logout.php">Logout</a>
				<h3 style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;"><b>Selamat datang di Nabila Skincare</b></h3>
		    </div>
	    </center>
	    <div  class="row">
	    	 <div id="namaPasien1" class="col-xs-3" style="margin-left:126px;margin-top:90px;position: absolute;z-index: 1;">
			 </div>
      		 <div id="namaPasien2" class="col-xs-3" style="margin-left:42em;margin-top:90px;position: absolute;z-index: 1;">
			 </div>
      		 <div id="namaPasien3" class="col-xs-3" style="margin-left:74em;margin-top:90px;position: absolute;z-index: 1;">
			 </div>
      	</div>
      	<div class="row loket">
      	</div>
      	 <div  class="row">
	    	 <div class="col-lg-4">
	    	 	<center><h3>Dr. Nabila Abdurrahman</h3></center>
			 </div>
			 <div class="col-lg-4">
	    	 	<center><h3>drg. Atikah Bahar</h3></center>
			 </div>
			 <div class="col-lg-4">
	    	 	<center><h3>drg. Ari Airin</h3></center>
			 </div>
      	</div>
	    <div class="audio">
		  	<audio id="in" src="../audio/new/in.wav"></audio>
		  	<audio id="out" src="../audio/new/out.wav"></audio>
		  	<audio id="suarabel" src="../audio/new/Airport_Bell.mp3"></audio>
			<audio id="suarabelnomorurut" src="../audio/new/nomor-urut.MP3"></audio>
			<audio id="suarabelsuarabelloket" src="../audio/new/loket.MP3"></audio>
			<audio id="belas" src="../audio/new/belas.MP3"></audio>
			<audio id="sebelas" src="../audio/new/sebelas.MP3"></audio>
			<audio id="puluh" src="../audio/new/puluh.MP3"></audio>
			<audio id="sepuluh" src="../audio/new/sepuluh.MP3"></audio>
			<audio id="ratus" src="../audio/new/ratus.MP3"></audio>
			<audio id="seratus" src="../audio/new/seratus.MP3"></audio>
			<audio id="suarabelloket1" src="../audio/new/1.MP3"></audio>
			<audio id="suarabelloket2" src="../audio/new/2.MP3"></audio>
			<audio id="suarabelloket3" src="../audio/new/3.MP3"></audio>
			<audio id="suarabelloket4" src="../audio/new/4.MP3"></audio>
			<audio id="suarabelloket5" src="../audio/new/5.MP3"></audio>
			<audio id="suarabelloket6" src="../audio/new/6.MP3"></audio>
			<audio id="suarabelloket7" src="../audio/new/7.MP3"></audio>
			<audio id="suarabelloket8" src="../audio/new/8.MP3"></audio>
			<audio id="suarabelloket9" src="../audio/new/9.MP3"></audio>
			<audio id="suarabelloket10" src="../audio/new/sepuluh.MP3"></audio>
			<audio id="loket" src="../audio/new/loket.MP3"></audio>
       	</div>
      <footer class="footer">
        <center><p>&copy; Nabila Skincare <?php echo date("Y");?></p></center>
      </footer>
    </div>
  	</body>
  	<script type="text/javascript">
  	
	$("document").ready(function(){
		var tmp_loket=0;
		setInterval(function() {
			$("#namaPasien1").load("../apps/listnama1_daemon.php");
			$("#namaPasien2").load("../apps/listnama2_daemon.php");
			$("#namaPasien3").load("../apps/listnama3_daemon.php");
			$.post("../apps/monitoring-daemon.php", function( data ){
				if(tmp_loket!=data['jumlah_loket']){
					$(".col-md-3").remove();
					tmp_loket=0;
				}
				if (tmp_loket==0) {
					for (var i = 1; i<= data['jumlah_loket']; i++) {
						loket = '<div class="col-lg-4">'+
									'<div class="'+ i +
									 ' jumbotron" style="background-color: #bdc3c7;padding-top:20px;padding-bottom:20px;">'+
									       '<div class="jumbotron" style="padding-top:10px;padding-bottom:1px;">'+
									         '<div class="jumbotron" style="background-color: #bdc3c7;padding-top:20px;padding-bottom:18px;">'+
									  '<h2 style="font-size:15px;margin-left:50px;position:absolute;" >Antrian</h2>'+
									  '<h2 style="font-size:15px;margin-left:15em;margin-bottom:10em;position:absolute;" >Pasien</h2>'+
									  '<h2style="margin-left:8em;margin-top:90px;position:absolute;" ></h2>'+
										'<h1 style="margin-right:4.5em;margin-top:40px;font-size:50px;"> '+data["init_counter"][i]+' </h1>'+ 
										'</div>'+
										'</div>'+
										'<button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-credit-card">&nbsp;</span>RUANGAN '+ i +' </button>'+
									'</div>'+
								'</div>';
						$(".loket").append(loket);
					}

					tmp_loket = data['jumlah_loket'];
				}
				for (var i = 1; i <= data['jumlah_loket']; i++) {
					if (data["counter"]==i) {
						$("."+i+" h1").html(data["next"]);
					}
				}
				if (data["next"]) {
					var angka = data["next"];
					for (var i = 0 ; i < angka.toString().length; i++) {
						$(".audio").append('<audio id="suarabel'+i+'" src="../audio/new/'+angka.toString().substr(i,1)+'.MP3" ></audio>');
					};
					mulai(data["next"],data["counter"]);
				}else{
					for (var i = 1; i <= data['jumlah_loket']; i++) {
						if (data["counter"]==i) {
							$("."+i+" h1").html(data["next"]);
						}
					}
				};

			}, "json");
		}, 1000);
		//change
	});

	function mulai(urut, loket){
		var totalwaktu = 8568.163;
		document.getElementById('in').pause();
		document.getElementById('in').currentTime=0;
		document.getElementById('in').play();
		totalwaktu=document.getElementById('in').duration*1000;
		setTimeout(function() {
				document.getElementById('suarabelnomorurut').pause();
				document.getElementById('suarabelnomorurut').currentTime=0;
				document.getElementById('suarabelnomorurut').play();
		}, totalwaktu);
		totalwaktu=totalwaktu+1000;
		if(urut<10){
			setTimeout(function() {
					document.getElementById('suarabel0').pause();
					document.getElementById('suarabel0').currentTime=0;
					document.getElementById('suarabel0').play();
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;
			setTimeout(function() {
					document.getElementById('loket').pause();
					document.getElementById('loket').currentTime=0;
					document.getElementById('loket').play();
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;
			setTimeout(function() {
					document.getElementById('suarabelloket'+loket+'').pause();
					document.getElementById('suarabelloket'+loket+'').currentTime=0;
					document.getElementById('suarabelloket'+loket+'').play();
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;
			setTimeout(function() {
					for (var i = 0 ; i < urut.toString().length; i++) {
						$("#suarabel"+i+"").remove();
					};
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;
		}else if(urut==10){
				setTimeout(function() {
						document.getElementById('sepuluh').pause();
						document.getElementById('sepuluh').currentTime=0;
						document.getElementById('sepuluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if(urut ==11){
				setTimeout(function() {
						document.getElementById('sebelas').pause();
						document.getElementById('sebelas').currentTime=0;
						document.getElementById('sebelas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if(urut < 20){
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('belas').pause();
						document.getElementById('belas').currentTime=0;
						document.getElementById('belas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if(urut < 100){
				setTimeout(function() {
						document.getElementById('suarabel0').pause();
						document.getElementById('suarabel0').currentTime=0;
						document.getElementById('suarabel0').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('puluh').pause();
						document.getElementById('puluh').currentTime=0;
						document.getElementById('puluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if(urut==100){
			setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut < 110) {
				setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabel2').pause();
						document.getElementById('suarabel2').currentTime=0;
						document.getElementById('suarabel2').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut == 110) {
				setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('sepuluh').pause();
						document.getElementById('sepuluh').currentTime=0;
						document.getElementById('sepuluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut == 111) {
				setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('sebelas').pause();
						document.getElementById('sebelas').currentTime=0;
						document.getElementById('sebelas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut < 120) {
				setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabel2').pause();
						document.getElementById('suarabel2').currentTime=0;
						document.getElementById('suarabel2').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('belas').pause();
						document.getElementById('belas').currentTime=0;
						document.getElementById('belas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut == 120) {
				setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('puluh').pause();
						document.getElementById('puluh').currentTime=0;
						document.getElementById('puluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut < 200) {
				setTimeout(function() {
						document.getElementById('seratus').pause();
						document.getElementById('seratus').currentTime=0;
						document.getElementById('seratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('puluh').pause();
						document.getElementById('puluh').currentTime=0;
						document.getElementById('puluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				if (urut%10!=0) {
					setTimeout(function() {
							document.getElementById('suarabel2').pause();
							document.getElementById('suarabel2').currentTime=0;
							document.getElementById('suarabel2').play();
						}, totalwaktu);
					totalwaktu=totalwaktu+1000;
				}

				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if (urut == 200) {
				setTimeout(function() {
						document.getElementById('suarabel0').pause();
						document.getElementById('suarabel0').currentTime=0;
						document.getElementById('suarabel0').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('ratus').pause();
						document.getElementById('ratus').currentTime=0;
						document.getElementById('ratus').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}else if(urut < 999){
				setTimeout(function() {
						document.getElementById('suarabel0').pause();
						document.getElementById('suarabel0').currentTime=0;
						document.getElementById('suarabel0').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				if (urut.toString().substr(1,1) == 0 && urut.toString().substr(2,1)==0) { // 200 300 400 ..
					setTimeout(function() {
							document.getElementById('ratus').pause();
							document.getElementById('ratus').currentTime=0;
							document.getElementById('ratus').play();
						}, totalwaktu);
					totalwaktu=totalwaktu+1000;
				} else if(urut.toString().substr(1,1) == 0 && urut.toString().substr(2,1)!=0){ // 201 304 405 506
					setTimeout(function() {
							document.getElementById('ratus').pause();
							document.getElementById('ratus').currentTime=0;
							document.getElementById('ratus').play();
						}, totalwaktu);
					totalwaktu=totalwaktu+1000;
					setTimeout(function() {
							document.getElementById('suarabel2').pause();
							document.getElementById('suarabel2').currentTime=0;
							document.getElementById('suarabel2').play();
						}, totalwaktu);
					totalwaktu=totalwaktu+1000;
				}else if(urut.toString().substr(1,1) != 0 && urut.toString().substr(2,1)==0){ //210 250 230
					if(urut.toString().substr(1,1) == 1){ //210
						setTimeout(function() {
							document.getElementById('ratus').pause();
							document.getElementById('ratus').currentTime=0;
							document.getElementById('ratus').play();
						}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
							document.getElementById('sepuluh').pause();
							document.getElementById('sepuluh').currentTime=0;
							document.getElementById('sepuluh').play();
						}, totalwaktu);
						totalwaktu=totalwaktu+1000;
					}else{
						setTimeout(function() {
							document.getElementById('ratus').pause();
							document.getElementById('ratus').currentTime=0;
							document.getElementById('ratus').play();
						}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
							document.getElementById('suarabel1').pause();
							document.getElementById('suarabel1').currentTime=0;
							document.getElementById('suarabel1').play();
						}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
							document.getElementById('puluh').pause();
							document.getElementById('puluh').currentTime=0;
							document.getElementById('puluh').play();
						}, totalwaktu);
						totalwaktu=totalwaktu+1000;
					}
				}else if(urut.toString().substr(1,1) != 0 && urut.toString().substr(2,1)!=0){
					if (urut.toString().substr(1,1)==1) {
						if (urut.toString().substr(2,1)==1) { // 211 311 411 511
							setTimeout(function() {
									document.getElementById('ratus').pause();
									document.getElementById('ratus').currentTime=0;
									document.getElementById('ratus').play();
								}, totalwaktu);
							totalwaktu=totalwaktu+1000;
							setTimeout(function() {
									document.getElementById('sebelas').pause();
									document.getElementById('sebelas').currentTime=0;
									document.getElementById('sebelas').play();
								}, totalwaktu);
							totalwaktu=totalwaktu+1000;
						}else{ //212 215 219
							setTimeout(function() {
									document.getElementById('ratus').pause();
									document.getElementById('ratus').currentTime=0;
									document.getElementById('ratus').play();
								}, totalwaktu);
							totalwaktu=totalwaktu+1000;
							setTimeout(function() {
									document.getElementById('suarabel2').pause();
									document.getElementById('suarabel2').currentTime=0;
									document.getElementById('suarabel2').play();
								}, totalwaktu);
							totalwaktu=totalwaktu+1000;
							setTimeout(function() {
									document.getElementById('belas').pause();
									document.getElementById('belas').currentTime=0;
									document.getElementById('belas').play();
								}, totalwaktu);
							totalwaktu=totalwaktu+1000;
						}
					}else{
						setTimeout(function() {
								document.getElementById('ratus').pause();
								document.getElementById('ratus').currentTime=0;
								document.getElementById('ratus').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
								document.getElementById('suarabel1').pause();
								document.getElementById('suarabel1').currentTime=0;
								document.getElementById('suarabel1').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
								document.getElementById('puluh').pause();
								document.getElementById('puluh').currentTime=0;
								document.getElementById('puluh').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						if (urut%10!=0) {
							setTimeout(function() {
									document.getElementById('suarabel2').pause();
									document.getElementById('suarabel2').currentTime=0;
									document.getElementById('suarabel2').play();
								}, totalwaktu);
							totalwaktu=totalwaktu+1000;
						}
					}
				}

				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
		}

		setTimeout(function(){
			document.getElementById('out').pause();
			document.getElementById('out').currentTime=0;
			document.getElementById('out').play();
		}, totalwaktu);
		totalwaktu=totalwaktu+1000;
		setTimeout(function() {
			$.post("../apps/monitoring-daemon-result.php", { id : urut }, function(data){
				if (!data.status) {
					console.log(data.status);
				}
			}, 'json');
		}, totalwaktu);
		totalwaktu=totalwaktu+1000;
	}
	
	</script>
</html>
