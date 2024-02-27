var top_geos = {
  colors : ['#0aa699','#0090d9','#fdd01c','#f35958'],
  time_to_data : [],
  multiple_change : false,
  init : function(){
    $('.tab_top_geo').on('click', function(){
      top_geos.init_options(this);
    });

		$(document).off('click', '.offers-tab-pixels').on('click', '.offers-tab-pixels', function(event){
			event.preventDefault();
			
			let offer_id = $(this).data('offer-id');
			let $loader = $('.offers-tab-pixels-loader[data-offer-id="'+offer_id+'"]');
			let $container = $('.offers-tab-pixels-container[data-offer-id="'+offer_id+'"]');

			$loader.css('display','block');

			$.ajax({
				url: "classes/Class.offer.php",
				dataType: "json",
				type: "POST",
				data: {
					step: 'offers_tab_pixels',
					data: {
						u_id: window.selectedUid || $('[data-account-unik-id]').data('account-unik-id'),
						offer_id: offer_id, 
					}
				},
				success: function(result) {
					if(result && result.logout){
						return logout_visual.auto_logout(result.logout);
					}

					$loader.css('display','none');
					$container.html(result.html);
					if(typeof window.offersPixelsEventTabId !== "undefined" || window.offersPixelsEventTabId !== false){
						//to set event tab which was oppened on edit
						$(`[href="#${window.offersPixelsEventTabId}"]`).tab('show');
						window.offersPixelsEventTabId = false;
					}
				},
			});
    });

    $('.list_date').on('change',function(){

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
  init_options :function(current_offer){
    var offer_block = $(current_offer).parents('.accord');
    var current_offer_name_db = $(offer_block).data('offer_db');
    var current_period_select = $(offer_block).find('.list_date');
    var date_start = $(offer_block).find('.date_start');
    var date_end = $(offer_block).find('.date_end');

    $(date_start.add(date_end)).datepicker({
      format: "dd/mm/yyyy",
      startView: 1,
      autoclose: true,
      todayHighlight: true
    });

    $(date_start).on('change', function(){
      var dateStart_time = $(date_start).datepicker('getDate');
      var dateEnd_time = $(date_end).datepicker('getDate');

      if(dateStart_time > dateEnd_time){
        $(date_end).datepicker('update', new Date(dateStart_time));
      }else{
        if(!top_geos.multiple_change){
          top_geos.offers_geo(offer_block,current_offer_name_db,date_start,date_end);
          // $(offer_block).find('.geo_table').html(table_data);
        }
      }
      top_geos.multiple_change = false;
    });

    $(date_end).on('change', function(){
      var dateStart_time = $(date_start).datepicker('getDate');
      var dateEnd_time = $(date_end).datepicker('getDate');
      if(dateStart_time > dateEnd_time){
        $(date_start).datepicker('update', new Date(dateEnd_time));
      }else{
        top_geos.offers_geo(offer_block,current_offer_name_db,date_start,date_end);
        // $(offer_block).find('.geo_table').html(table_data);
      }
      top_geos.multiple_change = false;
    });

    $(date_start.add(date_end)).on('click',function(){
     $(current_period_select).val("calendar").trigger("change");
      // $(date_start.add(date_end)).datepicker("destroy");
    });

    $(current_period_select).on('change', function(){
      top_geos.multiple_change = true;
      top_geos.selector_date($(current_period_select).find('option:selected').val(),date_start,date_end);
      // console.log($(current_period_select).find('option:selected').val());
    });

    $(current_period_select).select2({});
    $(current_period_select).val("l_week").trigger("change");
  },
  selector_date : function(selector,start,end){
    var selected_selector = selector;
    var cur_date = new Date();
    var current_year = cur_date.getFullYear();
    var current_month = cur_date.getMonth();
    var calendar_day = cur_date.getDate();
    var week_day = cur_date.getDay();
    var temp = new Date();
    var max_date = new Date();

    switch (selected_selector) {
      case 'today':
      $ (start.add(end)).datepicker('update', new Date(current_year, current_month, calendar_day));
      break;
      case 'yester':
      $ (start.add(end)).datepicker('update', new Date(current_year, current_month , calendar_day-1));
      break;
      case 'week':
      if(week_day != 0){
        temp.setDate((cur_date.getDate()+1)-week_day);
      }else{
        temp.setDate((cur_date.getDate()+1)-(week_day+7));
      }
      $(start).datepicker('update', new Date(temp));
      $(end).datepicker('update', new Date(cur_date));
      break;
      case 'month':
      temp.setDate(cur_date.getDate()-(calendar_day-1));
      $(start).datepicker('update', new Date(current_year, current_month, 1));
      $(end).datepicker('update', new Date(cur_date));
      break;
      case 'year':
      $(start).datepicker('update', new Date(current_year, 0, 1));
      $(end).datepicker('update', new Date(cur_date));
      break;
      case 'l_week':
      if(week_day != 0){
        temp.setDate((cur_date.getDate()+1)-(week_day+7));
        $(start).datepicker('update', new Date(temp));
        $(end).datepicker('update', new Date(current_year, current_month, calendar_day-week_day));
      }else{
        temp.setDate((cur_date.getDate()+1)-(week_day+14));
        max_date.setDate((cur_date.getDate())-(week_day+7));
        $(start).datepicker('update', new Date(temp));
        $(end).datepicker('update', new Date(max_date));
      }
      break;
      case 'l_month':
      $(start).datepicker('update', new Date(current_year, current_month-1, 1));
      if(parseInt(current_month) != 0){
        $(end).datepicker('update', new Date(current_year, current_month-1, new Date(current_year, parseInt(current_month), 0).getDate()));
      }else{
        $(end).datepicker('update', new Date(current_year, current_month-1, new Date(current_year-1, 12, 0).getDate()));
      }
      break;
      case 'calendar':
      break;
      default:
      break;
    }
  },
  offers_geo : function(offer_block,offer,date_start,date_end){
    var filter = {};
    filter['offers'] = [offer];
    var options ={
      start : top_geos.get_date(0,date_start),
      end: top_geos.get_date(1,date_end),
      filter : filter
    }

    if(options.start != 'NaN-NaN-NaN' && options.end != 'NaN-NaN-NaN'){
      if(JSON.stringify(top_geos.time_to_data['offers_data'])  != JSON.stringify(options)){
        $(offer_block).find('.wait_loader').css('display','block');
        top_geos.time_to_data['offers_data'] = options;
        $.ajax({
          method: 'post',
          url: 'classes/Class.intelligence.php',
          dataType: 'json',
          data: {
            step: 'intelligence_geos',
            options: options,
          }
        }).done(function(response){
          if(response && response.vals){
            var table = '';
            $.each(response.vals,function(i,e){
              if(!top_geos.colors[i]){
                top_geos.colors[i] = top_geos.getRandomColor();
              }
              if(response.names[i] != 'Rest'){
                table += '<tr>'+
                '<td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/'+response.names[i].replace(/ /g,'-')+'-Flag.png">'+response.names[i]+'</span>'+
                '</td>'+
                '<td><span class="muted">'+Math.round( e * 10 ) / 10+' % </span>'+
                '</td>'+
                '<td class="v-align-middle">'+
                '<div class="progress">'+
                '<div data-percentage="'+Math.round( e * 10 ) / 10+'%" class="progress-bar animate-progress-bar" style="width: '+response.vals[i]+'%; background-color:'+top_geos.colors[i]+'"></div>'
                '</div>'+
                '</td>'+
                '</tr>';
              }
            });

            $(offer_block).find('.geo_table tbody').html(table);
            $(offer_block).find('.wait_loader').css('display','');
            $(offer_block).find('.geo_date_no_data').css('display','none');
            $(offer_block).find('.geo_table').css('display','');
          }else{
            $(offer_block).find('.wait_loader').css('display','');
            $(offer_block).find('.geo_date_no_data').css('display','block');
            $(offer_block).find('.geo_table').css('display','none');
          }
        });
      }
    }
  },
  get_date : function(first,calendar){

    if(first){
      var get_date = $(calendar).val().split("/");
    }else{
      var get_date = $(calendar).val().split("/");
    }
    var new_date = new  Date ( parseInt(get_date['2']),parseInt(get_date['1'])-1,parseInt(get_date['0'])+first);
    var month = String(parseInt(new_date.getMonth()+1));
    var day = String(parseInt(new_date.getDate()));
    if(month.length < 2){
      month = '0'+month;
    }else{
      month = month;
    }

    if(day.length < 2){
      day = '0'+day;
    }else{
      day = day;
    }

    var full_date = [month,day,String(new_date.getFullYear())];
    selected_date = full_date[2]+'-'+full_date[0]+'-'+full_date[1];
    return selected_date;
  },
}