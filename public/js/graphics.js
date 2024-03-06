	// theme_color.
	var theme_color = {};
	theme_color.tick_border = '#fff';
	theme_color.tick_line = '#f0f0f0';
	theme_color.background = '#fff';
	theme_color.border = '#f0f0f0';
	theme_color.plot_border = '#f0f0f0';
	theme_color.plot_label = '#545454';
	theme_color.round_label = '#000';
	if(switch_theme == true){
		theme_color.tick_border = '#f35958';
		theme_color.tick_line = '#2f343e';
		theme_color.background = '#22262f';
		theme_color.border = '#22262f';
		theme_color.plot_border = '#2d3037';
		theme_color.plot_bg = '#16191e';
		theme_color.plot_label = '#fff';
		theme_color.round_label = '#fff';
	}
	// theme_color.

	Number.prototype.number_format = function(c, d, t){
		var n = this, 
		c = isNaN(c = Math.abs(c)) ? 2 : c, 
		d = d == undefined ? "." : d, 
		t = t == undefined ? "," : t, 
		s = n < 0 ? "-" : "", 
		i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
		j = (j = i.length) > 3 ? j % 3 : 0;
		return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};

	Number.prototype.price_format = function(){
		return (this).number_format(0, '', ',');
	};

	var graphiks = {
		colors : ['#0aa699','#0090d9','#fdd01c','#f35958'],
		init : function(){

		},
		perfomace_graphik : function(conversions,revenue,min_max){
			var revenue_label = 'REVENUE';
			var conversions_label = 'CONVERSIONS';

			var sign_prev = '$ ';
			var label = revenue_label;
			var d1 = revenue;
			
			if(!d1){//if REVENUE not available use CONVERSIONS
				sign_prev = '';
				label = conversions_label;
				d1 = conversions;
			}

			var data = [
			{
				label: label,
				data: d1,
				animator: {steps: 60, duration: 1000, start:0},
				lines: {
					fill: 0.6,
					lineWidth:2
				},
				shadowSize:0,
				color: '#f89f9f'
			},{
				label: label,
				data: d1,
				points: { show: true, fill: true, radius:6,fillColor:"#f89f9f",lineWidth:3 },
				color: theme_color.tick_border,
				shadowSize:0
			}
			];

			var plot = $.plotAnimator($("#placeholder").empty(),data,
				{	xaxis: {
					mode: "time",
					min: min_max['min'],
					max: min_max['max'],
					timeformat: "%d/%m/%y",
					minTickSize: [1, "day"],
					sign_prev: sign_prev,
					font :{
						lineHeight: 13,
						style: "normal",
						weight: "bold",
						family: "sans-serif",
						variant: "small-caps",
						color: "#6F7B8A"
					}
				},
				yaxis: {
					ticks: 3,
					tickDecimals: 0,
					tickColor: theme_color.tick_line,
					font :{
						lineHeight: 13,
						style: "normal",
						weight: "bold",
						family: "sans-serif",
						variant: "small-caps",
						color: "#6F7B8A"
					}
				},
				grid: {
					backgroundColor: { colors: [ theme_color.background, theme_color.background ] },
					borderWidth:1,borderColor: theme_color.border,
					margin:0,
					minBorderMargin:0,
					labelMargin:25,
					hoverable: true,
					clickable: true,
					mouseActiveRadius:6,
					color: theme_color.plot_label
				},
				legend: { show: false}
			});

			$("#placeholder").bind("plothover", function (event, pos, item) {
				if (item) {
					var series = plot.getData();

					function check_revenue_with_conversion(item,sign_prev, revenue_label){
						var message = '';
						if(item.series.label == revenue_label){
							message = item.series.label + " :" + " " + sign_prev + (item.datapoint[1]).price_format();
						}else{
							message = item.datapoint[1] +" "+ item.series.label;
						}
						return message;
					}

					var time = new Date(item.datapoint[0]);
					var show_date = time.getDate() +'/'+(parseInt(time.getMonth())+1)+'/'+time.getFullYear();
					var message = check_revenue_with_conversion(item,sign_prev,revenue_label);
					if($('#placeholder').width() <= item.pageX+$("#tooltip").width()){
						$("#tooltip").html(message)
						.css({top: item.pageY+5, left: item.pageX-$("#tooltip").width()})
						.fadeIn(200);
					}else{
						$("#tooltip").html(message)
						.css({top: item.pageY+5, left: item.pageX+10})
						.fadeIn(200);
					}
				} else {
					$("#tooltip").hide();
				}

			});

			$("<div id='tooltip'></div>").css({
				position: "absolute",
				display: "none",
				border: "1px solid #fdd",
				padding: "2px",
				"background-color": "#fee",
				"z-index":"99999",
				opacity: 0.80
			}).appendTo("body");

		},
		small_graphick_orders : function(graf){
			$("#mini-chart-orders").sparkline(graf, {
				type: 'bar',
				height: '30px',
				barWidth: 2,
				barSpacing: 1,
				barColor: '#f35958',
				negBarColor: '#f35958'});
		},
		small_graphick_payout : function(graf){
			$("#mini-chart-other").sparkline(graf, {
				type: 'bar',
				height: '30px',
				barWidth: 2,
				barSpacing: 1,
				barColor: '#0aa699',
				negBarColor: '#0aa699'});
		},
		round_graph : function(analytics){
			var data = [];
			$.each(analytics.data,function(title, value){
				if(!graphiks.colors[data.length]){
					graphiks.colors[data.length] = graphiks.getRandomColor();
				}
				data[data.length] = {label: title, value: value}
			});
			Morris.Donut({
				element: 'donut-example',
				data: data,
				colors: graphiks.colors,
				backgroundColor: theme_color.background,
				labelColor: theme_color.round_label,
				formatter: function (val) {
					return analytics.signPrev + (analytics.action == 'revenue' ? val.price_format() : val) + analytics.signEnd;
				},
			});
		},
		getRandomColor : function() {
			var letters = '0123456789ABCDEF';
			var color = '#';
			for (var i = 0; i < 6; i++) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		},
		distribution_graph : function(analytics){
		  var graphContainer = $("#stacked-ordered-chart").empty();
		  var page = graphContainer.data('page');
		  var pageLength = graphContainer.data('page-length');
		  var barWidth = graphContainer.data('bar-width');
		  var signPrev = analytics.signPrev;
		  var xaxisMax = pageLength;
		  var originalPageLength = pageLength;

		  var dataSlice = {};
		  var sliceFrom = (page*pageLength)-pageLength;
		  var sliceTo = page*pageLength;
		  var key = 0;

		  $.each(analytics.data, function(country, products){
		  	key++;
		  	if(key>sliceFrom && key<=sliceTo){
		  		dataSlice[country] = products;
		  	}
		  });

		  var chartData = [];
		  var chartTicks = [];
		  if(Object.keys(dataSlice).length<pageLength){
		  	xaxisMax = pageLength = Object.keys(dataSlice).length;
		  }

		  $.each(dataSlice, function(country, products){
		  	var productsVal = 0;
		  	var productsList = '';
		  	if((chartData.length+1)<=pageLength){
		  		$.each(products, function(product, val){
		  			if(val){
		  				let splitPercentBy = ':::';
		  				productsVal += parseFloat(analytics.action == "percent" ? val.split(splitPercentBy)[0] : val);
		  				switch(analytics.action){
		  					case 'revenue':
		  					val = val.price_format();
		  					break;
		  					case 'percent':
		  					val = val.split(splitPercentBy)[1];
		  					break;
		  				}
		  				productsList += product + (': ' + signPrev + val + analytics.signEnd) + '<br/>';
		  			}
		  		});
		  		chartTicks[chartTicks.length] = [(chartTicks.length+(barWidth)), country];
		  		chartData[chartData.length] = {
		  			label: productsList,
		  			data: [[chartData.length+(barWidth/2), productsVal]],
		  			bars: {
		  				show: true,
		  				barWidth: barWidth,
		  				fill: true,
		  				lineWidth:0,
		  				order: 0,
		  				fillColor: graphiks.colors[chartData.length]
		  			},
		  			color: graphiks.colors[chartData.length]
		  		};
		  	}
		  });

	  	var chartSettings = {
	  		grid: {
	  			hoverable: true,
	  			clickable: true,
	  			borderWidth: 1,
	  			borderColor:theme_color.plot_border,
	  			labelMargin:15,
		    	// color: theme_color.plot_label
		    	color: "#95989a"
		    },
		    xaxis: {
	    		min: 0, // min. value to show, null means set automatically
	        max: xaxisMax, // max. value to show, null means set automatically
	        tickLength: 0, // hide gridlines
	        ticks : chartTicks,
	        sign_prev: signPrev,
	        axisLabel: 'Country',
	        axisLabelUseCanvas: true,
	        axisLabelFontSizePixels: 12,
	        axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
	        axisLabelPadding: 5,
	      },
	      yaxis: {
	      	axisLabel: 'Value',
	      	axisLabelUseCanvas: true,
	      	axisLabelFontSizePixels: 12,
	      	axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
	      	axisLabelPadding: 5,
	      },
	      legend: {
	      	show : false,
	      	backgroundColor: theme_color.plot_bg,
	      },
	    };

	    if(analytics.action == "percent"){
	    	chartSettings['yaxis']['show'] = false;
	    }

	    var plot = $.plot(graphContainer, chartData, chartSettings);

	    graphContainer.bind("plothover", function (event, pos, item) {
	    	if (item) {
	    		var message = item['series']['label'];
	    		if($('#placeholder-bar-chart').width() <= item.pageX+$("#tooltip").width()){
	    			$("#tooltip").html(message)
	    			.css({top: item.pageY+5, left: item.pageX-$("#tooltip").width()})
	    			.fadeIn(200);
	    		}else{
	    			$("#tooltip").html(message)
	    			.css({top: item.pageY+5, left: item.pageX+10})
	    			.fadeIn(200);
	    		}
	    	} else {
	    		$("#tooltip").hide();
	    	}
	    });

	    //for paginator
	    if(Object.keys(analytics.data).length > page*originalPageLength){
	    	return true;
	    }else{
	    	return false;
	    }
	  },
	  top_offers_graph : function(id,sections,names){

	  	var return_color_names = {};

	  	$.each(sections,function(i,e){
	  		if(!graphiks.colors[i]){
	  			graphiks.colors[i] = graphiks.getRandomColor();
	  		}
	  	});

	  	$.each(names,function(i,e){
	  		return_color_names[e] = graphiks.colors[i];
	  	});

	  	$("#"+id).sparkline(sections, {
	  		type: 'pie',
	  		width: '100%',
	  		height: '100%',
	  		sliceColors: graphiks.colors,
	  		tooltipFormat: '<span style="color: {{color}}">&#9679;</span> {{offset:names}} ({{percent.1}}%)',
	  		tooltipValueLookups: {
	  			names: names
	  		},
	  		offset: 10,
	  		borderWidth: 0,
	  		borderColor: '#000000 '
	  	});

	  	return return_color_names;
	  },
	  easy_pie_chart : function(id,percentage,text){

		// $('#'+id).data('percent',percentage);
		$('.'+id).html('<div id="'+id+'" class="easy-pie-custom" data-percent="'+percentage+'"><span class="easy-pie-percent"><div style="line-Height:18px; width:80%; margin:35% auto;">'+text+" "+percentage+'</div></span></div>')

		$('#'+id).easyPieChart({
			lineWidth:9,
			barColor:'#f35958',
			trackColor:'#e5e9ec',
			scaleColor:false
		});
	},
	top_3_offers_per_month : function(configured_data,start_date,end_date ){
			//Bar Chart  - Jquert flot

			var plot = $.plot($("#placeholder-bar-chart").empty(), configured_data, {
				xaxis: {
					min: (new Date(start_date).getTime()),
					max: (new Date(end_date).getTime()),
					mode: "time",
					timeformat: "%b",
					tickSize: [1, "month"],
					sign_before: '%',
					monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            tickLength: 0, // hide gridlines
            axisLabel: 'Month',
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 5,
          },
          yaxis: {
          	axisLabel: 'Value',
          	axisLabelUseCanvas: true,
          	axisLabelFontSizePixels: 12,
          	axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
          	axisLabelPadding: 5
          },
          grid: {
          	hoverable: true,
          	clickable: false,
          	borderWidth: 1,
          	borderColor: theme_color.plot_border,
          	labelMargin:8,
          	color: theme_color.plot_label
          },
          series: {
          	shadowSize: 1
          }
        });

			$("#placeholder-bar-chart").bind("plothover", function (event, pos, item) {
				if (item) {
					var series = plot.getData();

					prod_label = series[item.seriesIndex]['label'];
					percentages = series[item.seriesIndex]['data'][item.dataIndex][1].toFixed(2);

					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
					var time = new Date(item.datapoint[0]);
					var show_date = time.getDate() +'/'+(parseInt(time.getMonth())+1)+'/'+time.getFullYear();
					var message = prod_label +" ("+percentages+"%)";
					if($('#placeholder-bar-chart').width() <= item.pageX+$("#tooltip").width()){
						$("#tooltip").html(message)
						.css({top: item.pageY+5, left: item.pageX-$("#tooltip").width()})
						.fadeIn(200);
					}else{
						$("#tooltip").html(message)
						.css({top: item.pageY+5, left: item.pageX+10})
						.fadeIn(200);
					}
				} else {
					$("#tooltip").hide();
				}

			});

			$("<div id='tooltip'></div>").css({
				position: "absolute",
				display: "none",
				border: "1px solid "+theme_color.plot_border,
				padding: "2px",
				"background-color": theme_color.background,
				"z-index":"99999",
				opacity: 0.80
			}).appendTo("body");
		}

	}