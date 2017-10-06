<?php

function statsGasverbrauchPerDate() {
	?>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<script type="text/javascript">
	
	$.getJSON('api/statsGetGasverbrauchPerDate.php', function (data) {
		
		
		Highcharts.setOptions({
			global: {
				useUTC: false
			}
		});
			
			Highcharts.chart('container', {
				chart: {
					zoomType: 'x'
				},
				title: {
					text: 'Verbrauch Gas (m³)'
				},
				subtitle: {
					text: document.ontouchstart === undefined ?
					'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
				},
				xAxis: {
					type: 'datetime',
					
		
				},
				yAxis: {
					title: {
						text: 'Gas (m³)'
					}
				},
				
				legend: {
					enabled: false
				},
				 credits: {
		                enabled: false
		            },
				plotOptions: {
					area: {
						fillColor: {
							linearGradient: {
								x1: 0,
								y1: 0,
								x2: 0,
								y2: 1
							},
							stops: [
									[0, Highcharts.getOptions().colors[0]],
									[1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
							]
						},
						marker: {
							radius: 2
						},
						lineWidth: 1,
						states: {
							hover: {
								lineWidth: 1
							}
						},
						threshold: null
					}
				},
				
				tooltip: {
					formatter: function () {
						var s = '<b>' + Highcharts.dateFormat('%A, %b %e, %Y', this.x) + '</b>';
						
						//                 $.each(this.points, function () {
						s += '<br/>' + this.y + ' Gas (m³)';
						//                 });
						
						return s;
					}
				},
				
				series: [{
					type: 'area',
					name: 'Verbrauch Gas (m³)',
					data: data
				}]
			});
	});
		
		</script>
		<?php 
}

function statsGasverbrauchPerYear() {
	?>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<script type="text/javascript">
	
	$.getJSON('api/statsGetGasverbrauchPerYear.php', function (data) {
		
		Highcharts.setOptions({
			global: {
				useUTC: false
			}
		});

			Highcharts.chart('container', {
				chart: {
					zoomType: 'x'
				},
				title: {
					text: 'Verbrauch Gas (m³)'
				},

				yAxis: {
					title: {
						text: 'Gas (m³)'
					}
				},
				xAxis: {
					title: {
						text: 'Jahr'
					}
				},
				
				legend: {
					enabled: false
				},
				 credits: {
		                enabled: false
		            },
			
				series: [{
					type: 'bar',
					name: 'Verbrauch Gas (m³)',
					data: data
				}]
			});
	});
		
		</script>
		<?php 
}