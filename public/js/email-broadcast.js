const send_email = {
	formState : [],
	data_sender_from : [],
	init : function() {
		const $form =  $('#add_email .save_emails_form');
		const template = $form.find('select[name="templates"]');
		send_email.changeTemplate($form, template);
		send_email.editTemplateData();
		template.val(template.val()).trigger('change');

		send_email.selectors();
	},
	update_email : {
		init : function(){
			$(document).on('click', '.edit_email', function(){
				$('#edit_email .save_emails_form').attr('data-id', $(this).data('id'));
				send_email.update_email.get_current_email_data($(this));
			});
		},
		get_current_email_data : function(el) {
			const $form = $('#edit_email .save_emails_form');
			let selectedTemp = Object.values(templates).filter(function (item) { return item.id === el.data('template-id')})[0];
			if(!send_email.formState[el.data('id')]) {
				$.ajax({
					method: 'post',
					url: 'classes/Class.SendEmailToNetworks.php',
					dataType: 'json',
					data: {
						action: 'get_template_for_update',
						id: el.data('id')
					}
				}).done(function(template) {
					if(template){
						$form.find('.template-name').html(selectedTemp.name);
						$form.find('.template_thumbnail').css('backgroundImage', `url(${selectedTemp.thumbnail_url})`);
						$form.find('input[name="email_subject"]').val(template.subject);
						$form.find('textarea[name="email_short_description"]').val(template.short_description);
						$form.find('textarea[name="email_body"]').val(template.body);
						CKEDITOR.instances.edit_email_text.setData(template.body);
						$form.find('input[name="template_id"]').val(template.template_id);
						$form.find('input[name="data_id"]').val(el.data('id'));
						send_email.formState[el.data('id')] = {
							subject: template.subject,
							short_description: template.short_description,
							template_id: template.template_id,
							body: template.body,
						};
					}
				});
			} else {
				const curTemplateForm = send_email.formState[el.data('id')]
				$form.find('input[name="email_subject"]').val(curTemplateForm.subject);
				$form.find('textarea[name="email_short_description"]').val(curTemplateForm.short_description);
				$form.find('input[name="template_id"]').val(curTemplateForm.template_id);
				$form.find('textarea[name="email_body"]').val(curTemplateForm.body);
				$form.find('.template_thumbnail').css('backgroundImage', `url(${selectedTemp.thumbnail_url})`);
			}
		}
	},
	changeTemplate : function ($form, template) {
		template.on('change', function() {
			const selectedTempID = $(this).val();
			let selectedTemp = Object.values(templates).filter(function (item) { return item.id === selectedTempID})[0];
			$form.find('.template_thumbnail').css('backgroundImage', `url(${selectedTemp.thumbnail_url})`);
			$form.find('input[name="email_subject"]').val(selectedTemp.subject);
			$form.find('textarea[name="email_short_description"]').val(selectedTemp.short_description);
			$form.find('input[name="template_id"]').val(selectedTemp.id);
		});
	},
	editTemplateData : function () {
		const $formEdit = $('#edit_email .save_emails_form');
		$formEdit.find('input, textarea').on('change', function() {
			const curTemplateForm = send_email.formState[$formEdit.attr('data-id')];
			if($(this).attr('name') === 'email_subject') curTemplateForm.subject = $(this).val();
			if($(this).attr('name') === 'email_short_description') curTemplateForm.short_description = $(this).val();
			if($(this).attr('name') === 'email_body') curTemplateForm.body = $(this).val();
		});

	},
	get_networks_to_send: function(){
		const current_data_users = [];
		$.each(data_networks,function(i,e){
			current_data_users[current_data_users.length] = e;
		});

		return current_data_users;
	},
	sending_email_to_networks : {
		init: function(){
			$('.save_emails_form').on('submit', function(event) {
				event.preventDefault();
				const $form = $(this).get(0);
				const formData = new FormData($form);
				const is_update = formData.get('is_update');
				const data = {
					subject: formData.get('email_subject'),
					short_description: formData.get('email_short_description'),
					template_id: formData.get('template_id'),
					body: formData.get('email_body'),
				};

				if(is_update && is_update === 'true') {
					CKEDITOR.instances.edit_email_text.updateElement();
					data['body'] = $(this).find('#edit_email_text').val();
					data['short_description'] = $(this).find('textarea[name="email_short_description"]').val();
					data['id'] = formData.get('data_id');
					send_email.update_email_data(data);
				} else {
					CKEDITOR.instances.email_text.updateElement();
					data['body'] = $(this).find('#email_text').val();
					send_email.save_email_data(data);
				}
			});

			$('.button_send_emails_to_nets').unbind().on('click',function(){
				if (!data_networks.length) {
					$('.all_users_for_send').html('<span style="color:red;">No one email for sending</span>');
					return false;
				}
				const templateDataID = $(this).attr('data-id');
				let save_emails_form = $('#edit_email form.save_emails_form');
				const editBtn = $('.notifi_button_container').find(`.edit_email[data-id=${templateDataID}]`);
				$('#edit_email').css('zIndex', -999);
				editBtn.unbind().trigger('click');
				let i = 0;
				const tryToSend = setInterval(function() {
					i++;
					if (save_emails_form.find('input[name="email_subject"]').val() || i === 10) {
						send_email.sending_email_to_networks.send_emails(save_emails_form);
						clearInterval(tryToSend);
					}
				}, 100);
			})
		},
		sort_user_for_send : function(e){
			const select_role = $('.select2_role_type_users').val();
			const select_status = $('.select2_user_status_nets').val();
			const currrent_data_users = [];
			const user_data_with_status_filter = [];
			let _mode = 'type';
			if(Array.isArray(select_role)){
				$.each(select_role,function(ki,type){
					$.each(data_users_to_send,function(i,e){
						Object.keys(e).forEach(function(key) {
							if (key == _mode && e[key] == type) {
								currrent_data_users[currrent_data_users.length] = e;
							} else if(type === 'manager_id' && e[key] == manager_data.id) {
								currrent_data_users[currrent_data_users.length] = e;
							}
						});
					});
				});
			}else{
				$.each(data_users_to_send, function(i,e){
					currrent_data_users[currrent_data_users.length] = e;
				});
			}
			if(Array.isArray(select_status)){
				let mode = 'status';
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
				data_networks = user_data_with_status_filter;
				return user_data_with_status_filter;
			}else if(Array.isArray(select_role)){
				data_networks = currrent_data_users;
				return currrent_data_users;
			}else if(Array.isArray(select_status)){
				data_networks = user_data_with_status_filter;
				return user_data_with_status_filter;
			}else{
				return false;
			}
		},
		add_from_sender : function(e){
			const sender_from = e.val().split(',');

			if(Array.isArray(sender_from)){
				sender_from.forEach(function(i,e){
					if(i.replace(/\s/g,"") != ""){
						send_email.data_sender_from.name = sender_from[0];
						send_email.data_sender_from.email = sender_from[1];
					}
				});
			}
		},
		display_users_for_send : function(){
			let display_selected = '';
			let users_count = 0;
			let sorted_users = send_email.sending_email_to_networks.sort_user_for_send();
			let custom_user = [];
			let custom_user_data = [];
			let withSorted = false;
			let isEmpty = false;
			if(Array.isArray(sorted_users)){
				sorted_users.forEach(function(i,e){
					display_selected += "<span class='each_user_for_send'>"+i['company']+' - '+i['email']+"</span>";
					users_count++;
				});
				custom_user = $('.custom_user_select').val().split(',');
				if(Array.isArray(custom_user)){
					custom_user.forEach(function(i,e){
						if(i.replace(/\s/g,"") != ""){
							users_count++;
							display_selected += "<span class='each_user_for_send'> custom user - "+i+"</span>";
							custom_user_data.push({email : i.trim(), name: 'Custom User', substitution: {'%name%': 'Custom User'}});
							withSorted = true;
						}
					});
				}
				$('.all_users_for_send').html(display_selected);
				$('.count_selected').html(users_count);
			}else{
				custom_user = $('.custom_user_select').val().split(',');
				if(Array.isArray(custom_user) && custom_user[0] !== ''){
					custom_user.forEach(function(i,e){
						if(i.replace(/\s/g,"") != ""){
							users_count++
							display_selected += "<span class='each_user_for_send'> custom user - "+i+"</span>";
							custom_user_data[custom_user_data.length] = {email : i.trim(), name: 'Custom User', substitution: {'%name%': 'Custom User'}};
							data_networks = custom_user_data;
							withSorted = false;
						}
					});
					$('.all_users_for_send').html(display_selected);
					$('.count_selected').html(users_count);
				}else{
					isEmpty = true;
					$('.all_users_for_send').html('');
				}
			}
			if(withSorted) {
				data_networks = [...data_networks, ...custom_user_data];
			}
			if(isEmpty) {
				data_networks = [];
			}
		},
		send_emails: function(form) {
			const $form = form.get(0);
			const formData = new FormData($form);
			const users = send_email.get_networks_to_send();
			const imageLoader = $('.image_loader');
			const btnHandles = $('.btn-handlers');
			let data = {};
			if (Array.isArray(users) && users.length) {
				imageLoader.css('display','inline-block');
				btnHandles.hide();
				CKEDITOR.instances.edit_email_text.updateElement();
				data = {
					subject: formData.get('email_subject'),
					short_description: formData.get('email_short_description'),
					template_id: formData.get('template_id'),
					body: formData.get('email_body'),
				};
				if (manager_data.calendly_login) {
					data.calendly_login = manager_data.calendly_login
				}
				if (send_email.data_sender_from.name) {
					data.sender_from = {
						'email': send_email.data_sender_from.email !== undefined ? send_email.data_sender_from.email.trim() : '',
						'name': send_email.data_sender_from.name.trim()
					}
				}
				$.ajax({
					method: 'post',
					url: 'classes/Class.SendEmailToNetworks.php',
					dataType: 'json',
					data: {
						...data,
						action: 'send_email_to_networks',
						users_list: JSON.stringify(users),
					}
				}).done(function(response) {
					if (response) {
						imageLoader.css('display','none');
						btnHandles.show();
						send_email.sending_email_to_networks.confirm_send(response);
					}
				}).fail(function( jqXHR, textStatus ) {
					send_email.sending_email_to_networks.confirm_send({'status': 'error'});
					imageLoader.css('display','none');
					btnHandles.show();
				});
			} else {
				send_email.sending_email_to_networks.confirm_send({'status': 'no_nets_found'});
				imageLoader.css('display','none');
				btnHandles.show();
				$('.button_send_emails').css('display','inline-block');
			}
		},
		confirm_send : function(confirm_data) {
			let act;
			let ButtonClass;
			let title;
			let result = '';
			if (confirm_data.status === 'warning') {
				title = 'Had Missing Sends!';
				result = 'Not all emails has been sent';
				result += "\r\n"+"\r\n"+'Declined list'+"\r\n"+confirm_data.data;
				ButtonClass = 'btn btn-warning btn-cons';
				act = 'warning';
			} else if (confirm_data.status === 'success') {
				title = 'Good job!';
				result = 'Emails has been sent successfully';
				ButtonClass = 'btn btn-primary btn-cons';
				act = 'success';
			} else if (confirm_data.status === 'no_nets_found') {
				title = 'Failed!';
				result = 'No networks were found';
				ButtonClass = 'btn btn-danger btn-cons';
				act = 'error';
			} else if (confirm_data.status === 'save_failed') {
				title = 'Failed!';
				result = 'Failed to save data';
				ButtonClass = 'btn btn-danger btn-cons';
				act = 'error';
			} else if (confirm_data.status === 'save_success') {
				title = 'Good job!!';
				result = 'Email template successfully saved';
				ButtonClass = 'btn btn-primary btn-cons';
				act = 'success';
			} else if (confirm_data.status === 'update_success') {
				title = 'Good job!';
				result = 'Email template successfully updated';
				ButtonClass = 'btn btn-primary btn-cons';
				act = 'success';
			} else if (confirm_data.status === 'update_failed') {
				title = 'Update failed!';
				result = 'Email template successfully updated';
				ButtonClass = 'btn btn-danger btn-cons';
				act = 'error';
			} else {
				title = 'Error!';
				result = 'Declined send at all';
				result += "\r\n"+"\r\n"+'Declined list'+"\r\n"+confirm_data.data;
				ButtonClass = 'btn btn-danger btn-cons';
				act = 'error';
			}

			$('#email_broadcasting_popup, .confirm').on('click', function(){
				location.reload();
			})

			modals.show_warning(title, result, act, ButtonClass);
		}
	},
	save_email_data: function (data) {
		data['action'] = 'save_email_data';
		$.ajax({
			method: 'post',
			url: 'classes/Class.SendEmailToNetworks.php',
			dataType: 'json',
			data: data
		}).done(function(response) {
			if(response.status) {
				send_email.sending_email_to_networks.confirm_send({'status': 'save_success'});
				$('#email_broadcasting_popup, .confirm').on('click', function(){
					location.reload();
				})
			} else{
				send_email.sending_email_to_networks.confirm_send({'status': 'save_failed'});
			}
		}).fail(function( jqXHR, textStatus ) {
			send_email.sending_email_to_networks.confirm_send({'status': 'save_failed'});
		});
	},
	update_email_data: function (data) {
		data['action'] = 'update_email_data';
		$.ajax({
			method: 'post',
			url: 'classes/Class.SendEmailToNetworks.php',
			dataType: 'json',
			data: data
		}).done(function(response) {
			if(response.status) {
				send_email.sending_email_to_networks.confirm_send({'status': 'update_success'});
				$('.confirm').on('click', function(){
					location.reload();
				});
			} else{
				send_email.sending_email_to_networks.confirm_send({'status': 'update_failed'});
			}
		}).fail(function( jqXHR, textStatus ) {
			send_email.sending_email_to_networks.confirm_send({'status': 'update_failed'});
		});
	},
	selectors : function(){
		$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
			const oldRemoveChoice = Search.prototype.searchRemoveChoice;
			Search.prototype.searchRemoveChoice = function () {
				oldRemoveChoice.apply(this, arguments);
				this.$search.val('');
			};
			$(".select2_role_type_users").select2({
				placeholder: "Select Role",
				width: 'auto',
				allowClear: false,
				height: '100%',
			});
			$(".select2_user_status_nets").select2({
				placeholder: "Select Status",
				width: 'auto',
				allowClear: false,
				height: '100%',
			});

			$('.select2_role_type_users, .select2_status_note').on('select2:closing', function( event ) {
				const $searchfield = $(this).parent().find('.select2-search__field');
				$searchfield.css('width', '0.5em');
			});
		});

		$('.select2_role_type_users, .select2_user_status_nets').on('change', function(){
			send_email.sending_email_to_networks.display_users_for_send();
		});

		$('.custom_user_select').on('keyup', function(){
			send_email.sending_email_to_networks.display_users_for_send();
		});
		$('.from_sender').on('keyup', function(){
			send_email.sending_email_to_networks.add_from_sender($(this));
		});
		$('.sending_eamail_note').on('click', function() {
			data_networks = []
			const getTemplateDataId = $(this).next('button.edit_email').data('id');
			$('.button_send_emails_to_nets').attr('data-id', getTemplateDataId);
		});
	},
};

var send_email_text_editor = {
	init : function(){
		if($('#email_text').length){
			CKEDITOR.replace('email_text', {
				filebrowserUploadUrl: 'classes/Class.UploadImage.php',
				filebrowserUploadMethod: 'form'
			});
		}
		if($('#edit_email_text').length){
			CKEDITOR.replace('edit_email_text', {
				filebrowserUploadUrl: 'classes/Class.UploadImage.php',
				filebrowserUploadMethod: 'form'
			});
		}
	}
}

$(function(){
	send_email_text_editor.init();
	send_email.init();
	send_email.sending_email_to_networks.init();
	send_email.update_email.init();
});