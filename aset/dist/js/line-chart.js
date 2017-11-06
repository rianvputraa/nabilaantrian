$(document).ready(function() {

	$.ajax({ 

		url  : "http://localhost/antrian/apps/data.php",
		type : "GET",
		success : function (data) {
				console.log(data);

				var pasien 	= {
					Dokter1 : [],
					Dokter2 : [],
					Dokter3 : []
				};

				var len = data.lenght;

				for (var i = 0; i < len; i++) {

					if (data[i].nama_dokter == "Dr. Nabilah Abdurrahman") {
						pasien.Dokter1.push(data[i].pasien);
					}
					else if (data[i].nama_dokter == "drg. Atikah Bahar") {
						pasien.Dokter2.push(data[i].pasien);
					}
					else if (data[i].nama_dokter == "drg. Ari Airin") {
						pasien.Dokter3.push(data[i].pasien);
					}

				}

				console.log(pasien);

				var ctx = $("#Line");

				var chart = new Chart( ctx, {
					type  : "Line",
					data  : {},
					options : {}
				});



		},
		error : function (data) {
				console.log(data);
		}

	});


});