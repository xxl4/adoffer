var mapplic = 'mapplic_demo';
var home_vidgets = {
	init: function(){
		home_vidgets.mapplic_json();
		$('#net').on('change', function(){
			location.reload();
		});
		$(window).resize(function(){
			home_vidgets.loadServerChart();
		});
		$('#layout-condensed-toggle').on('click',function(){
			home_vidgets.loadServerChart();
		});
		$('.dashboard_note').scrollbar();
	},
	loader_hide(field){
		$(field).parents('.wait_data').removeClass('wait_data');
	},
	mapplic_json : function(){
		var request_data = {};
		request_data['step'] = 'map_plugin';
		if($.cookie('net') != 'net' && $.cookie('net') !=''){
			request_data['net'] = $.cookie('net');
		}




		$.ajax({
			method: 'POST',
			url: window.domain + '/admin/home/reporting',


			dataType: "json",
			data: request_data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
		}).done(function(response){

			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else if(response){
				console.log("map_plugin");
				$('#mapplic_demo').mapplic({
					source: response,
					height:550,
					sidebar: false,
					minimap: false,
					locations: true,
					deeplinking: true,
					fullscreen: false,
					hovertip: true,
					developer: false,
					maxscale: 3
				});
				home_vidgets.search_on_map(response);
				home_vidgets.loader_hide($('#mapplic_demo'));
				home_vidgets.last_sales_block();
			}
		});
	},



	search_on_map : function(data){

		var fullList = data;

		if(fullList['levels']){
			var countries_data = fullList['levels'][0]['locations'];

			$("#country_search").keyup(function(event){

				var value_search = $(this).val();
				if(event.keyCode == 13){

					$.each(countries_data,function(i,e){
						if(value_search.toLowerCase() == e.title.toLowerCase() && !e.pin){
							window.location.href = '#'+e.id;
						}
					});





				}
			});
		}
	},
	data_quick_vieq_initProgress : function(){
		$('[data-init="animate-number"], .animate-number').each(function () {
			var data = $(this).data();
			$(this).animateNumbers(data.value, true, parseInt(data.animationDuration, 10));
		});
		$('[data-init="animate-progress-bar"], .animate-progress-bar').each(function () {
			var data = $(this).data();
			$(this).css('width', data.percentage);
		});
	},
	loadServerChart : function(){
		$('#chart').html('');
		var seriesData_1 = [ [], []];
		var random_1 = new Rickshaw.Fixtures.RandomData(50);

		for (var i = 0; i < 50; i++) {
			random_1.addData(seriesData_1);
		}

		var graph_1 = new Rickshaw.Graph( {
			element: document.querySelector("#chart"),
			height: 123,
			renderer: 'area',
			series: [{
				data: seriesData_1[0],
				color: 'rgba(0,0,0,0.30)'
			},{
				data: seriesData_1[1],
				color: 'rgba(255,255,255,0.05)'
			}]
		} );

		setInterval( function() {
			random_1.removeData(seriesData_1);
			random_1.addData(seriesData_1);
			graph_1.update();
		},1000);
	},
	loadSalesGraph : function(){
		$('#sales-graph').html('');
		var seriesData = [ [], []];
		var random = new Rickshaw.Fixtures.RandomData(50);

		for (var i = 0; i < 50; i++) {
			random.addData(seriesData);
		}

		var graph = new Rickshaw.Graph( {
			element: document.querySelector("#sales-graph"),
			height: 108,
			renderer: 'area',
			series: [{
				data: seriesData[0],
				color: '#f35958',
				name:'DB Server'
			},{
				data: seriesData[1],
				color: theme_colors.rickhav,
				name:'Web Server'
			}]
		});

		setInterval( function() {
			random.removeData(seriesData);
			random.addData(seriesData);
			graph.update();
		},1000);
	},
	top_geo : function(){
		if($.cookie('net') != 'net' && $.cookie('net') !=''){
			var network = $.cookie('net');
		}else{
			var network = 0;
		}

		$.ajax({
			method: 'post',
			//url: 'classes/Class.Dashboard.php',
			url: window.domain + '/admin/home/search',
			dataType: 'json',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			data: {
				step: 'dashboard_geos',
				net : network,
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				var five_top_percentage = 0;
				var count_all_countryes = 0;
				var each_country_display = '';


				$.each(response.values,function(i,e){
					count_all_countryes +=e;
					five_top_percentage += response.percentage[i];

					each_country_display += '<div class="row m-t-15">'+
					'<div class="col-md-6 col-sm-6 col-xs-6">'+
					'<p class="bold text-black">'+response.positions[i]['name']+'</p>'+
					'</div>'+
					'<div class="col-md-6 col-sm-6 col-xs-6">'+
					'<p class="text-black">'+e+'</p>'+
					'</div>'+
					'</div>';
				});

				$('.top5country_percent').html(Math.round(five_top_percentage * 100) / 100+"%");
				$('.top5country_count').html(count_all_countryes);
				$('.countries_data_count').html(each_country_display);

				home_vidgets.jvector_map($('#world_daily'),response.values,response.positions);
				home_vidgets.loader_hide($('#world_daily'));
				home_vidgets.top_offer();
			}
		});
	},
	top_offer : function(){
		if($.cookie('net') != 'net' && $.cookie('net') !=''){
			var network = $.cookie('net');
		}else{
			var network = 0;
		}

		$.ajax({
			method: 'post',
			//url: 'classes/Class.Dashboard.php',
			url: window.domain + '/admin/home/search',
			dataType: 'json',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			data: {
				step: 'dashboard_offers',
				max_offer : 5,
				net : network,
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				if(response.array_percent_done && response.array_percent_done.vals){
					var percentage_5_top = 100 - response.array_percent_done.vals[response.array_percent_done.vals.length-1];
				}else{
					var percentage_5_top = 0;
				}
				var total_sales_offers = 0;
				var each_offer_display = '';

				$('.top5offer_percent').html(Math.round(percentage_5_top * 100) / 100+"%");

				if(response.array_counts){
					$.each(response.array_counts,function(i,e){
						total_sales_offers += e;
						each_offer_display += '<div class="row m-t-15">'+
						'<div class="col-md-6 col-sm-6 col-xs-6">'+
						'<p class="bold text-black">'+response.array_percent_done.names[i]+'</p>'+
						'</div>'+
						'<div class="col-md-6 col-sm-6 col-xs-6">'+
						'<p class="text-black">'+e+'</p>'+
						'</div>'+
						'</div>';
					});
				}

				$('.top5offer_count').html(total_sales_offers);
				$('.offers_data_count').html(each_offer_display);
				home_vidgets.wekly_data_report_jvector();
			}
		});
	},

	wekly_data_report_jvector : function(){
		if($.cookie('net') != 'net' && $.cookie('net') !=''){
			var network = $.cookie('net');
		}else{
			var network = 0;
		}

		$.ajax({
			method: 'post',
			//url: 'classes/Class.Dashboard.php',
			url: window.domain + '/admin/home/dashboard',
			dataType: 'json',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			data: {
				step: 'dashboard_week_jvector',
				net : network
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				if(response.geos.percentage && response.offers.array_counts){
					var countries = response.geos.percentage.length-1;
					var offers = response.offers.array_counts.length;
				}else{
					var countries = 0;
					var offers = 0;
				}
				$('.country_num').html(countries);
				$('.offer_num').html(offers);

				var count_country_on_map = 0;
				var data_val_map = [];
				var data_dote_map = [];

				$.each(response.geos.positions,function(i,e){
					if(count_country_on_map < 10){
						data_val_map[i] = response.geos.values[i];
						data_dote_map[i] = e;
					}
					count_country_on_map ++;
				});

				var color_data = ['#457af1','#fdd01c','#f35958'];

				var count_top_offer = 0;
				var data_offers = '';
				if(offers){
					$.each(response.offers.array_counts,function(i,e){
						if(count_top_offer < 3){
							var tolp_countries = '';
							if(response.top_3_country_offers[response.offers.array_percent_done.names[i]] && response.top_3_country_offers[response.offers.array_percent_done.names[i]]['names']){
								$.each(response.top_3_country_offers[response.offers.array_percent_done.names[i]]['names'],function(key,val){
									var separator = '';
									if(key > 0){
										var separator = ', ';
									}
									tolp_countries += separator+val;
								});
							}

							var percentage = Math.round(response.offers.array_percent_done.vals[i] * 100) / 100;
							data_offers += '<li>'+
							'<div class="details-wrapper">'+
							'<div class="name">'+response.offers.array_percent_done.names[i]+'</div>'+
							'<div class="description">'+tolp_countries+'</div>'+
							'</div>'+
							'<div class="details-status pull-right"> <span class="animate-number" data-value="'+percentage+'" data-animation-duration="800">'+percentage+'</span>% </div>'+
							'<div class="clearfix"></div>'+
							'<div class="progress progress-small no-radius">'+
							'<div class="progress-bar animate-progress-bar" style="background-color: '+color_data[i]+';" data-percentage="'+Math.round(percentage)+'%"></div>'+
							'</div>'+
							'</li>';
						}
						count_top_offer ++;
					});
				}

				// $('.weekly_top_geo_per_offer').html(data_offers); disable it

				$('[data-init="animate-progress-bar"], .animate-progress-bar').each(function () {
					var data = $(this).data();
					$(this).css('width', data.percentage);
				});

				home_vidgets.jvector_map($('#world_weekly'),data_val_map,data_dote_map);
				home_vidgets.loader_hide($('#world_weekly'));
			}
		});
	},
	jvector_map : function(container,cityAreaData,positions){
		if ($.fn.vectorMap && container.length){
			container.vectorMap({
				map: 'world_mill',
				scaleColors: ['#C8EEFF', '#0071A4'],
				normalizeFunction: 'polynomial',
				focusOn:{
					x: 5,
					y: 1,
					scale: 0.8
				},
				zoomOnScroll:false,
				zoomMin:0.85,
				hoverColor: false,
				regionStyle:{
					initial: {
						fill: theme_colors.map_color,
						"fill-opacity": 1,
						stroke: '#a5ded9',
						"stroke-width": 0,
						"stroke-opacity": 0
					},
					hover: {
						"fill-opacity": 0.8
					},
					selected: {
						fill: 'yellow'
					},
					selectedHover: {
					}
				},
				markerStyle: {
					initial: {
						fill: '#f35958',
						stroke: '#f35958',
						"fill-opacity": 1,
						"stroke-width": 6,
						"stroke-opacity": 0.5,
						r: 3
					},
					hover: {
						stroke: 'black',
						"stroke-width": 2
					},
					selected: {
						fill: 'blue'
					},
					selectedHover: {
					}
				},
				markerLabelStyle : {
					initial: {
						'font-family': 'Verdana',
						'font-size': '12',
						'font-weight': 'bold',
						cursor: 'default',
						fill: 'black'
					},
					hover: {
						cursor: 'pointer'
					}
				},
				backgroundColor: theme_colors.craph_bg,
				markers :positions,
				series: {
					markers: [{
						attribute: 'r',
						scale: [2, 7],
						values: cityAreaData
					}]
				},
			});
		}
	},
	last_sales_block : function(){
		if($.cookie('net') !=''){
			var network = $.cookie('net');
		}else{
			var network = 'net';
		}

		console.log("last sales block");

		$.ajax({
			method: 'post',
			//url: 'classes/Class.Dashboard.php',
			url: window.domain + '/admin/home/search',
			dataType: 'json',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			data: {
				step: 'full_dashboard_data',
				net : network
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				$('.all_peyout').html(response.all_count);
				$('.day_peyout').html(response.day_peyout);
				$('.month_peyout').html(response.month_peyout_count);
				$('.message').html(response.message);
				if($('.all_peyout_price').length && typeof response.all_peyout_price != undefined){
					$('.all_peyout_price').data('value', response.all_peyout_price);
				}
				if($('.day_peyout_price').length && typeof response.day_peyout_price != undefined){
					$('.day_peyout_price').data('value', response.day_peyout_price);
				}
				if($('.month_peyout_price').length && typeof response.month_peyout_price != undefined){
					$('.month_peyout_price').data('value', response.month_peyout_price);
				}

				if(response.last_buyers){
					var last_buyers = response.last_buyers;
				}else{
					var last_buyers = '';
				}

				home_vidgets.loader_hide($('#country_search'));
				home_vidgets.loader_hide($('.sales_graph'));
				home_vidgets.data_quick_vieq_initProgress();

				$('.dashboard_note').height(($('.last_sale_container').length?$('.last_sale_container').height():500)-103);
				home_vidgets.top_geo();
			}
		});
	},
	last_sales_list : function(){
		if($.cookie('net') !=''){
			var network = $.cookie('net');
		}else{
			var network = 'net';
		}

		$.ajax({
			method:'post',
			// url:'classes/Class.Dashboard.php',
			url: window.domain + '/admin/home/search',
			dataType:'json',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			data:{
				step:'last_sales',
				net:network
			}
		}).done(function(response){

           console.log(response)
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{


				$('.last_sales').html(response);
				home_vidgets.loader_hide($('.last_sales'));
				$('.dashboard_note').height(($('.last_sale_container').length?$('.last_sale_container').height():500)-103);
			}
		});
	}
}

$(function(){
	console.log("start....");
	home_vidgets.init();
	home_vidgets.loadServerChart();
	if($('.last_sales').length){
		home_vidgets.last_sales_list();
	}
	$('.dashboard_note').height(($('.last_sale_container').length?$('.last_sale_container').height():500)-103);
});
