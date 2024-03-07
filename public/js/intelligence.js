$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var intelligence = {
	tavle_colors:['success','info', 'warning', 'danger'],
	time_to_data : {},
	init : function(){

		$('.date_start_suf_, .date_end_suf_').datepicker({
			format: "dd/mm/yyyy",
			startView: 1,
			autoclose: true,
			todayHighlight: true
		});

		$('.date_start_suf_').on('change', function(){
			var suffix = $(this).parents('.grid-body').find('.list_date_suf_').data('suffix');
			var dateStart = $('.date_start_suf_'+suffix).datepicker('getDate');
			var dateEnd = $('.date_end_suf_'+suffix).datepicker('getDate');

			if(dateStart > dateEnd){
				$ ( '.date_end_suf_'+suffix ). datepicker ( 'update' ,  new  Date ( dateStart ));
			}else{
				intelligence.detect_section(suffix);
			}
		});

		$('.date_end_suf_').on('change', function(){
			var suffix = $(this).parents('.grid-body').find('.list_date_suf_').data('suffix');
			var dateStart = $('.date_start_suf_'+suffix).datepicker('getDate');
			var dateEnd = $('.date_end_suf_'+suffix).datepicker('getDate');

			if(dateStart > dateEnd){
				$ ( '.date_start_suf_'+suffix ). datepicker ( 'update' ,  new  Date ( dateEnd ));
			}else{
				intelligence.detect_section(suffix);
			}
		});

		$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
			var oldRemoveChoice = Search.prototype.searchRemoveChoice;

			Search.prototype.searchRemoveChoice = function () {
				oldRemoveChoice.apply(this, arguments);
				this.$search.val('');
			};

			$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
				var oldRemoveChoice = Search.prototype.searchRemoveChoice;
				Search.prototype.searchRemoveChoice = function () {
					oldRemoveChoice.apply(this, arguments);
					this.$search.val('');
				};

				function formatState (state) {
					if(state.text != 'Searchingâ€¦'){
						var country_falg = $('<span style="background-image: url(images/flags/'+state.text.replace(/ /g,'-')+'-Flag.png); margin-right: 5px; display:inline-block; background-size:25px; background-repeat: no-repeat; width:25px;height:25px; vertical-align: middle;"></span><span style="vertical-align: middle; display:inline-block;">'+state.text+'</span>');
						return country_falg;
					}else{
						return state.text;
					}
				};

				$(document).find('.select2_geos').select2({
					placeholder: "All Geos",
					allowClear: false,
					templateResult: formatState,
					width: '100%'
					// placeholder: "Select a State",
				});
			});


			$(".select2_offers").select2({
				placeholder: "All Offers",
				width: 'auto',
				allowClear: false,
				height: '100%',
			});

			$('.select2_offers, .select2_geos').on('select2:closing', function(event){
				var $searchfield = $(this).parent().find('.select2-search__field');
				$searchfield.css('width', '0.5em');
			});
		});


		$('.select2_geos, .select2_offers').on('change', function(){
			var suffix = $(this).data('suffix');
			intelligence.detect_section(suffix);
		});

		$('.date_end_suf_, .date_start_suf_').on('click',function(){
			var suffix = $(this).parents('.grid-body').find('.list_date_suf_').data('suffix');
			$(".date_start_suf_"+suffix).datepicker("destroy");

			$(".list_date_suf_").each(function(i,e){
				if($(e).data('suffix') == suffix){
					$(e).val("calendar").trigger("change");
				}
			});
		});

		$('.list_date_suf_').on('change', function(){
			var suffix = $(this).data('suffix');
			calendar_date.selector_date($(this).find('option:selected').val(),'_suf_'+suffix);
		});

		$(".list_date_suf_").select2();
		$(".list_date_suf_").val("l_week").trigger("change");

		CKEDITOR.replace( 'ctr_content' );
		CKEDITOR.replace( 'traffic_sources_content' );

		$('.modal_CTR_and_Trafick').on('click',function(){
			intelligence.modal_CTR_and_Trafick(this);
		});

		intelligence.opportunity();

		let timer = null;
		$('#blacklistInteligenceAdd').select2({
			ajax: {
				delay: 0,
				transport: function(params, success, failure) {
					let pageSize = 10;
					let term = (params.data.term || '').toLowerCase();
					let page = (params.data.page || 1);

					if (timer)
						clearTimeout(timer);

					timer = setTimeout(function(){
						timer = null;
						let results = window.networks
							.filter(function(f){
								return f.net !== 'net' && f.name.toLowerCase().includes(term);
							})
							.map(function(f){
								return { id: f.net, text: f.name, 'data-u-id': f.uid, 'data-role': f.role};
							});

						let paged = results.slice((page -1) * pageSize, page * pageSize);

						let options = {
							results: paged,
							pagination: {
								more: results.length >= page * pageSize
							}
						};
						success(options);
					}, params.delay);
				}
			},
			tags: true
		});
		$('#blacklistInteligenceAdd').on('click', function(){
			intelligence.black_list.add($('[name="black_list_inteligence_add"]').val());
		});
		$('[name="black_list_inteligence_remove"]').select2();
		$('.black_list_inteligence_remove').on('click', function(){
			intelligence.black_list.remove($('[name="black_list_inteligence_remove"]').val());
		});
		// var sections = [4,6,3,2,5,1];
		// intelligence.offers_data(sections);
	},
	black_list : {
		add : function(network){
			$.ajax({
				//url: 'classes/Class.intelligence.php',
				url: window.domain + '/offers/intelligence',
				dataType: "json",
				type: 'POST',
				data: {
					step : 'black_list_network_add',
					network : network
				},
				success: function (result) {
					if(result.status){
						var act = 'success';
						var title = 'Good job!';
						var ButtonClass = 'btn btn-primary btn-cons';
						if(result.html){
							$('.black_list_inteligence_container').html(result.html);
							$('[name="black_list_inteligence_remove"]').select2();
						}
						$('.black_list_inteligence_remove').removeClass('hidden');
					}else{
						var act = 'error';
						var title = 'Error!';
						var ButtonClass = 'btn btn-danger btn-cons';
					}
					modals.show_warning(title,false,act,ButtonClass);
					if(result.html){
						$('.sweet-alert .confirm.btn-primary').on('click', function(){
							location.reload();
						});
					}
				},
			});
		},//add
		remove : function(network){
			$.ajax({
				//url: 'classes/Class.intelligence.php',
				url: window.domain + '/intelligences/intelligence',
				dataType: "json",
				type: 'POST',
				data: {
					step : 'black_list_network_remove',
					network : network
				},
				success: function (result) {
					if(result.status){
						var act = 'success';
						var title = 'Good job!';
						var ButtonClass = 'btn btn-primary btn-cons';
						if(result.html){
							$('.black_list_inteligence_container').html(result.html);
							$('[name="black_list_inteligence_remove"]').select2();
						}else{
							$('.black_list_inteligence_container').html('');
							$('.black_list_inteligence_remove').addClass('hidden');
						}
					}else{
						var act = 'error';
						var title = 'Error!';
						var ButtonClass = 'btn btn-danger btn-cons';
					}
					modals.show_warning(title,false,act,ButtonClass);
					$('.sweet-alert .confirm.btn-primary').on('click', function(){
						location.reload();
					});
				},
			});
		},//remove
	},//black_list
	detect_section : function(suffix){
		switch (suffix) {
			case 'offers':
			intelligence.offers_data(suffix);
			break;
			case 'geo':
			intelligence.offers_geo(suffix);
			break;
		}
	},
	offers_data : function(suffix){
		var filter = {};
		filter['geo'] = $('#geos_'+suffix).val();
		var options ={
			start : calendar_date.get_date(0,suffix),
			end: calendar_date.get_date(1,suffix),
			filter : filter
		}
		if(JSON.stringify(intelligence.time_to_data['offers_data']) != JSON.stringify(options)){
			intelligence.time_to_data['offers_data'] = options;
			if(options.start != 'NaN-NaN-NaN' && options.end != 'NaN-NaN-NaN'){
				$.ajax({
					method: 'post',
					//url: 'classes/Class.intelligence.php',
					url: window.domain + '/offers/intelligence',
					dataType: 'json',
					data: {
						step: 'intelligence_offers',
						options: options,
					}
				}).done(function(response){
					if(response && response.vals){
						$('.offer_table, #offers_date-pie').css('display', 'block');
						$('.offers_date_no_data').css('display', 'none');
						var data_graph = graphiks.top_offers_graph('offers_date-pie',response.vals,response.names);

						var prod_table = '<table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody>';

						$.each(data_graph, function(i,e){
							prod_table +='<tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid '+e+';overflow:hidden"></div></div></td><td class="legendLabel">'+i+'</td></tr>'
						});
						prod_table += '</tbody></table>';




						$('#offers_date-pie').append(prod_table);

						var table = '';
						$.each(response.vals,function(i,e){
							if(response.names[i] != 'Rest'){
								table += '<tr>'+
								'<td class="v-align-middle"><span class="muted">'+response.long_names[i]+'</span>'+
								'</td>'+
								'<td><span class="muted">'+Math.round( e * 10 ) / 10+' % </span>'+
								'</td>'+
								'<td class="v-align-middle">'+
								'<div class="progress">'+
								'<div data-percentage="'+Math.round( e * 10 ) / 10+'%" class="progress-bar animate-progress-bar" style="width: '+response.vals[i]+'%; background-color:'+graphiks.colors[i]+'"></div>'
								'</div>'+
								'</td>'+
								'</tr>';
							}
						});

						$('.offer_table tbody').html(table);
					}else{
						$('.offer_table, #offers_date-pie').css('display', 'none');
						$('.offers_date_no_data').css('display', 'block');
					}
				});
			}
		}

	},
	offers_geo : function(suffix){
		var filter = {};
		filter['offers'] = $('#offers_'+suffix).val();
		var options ={
			start : calendar_date.get_date(0,suffix),
			end: calendar_date.get_date(1,suffix),
			filter : filter
		}
		if(JSON.stringify(intelligence.time_to_data['offers_geo'])  != JSON.stringify(options)){
			intelligence.time_to_data['offers_geo'] = options;
			if(options.start != 'NaN-NaN-NaN' && options.end != 'NaN-NaN-NaN'){
				$.ajax({
					method: 'post',
					//url: 'classes/Class.intelligence.php',
					url: window.domain + '/offers/intelligence',
					dataType: 'json',
					data: {
						step: 'intelligence_geos',
						options: options,
					}
				}).done(function(response){
					if(response && response.vals){
						$('.geo_table, #geo_date-pie').css('display', 'block');
						$('.geo_date_no_data').css('display', 'none');
						var data_graph = graphiks.top_offers_graph('geo_date-pie',response.vals,response.names);

						var prod_table = '<table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody>';

						$.each(data_graph, function(i,e){
							prod_table +='<tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid '+e+';overflow:hidden"></div></div></td><td class="legendLabel">'+i+'</td></tr>'
						});
						prod_table += '</tbody></table>';

						$('#geo_date-pie').append(prod_table);
						var table = '';
						$.each(response.vals,function(i,e){
							if(response.names[i] != 'Rest'){
								table += '<tr>'+
								'<td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/'+response.names[i].replace(/ /g,'-')+'-Flag.png">'+response.names[i]+'</span>'+
								'</td>'+
								'<td><span class="muted">'+Math.round( e * 10 ) / 10+' % </span>'+
								'</td>'+
								'<td class="v-align-middle">'+
								'<div class="progress">'+
								'<div data-percentage="'+Math.round( e * 10 ) / 10+'%" class="progress-bar animate-progress-bar" style="width: '+response.vals[i]+'%; background-color:'+graphiks.colors[i]+'"></div>'
								'</div>'+
								'</td>'+
								'</tr>';
							}
						});

						$('.geo_table tbody').html(table);
					}else{
						$('.geo_table, #geo_date-pie').css('display', 'none');
						$('.geo_date_no_data').css('display', 'block');
					}
				});
			}
		}
	},
	opportunity : function(){
		$.ajax({
			method: 'post',
			//url: 'classes/Class.intelligence.php',
			url: window.domain + '/offers/intelligence',
			dataType: 'json',
			data: {
				step: 'intelligence_opportunity',
			}
		}).done(function(response){
			if(response.result == 'graph'){
				graphiks.easy_pie_chart('opportunity-graph',response.percent,response.offer)
			}else{
				$('.opportunity-graph').html('There is no hot opportunity today, please check back tomorrow as our algorithm will recalculate based on the new data set.');
			}
		});
	},
	intelligence_top_3_offers : function(main_data){
		var all_offers = {};
		var num_i = 0;
		var num_prod_i = 1;

		$.each(main_data.main_data,function(i,e){
			var num_time_i = 1;
			$.each(e,function(offer,data){
				if(num_prod_i)
					if(!all_offers[offer]){
						all_offers[offer] = [];
						all_offers[offer][num_i] = [new Date(i).getTime(),data];
					}else{
						all_offers[offer][num_i]= [new Date(i).getTime(),data];
					}
					if(Object.keys(all_offers[offer]).length < Object.keys(main_data.main_data).length){
						for (var i_offer = (Object.keys(main_data.main_data).length-1); i_offer >= 0; i_offer--) {
							if(!all_offers[offer][i_offer]){
								all_offers[offer][i_offer] = [null];
							}
						}
					}

				});
			num_i++;
			num_time_i++;
		});


		var month_key = Object.keys(main_data.main_data).length-1;
		for (var i_month = 0; i_month <= month_key; i_month++) {
			var num_prod_per_month = 1;
			$.each(all_offers,function(i,e){
				if(e[i_month] && e[i_month][0] != null){
					if(num_prod_per_month < 2){
						all_offers[i][i_month][0] = all_offers[i][i_month][0] - 55000000*3;
					}else if(num_prod_per_month > 2){
						all_offers[i][i_month][0] = all_offers[i][i_month][0] + 55000000*3;
					}
					num_prod_per_month++;
				}
			});
		}


		var configured_data = [];
		$.each(all_offers,function(i,e){

			if(!graphiks.colors[configured_data.length]){
				graphiks.colors[configured_data.length] = graphiks.getRandomColor();
			}

			configured_data[configured_data.length] = {
				label: i,
				data: e,
				bars: {
					show: true,
					barWidth: 12*24*60*60*150,
					fill: true,
					lineWidth:0,
					fillColor:  graphiks.colors[configured_data.length]
				},
				color: graphiks.colors[configured_data.length]
			};
		});

		graphiks.top_3_offers_per_month(configured_data,main_data.start_date,main_data.end_date);
		visual_part.top_3_offers_per_month = [configured_data,main_data.start_date,main_data.end_date];

		var doit;
		$( window ).resize(function() {
			clearTimeout(doit);
			doit = setTimeout(function(){
				$('.legend').css('display','none');
				graphiks.top_3_offers_per_month(configured_data,main_data.start_date,main_data.end_date);
			},200);
		});

	},
	intelligence_new_offers : function(data){
		var data_per_month = '';
		$.each(data,function(i,e){
			data_per_month += '<tr>';
			data_per_month += '<td>'+e.offer_name+'</td><td>'+e.release_date+'</td><td>'+e.payout+'</td>';
			data_per_month += '</tr>';
		});
		$('.new_offers').html(JSON.stringify(data_per_month));
	},
	modal_CTR_and_Trafick : function(link){
		var detect_option = $(link).data('target').replace('#','');
		var text_area_class = '';
		var showed_data = '';
		var id_name = '';

		if(detect_option == 'ctr_modal'){
			showed_data  = 'ctr_display';
			content =	$('.'+showed_data).html();
			id_name = 'ctr';
			CKEDITOR.instances.ctr_content.setData(content);
		}else if(detect_option == 'traffic_sources_modal'){
			showed_data  = 'traffic_sources_display';
			content =	$('.'+showed_data).html();
			id_name = 'traffic_sources';
			CKEDITOR.instances.traffic_sources_content.setData(content);
		}

		$('.submit_traffic_sources, .submit_ctr').unbind("click").on('click',function(){
			intelligence.update_CTR_and_Trafick(this,id_name);
		});

	},
	update_CTR_and_Trafick : function(link,id_name){
		CKEDITOR.instances.traffic_sources_content.updateElement();
		CKEDITOR.instances.ctr_content.updateElement();

		var data_content = $(link).parents('.modal-content').find('textarea').val();

		$.ajax({
			method: 'post',
			//url: 'classes/Class.intelligence.php',
			url: window.domain + '/offers/intelligence',
			dataType: 'json',
			data: {
				step: 'update_CTR_and_Trafick',
				data: data_content,
				id_name: id_name
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				$('#'+id_name+"_modal").modal("hide");

				if(response){
					$('.'+id_name+'_display').html(data_content);
					var title = 'Compleated!';
					result = 'Message changed';
					var ButtonClass = 'btn btn-primary btn-cons';
					var act = 'success';
				}else{
					var title = 'Error!';
					result = 'Message not changed';
					var ButtonClass = 'btn btn-danger btn-cons';
					var act = 'error';
				}
				modals.show_warning(title,result,act,ButtonClass);
			}
		});
	}

}

$(function(){
	intelligence.init();
});
