var notifications = {
	init : function(){
		$('.add_notify_submit').on('click', function(){
			notifications.add_notify(this);
		});
		notifications.selectors();

		var notifyPreviewItemInit = function(){
			$(document).on('click', '.notify-preview-item', function(vent){
				if($(vent.target).prop('href') || $(vent.target).hasClass('fa-circle') || $(vent.target).hasClass('label_for_read')){
					// console.log('open_href');
				}else{
					notifications.get_single_notification($(this));
				}
			});
		};

		var setReadInit = function(){
			$('.set_read').unbind('click').on('click', function(){
				notifications.update_current_notify_read(this,1);
			});
		};

		notifyPreviewItemInit();
		setReadInit();
		$('#my-task-list').on('click', function(){
			notifications.update_view_data_user();
			notifyPreviewItemInit();
			setReadInit();
		});

		$('#formWantOffer').on('submit', function(event){
			event.preventDefault();
			notifications.sendWantOffer($(this));
		});
		//reset modal
		$('#wantAnOfferModal').on('show.bs.modal', function (e) {
			$('.wantAnOfferModalContent').removeClass('hidden');
			var resultContainer = $('.wantAnOfferModalResultContent');
			resultContainer.addClass('hidden');
			$('.body-success, .body-error', resultContainer).addClass('hidden');
		});
		//account_notifications
		$(document).on('click', '.paginate-notifications .paginate-page-switch', function(event){
			event.preventDefault();
			notifications.getPageAccountNotifications($(this));
		});
		$(document).on('change', '.paginate-notifications .paginate-page-len', function(event){
			event.preventDefault();
			notifications.getPageAccountNotifications($(this));
		});
		$(document).on('click', '.notification-mark', function(event){
			event.preventDefault();
			notifications.notificationMark($(this));
		});
		//account_notifications
		//account_report_problem
		$('#accountSendTicket').on('submit', function(event){
			event.preventDefault();
			notifications.accountSendTicket($(this));
		});
		$('.accountBtnNewTicket').on('click', function() {
			$('#accountTicket').slideToggle("fast","linear");
			$(this).parents('#accountSendTicketSuccess, #accountSendTicketError').slideToggle("fast","linear");
		});
		//account_report_problem
	},
	sendWantOffer : function(form){
		if($('.form-control.error:visible', form).length){
			return false;	
		}
		var data = {};
		$('.form-control', form).each(function(i,e){
			if($(e).val()){
				data[$(e).attr('name')] = $(e).val();
			}
		});
		if(!$.isEmptyObject(data)){
			data['step'] = 'sendWantOffer';
			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: data
			}).done(function(response){
				if(response && response.logout){
					$('#wantAnOfferModal').modal('hide');
					logout_visual.auto_logout(response.logout);
				}else{
					if(response){
						form[0].reset();
						if(!response.result && response.message){
							$('#wantAnOfferModal').modal('hide');
							var result = response.message;
							act = 'error';
							title = 'Error!';
							ButtonClass = 'btn btn-danger btn-cons';
							modals.show_warning(title,result,act,ButtonClass);
						}else{
							$('.wantAnOfferModalContent').addClass('hidden');
							var resultContainer = $('.wantAnOfferModalResultContent');
							resultContainer.removeClass('hidden');
							if(response.result){
								$('.body-success', resultContainer).removeClass('hidden');
								$('.name', resultContainer).text(response.name);
							}else{
								$('.body-error', resultContainer).removeClass('hidden');
								$('.sendToEmail', resultContainer).text(response.sendToEmail);
							}
						}
					}
				}
			});
		}else{
			$('#wantAnOfferModal').modal('hide');
			var result = 'Empty data';
			var act = 'error';
			var title = 'Error!';
			var ButtonClass = 'btn btn-danger btn-cons';
			modals.show_warning(title,result,act,ButtonClass);
		}
	},
	accountSendTicket : function(form){
		if($('.form-control.error:visible', form).length){
			return false;	
		}
		var data = {};
		$('.form-control', form).each(function(i,e){
			if($(e).val()){
				data[$(e).attr('name')] = $(e).val();
			}
		});
		if(!$.isEmptyObject(data)){
			data['step'] = 'accountSendTicket';
			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: data
			}).done(function(response){
				if(response && response.logout){
					$('#wantAnOfferModal').modal('hide');
					logout_visual.auto_logout(response.logout);
				}else{
					if(response){
						if(response.result){
							var resultContainer = $('#accountSendTicketSuccess');
							$('.name', resultContainer).text(response.name);
						}else{
							var resultContainer = $('#accountSendTicketError');
							$('.sendToEmail', resultContainer).text(response.sendToEmail);
						}
						form[0].reset();
						$('.form-control.valid:visible', form).removeClass('valid');
						$('#accountTicket').slideToggle("fast","linear");
						resultContainer.slideToggle("fast","linear");
					}
				}
			});
		}else{
			var result = 'Empty data';
			var act = 'error';
			var title = 'Error!';
			var ButtonClass = 'btn btn-danger btn-cons';
			modals.show_warning(title,result,act,ButtonClass);
		}
	},
	selectors : function(){
		$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
			var oldRemoveChoice = Search.prototype.searchRemoveChoice;

			Search.prototype.searchRemoveChoice = function () {
				oldRemoveChoice.apply(this, arguments);
				this.$search.val('');
			};

			$(".select2_role_type_note").select2({
				placeholder: "Select Role",
				width: 'auto',
				allowClear: false,
				height: '100%',
			});

			$(".select2_user_status_note").select2({
				placeholder: "Select Status",
				width: 'auto',
				allowClear: false,
				height: '100%',
			});

			$('.select2_role_type_note, .select2_status_note, .notify_ignore').on('select2:closing', function( event ) {
				var $searchfield = $(this).parent().find('.select2-search__field');
				$searchfield.css('width', '0.5em');
			});
		});

		$('.select2_role_type_note, .select2_user_status_note, .notify_ignore').on('change', function(){
			notifications.sending_notifications.display_users_for_send();
		});

		$('.custom_user').on('keyup', function(){
			notifications.sending_notifications.display_users_for_send();
		});
	},
	add_notify : function(notify){
		var notify_data = $(notify).parents('.modal-body');
		notify_data.find('textarea').val();
		CKEDITOR.instances.notification_text.updateElement();
		var options = {};
		options['title'] = notify_data.find('input').val();
		options['message'] = notify_data.find('textarea').val();
		$.ajax({
			method: 'post',
			url: 'classes/Class.notifications.php',
			dataType: 'json',
			data: {
				step: 'add_notify',
				options: options
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				if(response){
					if(response.act){
						var result = response.message;
						var act = 'success';
						var title = 'Good job!';
						var ButtonClass = 'btn btn-primary btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
						$('.confirm').on('click', function(){
							location.reload();
						})
					}else{
						var result = response.message;
						act = 'error';
						title = 'Error!';
						ButtonClass = 'btn btn-danger btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
					}
					$('#add_notify').modal('hide');
				}
			}
		});
	},
	update_current_notify_read : function(curr_notify,detect=false){
		var note_id = false;
		if(detect){
			var if_preview = $(curr_notify).parents('.notify-preview-item');
			var info = $(curr_notify).parents('.notify-preview-item').hasClass('info');
			if(if_preview.length && info){
				note_id = if_preview.data('message_id');
			}
		}else{
			note_id = $(curr_notify).data('id');
		}
		if(note_id){
			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: {
					step: 'set_read',
					note_id: note_id
				}
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}else{
					if(!detect){
						$(curr_notify).on('click',function(){
							notifications.set_readed(note_id);
						});
					}else{
						notifications.set_readed(note_id);
					}
				}
			});
		}
	},
	set_readed : function(message_id){
		$('.notifications-item.not-read').each(function(){
			if($(this).data('id') == message_id){
				$(this).removeClass('not-read');
			}
		});
		var counted = false;
		$('.notify-preview-item.info').each(function(){
			if($(this).data('message_id') == message_id){
				$(this).removeClass('info').addClass('read');
				if(counted == false){
					counted = true;
					notifications.update_unread_notifications();
				}
			}
		});
	},
	update_unread_notifications : function(){
		var count_unread = $('.count-unread-notifications').html()-1;
		if(count_unread > 0){
			$('.count-unread-notifications').html(count_unread);
		}else{
			$('.count-unread-notifications').addClass('hidden');
		}
	},
	update_view_data_user : function(){
		var new_id = $('.notification_last_id').data('id');
		if($('#my-task-list .bubble-only').length){
			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: {
					step: 'set_looked',
				}
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}
			});
		}
	},
	single_modal_notification : function(data){
		$('.notification_modal_image').html(data.image);
		$('#notification_modal_Label').html(data.title);
		$('.container_notify').html(data.notification);
		$('.data_notification').html(data.date);
		$('.time_notification').html(data.time);
	},
	get_single_notification : function(current_preview){
		var message_id = $(current_preview).data('message_id');

		$.ajax({
			method: 'post',
			url: 'classes/Class.notifications.php',
			dataType: 'json',
			data: {
				step: 'get_single_notification',
				note_id: message_id
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else if(response){
				notifications.single_modal_notification(response);
				notifications.set_readed(message_id);
				$("#notification_modal").modal();
			}
		});
	},
	remove_notification : function(current_preview){
		var	message_id = $(current_preview).parents('.notifications-item').data('id');
		$.ajax({
			method: 'post',
			url: 'classes/Class.notifications.php',
			dataType: 'json',
			data: {
				step: 'remove_notification',
				note_id: message_id
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				notifications.single_modal_notification(response);
				location.reload();
			}
		});
	},
	confirm_remove_notification : function(current_preview){
		var act = 'warning';
		var title = 'Are you sure?';
		var ButtonClass = 'btn btn-danger btn-cons';
		var result = 'That will Remove Current Notification. Remove Notification?';

		var funk = (function(){
			// emergency_stop_switcher.set_emergency_stop(emergency_stop_value_to_set);
			notifications.remove_notification(current_preview);
		});
		modals.show_warning_with_confirm(title,result,act,ButtonClass,funk);

	},
	sending_notifications : {
		users_for_send : {},
		curent_notification : '',
		init : function(){
			$('.sending_eamail_note').unbind().on('click', function(){
				notifications.sending_notifications.curent_notification = $(this).parents('.notifications-item').data('id');
			});

			$('.button_send_emails').unbind().on('click',function(){
				notifications.sending_notifications.send_notifications();
			})
		},
		sort_user_for_send : function(){
			var select_role = $('.select2_role_type_note').val();
			var select_status = $('.select2_user_status_note').val();
			var notify_ignore = $('input.notify_ignore').prop('checked');

			var mode = 'type';

			var currrent_data_users = [];
			var user_data_with_status_filter = [];

			if(Array.isArray(select_role)){
				$.each(select_role,function(ki,type){
					$.each(data_users,function(i,e){
						Object.keys(e).forEach(function(key) {
							if(notify_ignore){
								if (key == mode && e[key] == type) {
									currrent_data_users[currrent_data_users.length] = e;
								}
							}else{
								if (key == mode && e[key] == type && e.receive_email == 1) {
									currrent_data_users[currrent_data_users.length] = e;
								}
							}
						});
					});
				});
			}else{
				$.each(data_users,function(i,e){
					if(notify_ignore){
						currrent_data_users[currrent_data_users.length] = e;
					}else{
						if (e.receive_email == 1) {
							currrent_data_users[currrent_data_users.length] = e;
						}
					}
				});
			}

			if(Array.isArray(select_status)){
				var mode = 'status';
				$.each(select_status,function(ki,type){
					$.each(currrent_data_users,function(i,e){
						Object.keys(e).forEach(function(key) {
							if (key == mode && e[key] == type) {
								user_data_with_status_filter[user_data_with_status_filter.length] = e;
							}
						});
					});
				});
			}

			if(Array.isArray(select_role) && Array.isArray(select_status)){
				return user_data_with_status_filter;
			}else if(Array.isArray(select_role)){
				return currrent_data_users;
			}else if(Array.isArray(select_status)){
				return user_data_with_status_filter;
			}else{
				return false;
			}
		},
		display_users_for_send : function(){
			var display_selected = '';
			var user_for_send = [];
			var sorted_users = notifications.sending_notifications.sort_user_for_send();
			var custom_user = [];
			if(Array.isArray(sorted_users)){
				sorted_users.forEach(function(i,e){
					display_selected += "<span class='each_user_for_send'>"+i['company']+' - '+i['email']+"</span>";
					user_for_send[user_for_send.length] = {user_name : i['name'], email : i['email']};
					if(typeof i['extra_notification_email'] !== undefined && i['extra_notification_email'] && i['extra_notification_email']!=i['email']){
						display_selected += "<span class='each_user_for_send'>"+i['company']+' - '+i['extra_notification_email']+"</span>";
						user_for_send[user_for_send.length] = {user_name : i['name'], email : i['extra_notification_email']};
					}
				});
				custom_user = $('.custom_user').val().split(',');
				if(Array.isArray(custom_user)){
					custom_user.forEach(function(i,e){
						if(i.replace(/\s/g,"") != ""){
							display_selected += "<span class='each_user_for_send'> custom user - "+i+"</span>";
							user_for_send[user_for_send.length] = {user_name : 'Custom User', email : i};
						}
					});
				}
				$('.all_users_for_send').html(display_selected);
				$('.count_selected').html(user_for_send.length);
			}else{
				custom_user = $('.custom_user').val().split(',');
				if(Array.isArray(custom_user)){
					custom_user.forEach(function(i,e){
						if(i.replace(/\s/g,"") != ""){
							display_selected += "<span class='each_user_for_send'> custom user - "+i+"</span>";
							user_for_send[user_for_send.length] = {user_name : 'Custom User', email : i};
						}
					});
					$('.all_users_for_send').html(display_selected);
					$('.count_selected').html(user_for_send.length);
				}else{
					$('.all_users_for_send').html('');
				}
			}

			notifications.sending_notifications.users_for_send = user_for_send;
		},
		send_notifications : function(){
			let users = notifications.sending_notifications.users_for_send;
			let note_id = notifications.sending_notifications.curent_notification;
			let notify_ignore = $('input.notify_ignore').prop('checked');

			if(Array.isArray(users) && users.length){
				$('.image_loader').css('display','inline-block');
				$('.button_send_emails').css('display','none');

				$.ajax({
					method: 'post',
					url: 'classes/Class.notifications.php',
					dataType: 'json',
					data: {
						step: 'emailing_notifications',
						note_id: note_id,
						notify_ignore: notify_ignore,
						users: JSON.stringify(users)
					}
				}).done(function(response){
					if(response && response.logout){
						logout_visual.auto_logout(response.logout);
					}else{
						if(response){
							$('#emailing_popup').modal('hide');
							$('.image_loader').css('display','none');
							$('.button_send_emails').css('display','inline-block');
							notifications.sending_notifications.confirm_send(response);
						}else{
							result = 'Email not sended';
							var act = 'error';
							var title = 'Error!';
							var ButtonClass = 'btn btn-danger btn-cons';
							modals.show_warning(title,result,act,ButtonClass);
						}
					}
				});
			}else{
				$('.all_users_for_send').html('<span style="color:red;">No one email for sending</span>');
			}
		},
		confirm_send : function(confirm_data){
			var succes_message = '';
			var decline_message = '';

			if(confirm_data.status == 'warning'){
				var title = 'Had Missing Sends!';
				result = 'not all emails sended';
				result += "\r\n"+"\r\n"+'declined_list'+"\r\n"+confirm_data.data;
				var ButtonClass = 'btn btn-warning btn-cons';
				var act = 'warning';
			}else if(confirm_data.status == 'success'){
				var title = 'Good job!';
				result = 'all sended success';
				var ButtonClass = 'btn btn-primary btn-cons';
				var act = 'success';
			}else{
				var title = 'Error!';
				result = 'declined send at all';
				result += "\r\n"+"\r\n"+'declined_list'+"\r\n"+confirm_data.data;
				var ButtonClass = 'btn btn-danger btn-cons';
				var act = 'error';
			}

			modals.show_warning(title,result,act,ButtonClass);
		}
	},
	update_notifications : {
		init : function(){
			$('.edit_note').unbind().on('click', function(){
				notifications.sending_notifications.curent_notification = $(this).parents('.notifications-item').data('id');
				notifications.update_notifications.get_current_notification_data();
			});
			$('.edit_notify_submit').on('click', function(){
				CKEDITOR.instances.edit_notification_text.updateElement();
				notifications.update_notifications.save_updated_notification(this);
			});

		},
		get_current_notification_data : function(){
			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: {
					step: 'get_note_for_update',
					note_id: notifications.sending_notifications.curent_notification
				}
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}else{
					if(response && response.status == 'success'){
						$('#edit_notify .title_notify').val(response.data.title);
						CKEDITOR.instances.edit_notification_text.setData(response.data.notification);
					}else if(response){
						act = 'error';
						title = 'Error!';
						result = 'Can\'t get notification for edit';
						ButtonClass = 'btn btn-danger btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
					}else{
						act = 'error';
						title = 'Error!';
						result = 'Only admin have access';
						ButtonClass = 'btn btn-danger btn-cons';
						modals.show_warning(title,result,act,ButtonClass);
					}
				}
			});
		},
		save_updated_notification : function(notify){
			var notify_data = $(notify).parents('.modal-body');
			var options = {};
			options['title'] = notify_data.find('input').val();
			options['message'] = notify_data.find('textarea').val();
			options['id'] = notifications.sending_notifications.curent_notification;

			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: {
					step: 'save_updated_notification',
					options: options
				}
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}else{
					if(response && response.status == 'success'){
						var result = 'Notification updated successfully';
						var act = 'success';
						var title = 'Good job!';
						var ButtonClass = 'btn btn-primary btn-cons';

						$('.notifications-item').each(function(){
							if($(this).data('id') == options['id']){
								$(this).find('.notification-title').html(options['title']);
								$(this).find('.notification-body .full,.notification-body .height-draft').html(options['message']);
							}
						});
					}else if(response){
						var act = 'error';
						var title = 'Error!';
						var result = 'Can\'t update notifications some error';
						var ButtonClass = 'btn btn-danger btn-cons';
					}else{
						var act = 'error';
						var title = 'Error!';
						var result = 'only admin have access';
						var aButtonClass = 'btn btn-danger btn-cons';
					}
					$('#edit_notify').modal('hide');
					modals.show_warning(title,result,act,ButtonClass);
				}
			});
		},
	},
	getPageAccountNotifications : function(el){
		let pageNumEl, pageLenEl;

		if(el.hasClass('paginate-page-len')){//on change page length use active page and choosen page length
			pageNumEl = $('.paginate-notifications .paginate-page-num.active:first');
			pageLenEl = el;
		}else if(el.hasClass('paginate-page-switch')){//on change page use page length and choosen page
			pageNumEl = el;
			pageLenEl = $('.paginate-notifications .paginate-page-len:first');
		}

		$.ajax({
			method: 'post',
			url: 'classes/Class.notifications.php',
			dataType: 'json',
			data: {
				step: 'getPageAccountNotifications',
				data : {
					pageNum: pageNumEl.data('page'),
					pageLen: pageLenEl.val()
				}
			}
		}).done(function(response){
			if(response && response.logout){
				logout_visual.auto_logout(response.logout);
			}else{
				if(response && response.status){
					$('.account-notifications-container')[0].outerHTML = response.html;
				}
			}
		});
	},//getPageAccountNotifications
	notificationMark : function(el){
		var notifications_id = $(el).parents('[data-message_id]').data('message_id');
		var is_marked = $(el).find('input').is(':checked')?0:1;

		if(notifications_id){
			$.ajax({
				method: 'post',
				url: 'classes/Class.notifications.php',
				dataType: 'json',
				data: {
					step: 'notificationMark',
					notifications_id: notifications_id,
					is_marked: is_marked,
				}
			}).done(function(response){
				if(response && response.logout){
					logout_visual.auto_logout(response.logout);
				}else{
					if(response && response.status){
						$(el).find('input').prop( "checked", is_marked);
					}
				}
			});
		}
	},//notificationMark
};

var notify_text_editor = {
	init : function(){
		if($('#notification_text').length){
			CKEDITOR.replace( 'notification_text' );
		}
		if($('#edit_notification_text').length){
			CKEDITOR.replace( 'edit_notification_text' );
		}
	}
}

$(function(){
	notify_text_editor.init();
	notifications.init();
	notifications.sending_notifications.init();
	notifications.update_notifications.init();
});