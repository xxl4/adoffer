var advanced = {
	sales_displayed : [],
	black_sales_displayed : [],
	init : function(){
		calendar_date.select_default_time('day');

		advanced.get_to_date_clients();
		$('#net').on('change', function(){
			advanced.get_to_date_clients();
		});

		$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
			var oldRemoveChoice = Search.prototype.searchRemoveChoice;

			Search.prototype.searchRemoveChoice = function () {
				oldRemoveChoice.apply(this, arguments);
				this.$search.val('');
			};

			$(".select2_offers").select2({
				placeholder: "Select Offers",
				width: 'auto',
				allowClear: false,
				height: '100%',
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

				$(document).find('.select2_geos').select2({
					placeholder: "Select Offers Geos",
					allowClear: false,
					templateResult: formatState,
					width: '100%'
					// placeholder: "Select a State",
				});
			});

			$('.select2_offers, .select2_geos').on('select2:closing', function(event){
				var $searchfield = $(this).parent().find('.select2-search__field');
				$searchfield.css('width', '0.5em');
			});
		});

		$('#report').on('submit', function(event){
			event.preventDefault();
			var date_to_clients = $('#all_dates').prop('selected','selected').val();
			advanced.get_to_date_clients();
		});
		$('select option:selected').attr('disabled','disabled');
		// advanced.export_exel();
	},
	get_to_date_clients : function(event){
		var date_end1 = $('.date_end1').val().toString();
		var date_start1 = $('.date_start1').val().toString();
		if(date_end1 == date_start1){
			var time_report = date_start1;
		}else{
			var time_report = date_end1 +"-"+date_start1;
		}
		// if(event){
		// 	var step = 'show_to_date_black_list';
		// }else{
			var step = 'show_to_date_by_each';
		// }

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
				step: step,
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
				$('.all_clients table').html(response.clients_user);
				if($('.total table').length>0){
					$('.total table').html(response.total);
				}
				table_config.data_tables('#example');

				$('.DTTT_button_collection').on('click', function(){
					if($('.DTTT_dropdown').css('display') == 'block'){
						$('.DTTT_dropdown').css('display','none');
					}else{
						$('.DTTT_dropdown').css('display','block');
					}
				});

				var button_add_black_list = '<label style="margin-left:10px;"><button style="display:none;" class="btn btn-success btn-cons add_in_black">Add To Black List</button></label>'
				$('.dataTables_length').append(button_add_black_list);

				if(response && response.for_add_to_blacklist){
					advanced.add_in_black_list();
					// advanced.display_black_list();
					if(event){
						$('.add_in_black').css('display','none');
					}
				}

				advanced.export_exel();
			}
		});
	},
	export_exel : function(){
		$("#btnExport").click(function(e) {
			e.preventDefault();
			//exporter
			var date_end1 = $('.date_end1').val().toString().replace(new RegExp('/', 'g'), '_');
			var date_start1 = $('.date_start1').val().toString().replace(new RegExp('/', 'g'), '_');
			var date = date_start1==date_end1?date_start1:date_start1+'-'+date_end1;

			var table_to_parse = '#table_wrapper #example';
   		var format_to_export = 'xlsx';//in idea available formats are "xlsx","xlsm","xlsb","biff2","xls","csv","txt"
			var info = $(table_to_parse).DataTable().page.info();
   		var filename = 'Advanced_Report_'+date+'_page_'+(info.page+1)+'_from_'+info.pages+'_('+(info.end-info.start)+'_rows)';

			var text_extractor = function($_el, ignore_el){
			  ignore_el = ignore_el || "";
			  $.fn.ignore = function(el){
			    return this.clone().find(el||">*").remove().end();
			  };
			  var str = $_el.map(function(){
			    var self = $(this);
			    var text = ignore_el?$.trim(self.ignore(ignore_el).text()):$.trim(self.text());
			    return !self.next().length ? text + '' : text;
			  }).get().join('{||}');
			  return str.split('{||}');
			};

			var theads = text_extractor($(table_to_parse+' thead tr th'));
			var rows_data = text_extractor($(table_to_parse+' tbody tr td'), ".hidden");

			//create table
			var table_to_export = "<table><thead>";
			table_to_export += "<tr>";
			$.each(theads, function(i,th){
			  table_to_export += "<th>"+th+"</th>";
			});
			table_to_export += "</tr>";
			table_to_export += "</thead>";
			table_to_export += "<tbody>";
			table_to_export += "<tr>";
			$.each(rows_data, function(rows_key,rows_item){
			  var row_key = rows_key%theads.length;
			  table_to_export += "<td class='tableexport-string'>"+rows_item+"</td>";
			  if(row_key+1==theads.length){
			    table_to_export += "</tr><tr>";
			  }
			});
			table_to_export += "</tr>";
			table_to_export += "</tbody></table>";
			//create table

			//trigger download
			var div = document.createElement('div');
			div.style.display = 'none';
			document.body.appendChild(div);
			div.innerHTML = table_to_export;

			TableExport(div, {
			  formats: [format_to_export],
			  sheetname: "WorkSheet",
			  filename: filename,
			});
			document.querySelector('.button-default.'+format_to_export+':last-child').click();
			div.remove();
			//trigger download
			//exporter
		});
	},
	add_in_black_list : function(){
		$('.add_in_black').css('display', 'block');
		$('.remove_from_black').on('click', function(){
			advanced.remove_from_black_list();
		});
		$('.add_in_black').on('click', function(){
			var table = $('#example').DataTable();
			var table_data = table.rows( { filter : 'applied'} ).data();

			var data_to_html = '';
			$.each(table_data,function(i,e){
				data_to_html += e[0];
			});

			$('.black_list_block').html(data_to_html);

			advanced.sales_displayed = [];

			$('.black_list_block>span').each(function(i,e){
				advanced.sales_displayed[advanced.sales_displayed.length] = {'transaction_id':$(e).data('transaction-id'),'net':$(e).data('net'),'offer':$(e).data('offer')};
			});

			var confirm_data = advanced.confirmation_message(advanced.sales_displayed);

			$('.current_paments').html(confirm_data.display_add_in_black_list);
			if(advanced.sales_displayed.length){
				$('#add_to_black_list').modal('show');
				$('.black_list_form').off('submit').on('submit', function(event){
					event.preventDefault();
					advanced.sql_add_sales_in_black_list(confirm_data.confirmation_message);
				});
			}
		});
	},
	confirmation_message : function(data_array){
		var data = {};
		var for_display_in_list = {};
		$.each(data_array, function(i,e){
			if(!for_display_in_list[e['net']]){
				for_display_in_list[e['net']] = {};
				for_display_in_list[e['net']][e['offer']] = 1;
			}else if(!for_display_in_list[e['net']][e['offer']]){
				for_display_in_list[e['net']][e['offer']] = 1;
			}else{
				for_display_in_list[e['net']][e['offer']] += 1;
			}
		});

		var display_add_in_black_list = '';
		var confirmation_message = '';
		$.each(for_display_in_list, function(i,e){
			display_add_in_black_list += '<p>'+i+"<br>";
			confirmation_message += i+"\r\n";
			var count = 0;
			$.each(e,function(key,val){
				if(count > 0){
					display_add_in_black_list += '<br>';
					confirmation_message += "\r\n";
				}
				display_add_in_black_list += key+' = '+val + "PC";
				confirmation_message += key+' = '+val + "PC";
				count ++;
			});
			display_add_in_black_list  += '</p>';
		});
		data['display_add_in_black_list'] = display_add_in_black_list;
		data['confirmation_message'] = confirmation_message;

		return data;
	},
	sql_add_sales_in_black_list : function(confirmation_message){
		$.ajax({
			method: "POST",
			dataType: 'json',
			url: "",
			data: {
				step: "add_in_black_list",
				sales: JSON.stringify(advanced.sales_displayed)
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				$('#add_to_black_list').modal('hide');
				if(response.type == 'access'){
					result = response.content;
					var act = 'error';
					var title = 'Error!';
					var ButtonClass = 'btn btn-danger btn-cons';
					modals.show_warning(title,result,act,ButtonClass);
				}else if(response == 'success'){
					var result = confirmation_message;
					var act = 'success';
					var title = 'Good job!';
					var ButtonClass = 'btn btn-primary btn-cons';
					modals.show_warning(title,result,act,ButtonClass);
					$('.sweet-alert').on('click', function(){
						if(act == 'success'){
							// location.reload();
							advanced.get_to_date_clients();
						}
					});
				}else{
					var result = 'someting error';
					var act = 'error';
					var title = 'Error!';
					var ButtonClass = 'btn btn-danger btn-cons';
					modals.show_warning(title,result,act,ButtonClass);
				}
			}
		});
	},
	// sql_remove_sales_from_blacklist : function(confirmation_message){
	// 	$.ajax({
	// 		method: "POST",
	// 		dataType: 'json',
	// 		url: "classes/Class.reporting.php",
	// 		data: {
	// 			step: "remove_from_black_list",
	// 			options: {
	// 				data: advanced.black_sales_displayed
	// 			}
	// 		}
	// 	}).done(function(response){
	// 		if(response && response.logout){
	// 			logout_visual.auto_logout(response.logout);
	// 		}else{
	// 			$('#remove_from_black_list').modal('hide');
	// 			if(response.type == 'access'){
	// 				result = response.content;
	// 				var act = 'error';
	// 				var title = 'Error!';
	// 				var ButtonClass = 'btn btn-danger btn-cons';
	// 				modals.show_warning(title,result,act,ButtonClass);
	// 			}else if(response == 'success'){
	// 				var result = confirmation_message;
	// 				var act = 'success';
	// 				var title = 'Good job!';
	// 				var ButtonClass = 'btn btn-primary btn-cons';
	// 				modals.show_warning(title,result,act,ButtonClass);
	// 				$('.sweet-alert').on('click', function(){
	// 					if(act == 'success'){
	// 						// location.reload();
	// 						advanced.get_to_date_clients();
	// 					}
	// 				});
	// 			}else{
	// 				var result = 'someting error';
	// 				var act = 'error';
	// 				var title = 'Error!';
	// 				var ButtonClass = 'btn btn-danger btn-cons';
	// 				modals.show_warning(title,result,act,ButtonClass);
	// 			}
	// 		}
	// 	});
	// }
}

$(function(){
	advanced.init();
})
