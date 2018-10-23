$(document).ready(function(){
	$.ajax({
		url: "http://localhost/online%20voting/online_voting/realtime/chartjs-master/php-mysql-chartjs/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var candidate = [];
			var votes = [];

			for(var i in data) {
				candidate.push("Candidate:" + data[i].candidate_name);
				votes.push(data[i].candidate_cvotes);
			}

			var chartdata = {
				labels: candidate,
				datasets : [
					{
						label: 'Candidate votes',
						backgroundColor: 'rgba(255,0,0,0.3)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(120, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: votes
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});