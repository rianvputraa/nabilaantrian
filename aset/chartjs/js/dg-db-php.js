$(document).ready(function() {

	$.ajax({

		url  : "http://localhost/antrian/apps/data_2.php",
		type : "GET",
		success : function (data) {
			console.log(data);


			var jumlah = {
				TeamA : [],
				TeamB : [],
				TeamC : []
			};

			var len = data.length;

			for(var i = 0; i < len; i++) {

				if (data[i].nama_dokter == "Dr. Nabilah Abdurrahman") {
					jumlah.TeamA.push(data[i].jumlah);
				}
				else if (data[i].nama_dokter == "drg. Atikah Bahar") {
					jumlah.TeamB.push(data[i].jumlah);
				}
				else if (data[i].nama_dokter == "drg. Ari Airin") {
					jumlah.TeamC.push(data[i].jumlah);
				}
			}
			console.log(jumlah);

			var ctx = $("#pie-chartcanvas");

			var data = {
				labels   : ["October", "November", "December", "January", "February", "March", "April", "May", "June", "July", "August", "September"],
				datasets : [
				{
					label : "Dr. Nabilah Abdurrahman",
					data  : jumlah.TeamA,
					backgroundColor : "rgb(210, 214, 222)",
					fill : false,
					lineTension : 0,
					pointRadius : 5
				},
				{
					label : "drg. Atikah Bahar",
					data  : jumlah.TeamB,
					backgroundColor : "rgb(60,141,188)",
					fill : false,
					lineTension : 0,
					pointRadius : 5

				},
				{
					label : "drg. Ari Airin",
					data  : jumlah.TeamC,
					backgroundColor : "cyan",
					fill : false,
					lineTension : 0,
					pointRadius : 5

				}
			  ]
			};

			var options = {

				scales : {
					yAxes: [{
						ticks : {
							beginAtZero : true
						}
					}]
				},
				scales : {
					xAxes: [{
						gridLines : {
							offsetGridLines : true
						}
					}]
				},

				title : {
					display : true,
					position : "top",
					text : "Data Dokter per Bulan",
					fontSize : 18,
					fontColor : "#333"
				},
				legend : {
					display : true,
					position : "bottom"
				}

			};

			var chart = new Chart( ctx, {
				type    : "bar",
				data    : data,
				options : options
			});
		},
		error: function(data) {
			console.log(data);
		},
	});
});