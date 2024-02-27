var reporting = {
	init : function(){
		calendar_date.select_default_time('week');

		$('#report').on('submit', function(event){
			event.preventDefault();
			reporting.get_to_date_clients();
		});

		reporting.get_to_date_clients();
		$('#net').on('change', function(){
			reporting.get_to_date_clients();
		});

		$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
			var oldRemoveChoice = Search.prototype.searchRemoveChoice;

			Search.prototype.searchRemoveChoice = function () {
				oldRemoveChoice.apply(this, arguments);
				this.$search.val('');
			};

			function formatState (state) {
				// if(state.text != 'Searching…'){
				// 	var country_falg = $('<span style="background-image: url(images/flags/'+state.text.replace(/ /g,'-')+'-Flag.png); margin-right: 5px; display:inline-block; background-size:25px; background-repeat: no-repeat; width:25px;height:25px; vertical-align: middle;"></span><span style="vertical-align: middle; display:inline-block;">'+state.text+'</span>');
				// 	return country_falg;
				// }else{
					return state.text;
				// }
			};

			$(".select2_offers").select2({
				placeholder: "Select Offers",
				width: 'auto',
				allowClear: false,
				height: '100%',
			});

			$(".select2_geos").select2({
				placeholder: "Select Offers Geos",
				width: 'auto',
				templateResult: formatState,
				allowClear: false,
				height: '100%',
			});

			$('.select2_offers, .select2_geos').on('select2:closing', function( event ) {
				var $searchfield = $(this).parent().find('.select2-search__field');
				$searchfield.css('width', '0.5em');
			});
		});

		reporting.update_analytics.init('performance');
		reporting.update_analytics.init('revenue');
		reporting.update_analytics.init('geo');
	},
	distribution_graph_paginator : {
		init : function(result){
			var id = 'stacked-ordered-chart';
			var graphContainer = $("#"+id);
			var page = graphContainer.data('page');
			var pageLength = graphContainer.data('page-length');
			var paginatorConteiner = $('[data-target="'+id+'"]');
			var graphPrev = $('.graph-prev', paginatorConteiner);
			var graphNext = $('.graph-next', paginatorConteiner);
			if(reporting.graphPrevClick){
				reporting.graphPrevClick.off('click');
			}
			if(reporting.graphNextClick){
				reporting.graphNextClick.off('click');
			}
			if(page>1){
				graphPrev.removeClass('hidden');
			}else{
				graphPrev.addClass('hidden');
			}
			if(result){
				$('.graph-paginator').removeClass('hidden');//on load graph if have btn graphNext
				graphNext.removeClass('hidden');
			}else{
				graphNext.addClass('hidden');
			}
			reporting.graphPrevClick = graphPrev.on('click', function(){
				var newPage = page-1;
				graphContainer.data('page', newPage);
				reporting.get_to_date_clients('geo');
				if(newPage>=1){
					graphNext.removeClass('hidden');
				}
				if(newPage<=1){
					graphPrev.addClass('hidden');
				}
			});
			reporting.graphNextClick = graphNext.on('click', function(){
				var newPage = page+1;
				graphContainer.data('page', newPage);
				reporting.get_to_date_clients('geo');
			});
		},
	},
	update_analytics : {
		init : function(action){
			$('[data-analytics-'+action+']').on('click', function(){
				var value = $(this).data('analytics-'+action);
				if(!$('[data-analytics-'+action+'-active="'+value+'"]:visible').length){
					$.ajax({
						method: "GET",
						dataType: 'json',
						url: "classes/Class.users.php",
						data: {
							step: "update_analytics",
							data: {
								action : action,
								value : value,
							},
						},
					}).done(function(response){
						if(response.result){
							$('[data-analytics-'+action+'-active').addClass('hidden');
							$('[data-analytics-'+action+'-active="'+value+'"]').removeClass('hidden').parent('.graph-selector').removeClass('hidden');
							reporting.get_to_date_clients(action);
						}else{
							var result = response.message;
							act = 'error';
							title = 'Error!';
							ButtonClass = 'btn btn-danger btn-cons';
							modals.show_warning(title,result,act,ButtonClass);
						}
					});
				}
			});
		},
	},
	get_to_date_clients : function(actionToUpdateGraph){
		if(typeof actionToUpdateGraph == undefined){
			actionToUpdateGraph = false;
		}
		var date_end = $('.date_end').val().toString();
		var date_start = $('.date_start').val().toString();
		if(date_end == date_start){
			var time_report = date_start;
		}else{
			var time_report = date_start+"-"+date_end;
		}
		var geo = $('#geos').val();
		var offers = $('#offers').val();
		var filter = {};
		filter['geo'] = geo;
		filter['offers'] = offers;

		$.ajax({
			method: "GET",
			dataType: 'json',
			url: "",
			data: {
				step: "show_to_date",
				options: {
					start : calendar_date.get_date(0),
					end: calendar_date.get_date(1),
					timezone: calendar_date.user_timezone(),
					time_report : time_report,
					filter : filter
				},
				net: $('#net').find('option:selected').val()
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				var graphInit = function(callBack){
					var args = Array.prototype.slice.call(arguments, 1);
					var doit;
					$( window ).resize(function() {
						clearTimeout(doit);
						doit = setTimeout(function(){
							return callBack.apply(null, args);
						},1000);
					});
					$('#layout-condensed-toggle').on('click',function(){
						return callBack.apply(null, args);
					});
					return callBack.apply(null, args);
				}

				if(!actionToUpdateGraph){//to update all for default
					var tableData = $('#net').val()?response.clients_admin:response.clients_user;
					$('.show_result').html(tableData.repo).append( "<tbody>"+tableData.total+"</tbody>" );

					table_config.data_tables('#example2', {
						aLengthMenu:[500, 1000],
					});
				}

				if(!actionToUpdateGraph || actionToUpdateGraph=='geo'){//to update all for default and only graph by action
					// reset paginator on change filters
					if(!actionToUpdateGraph){
						var id = 'stacked-ordered-chart';
						var graphPrev = $('.graph-prev', $('[data-target="'+id+'"]'));
						$("#"+id).data('page', 1);
						graphPrev.addClass('hidden');
					}
					// reset paginator on change filters
					//show_analytics_geo_selector
					$('[data-analytics-geo-active').addClass('hidden');
					$('[data-analytics-geo-active="'+response.analytics_geo.action+'"]').removeClass('hidden').parent('.graph-selector').removeClass('hidden');
					//show_analytics_geo_selector
					// analytics_geo
					var result = graphInit(graphiks.distribution_graph, response.analytics_geo);
					// analytics_geo
					reporting.distribution_graph_paginator.init(result);
				}

				if((!actionToUpdateGraph || actionToUpdateGraph=='performance')){//to update all for default and only graph by action
					if(typeof response.perfomace.Revenue == undefined){
						response.perfomace.Revenue = false;
					}
					//show_analytics_performance_selector
					$('[data-analytics-performance-active').addClass('hidden');
					$('[data-analytics-performance-active="'+response.analytics_performance.action+'"]').removeClass('hidden').parent('.graph-selector').removeClass('hidden');
					//show_analytics_performance_selector
					// analytics_performance + show_revenue
					$('.chart-value.conversions').html(response.sumarr.saled || '0');
					graphiks.small_graphick_payout(reporting.small_graphick_data(response.perfomace.Revenue));
					if($('.chart-value.revenue').length){
						$('.chart-value.revenue').html('$ '+ (response.sumarr.price || '0'));
					}
					graphiks.small_graphick_orders(reporting.small_graphick_data(response.perfomace.conversions));
					// analytics_performance + show_revenue

					// is_analytics_performance
					if(response.analytics_performance.action == 'conversion'){
						var data_to_get_min_max = response.perfomace.conversions;
						response.perfomace.Revenue = false;
					}else{
						var data_to_get_min_max = response.perfomace.Revenue;
						response.perfomace.conversions = false;
					}

					if(Object.keys(data_to_get_min_max ?? {}).length){
						graphInit(graphiks.perfomace_graphik, reporting.big_graphick_data(response.perfomace.conversions), reporting.big_graphick_data(response.perfomace.Revenue),reporting.min_max_date(data_to_get_min_max));
					}else{
						$("#placeholder").html('');
					}
					// is_analytics_performance
				}

				if(!actionToUpdateGraph || actionToUpdateGraph=='revenue'){//to update all for default and only graph by action
					//show_analytics_revenue_selector
					$('[data-analytics-revenue-active').addClass('hidden');
					$('[data-analytics-revenue-active="'+response.analytics_revenue.action+'"]').removeClass('hidden').parent('.graph-selector').removeClass('hidden');
					//show_analytics_revenue_selector
					// analytics_revenue
					if(Object.keys(response.analytics_revenue.data).length){
						graphInit(graphiks.round_graph, response.analytics_revenue);
					}else{
						$('#donut-example').html('');
					}
					// analytics_revenue
				}
			}
		});
	},
	UTC_Date : function(date,last){
		var date_array = date.split("-");
		if(last && last != ''){
			var dateObj = new Date(Date.UTC(parseInt(date_array[0]),parseInt(date_array[1])-1,parseInt(date_array[2]),06,00,00));
		}else{
			var dateObj = new Date(Date.UTC(parseInt(date_array[0]),parseInt(date_array[1])-1,parseInt(date_array[2])));
		}
		var time = dateObj.getTime();
		return time;
	},
	count_date : function(num_date){
		var start_date = calendar_date.get_date(0);
		var start_time = reporting.UTC_Date(start_date,'');
		var time_1_day = new Date(start_time);
		var time__1 = time_1_day.setDate(time_1_day.getDate(start_time) + num_date);
		function add_zero(number){
			return_number = '';
			if(number < 10){
				return_number = '0'+number;
			}else{
				return_number = number;
			}
			return return_number;
		}
		return time_1_day.getFullYear()+"-"+ add_zero(parseInt(time_1_day.getMonth()+1)) +"-"+ add_zero(time_1_day.getDate());
	},
	big_graphick_data : function(data){
		if(data){
			var result = [];

			var start_date = calendar_date.get_date(0);
			var end_date = calendar_date.get_date(1);
			var start_time = reporting.UTC_Date(start_date,'');
			var end_time = reporting.UTC_Date(end_date,'');

			if (!(start_date in data)){
				result[result.length] = [start_time,0];
			}

			for (var i = 0; reporting.UTC_Date(reporting.count_date(i),'') < end_time; i++) {
				var each_time = reporting.UTC_Date(reporting.count_date(i),'');
				if(!(reporting.count_date(i) in data)){
					result[result.length] = [each_time,0];
				}else{
					result[result.length] = [each_time,data[reporting.count_date(i)]];
				}
			}

			result.sort(function(a, b) {
				return a[0] - b[0];
			});
			return result;
		}else{
			return false;
		}
	},
	min_max_date : function(data){
		var result = {};

		var start_date = calendar_date.get_date(0);
		var end_date = calendar_date.get_date(1);
		var start_time = reporting.UTC_Date(start_date,'');
		var end_time = reporting.UTC_Date(end_date,'');
		if (!(start_date in data)){
			result['min'] = start_time;
		}

		if(Object.keys(data).length == 1 && start_time == end_time - (24*60*60*1000)){
			var date_time = reporting.UTC_Date(Object.keys(data)[0]);;
			result['min'] = date_time- (24*60*60*1000);
			result['max'] = date_time+ (24*60*60*1000);
		}else if(Object.keys(data).length < 1 && start_time == end_time - (24*60*60*1000)){
			result['min'] = start_time - (24*60*60*1000);
			result['max'] = end_time;
		}else if(Object.keys(data).length < 1){
			result['min'] = start_time;
			result['max'] = end_time - (24*60*60*1000);
		}else{
			$.each(data,function(i,e){
				var date_time = reporting.UTC_Date(i,'');
				if(!result['min'] || date_time < result['min']){
					result['min'] = date_time;
				}
				var date_time = reporting.UTC_Date(i,true);
				if(!result['max'] || date_time > result['max']){
					result['max'] = end_time - (24*60*60*1000);
				}
			});
		}
		return result;
	},
	small_graphick_data : function(data){
		if(data){
			var result = [];
			var normal_length = [];
			$.each(data,function(i,e){
				result[result.length] = e;
			});
			if(result.length<=30){
				normal_length = result;
			}else{
				count_length = result.length;
				$.each(result,function(i,e){
					if(i>=count_length-30){
						normal_length[normal_length.length] = e;
					}
				});
			}
			return normal_length;
		}
		return false;
	}
}

$(function(){
	reporting.init();
})
