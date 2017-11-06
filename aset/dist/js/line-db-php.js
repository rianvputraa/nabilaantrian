$(document).ready(function() {

	$.ajax({

		url  : "http://localhost/chartjs2/api/data.php",
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

				if (data[i].nama_dokter == "Dr. Nabila Abdurrahman") {
					jumlah.TeamA.push(data[i].jumlah);
				}
				else if (data[i].nama_dokter == "drg. Atika Bahar") {
					jumlah.TeamB.push(data[i].jumlah);
				}
				else if (data[i].nama_dokter == "drg. Ari Airin") {
					jumlah.TeamC.push(data[i].jumlah);
				}
			}
			console.log(jumlah);

			var ctx = $("#line-chartcanvas");

			var data = {
				labels   : ["October", "November", "December", "January", "February", "March", "April", "May", "June", "July", "August", "September"],
				datasets : [
				{
					label : "Dr. Nabila Abdurrahman",
					data  : jumlah.TeamA,
					backgroundColor : "blue",
					borderColor : "lightblue",
					fill : false,
					lineTension : 0,
					pointRadius : 5
				},
				{
					label : "drg. Atika Bahar",
					data  : jumlah.TeamB,
					backgroundColor : "green",
					borderColor : "lightgreen",
					fill : false,
					lineTension : 0,
					pointRadius : 5

				},
				{
					label : "drg. Ari Airin",
					data  : jumlah.TeamC,
					backgroundColor : "cyan",
					borderColor : "lightcyan",
					fill : false,
					lineTension : 0,
					pointRadius : 5

				}
			  ]
			};

			var options = {

				//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      			scaleBeginAtZero: true,
      			//Boolean - Whether grid lines are shown across the chart
     			 scaleShowGridLines: true,
      			//String - Colour of the grid lines
      			scaleGridLineColor: "rgba(0,0,0,.05)",

				title : {
					display : true,
					position : "top",
					text : "Line Graph",
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