var calendar_date = {
	selected_date : {},
	init : function(){

		$('.date_start1, .date_end1').datepicker({
			format: "dd/mm/yyyy",
			startView: 1,
			autoclose: true,
			todayHighlight: true
		});
		$('.date_start1').on('change', function(){
			var dateStart1 = $('.date_start1').datepicker('getDate');
			var dateEnd1 = $('.date_end1').datepicker('getDate');
			var date_end_val1 = $('.date_end1').val();

			if(dateStart1 > dateEnd1 && date_end_val1){
				$ ( '.date_end1' ). datepicker ( 'update' ,  new  Date ( dateStart1 ));
			}
		});

		$('.date_end1').on('change', function(){
			var dateStart1 = $('.date_start1').datepicker('getDate');
			var dateEnd1 = $('.date_end1').datepicker('getDate');
			var date_start_val1 = $('.date_start1').val();
			if(dateStart1 > dateEnd1 && date_start_val1){
				$ ( '.date_start1' ). datepicker ( 'update' ,  new  Date ( dateEnd1 ));
			}
		});

		$('.date_end1, .date_start1').on('click',function(){
			$(".date_start1").datepicker("destroy");
			$(".list_date1").val("calendar").trigger("change");
		});

		$('.list_date1').on('change', function(){
			calendar_date.selector_date($('.list_date1').find('option:selected').val());
		});

		calendar_date.active_calendar_button();
	},
	active_calendar_button : function(){
		$('.add-on').on('click', function(event){
			if(!$(this).parent().find('input').is(':focus')){
				$(this).parent().find('input').focus();
			}
		})
	},
	user_timezone : function(){
		var user_zone = $('.select_timezone').find('option:selected').data('val');
		return user_zone;
	},
	get_date : function(first,suffix){
		if (suffix) {
			suffix = "_suf_"+suffix;
		}else{
			suffix = '';
		}

		if(first){
			var get_date = $('.date_end1'+suffix).val().split("/");
		}else{
			var get_date = $('.date_start1'+suffix).val().split("/");
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
	selector_date : function(selector,suffix){
		if(!suffix){
			suffix = '';
		}
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
			$ ( '.sandbox-advance'+suffix ). datepicker ( 'update' ,  new  Date ( current_year ,  current_month ,  calendar_day ));
			var str = $('.date_start1'+suffix).val();
			break;
			case 'yester':
			$ ( '.sandbox-advance'+suffix ). datepicker ( 'update' ,  new  Date ( current_year ,  current_month ,  calendar_day-1 ));
			break;
			case 'week':
			if(week_day != 0){
				temp.setDate((cur_date.getDate()+1)-week_day);
			}else{
				temp.setDate((cur_date.getDate()+1)-(week_day+7));
			}
			$ ( '.date_start1'+suffix ). datepicker ( 'update' ,  new  Date ( temp ));
			$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date ( cur_date ));
			break;
			case 'month':
			temp.setDate(cur_date.getDate()-(calendar_day-1));
			$ ( '.date_start1'+suffix ). datepicker ( 'update' ,  new  Date ( current_year ,  current_month ,  1 ));
			$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date ( cur_date ));
			break;
			case 'year':
			$ ( '.date_start1'+suffix ). datepicker ( 'update' ,  new  Date ( current_year ,  0 ,  1 ));
			$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date ( cur_date ));
			break;
			case 'l_week':
			if(week_day != 0){
				temp.setDate((cur_date.getDate()+1)-(week_day+7));
				$ ( '.date_start1'+suffix ). datepicker ( 'update' ,  new  Date ( temp ));
				$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date (current_year, current_month, calendar_day-week_day));
			}else{
				temp.setDate((cur_date.getDate()+1)-(week_day+14));
				max_date.setDate((cur_date.getDate())-(week_day+7));
				$ ( '.date_start1'+suffix ). datepicker ( 'update' ,  new  Date ( temp ));
				$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date ( max_date ));
			}
			break;
			case 'l_month':
			$ ( '.date_start1'+suffix ). datepicker ( 'update' ,  new  Date ( current_year, current_month-1, 1 ));
			if(parseInt(current_month) != 0){
				$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date (current_year, current_month-1, new Date(current_year, parseInt(current_month), 0).getDate()));
			}else{
				$ ( '.date_end1'+suffix ). datepicker ( 'update' ,  new  Date (current_year, current_month-1, new Date(current_year-1, 12, 0).getDate()));
			}
			break;
			case 'calendar':
			break;
			default:
			break;
		}
	},
	select_default_time : function($interval){
		var cur_date = new Date();
		var current_year = cur_date.getFullYear();
		var current_month = cur_date.getMonth();
		var calendar_day = cur_date.getDate();
		var week_day = cur_date.getDay();
		var temp = new Date();
		var max_date = new Date();

		if($interval == 'week'){
			if(week_day != 0){
				temp.setDate((cur_date.getDate()+1)-week_day);
			}else{
				temp.setDate((cur_date.getDate()+1)-(week_day+7));
			}
		}else if($interval == 'day'){
			$ ( '.sandbox-advance' ). datepicker ( 'update' ,  new  Date ( current_year ,  current_month ,  calendar_day ));
			var str = $('.date_start1').val();
		}
		$ ( '.date_start1' ). datepicker ( 'update' ,  new  Date ( temp ));
		$ ( '.date_end1' ). datepicker ( 'update' ,  new  Date ( cur_date ));
	}
}

$(function(){
	calendar_date.init();
});
