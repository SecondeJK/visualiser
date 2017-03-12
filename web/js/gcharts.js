google.charts.load('current', {'packages':['geochart','bar','corechart']});

google.charts.setOnLoadCallback(drawRegionsMap);
google.charts.setOnLoadCallback(drawBarChart);
google.charts.setOnLoadCallback(drawDonut);

function drawRegionsMap() {

	var data = google.visualization.arrayToDataTable([
		['Country', 'Popularity'],
		['Germany', 200],
		['United States', 300],
		['Brazil', 400],
		['Canada', 500],
		['France', 600],
		['RU', 700]
	]);

	var options = {};

	var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

	chart.draw(data, options);
}

function drawBarChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Year', 'Sales', 'Expenses', 'Profit'],
	  ['2014', 1000, 400, 200],
	  ['2015', 1170, 460, 250],
	  ['2016', 660, 1120, 300],
	  ['2017', 1030, 540, 350]
	]);

	var options = {
	  chart: {}
	};

	var chart = new google.charts.Bar(document.getElementById('stacked_div'));

	chart.draw(data, options);
}

function drawDonut() {
	var data = google.visualization.arrayToDataTable([
	  ['Operating System', 'Percentage Usage'],
	  ['Windows 8',     42],
	  ['Windows 7',      11],
	  ['MacOS X',  26],
	  ['Linux', 14],
	  ['BSD',    7]
	]);

	var options = {
	  title: '2017 Operating System Usage',
	  pieHole: 0.4,
	};

	var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
	chart.draw(data, options);
}
