<?php

function statsGasverbrauchPerDate() {
	?>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<script type="text/javascript">
	
	$.getJSON('api/statsGetGasverbrauchPerDate.php', function (data) {

		Highcharts.theme = {
		   colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
		      '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
		   chart: {
		      backgroundColor: {
		         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
		         stops: [
		            [0, '#2a2a2b'],
		            [1, '#3e3e40']
		         ]
		      },
		      style: {
		         fontFamily: '\'Unica One\', sans-serif'
		      },
		      plotBorderColor: '#606063'
		   },
		   title: {
		      style: {
		         color: '#E0E0E3',
		         textTransform: 'uppercase',
		         fontSize: '20px'
		      }
		   },
		   subtitle: {
		      style: {
		         color: '#E0E0E3',
		         textTransform: 'uppercase'
		      }
		   },
		   xAxis: {
		      gridLineColor: '#707073',
		      labels: {
		         style: {
		            color: '#E0E0E3'
		         }
		      },
		      lineColor: '#707073',
		      minorGridLineColor: '#505053',
		      tickColor: '#707073',
		      title: {
		         style: {
		            color: '#A0A0A3'

		         }
		      }
		   },
		   yAxis: {
		      gridLineColor: '#707073',
		      labels: {
		         style: {
		            color: '#E0E0E3'
		         }
		      },
		      lineColor: '#707073',
		      minorGridLineColor: '#505053',
		      tickColor: '#707073',
		      tickWidth: 1,
		      title: {
		         style: {
		            color: '#A0A0A3'
		         }
		      }
		   },
		   tooltip: {
		      backgroundColor: 'rgba(0, 0, 0, 0.85)',
		      style: {
		         color: '#F0F0F0'
		      }
		   },
		   plotOptions: {
		      series: {
		         dataLabels: {
		            color: '#B0B0B3'
		         },
		         marker: {
		            lineColor: '#333'
		         }
		      },
		      boxplot: {
		         fillColor: '#505053'
		      },
		      candlestick: {
		         lineColor: 'white'
		      },
		      errorbar: {
		         color: 'white'
		      }
		   },
		   legend: {
		      itemStyle: {
		         color: '#E0E0E3'
		      },
		      itemHoverStyle: {
		         color: '#FFF'
		      },
		      itemHiddenStyle: {
		         color: '#606063'
		      }
		   },
		   credits: {
		      style: {
		         color: '#666'
		      }
		   },
		   labels: {
		      style: {
		         color: '#707073'
		      }
		   },

		   drilldown: {
		      activeAxisLabelStyle: {
		         color: '#F0F0F3'
		      },
		      activeDataLabelStyle: {
		         color: '#F0F0F3'
		      }
		   },

		   navigation: {
		      buttonOptions: {
		         symbolStroke: '#DDDDDD',
		         theme: {
		            fill: '#505053'
		         }
		      }
		   },

		   // scroll charts
		   rangeSelector: {
		      buttonTheme: {
		         fill: '#505053',
		         stroke: '#000000',
		         style: {
		            color: '#CCC'
		         },
		         states: {
		            hover: {
		               fill: '#707073',
		               stroke: '#000000',
		               style: {
		                  color: 'white'
		               }
		            },
		            select: {
		               fill: '#000003',
		               stroke: '#000000',
		               style: {
		                  color: 'white'
		               }
		            }
		         }
		      },
		      inputBoxBorderColor: '#505053',
		      inputStyle: {
		         backgroundColor: '#333',
		         color: 'silver'
		      },
		      labelStyle: {
		         color: 'silver'
		      }
		   },

		   navigator: {
		      handles: {
		         backgroundColor: '#666',
		         borderColor: '#AAA'
		      },
		      outlineColor: '#CCC',
		      maskFill: 'rgba(255,255,255,0.1)',
		      series: {
		         color: '#7798BF',
		         lineColor: '#A6C7ED'
		      },
		      xAxis: {
		         gridLineColor: '#505053'
		      }
		   },

		   scrollbar: {
		      barBackgroundColor: '#808083',
		      barBorderColor: '#808083',
		      buttonArrowColor: '#CCC',
		      buttonBackgroundColor: '#606063',
		      buttonBorderColor: '#606063',
		      rifleColor: '#FFF',
		      trackBackgroundColor: '#404043',
		      trackBorderColor: '#404043'
		   },

		   // special colors for some of the
		   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
		   background2: '#505053',
		   dataLabelsColor: '#B0B0B3',
		   textColor: '#C0C0C0',
		   contrastTextColor: '#F0F0F3',
		   maskColor: 'rgba(255,255,255,0.3)'
		};

		// Apply the theme
		Highcharts.setOptions(Highcharts.theme);
		
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

		Highcharts.theme = {
				   colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
				      '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
				   chart: {
				      backgroundColor: {
				         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
				         stops: [
				            [0, '#2a2a2b'],
				            [1, '#3e3e40']
				         ]
				      },
				      style: {
				         fontFamily: '\'Unica One\', sans-serif'
				      },
				      plotBorderColor: '#606063'
				   },
				   title: {
				      style: {
				         color: '#E0E0E3',
				         textTransform: 'uppercase',
				         fontSize: '20px'
				      }
				   },
				   subtitle: {
				      style: {
				         color: '#E0E0E3',
				         textTransform: 'uppercase'
				      }
				   },
				   xAxis: {
				      gridLineColor: '#707073',
				      labels: {
				         style: {
				            color: '#E0E0E3'
				         }
				      },
				      lineColor: '#707073',
				      minorGridLineColor: '#505053',
				      tickColor: '#707073',
				      title: {
				         style: {
				            color: '#A0A0A3'

				         }
				      }
				   },
				   yAxis: {
				      gridLineColor: '#707073',
				      labels: {
				         style: {
				            color: '#E0E0E3'
				         }
				      },
				      lineColor: '#707073',
				      minorGridLineColor: '#505053',
				      tickColor: '#707073',
				      tickWidth: 1,
				      title: {
				         style: {
				            color: '#A0A0A3'
				         }
				      }
				   },
				   tooltip: {
				      backgroundColor: 'rgba(0, 0, 0, 0.85)',
				      style: {
				         color: '#F0F0F0'
				      }
				   },
				   plotOptions: {
				      series: {
				         dataLabels: {
				            color: '#B0B0B3'
				         },
				         marker: {
				            lineColor: '#333'
				         }
				      },
				      boxplot: {
				         fillColor: '#505053'
				      },
				      candlestick: {
				         lineColor: 'white'
				      },
				      errorbar: {
				         color: 'white'
				      }
				   },
				   legend: {
				      itemStyle: {
				         color: '#E0E0E3'
				      },
				      itemHoverStyle: {
				         color: '#FFF'
				      },
				      itemHiddenStyle: {
				         color: '#606063'
				      }
				   },
				   credits: {
				      style: {
				         color: '#666'
				      }
				   },
				   labels: {
				      style: {
				         color: '#707073'
				      }
				   },

				   drilldown: {
				      activeAxisLabelStyle: {
				         color: '#F0F0F3'
				      },
				      activeDataLabelStyle: {
				         color: '#F0F0F3'
				      }
				   },

				   navigation: {
				      buttonOptions: {
				         symbolStroke: '#DDDDDD',
				         theme: {
				            fill: '#505053'
				         }
				      }
				   },

				   // scroll charts
				   rangeSelector: {
				      buttonTheme: {
				         fill: '#505053',
				         stroke: '#000000',
				         style: {
				            color: '#CCC'
				         },
				         states: {
				            hover: {
				               fill: '#707073',
				               stroke: '#000000',
				               style: {
				                  color: 'white'
				               }
				            },
				            select: {
				               fill: '#000003',
				               stroke: '#000000',
				               style: {
				                  color: 'white'
				               }
				            }
				         }
				      },
				      inputBoxBorderColor: '#505053',
				      inputStyle: {
				         backgroundColor: '#333',
				         color: 'silver'
				      },
				      labelStyle: {
				         color: 'silver'
				      }
				   },

				   navigator: {
				      handles: {
				         backgroundColor: '#666',
				         borderColor: '#AAA'
				      },
				      outlineColor: '#CCC',
				      maskFill: 'rgba(255,255,255,0.1)',
				      series: {
				         color: '#7798BF',
				         lineColor: '#A6C7ED'
				      },
				      xAxis: {
				         gridLineColor: '#505053'
				      }
				   },

				   scrollbar: {
				      barBackgroundColor: '#808083',
				      barBorderColor: '#808083',
				      buttonArrowColor: '#CCC',
				      buttonBackgroundColor: '#606063',
				      buttonBorderColor: '#606063',
				      rifleColor: '#FFF',
				      trackBackgroundColor: '#404043',
				      trackBorderColor: '#404043'
				   },

				   // special colors for some of the
				   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
				   background2: '#505053',
				   dataLabelsColor: '#B0B0B3',
				   textColor: '#C0C0C0',
				   contrastTextColor: '#F0F0F3',
				   maskColor: 'rgba(255,255,255,0.3)'
				};

				// Apply the theme
				Highcharts.setOptions(Highcharts.theme);
		
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