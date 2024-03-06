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
        //
			Search.prototype.searchRemoveChoice = function () {
				oldRemoveChoice.apply(this, arguments);
				this.$search.val('');
			};
        //
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
        //
        //
		$('.select2_geos, .select2_offers').on('change', function(){
			var suffix = $(this).data('suffix');
			intelligence.detect_section(suffix);
		});





		$(".list_date_suf_").select2();
		$(".list_date_suf_").val("month").trigger("change");
        //





		// intelligence.opportunity();

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





		var sections = [4,6,3,2,5,1];
		intelligence.offers_data(sections);




	},

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



	// update_CTR_and_Trafick : function(link,id_name){
	// 	CKEDITOR.instances.traffic_sources_content.updateElement();
	// 	CKEDITOR.instances.ctr_content.updateElement();
    //
	// 	var data_content = $(link).parents('.modal-content').find('textarea').val();
    //
	// 	$.ajax({
	// 		method: 'post',
	// 		url: 'classes/Class.intelligence.php',
	// 		dataType: 'json',
	// 		data: {
	// 			step: 'update_CTR_and_Trafick',
	// 			data: data_content,
	// 			id_name: id_name
	// 		}
	// 	}).done(function(response){
	// 		if(response && response.logout){
	// 			logout_visual.auto_logout(response.logout);
	// 		}else{
	// 			$('#'+id_name+"_modal").modal("hide");
    //
	// 			if(response){
	// 				$('.'+id_name+'_display').html(data_content);
	// 				var title = 'Compleated!';
	// 				result = 'Message changed';
	// 				var ButtonClass = 'btn btn-primary btn-cons';
	// 				var act = 'success';
	// 			}else{
	// 				var title = 'Error!';
	// 				result = 'Message not changed';
	// 				var ButtonClass = 'btn btn-danger btn-cons';
	// 				var act = 'error';
	// 			}
	// 			modals.show_warning(title,result,act,ButtonClass);
	// 		}
	// 	});
	// }

}

$(function(){
	intelligence.init();
});
