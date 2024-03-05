var name = 'name';
var Company = 'Compnay';
var email = 'email';
var password = 'password';
var phone = 'phone';
var skype = 'skype';
var new_user_form_id = 'new_user';
var error_class = 'error';
var valid_class = 'valid';
var second_email = 'second_email';
var second_password = 'second_password';
var validate_fields = 'valid_field';
var login_form = 'login_form';
var adress = 'Address';

var field_new_pass = 'field_new_pass';
var confirm_new_pass = 'confirm_new_pass';

var user_new_pass = 'password_for_user';
var user_confirm_pass = 'confirm_password_user';

var theme_colors = {};
theme_colors.switch_bg = '#0aa699';
theme_colors.rickhav = '#f2f4f6';
theme_colors.craph_bg = '#ffffff';
theme_colors.map_color = '#a5ded9';

if (switch_theme == true) {
	theme_colors.switch_bg = '#457af1';
	theme_colors.rickhav = '#2d3139';
	theme_colors.craph_bg = '#22262e';
	theme_colors.map_color = '#608df3';
}

var registration = {
	init : function (){
		$('.'+validate_fields).keyup(function(){
			registration.show_validation(this);
		});
		$('#'+new_user_form_id).on('submit', function(event){
			event.preventDefault();
			registration.submit_form();
		});
		$('#file2').on('change', function(){
			if($(this).val()){
				change_user_profile.change_image(this);
			}else{
				var old = $('#form_edit_profile input[name=logo]').data('old');
				$('#form_edit_profile img').prop('src','images/users_profile/'+old);
				$('#checked_user_data img').prop('src','images/users_profile/'+old);
			}
		});
	},
	check_fields : function(){
		$('.'+validate_fields).each(function(i,e){
			registration.show_validation(e);
		});
	},
	validate : function(current_field){
		var pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,5}$/;
		var field_name = $(current_field).attr('name');
		var field_value = $(current_field).val();
		if(field_value == '' ||
			(field_name == email && !pattern.test(field_value))||
			(field_name == phone && !/^[0-9.\-()]{1,}$/.test(field_value))||
			(field_name == adress && field_value.length < 10)||
			(field_name == second_email && field_value != $('.'+validate_fields+'[name="'+email+'"]').val())||
			(field_name == second_password && field_value != $('.'+validate_fields+'[name="'+password+'"]').val())||
			(field_name == confirm_new_pass && field_value != $('.'+validate_fields+'[name="'+field_new_pass+'"]').val())||
			(field_name == user_confirm_pass && field_value != $('.'+validate_fields+'[name="'+user_new_pass+'"]').val()))
		{
			return false;
		}else{
			return true;
		}
	},
	show_validation : function(current_field){
		var resul_validation = registration.validate(current_field);
		if(resul_validation){
			$(current_field).addClass(valid_class).removeClass(error_class);
		}else{
			$(current_field).addClass(error_class).removeClass(valid_class);
		}
	},
	submit_form : function(){
		registration.check_fields();
		var error_fields = $('.'+validate_fields+'.'+error_class+':visible').length;
		if (!error_fields) {
			registration.send_data_for_registration();
		}
	},
	send_data_for_registration : function(){
		var data = {};
		$('.'+validate_fields+ ', #new_user [name="user_manager_unik_id"]').each(function(i,e){
			var field_name = $(e).attr('name');
			var field_value = $(e).val();
			data[field_name] = field_value;
		});
		$.ajax({
			method: 'POST',
			url: 'classes/Class.users.php',
			dataType: "json",
			data: {
				step: 'registration',
				options: data
			}
		}).done(function(response){
			$('.resut_query').data('ansver',response.access);
			if(response.access){
				$('.resut_query').html(response.message);
			}else{
				$('.resut_query').html(response.message);
				let field = typeof response.field !== "undefined" ? response.field : 'email';
				$(`#${field}, #second_${field}`).addClass(error_class);//for second_email
			}
		});
	}
};

var login_logout = {
	cookieParams:{expires: 7,path: '/'},
	init : function(){
		$('#'+login_form).on('submit', function(event){
			event.preventDefault();
			login_logout.login_data(this);
		});
		$('.exit').on('click', function(){
			login_logout.logout();
		});
	},
	login_data : function(form){
		var data={};
		$(form).find('input').each(function(i,e){
			var name = $(e).prop('name');
			var value = $(e).val();
			data[name] = value;
		});
		data['remember'] = $('.remember').prop('checked');
		login_logout.post_login_data(data);
	},
	post_login_data : function(data){
		$.ajax({
			method: 'POST',
			url: 'classes/Class.users.php',
			dataType: 'json',
			data: {
				step: 'login',
				options: data
			}
		}).done(function(response){
			if(response.status){
				window.location.href = 'Reporting-platform.php';
			}else{
				$('#login_form input').addClass('error');
			}
		});
	},
	logout : function(){
		var relogin_data = {};
		$('.for_relogin').each(function(i,e){
			var name = $(e).prop('name');
			var value = $(e).val();
			relogin_data[name] = value;
		});
		var json_data = JSON.stringify(relogin_data);
		$.cookie('relogin', json_data, {expires: 1,path: '/'});
		$.ajax({
			method: 'POST',
			url: 'classes/Class.users.php',
			dataType: 'json',
			data: {
				step: 'logout'
			}
		}).done(function(response){
			if(response.status){
				$.cookie('net', '', {expires: -1,path: '/'});
				window.location = '../index.php';
			}
		});
	},
};
var change_user_profile = {
	init : function(form_id){
		$('#'+form_id).on('submit', function(event){
			event.preventDefault();
			event.stopImmediatePropagation();
			var error_fields = $('.'+validate_fields+'.'+error_class+':visible').length;
			if (!error_fields) {
				change_user_profile.post_data_changed($(this)[0].id);
			}
		});
	},
	post_data_changed : function(form){
		$.ajax({
			method: 'post',
			url: "classes/Class.admin.php",
			dataType: 'json',
			data:{
				step: 'change_user',
				options: change_user_profile.changed_user_data(form),
				change_user: window.selectedUid ? 1 : 0
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				var result = '';
				var act = '';
				var title = '';
				var ButtonClass = '';
				if(response.status === 'success'){
					result = response.message;
					act = 'success';
					title = 'Good job!';
					ButtonClass = 'btn btn-primary btn-cons';
				}else{
					result = response.message;
					act = 'error';
					title = 'Error!';
					ButtonClass = 'btn btn-danger btn-cons';
				}
				$('#change_data').modal('hide');
				modals.show_warning(title,result,act,ButtonClass);
				$('.sweet-alert').on('click', function(){
					if(act === 'success' && form !== 'timezone'){
						location.reload();
					}else if(act !== 'success' && form === 'timezone'){
						$(".select_timezone").val($('.select_timezone').data('old')).trigger("change");
					}
				});
			}
		});
	},
	changed_user_data : function(form){
		if(CKEDITOR.instances.user_note){
			CKEDITOR.instances.user_note.updateElement();
		}
		data = {};
		data['u_id'] = $('#'+form+' input.u_id').val();
		$('#'+form+' input, #'+form+' select, #'+form+' textarea').each(function(i,e){
			var name = $(e).prop('name');
			var value = $(e).val();
			var old = $(e).data('old');
			var data_new = $(e).data('new');
			var data_val = $(e).find('option:selected').data('val');

			if(value != old && name != 'submit' && name != 'timezone' && name != 'logo'){
				data[name] = value;
			}else if(data_new != old && name == 'logo'){
				data[name] = data_new;
			}else if(value != old && name == 'timezone'){
				var date = {id:value,value:data_val};
				data[name] = JSON.stringify(date);
			}
		});
		return data;
	},
	change_image : function(data){
		var i = 0,
		control=data;
		files = control.files,
		typ = files[i].type,
		siz = files[i].size;
		name = files[i].name;
		var imageTypes = /\/(gif|jpe?g|png)$/;
		if(!imageTypes.test(typ)){
			result = 'Sorry only (gif,jpg,jpep,png) files';
			act = 'error';
			title = 'Error!';
			ButtonClass = 'btn btn-danger btn-cons';
			modals.show_warning(title,result,act,ButtonClass);
			$(control).val('');
		}else if(siz>512000){
			result = 'Sorry max size 500 kb';
			act = 'error';
			title = 'Error!';
			ButtonClass = 'btn btn-danger btn-cons';
			modals.show_warning(title,result,act,ButtonClass);
			$(control).val('');
		}else{
			formData= new FormData();
			var file = $(control).prop("files")[0];
			formData.append("image", file);
			formData.append("step", 'image');
			$.ajax({
				method: 'post',
				url: "classes/Class.admin.php",
				dataType: 'json',
				contentType: false,
				processData: false,
				data: formData,
				cache: false,
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}else{
					if(response.type=='access'){
						result = response.content;
						var act = 'error';
						var title = 'Error!';
						var ButtonClass = 'btn btn-danger btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
					}else{
						$('#file2').data('new',response.image_name);
						$('#form_edit_profile img').prop('src','images/users_profile/'+response.image_name);
						$('#checked_user_data img').prop('src','images/users_profile/'+response.image_name);
					}
				}
			});
		}
	}
};

var edit_paymant = {
	init : function(){
		$('#form_user_payment').on('submit',function(event){
			event.preventDefault();
			registration.check_fields();
			var error_fields = $('.'+validate_fields+'.'+error_class+':visible').length;
			if (!error_fields) {
				edit_paymant.post_data_payment();
			}
		});
	},
	get_data_payment : function(){
		if(CKEDITOR.instances.payment_note){
			CKEDITOR.instances.payment_note.updateElement()
		}
		var data = {};
		data['u_id'] = $('.u_id').val();
		$('#form_user_payment .pay_data').each(function(i,e){
			var name = $(e).prop('name');
			var value = $(e).val();
			data[name] = value;
		});
		return data;
	},
	post_data_payment : function(){
		$.ajax({
			method: 'post',
			url: "classes/Class.admin.php",
			dataType: 'json',
			data:{
				step: 'change_user',
				options: edit_paymant.get_data_payment(),
				change_user: window.selectedUid ? 1 : 0
			}
		}).done(function(response){
			var result = '';
			var act = '';
			var title = '';
			var ButtonClass = '';
			if(response.status === 'success'){
				result = response.message;
				act = 'success';
				title = 'Good job!';
				ButtonClass = 'btn btn-primary btn-cons';
			}else{
				result = response.message;
				act = 'error';
				title = 'Error!';
				ButtonClass = 'btn btn-danger btn-cons';
			}
			$('#change_data').modal('hide');
			modals.show_warning(title,result,act,ButtonClass);
			$('.sweet-alert').on('click', function(){
				if(act === 'success'){
					location.reload();
				}
			});
		});
	}
};

var user_tracking = {
	current_tracking : '',
	init : function(){
		$(document).on('keyup', '#form_user_tracking', function(){
			$('.save_pixels').removeClass('hidden');
		});

		$(document).off('click', '.tracking-tab-pixels').on('click', '.tracking-tab-pixels', function(event){
			event.preventDefault();

			let $loader = $('.tracking-tab-pixels-loader');
			let $container = $('.tracking-tab-pixels-container');

			$loader.css('display','block');

			$.ajax({
				url: "classes/Class.admin.php",
				dataType: "json",
				type: "POST",
				data: {
					step: 'tracking_tab_pixels',
					data: {
						u_id: window.selectedUid || $('[data-account-unik-id]').data('account-unik-id'),
					}
				},
				success: function(result) {
					if(result && result.logout){
						return logout_visual.auto_logout(result.logout);
					}

					$loader.css('display','none');
					$container.html(result.html);
					if(typeof window.trackingPixelsEventTabId !== "undefined" || window.trackingPixelsEventTabId !== false){
						//to set event tab which was oppened on edit
						$(`[href="#${window.trackingPixelsEventTabId}"]`).tab('show');
						window.trackingPixelsEventTabId = false;
					}
				},
			});
    });

		user_tracking.work_on_tracking(pixels_account);
	},
	quotes_fixes : function(pixeldata){
		var fixed_quotes = pixeldata.toString().replace(/-squot;/g,'\'').replace(/-quot;/g,'\"').replace(/-new_r-/g,'\r').replace(/-new_n-/g,'\n');
		return fixed_quotes;
	},
	work_on_tracking : function(user){
		if(user == 'admin'){
			count_limit = 100;
		}else{
			count_limit = 2;
		}
		var new_pixel = '<div class="form-group"><label class="form-label">Pixel</label><div class="controls"><textarea type="text" class="form-control valid_field" name="pixel"></textarea><input class="btn btn-danger btn-cons remove_this" type="button" value="Remove"></div></div>';
		var new_postback = '<div class="form-group"><label class="form-label">Postback</label><div class="controls"><textarea type="text" class="form-control valid_field" name="postback"></textarea><input class="btn btn-danger btn-cons remove_this" type="button" value="Remove"></div></div>';
		$('#add_pixel').on('click', function(){
			var count_pixels = $('.pixels [name="pixel"] ').length;
			if(!count_pixels || count_pixels<count_limit){
				$('.save_pixels').removeClass('hidden');
				$('.pixels').append(new_pixel);
			}
			$('.remove_this').on('click', function(){
				$('.save_pixels').removeClass('hidden');
				user_tracking.remove_pixel_or_postback($(this).parents('.form-group'));
			});
		});
		$('#add_postback').on('click', function(){
			var count_postback = $('.pixels [name="postback"]').length;
			if(!count_postback || count_postback<count_limit){
				$('.save_pixels').removeClass('hidden');
				$('.pixels').append(new_postback);
			}
			$('.remove_this').on('click', function(){
				$('.save_pixels').removeClass('hidden');
				user_tracking.remove_pixel_or_postback($(this).parents('.form-group'));
			});
		});
		$('.remove_this').on('click', function(){
			$('.save_pixels').removeClass('hidden');
			user_tracking.remove_pixel_or_postback($(this).parents('.form-group'));
		});

		$('#form_user_tracking').on('submit', function(event){
			event.preventDefault();
			user_tracking.post_tracking_links(this);
		});
	},
	remove_pixel_or_postback : function(curent_div){
		curent_div.remove();
	},
	quotes_fixes_write: function(pixeldata){
		var fixed_quotes = pixeldata.toString().replace(/\'/g,'-squot;').replace(/\"/g,'-quot;').replace(/\r/g,'-new_r-').replace(/\n/g,'-new_n-');
		fixed_quotes = fixed_quotes.replace(/â€˜/g,'-squot;').replace(/â€™/g,'-squot;');
		fixed_quotes = fixed_quotes.replace(/â€/g,'-quot;').replace(/â€œ/g,'-quot;');
		return fixed_quotes;
	},
	get_tracking_links : function(form){
		var data = {};
		data['u_id'] = $('.u_id').val();
		data['tracking'] = {};
		var curent_form_textarea = $(form).find('textarea');
		$.each(curent_form_textarea,function(i,e){
			var value = $(e).val();
			var name = $(e).prop('name');
			if(!data['tracking'][name]){
				data['tracking'][name] = [];
			}
			if(value && value !== ''){
				data['tracking'][name][data['tracking'][name].length] = user_tracking.quotes_fixes_write(value);
			}
		});
		if(Object.keys(data['tracking']).length ===''){
			data['tracking'] = 'not any pixels or postbacks';
		}
		return data;
	},
	post_tracking_links : function(form){
		$.ajax({
			method: 'post',
			url: "classes/Class.admin.php",
			dataType: 'json',
			data:{
				step: 'change_user',
				options: user_tracking.get_tracking_links(form),
				change_user: window.selectedUid ? 1 : 0
			}
		}).done(function(response){
			var result = '';
			var act = '';
			var title = '';
			var ButtonClass = '';
			if(response.status === 'success'){
				result = response.message;
				act = 'success';
				title = 'Good job!';
				ButtonClass = 'btn btn-primary btn-cons';
			}else{
				result = response.message;
				act = 'error';
				title = 'Error!';
				ButtonClass = 'btn btn-danger btn-cons';
			}
			$('#change_tracking').modal('hide');
			modals.show_warning(title,result,act,ButtonClass);
			$('.tracking-tab-pixels').trigger('click');
		});
	}

};

var change_pass = {
	init : function(){
		$('#user_new_pass').on('submit', function(event){
			event.preventDefault();
			change_pass.change_user_password('user_new_pass');
			change_pass.error_pass('user_new_pass');
		});
		$('#new_pass_for_user').on('submit', function(event){
			event.preventDefault();
			change_pass.change_user_password('new_pass_for_user');
			change_pass.error_pass('new_pass_for_user');
		});

		if(!window.active_post){
			window.active_post = false;
		}

		if($('.select2_net').length && ($('.select2_net').val() != 'net' && $('.select2_net').val() !='') && active_post){
			$('.users_account').css('display', 'inline-block');
			$('.current_account').css('display', 'none');
		}else{
			$('.current_account').css('display', 'inline-block');
			$('.users_account').css('display', 'none');
		}
	},
	change_user_password : function(form_id){
		registration.check_fields();
		var error_fields = $('.'+validate_fields+'.'+error_class+':visible').length;
		var logout = false;
		if (!error_fields) {
			if(form_id == 'user_new_pass'){
				var old_pass = $('#'+form_id).find('input[name="old_pass"]').val();
				var new_pass = $('#'+form_id).find('input[name="field_new_pass"]').val();
				var u_id = $('#'+form_id).find('input[name="u_id"]').val();
				var options = {
					u_id:u_id,
					old_pass:old_pass,
					new_pass:new_pass
				}
				logout = true;
			}else if(form_id == 'new_pass_for_user'){
				var new_pass = $('#'+form_id).find('input[name="'+user_new_pass+'"]').val();
				var u_id = $('#net').find('option:selected').data('uId');
				var options = {
					u_id:u_id,
					new_pass:new_pass
				}
			}

			$.ajax({
				method: 'POST',
				url: 'classes/Class.users.php',
				dataType: 'json',
				data: {
					step: 'pass_change',
					options: options
				}
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}else{
					var result = '';
					var act = '';
					var title = '';
					var ButtonClass = '';
					if(response.status == 'success'){
						result = response.message;
						act = 'success';
						title = 'Good job!';
						ButtonClass = 'btn btn-primary btn-cons';
					}else{
						result = response.message;
						act = 'error';
						title = 'Error!';
						ButtonClass = 'btn btn-danger btn-cons';
						if(result == 'not right password'){
							$('#old_pass').addClass(error_class);
						}
					}
					$('#field_new_pass,#confirm_new_pass,#old_pass').val('').removeClass(error_class);
					$('#change_pass').modal('hide');
					modals.show_warning(title,result,act,ButtonClass);
					$('#change_pass_for_user').modal('hide');
					$('.valid_field').removeClass(error_class);
					$('.sweet-alert').on('click', function(){
						if(act == 'success' && logout){
							login_logout.logout();
						}
					});
				}
			});
		}
	},
	password_modal : function(){
		$('.modal_new_pass').show();
		$('.close_modal_new_pass').on('click',function(){
			$('.modal_new_pass').hide();
		});
		$('#user_new_pass').on('submit', function(event){
			event.preventDefault();
			change_pass.change_user_password();
		});
	},
	error_pass : function(form_id){
		if(form_id == 'user_new_pass'){
			var new_pass = $('#'+form_id).find('input[name="'+field_new_pass+'"]').val();
			var confirem_pass = $('#'+form_id).find('input[name="'+confirm_new_pass+'"]').val();
		}else if(form_id == 'new_pass_for_user'){
			var new_pass = $('#'+form_id).find('input[name="'+user_new_pass+'"]').val();
			var confirem_pass = $('#'+form_id).find('input[name="'+user_confirm_pass+'"]').val();
		}
		if(new_pass != confirem_pass){
			$('#field_new_pass,#confirm_new_pass,#old_pass').val('').removeClass(error_class);
			$('#change_pass').modal('hide');
			result = 'Youâ€™re new passwords do not match, Get your shit together!';
			act = 'error';
			title = 'Error!';
			ButtonClass = 'btn btn-danger btn-cons';
			modals.show_warning(title,result,act,ButtonClass);
		}
	}
};

var modals = {
	show_warning : function(title,result,act,ButtonClass){
		swal({
			title: title,
			text: result,
			type: act,
			confirmButtonText: 'OK',
			confirmButtonClass: ButtonClass
		});
	},
	show_warning_with_confirm : function(title,result,act,ButtonClass,funk){
		swal({
			title: title,
			text: result,
			type: act,
			confirmButtonText: 'Yes',
			confirmButtonClass: ButtonClass,
			showCancelButton: true,
			cancelButtonClass: 'btn btn-default btn-cons'
		},
		function(){
			funk();
		}
		);
	}
};
var visual_part ={
	init : function(){
		visual_part.menu_active();
		visual_part.user_selected_type_menu();
		$('#layout-condensed-toggle').on('click',function(){
			if ($('.chat-window-wrapper').hasClass('visible')) {
				$('.chat-window-wrapper').removeClass('visible');
				$('body').removeClass('open-menu-right');
			}
			visual_part.save_menu_tipe();
		});
		visual_part.hide_submenu_on_resize();
		if(visual_part.top_3_offers_per_month){
			var data3 = visual_part.top_3_offers_per_month;
			graphiks.top_3_offers_per_month(data3[0],data3[1],data3[2]);
		}
	},
	menu_active : function(){
		var page_id = getUrlParameter('id');
		if(page_id){
			$('.menu_check').each(function(i,e){
				if($(e).find('a').data('href') == page_id){
					$(e).addClass('active open');
				}else{
					$(e).find('ul').find('li').each(function(key,li){
						var data_href = $(li).find('a').data('href');
						if(data_href == page_id){
							$(e).addClass('open');
							var manu_tipe = $.cookie('menu_tipe');
							if( manu_tipe != "small" && (window.innerWidth > 1025 || window.innerWidth < 767)){
								$(e).find('.sub-menu').css('display', 'block');
							}
							$(li).addClass('active');
						}
					});
				}
			});
		}else{
			$('.menu_check a').each(function(i,e){
				if ($(e).data('href') == 'home') {
					$(e).parent().addClass('active open');
				}
			});
		}
	},
	user_selected_type_menu : function(){
		if($.cookie('menu_tipe')){
			var manu_tipe = $.cookie('menu_tipe');
			if(manu_tipe == 'small' && (window.innerWidth < 1025 || window.innerWidth > 767)){
				$('body').addClass('grey');
				$('#main-menu').addClass('mini');
				$('.page-content').addClass('condensed');
				$('.scrollup').addClass('to-edge');
				$('.header-seperation').hide();
				$('.footer-widget').hide();
				$('.main-menu-wrapper').scrollbar('destroy');
			}
		}
	},
	save_menu_tipe : function(){
		if($('#main-menu').hasClass('mini')){
			$.cookie('menu_tipe','small');
			$('.menu_check .sub-menu').css('display','');
		}else{
			$('.menu_check.open .sub-menu').css('display','block');
			$.cookie('menu_tipe','big');
		}
		if(visual_part.top_3_offers_per_month){
			var data3 = visual_part.top_3_offers_per_month;
			graphiks.top_3_offers_per_month(data3[0],data3[1],data3[2]);
		}
	},
	hide_submenu_on_resize : function(){
		var i = 0;
		$(window).resize(function(){
			if(window.innerWidth < 1025 && window.innerWidth > 767){
				$('.sub-menu').css('display','');
			}else{
				$('.menu_check.open').find('.sub-menu').css('display','block');
			}
		});
	},
	allTitleCase : function(inStr){
		return inStr.replace(/\w\S*/g, function(tStr)
		{
			return tStr.charAt(0).toUpperCase() + tStr.substr(1).toLowerCase();
		});
	}
}

var logout_visual = {
	init : function(){

	},
	auto_logout : function(message){
		console.log(message);
		result = message;
		act = 'error';
		title = 'Error!';
		ButtonClass = 'btn btn-danger btn-cons';
		modals.show_warning(title,result,act,ButtonClass);
		$('.text-muted').html(result);
		$('.sweet-alert .confirm').on('click', function(){
			location.reload();
		});
	},
}

var net = {
	init : function(){
		let timer = null;

		$(".select2_net").select2({
			ajax: {
				delay: 100,
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
								return f.name.toLowerCase().includes(term);
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
			tags: false
		});

		var selsected_net = $.cookie("net");
		if (!selsected_net) {
			if(window.networks[0]?.net) {
				$.cookie('net', window.networks[0].net, {expires: 7,path: '/'});
			}
		}

		$('#net_mob').on('change', function(){
			if(window.matchMedia('(max-width: 676px)').matches){
				$('#net').val($('#net_mob').val()).trigger("change");
			}
		});

		$('#net').on('change', function(){
			if(!window.matchMedia('(max-width: 676px)').matches){
				$('#net_mob').val($('#net').val()).trigger("change");
			}
			let selectedNetwork = $('#net').find('option:selected').val();
			if (selectedNetwork === undefined) {
				selectedNetwork = window.networks[0].net;
			}
			$.cookie('net',selectedNetwork, {expires: 7,path: '/'});
		});
	}
}

var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	sURLVariables = sPageURL.split('&'),
	sParameterName,
	i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : sParameterName[1];
		}
	}
};

var theme_switch = {
	init : function(){
		$('.theme_switch').on('click',function(event){
			event.preventDefault();
			theme_switch.send_switch(this);
		});
		$('.theme_switch_container').on('click',function(event){
			if(event.target.className == 'account_theme_switch'){//stop if click was triggered via toggleSwitch - on load page and update via ajax
				return;
			}
			event.preventDefault();
			theme_switch.account_set(this);
		});
	},
	send_switch : function(switch_data){
		var set_theme = 0;
		if($(switch_data).data('active') == 'light'){
			set_theme = 1;
		}

		$.ajax({
			method: 'POST',
			url: 'classes/Class.users.php',
			dataType: 'json',
			data: {
				step: 'switch_theme',
				set_theme: set_theme
			}
		}).done(function(response){
			if(response.result){
				location.reload();
			}else{
				act = 'error';
				title = 'Error!';
				ButtonClass = 'btn btn-danger btn-cons';
				modals.show_warning(title,'',act,ButtonClass);
			}
		})
	},
	account_set : function(switch_data){
		let u_id = window.selectedUid || $('[data-account-unik-id]').data('account-unik-id');
		let is_current_user = u_id==$('[data-account-unik-id]').data('account-unik-id')?true:false;

		let is_dark_theme = $(switch_data).find('.account_theme_switch').is(':checked')?0:1;

		$.ajax({
			method: 'POST',
			url: 'classes/Class.users.php',
			dataType: 'json',
			data: {
				step: 'switch_theme',
				set_theme: is_dark_theme,
				u_id: u_id,
			}
		}).done(function(response){
			if(response.result){
				if(is_current_user){
					location.reload();
				}else{
					recieve_swither.toggleSwitch($('.theme_switch_container [name="switch"]'), is_dark_theme);
					act = 'success';
					title = 'Good job!';
					ButtonClass = 'btn btn-primary btn-cons';
					modals.show_warning(title,'',act,ButtonClass);
				}
			}else{
				act = 'error';
				title = 'Error!';
				ButtonClass = 'btn btn-danger btn-cons';
				modals.show_warning(title,'',act,ButtonClass);
			}
		});
	},
}

//btn-group-manager-filter
let managerFilter = {
	init : function(){
		let managerId = (typeof $.cookie('netManagerFilter') !== "undefined")?$.cookie('netManagerFilter'):'';
		let managerFilterTitle = $('[data-manager-id="'+managerId+'"]', $('.btn-group-manager-filter .dropdown-menu')).text();
		let defaultNet = window.networks[0].net;
		managerFilter.set.selector(managerId, managerFilterTitle);

		//reset networks if net not in manager list
		if (!window.networks.filter(function(e) { return e.net === $.cookie('net'); }).length) {
			$('#net').val(defaultNet).trigger("change");
		}

		$('[data-manager-id]', $('.btn-group-manager-filter')).on('click', function(event){
			event.preventDefault();

			if($(this).is('[data-manager-id-filter]') && $('#net').val() == defaultNet){//stop reset on manager btn for same options
				return;
			}

			let newManagerId = $(this).data('manager-id');

			managerFilter.set.selector(newManagerId, $(this).text());
			$.cookie('netManagerFilter',newManagerId, {expires: 7,path: '/'});

			switch(new URL(location.href).searchParams.get("id")){
				case 'intelligence':
				//to load info via php for all net
				if(!$(this).is('[data-manager-id-filter]')){//stop reset on manager btn for same options - not have net filter effect
					$.cookie('net', defaultNet, {expires: 7,path: '/'});
					location.reload();
				}
				break;
				case 'real_time':
				//to load info via php for all net
				$.cookie('net', defaultNet, {expires: 7,path: '/'});
				location.reload();
				break;
				default:
				managerFilter.updateNetworks();
				break;
			}
		});
	},//init
	set : {
		selector : function(id, title){
			if(title){
				$('[data-manager-id-filter]', $('.btn-group-manager-filter')).data('manager-id-filter', id).text(title);
				$('[data-manager-id-filter][data-manager-id]', $('.btn-group-manager-filter')).data('manager-id', id);
			}
		},//selector
	},//set
	get : {
		id : function(){
			return $('[data-manager-id-filter]', $('.btn-group-manager-filter')).data('manager-id-filter');
		},//id
	},//get
	updateNetworks : function() {
		let defaultNet = window.networks[0].net;
		$('#net').val(defaultNet).trigger("change");
	},
}
//btn-group-manager-filter

$(function(){
	registration.init();
	login_logout.init();
	change_pass.init();
	visual_part.init();
	edit_paymant.init();
	theme_switch.init();
	managerFilter.init();
	net.init();

    console.log("main managerFilter")

	$('.refresh').on('click', function(){
		location.reload();
	});

	//offersTabTrackingLinks - dynamicDomainTrackingLink
	$(document).unbind('change').on('click', '.offersDomain', function(event){
		event.preventDefault();
		let domain = $(this).data('domain');
		$('.dynamicDomainTrackingLink', $(this).parents('.tab-pane.active')).each(function(i,e){
			$.each(['value', 'href'], function(key, attr){
				if($(e).is('[' + attr + ']')){
					let url = $(e)[0].getAttribute(attr);
					$(e)[0].setAttribute(attr, url.replace(new URL(url).origin, domain));
				}
			});
		});
	});
	//offersTabTrackingLinks - dynamicDomainTrackingLink
});
