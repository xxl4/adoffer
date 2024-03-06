$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var ofer_functions = {
	ofers_data: '',
	full_return_data: [],
	offer_colors: {Live:'success', Private: 'primary', Capped: 'danger', Paused: 'warning', Closed: 'white'},
	init : function(){
		ofer_functions.show_offers();
		$('#offer_category, #offer_geos, #offer_sort').on('change', function(){
			ofer_functions.show_to_user();
		});

		$('#search_field').on('keyup', function(){
			ofer_functions.show_to_user();
		});
		$(window).resize(function(){
			ofer_functions.show_to_user();
		});

		$('#net').on('change', function(){
			$.cookie('net',$('#net').find('option:selected').val(), {expires: 7,path: '/'});
			ofer_functions.show_offers();
		});
	},
	show_offers : function(){
		if($.cookie('net') && ($.cookie('net') != 'net' && $.cookie('net') !='')){
			var u_id = window.selectedUid;
			var network = $.cookie('net');
		}else{
			var u_id = $('#u_id').val();
			var network = false;
		}
		var options = {
			id : u_id
		}

		if(network){
			options['network_name'] = network;
		}
		$.ajax({
			method: 'post',
			url: window.domain + '/offers/offer',
			dataType: 'json',
			data: {
				step: 'show_all_offers',
				options: options
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				ofer_functions.ofers_data = response;
				ofer_functions.show_to_user();
			}
			//to set pixel/postback tab which was oppened on edit
			if(typeof window.offersPixelsTabId !== "undefined" || window.offersPixelsTabId !== false){
				$(`[href="#${window.offersPixelsTabId}"]`).trigger('click');
				window.offersPixelsTabId = false;
			}
		});
	},
	show_to_user : function(){
		console.log ("show to user")
		var category = $('#offer_category').val();
		ofer_functions.full_return_data['offer'] = {};
		offers_construct(category);
		var returned = ofer_functions.full_return_data;
		var vrite_left = '';
		var vrite_right = '';
		var numbr = 0;
		var write_admin = '';

		if(Object.keys(returned).length){
			let getFilteredOffers = function(){
				let filteredKeys = Object.keys(returned.offer).sort(function(keyA, keyB) {
					switch($('#offer_sort').val()) {
						case 'dateNewest':
						default:
						return returned.offer[keyB].data.id - returned.offer[keyA].data.id;
						break;
						case 'dateOldest':
						return returned.offer[keyA].data.id - returned.offer[keyB].data.id;
						break;
						case 'payoutHigh':
						return returned.offer[keyB].data.payout - returned.offer[keyA].data.payout;
						break;
						case 'payoutLow':
						return returned.offer[keyA].data.payout - returned.offer[keyB].data.payout;
						break;
					}
				});
				let filteredOffers = {};
				filteredKeys.forEach(function(filteredKey, i){
					filteredOffers[i] = returned.offer[filteredKey];
				});
				return filteredOffers;
			}

			$.each(getFilteredOffers(),function(key,offer){
				numbr++;
				if(numbr==1 || window.innerWidth < 1800){
					vrite_left += offer.html;
				}else{
					numbr=0;
					vrite_right += offer.html;
				}
			});
		}

		function offers_construct(categories){
			if (typeof(ofer_functions.ofers_data.offers) == 'object') {
				let network = $('#net').find('option:selected').val();
				let selectedGeo = $('#offer_geos').val();
				let offerNamePart = $('#search_field').val() ? $('#search_field').val().toLowerCase() : false;

				$.each(ofer_functions.ofers_data.offers,function(key,curent_offer){
					if (Array.isArray(categories)) {//filter by categories
						if (Array.isArray(curent_offer.offers_categories_ids)) {
							let inCategory = false;
							$.each(categories,function(i,id){
								if (curent_offer.offers_categories_ids.includes(id)) {
									inCategory = true;
								}
							});
							if (inCategory) {
								offer_to_show(key, curent_offer, network, selectedGeo, offerNamePart);
							}
						}
					} else {
						offer_to_show(key, curent_offer, network, selectedGeo, offerNamePart);
					}
				});
			}
		}

		function offer_to_show(key, curent_offer, network, selectedGeo, offerNamePart){
			if(curent_offer.name){
				var geo = '';
				var geo_selected = false;
				var ofer_filter = false;

				if(curent_offer.data && curent_offer.data.geo){
					$.each(curent_offer.data.geo, function(i,e){
						if(curent_offer.data.geo.length-1 == i){
							geo += e;
						}else{
							geo += e+', ';
						}
					});
				}
				if(Array.isArray(selectedGeo)){
					$.each(selectedGeo, function(i,e){
						if(curent_offer.data.geo){
							if(curent_offer.data.geo.indexOf( e ) != -1){
								geo_selected = true;
							}
						}
					});
				}else{
					geo_selected = true;
				}

				if(offerNamePart){
					if(curent_offer.show_name.toLowerCase().indexOf(offerNamePart) !== -1){
						ofer_filter = true;
					}
				}else{
					ofer_filter = true;
				}

				if(geo_selected && ofer_filter){
					let offer_previev = '';
					if (curent_offer.status === 'Live') {
						if(curent_offer.data && curent_offer.data.tracking){
							$.each(curent_offer.data.tracking, function(i,e) {
								let net = ofer_functions.ofers_data.network;
								let replaced_link = e.tracking_link.replace('={NETWORK}', '=' + net)
								if (e.show_offer && e.show_offer === 'true') {
									offer_previev = '<a href="'+replaced_link+'" target="_blank">';
									if (typeof(curent_offer.image) != 'undefined' && curent_offer.image != null) {
										offer_previev += '<span class="offer-product-img-container"><img src="'+curent_offer.image+'" alt="'+curent_offer.name+'" /></span>';
									}
									offer_previev += 'Offer Preview <i class="icon ion-eye"></i></a>';
								} else if(offer_previev === '') {
									offer_previev = 'offer';
								}
							});
						}
					}

					var creative = '';


                    // console.log('12333',curent_offer.data.description)

					if(curent_offer.data && curent_offer.data.creative){

						$.each(curent_offer.data.creative, function(i,e){
							creative += '<div style="margin-left: 10px;" class="each_creative"> <p>'+e.title+'</p><a href="'+e.this_link+'" target="_blank">'+e.this_link+'</a></div>';
							var imageTypes = /\.(gif|jpe?g|png)$/;
						});

					}

					var descript = '';
					if(curent_offer.data){
						if(curent_offer.data.description){
							descript = curent_offer.data.description;
						}else{
							descript = 'not updated';
						}
					}

					var geo_description = '';
					if(curent_offer.data.geo_description){
						geo_description = curent_offer.data.geo_description;
					}

					var creative_description = '';
					if(curent_offer.data.creative_description){
						creative_description = curent_offer.data.creative_description;
					}

					if(network != 'net' && network != ''){
						var button_for_pixels = '<li><a href="#tab'+key+'Pixel_Postback" class="offers-tab-pixels" data-offer-id="'+curent_offer.id+'" role="tab" data-toggle="tab">Pixels/Postbacks</a></li>';
					}else{
						var button_for_pixels = '';
					}

					top_geo_message = '<div style="display:none;" class="geo_date_no_data"><p>Morpheus: Throughout human history, we have been dependent on machines to survive. Fate, it seems, is not without a sense of irony.</p></div>';

					top_geo_table = '<table class="table no-more-tables geo_table">'+
					'<thead><tr><th style="width:30%">COUNTRY</th><th style="width:20%">Percentage</th><th style="width:50%">Distribution</th>'+
					'</tr></thead><tbody></tbody></table>';

					var write_time_selectors = '<div class="col-xs-12">'+
					'<div class="row">'+
					'<div class="col-xs-12 col-md-6 col-lg-4 use_small_padding">'+
					'<div class="row">'+
					'<div class="col-xs-12">'+
					'<select class="list_date select2_list padding_left" data-suffix="geo" style="margin-bottom: 10px;" name="date" id="">'+
					'<option value="today">Today</option>'+
					'<option value="yester">Yesterday</option>'+
					'<option value="week">Current Week</option>'+
					'<option value="month">Current Month</option>'+
					'<option value="year">Year To Date</option>'+
					'<option value="l_week">Last Week</option>'+
					'<option value="l_month">Last Month</option>'+
					'<option value="calendar">Custom</option>'+
					'</select>'+
					'</div></div></div>'+
					'<div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding">'+
					'<div class="col-xs-4 col-sm-4">'+
					'<div class="row">'+
					'<div class="about_color">'+
					'<p class="about_inputs">Start</p>'+
					'</div></div></div>'+
					'<div class="input-append success col-xs-8 col-sm-8">'+
					'<div class="row">'+
					'<input type="text" class="form-control date_start" >'+
					'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>'+
					'</div></div></div>'+
					'<div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding">'+
					'<div class="col-xs-4 col-sm-4">'+
					'<div class="row">'+
					'<div class="about_color">'+
					'<p class="about_inputs">End</p>'+
					'</div></div></div>'+
					'<div class="input-append success col-xs-8 col-sm-8">'+
					'<div class="row">'+
					'<input type="text" class="form-control date_end">'+
					'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>'+
					'</div></div></div>'+top_geo_table+top_geo_message+
					'</div>'+
					'</div>';

					write_offer = '<div class="col-md-12 accord" data-offer_db="'+curent_offer['name']+'"><ul class="nav nav-tabs" role="tablist">'+
					'<li class="active"><a href="#tab'+key+'Offer" role="tab" data-toggle="tab">Summary</a></li>'+
					'<li><a href="#tab'+key+'Description" role="tab" data-toggle="tab">Description</a></li>'+
					'<li><a href="#tab'+key+'Geos" role="tab" data-toggle="tab">Accepted Geos</a></li>'+
					'<li><a href="#tab'+key+'Top_Geos" class="tab_top_geo" role="tab" data-toggle="tab">Top Geos</a></li>'+
					'<li><a href="#tab'+key+'Tracking" role="tab" data-toggle="tab">Tracking Links</a></li>'+
					'<li><a href="#tab'+key+'ProductsFeed" role="tab" data-toggle="tab">Products Data Feed</a></li>'+
					'<li><a href="#tab'+key+'Creative" role="tab" data-toggle="tab">Creatives</a></li>'+
					button_for_pixels +
					'</ul><div class="tools"><a href="javascript:;" class="collapse"></a>'+
					'<a href="#grid-config" data-toggle="modal" class="config"></a>'+
					'<a href="javascript:;" class="reload"></a>'+
					'<a href="javascript:;" class="remove"></a>'+
					'</div><div class="tab-content"><div class="tab-pane active" id="tab'+key+'Offer">'+
					'<div class="row column-seperation"><div class="col-md-12">'+
					'<table class="table table-striped table-flip-scroll cf">'+
					'<thead class="cf"><tr><th>'+offer_previev+'</th>'+
					'<th>Payout</th><th>Status</th></tr>'+
					'</thead><tbody><tr><td width = "55%">'+curent_offer['show_name']+'</td>'+
					'<td width="25%">'+ (curent_offer.payout_percent ? curent_offer.payout_percent + '%' : '$' + curent_offer.payout) + ' '+curent_offer.per_act+'</td>'+
					'<td width="20%"><span class="label label-'+ofer_functions.offer_colors[curent_offer.status]+'">'+curent_offer.status+'</span></span>'+
					'</td></tr></tbody></table></div></div>'+
					'</div><div class="tab-pane" id="tab'+key+'Description">'+
					'<div class="row"><div class="col-md-12">'+
					'<p>'+descript+'</p>'+
					'</div></div></div><div class="tab-pane" id="tab'+key+'Geos">'+
					'<div class="row"><div class="col-md-12"><p>'+geo_description+'</p>'+
					'<p>'+geo+'</p>'+
					'</div></div></div><div class="tab-pane top_geos_tab" id="tab'+key+'Top_Geos">'+
					'<div class="row"><div class="col-md-12">'+
					'<div class="top_geos_graph">'+write_time_selectors+'</div>'+
					'</div></div>'+
					'<div class="wait_loader"><img src="images/squares-preloader-gif.svg" alt=""></div>'+
					'</div>'+
					curent_offer.htmlTrackingLinks+
					curent_offer.htmlProductsDataFeed+
					'<div class="tab-pane" id="tab'+key+'Creative">'+
					'<div class="row"><div class="col-md-12"><p>'+creative_description+'</p>'+
					creative+
					'</div></div></div>'+
					'<div class="tab-pane" id="tab'+key+'Pixel_Postback">'+

					'<div class="wait_loader offers-tab-pixels-loader" data-offer-id="'+curent_offer.id+'"><img src="images/squares-preloader-gif.svg" alt="preloader"></div>'+
					'<div class="offers-tab-pixels-container" data-offer-id="'+curent_offer.id+'"></div>'+

					'</div></div></div>';

					if(curent_offer.status != 'Secret'){
						ofer_functions.full_return_data['offer'][Object.keys(ofer_functions.full_return_data['offer']).length] = {
							'data' : curent_offer,
							'html' : write_offer,
						};
					}
				}
			}
		}
		$('.categories').html(write_admin);
		$('.categories_offer_left').html(vrite_left);
		$('.categories_offer_right').html(vrite_right);
		ofer_functions.offer_tracking_links();
		top_geos.init();

		if($('.offer-product-img-container').length){
			$('.offer-product-img-container').popover('destroy').popover({
				html: true,
				content: function () {
					return $(this)[0].outerHTML;
				},
				trigger: 'hover focus',
				placement: 'auto',
				container: 'body',
				customClass: 'offer-popover',
			});
		}
	},
	offer_tracking_links : function(){
		$(document).on('keyup', '#offer_user_tracking', function(){
			$('.save_pixels').removeClass('hidden');
		});
	},
	offer_tracking_change : function(){
		$('#offer_user_tracking').on('submit', function(event){
			event.preventDefault();
			if(typeof ofer_functions.ofers_data.offer_links != 'object' || !ofer_functions.ofers_data.offer_links){
				ofer_functions.ofers_data.offer_links = {};
				ofer_functions.ofers_data.offer_links[offer_id.toString()] = {};
			}else if(ofer_functions.ofers_data.offer_links == 'object' && !(offer_id in ofer_functions.ofers_data.offer_links)){
				ofer_functions.ofers_data.offer_links[offer_id.toString()] = {};
			}
			ofer_functions.ofers_data.offer_links[offer_id.toString()] = ofer_functions.get_tracking(this);
			ofer_functions.write_tracking_for_offer();
			$('#change_tracking').modal('hide');
		});
	},
	quotes_fixes : function(pixeldata){
		var fixed_quotes = pixeldata.toString().replace(/-squot;/g,'\'').replace(/-quot;/g,'\"').replace(/-new_r-/g,'\r').replace(/-new_n-/g,'\n');
		return fixed_quotes;
	},
	quotes_fixes_write: function(pixeldata){
		var fixed_quotes = pixeldata.toString().replace(/\'/g,'-squot;').replace(/\"/g,'-quot;').replace(/\r/g,'-new_r-').replace(/\n/g,'-new_n-');
		fixed_quotes = fixed_quotes.replace(/â€˜/g,'-squot;').replace(/â€™/g,'-squot;');
		fixed_quotes = fixed_quotes.replace(/â€/g,'-quot;').replace(/â€œ/g,'-quot;');
		return fixed_quotes;
	},
	get_tracking : function(form){
		var data = {};
		var curent_form_textarea = $(form).find('textarea');
		$.each(curent_form_textarea,function(i,e){
			var value = $(e).val();
			var name = $(e).prop('name');
			if(!data[name]){
				data[name] = [];
			}
			if(value && value != ''){
				data[name][data[name].length] = ofer_functions.quotes_fixes_write(value);
			}
		});
		if(Object.keys(data).length ==''){
			data = 'not any pixels or postbacks';
		}
		return data;
	},
	write_tracking_for_offer : function(){

		if($.cookie('net') && ($.cookie('net') != 'net' && $.cookie('net') !='')){
			var u_id = window.selectedUid;
		}else{
			var u_id = $('#u_id').val();
		}

		$.ajax({
			method: 'post',
			url: "classes/Class.offer.php",
			dataType: 'json',
			data: {
				step: 'update_offer_links',
				offer_links: ofer_functions.ofers_data.offer_links,
				u_id: u_id,
				offer_id: offer_id
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				if(response){
					var result = response['content'];
					if(response['type'] == true){
						ofer_functions.show_offers();
						ofer_functions.show_to_user();

						act = 'success';
						title = 'Good job!';
						ButtonClass = 'btn btn-primary btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
					}else{
						act = 'error';
						title = 'Error!';
						ButtonClass = 'btn btn-danger btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
					}
				}
			}
		});
	}
}

$(document).ready(function(){
	function ClipBoard()
	{
		holdtext.innerText = copytext.innerText;
		Copied = holdtext.createTextRange();
		Copied.execCommand("Copy");
	}
	//store nodepath value to clipboard	(copy to top of page)
	$('.li').on('click', function(){
		var path = $('#pathtonode').html();
		path = path.replace(/ &gt; /g,".");
		ClipBoard(path);
	});
});

$(function(){
	ofer_functions.init();
	user_tracking.work_on_tracking('us');
	ofer_functions.offer_tracking_change();
});
