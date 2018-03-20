$(document).ready(function(){
	$.ajax({
		url : "http://localhost/newvape2/followersdata.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var date_reserved = [];
			var rquantity = [];


			for(var i in data) {
				date_reserved.push("date_reserved " + data[i].date_reserved);
				rquantity.push(data[i].rquantity);

			}

			var chartdata = {
				labels: date_reserved,
				datasets: [
					{
						label: "Quantity",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: rquantity
					},



				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});
