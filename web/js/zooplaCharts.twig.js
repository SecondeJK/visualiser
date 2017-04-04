google.charts.load('current', {'packages':['bar']});

google.charts.setOnLoadCallback(drawAverageRentChart);

function drawAverageRentChart() {
	var data = google.visualization.arrayToDataTable([
		{{ payload.json_encode }}
	]);

	var options = {
	  chart: {}
	};

	var chart = new google.charts.Bar(document.getElementById('average_rents_5'));

	chart.draw(data, options);
}

