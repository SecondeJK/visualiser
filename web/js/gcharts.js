google.charts.load('current', {'packages':['geochart','bar']});

google.charts.setOnLoadCallback(drawRegionsMap);
google.charts.setOnLoadCallback(drawBarChart);

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
	  chart: {
		title: 'Company Performance',
		subtitle: 'Sales, Expenses, and Profit: 2014-2017',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('stacked_div'));

	chart.draw(data, options);
}
