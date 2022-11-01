jQuery(function($){

	// Activate Product Key
	$('.thb-register:not(.disabled)').on("click", function(e){
		var _this = $(this),
				key = $('#thb_product_key').val(),
				purchase_code = $('#thb_purchase_code').val(),
				is_purchase_code = _this.hasClass('thb_purchase_code'),
				url = is_purchase_code ? _this.data('verify-by-purchase') : _this.data('verify'),
				data = {
					'domain': _this.data('domain')
				};

		if ( is_purchase_code ) {
			data.purchase_code = purchase_code;
		} else {
			data.product_key = key;
		}

		$.ajax({
			method: 'GET',
			url: url,
			data: data,
			beforeSend: function() {
				_this.addClass('disabled');
			},
			error: function(data) {
				_this.removeClass('disabled');
				if (data.responseText) {
					var response = $.parseJSON(data.responseText);
					if ( response.error_message ) {
						if ( 'Invalid product_key' === response.error_message) {
							_this.parents('.step').find('.thb_error_messages').html('<div class="thb-error"><p><span class="dashicons dashicons-warning"></span> Invalid Product Key</p><p><small>Please make sure that you are using the exactly the same​ WordPress URL inside Settings > General.</small></p></div>');
						} else if ( 'Invalid purchase_code' === response.error_message) {
							_this.parents('.step').find('.thb_error_messages').html('<div class="thb-error"><p><span class="dashicons dashicons-warning"></span> Invalid Envato Purchase Code</p><p><small>Please make sure that you are using the correct Envato Purchase Code for this theme.</small></p></div>');
						} else if ( 'Invalid domain' === response.error_message) {
							_this.parents('.step').find('.thb_error_messages').html('<div class="thb-error"><p><span class="dashicons dashicons-warning"></span> Invalid Domain</p><p><small>Please make sure that you are using the exactly the same​ WordPress URL inside Settings > General.</small></p></div>');
						} else {
							_this.parents('.step').find('.thb_error_messages').html('<div class="thb-error"><p><span class="dashicons dashicons-warning"></span> '+response.error_message+'</p></div>');
						}
					}
				}
			},
			success: function(data) {
				if (data.product_key) {
					key = data.product_key;
				}
				$.ajax( ajaxurl, {
					method : 'POST',
					data : {
						action: 'thb_update_options',
						key: key,
						expired: 0,
						security: _this.data('security'),
					},
					success:function() {
						location.reload();
					}
				});

			},
		});
		return false;
	});
	// Remove Product Key
	$('.thb-delete-key').on("click", function(e){
		var _this = $(this);
		$.ajax( ajaxurl, {
			method : 'POST',
			data : {
				action: 'thb_update_options',
				key: '',
				expired: 0,
				security: _this.data('security'),
			},
			success:function() {
				location.reload();
			}
		});
		return false;
	});
	// Thb Admin Popup
	var thb_adm_p_vars = {
		popup: $('#thb-adm-popup'),
		close: $('.thb-popup-close'),
		btn: $('.import-opts-btn')
	};

	thb_adm_p_vars.close.on('click', function() {
		$(this).closest(thb_adm_p_vars.popup).removeClass('opvis');
	});
	$(document).on('keyup', function(e) {
		if (e.keyCode === 27) {
			if (thb_adm_p_vars.popup.hasClass('opvis')) {
				thb_adm_p_vars.close.trigger('click');
			}
		}
	});
	$('.thb-check-line [type=checkbox]').on('change', function() {
		var t = $(this);
		t.toggleClass('thb-checked');
		if (t.attr('id') === 'ty-contents') {
			if (!t.hasClass('child-opened')) {
				t.addClass('child-opened').parent().next().addClass('done');
			} else {
				t.removeClass('child-opened').parent().next().removeClass('done');
			}
		}
	});

	// Open Import Popup
	thb_adm_p_vars.btn.on('click', function() {
		var t = $(this),
			selected = t.data('demo');
		thb_adm_p_vars.popup.find('.button').data('selected', selected);
		thb_adm_p_vars.popup.find('figure img').attr('src', t.closest('.theme').find('img').attr('src'));
		thb_adm_p_vars.popup.find('[type=checkbox]');
		thb_adm_p_vars.popup.addClass('opvis');
	});

	// Demo Content Import
	var thb_data = new FormData(),
			thb_once = false;

	if (typeof ocdi !== 'undefined') {
		thb_data.append( 'action', 'ocdi_import_demo_data' );
		thb_data.append( 'security', ocdi.ajax_nonce );
	}

	function thb_ajaxCall(thb_data) {

		// AJAX call.
		$.ajax({
			method:     'POST',
			url:        ocdi.ajax_url,
			data:       thb_data,
			contentType: false,
			processData: false
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				thb_ajaxCall( thb_data );
			} else if ( 'undefined' !== typeof response.status && 'afterAllImportAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_after_import_data' );
				newData.append( 'security', ocdi.ajax_nonce );
				thb_ajaxCall( newData );
			} else {
				location.reload();
			}
		});
	}

	// Import Form Submit
	thb_adm_p_vars.popup.find('form').on('submit', function(e) {
		e.preventDefault();
		var t = $(this),
			demo = t.find('.button').data('selected');

		thb_adm_p_vars.popup.find('form').addClass('thb-loading');
		t.closest('.thb-popup-box').find('.thb-import-loading').addClass('opvis');
		t.children('[type=submit]').addClass('disabled').attr('disabled', 'disabled').unbind('click');

		thb_data.append( 'selected', demo );
		thb_data.append( 'thb_import_options', t.serialize());

		thb_ajaxCall(thb_data);
	});

	// Image Widget
	ThbImage = {

		// Call this from the upload button to initiate the upload frame.
		uploader : function( widget_id, widget_id_string, widget_alt ) {

			var frame = wp.media({
				title : ThbImageWidget.frame_title,
				multiple : false,
				library : { type : 'image' },
				button : { text : ThbImageWidget.button_title }
			});

			// Handle results from media manager.
			frame.on('close',function( ) {
				var attachments = frame.state().get('selection').toJSON();
				$('#'+widget_id_string).val(attachments[0].id);
				$('#'+widget_id_string).parents('.widget-content').find('.thb-widget-image-holder').html('<img src='+attachments[0].sizes.thumbnail.url+' />');
			});

			frame.open();
			return false;
		},

	};

	// Taxonomy Upload Image
	var openMediaLibrary = function(callback) {
		var frame = wp.media({
			'title': 'Select an image',
			'multiple': false,
			'library': {
				'type': 'image'
			},
			'button': {
				'text': 'Add Image'
			}
		});

		frame.on('select',function() {
			var objSelected = frame.state().get('selection').first().toJSON();
			callback(objSelected);
		});

		frame.open();
	};
	var thb_imageUpload = function($el) {
		var $imageHolder = $el.find('.thb-image-holder'),
				$uploadLink = $el.find('.thb-upload-image'),
				$removeLink = $el.find('.thb-remove-image'),
				$imageId = $el.find('.thb-image-id');
		if ( parseInt($imageId.val(), 10) > 0 ) {
			$uploadLink.hide();
			$removeLink.show();
		} else {
			$uploadLink.show();
			$removeLink.hide();
		}

		$uploadLink.on('click', function(e) {
			e.preventDefault();
			openMediaLibrary(function(imageObj) {
				var
				thumb = '';
				if( imageObj.sizes.thumbnail !== undefined ){
					thumb = imageObj.sizes.thumbnail;
				} else {
					thumb = imageObj.sizes.full;
				}

				$imageHolder.html('<img src="' + thumb.url + '" width="' + thumb.width + '" height="' + thumb.height + '" />');
				$imageId.val(imageObj.id);

				$uploadLink.hide();
				$removeLink.show();
			});
		});

		$removeLink.on('click', function(e) {
			e.preventDefault();

			if ( ! confirm( 'Are you sure?' ) ) {
				return;
			}

			$imageHolder.empty();
			$imageId.val('');

			$uploadLink.show();
			$removeLink.hide();
		});
	};

	$('.thb-upload-image-field').each(function() {
		thb_imageUpload($(this));
	});

	// Ajax Author Select
	$( '.thb-author-search' ).each( function() {
		var security = $(this).data('security');
		var select2_args = {
			allowClear: false,
			placeholder: $( this ).data( 'placeholder' ),
			minimumInputLength: '3',
			escapeMarkup: function( m ) {
				return m;
			},
			ajax: {
				url:         ajaxurl,
				dataType:    'json',
				delay:       250,
				data:        function( params ) {
					return {
						term: params.term,
						action: 'thb_json_search_authors',
						security: security
					};
				},
				processResults: function( data ) {
					var terms = [];
					if ( data ) {
						console.log(data);
						$.each( data, function( id, text ) {
							terms.push( { id: id, text: text } );
						});
					}
					return {
						results: terms
					};
				},
				cache: true
			}
		};
		$(this).select2(select2_args);
	});

	// Ajax Post Select
	$( '.thb-post-search' ).each( function() {
		var security = $(this).data('security');
		var select2_args = {
			allowClear: false,
			placeholder: $( this ).data( 'placeholder' ),
			minimumInputLength: '3',
			escapeMarkup: function( m ) {
				return m;
			},
			ajax: {
				url:         ajaxurl,
				dataType:    'json',
				delay:       250,
				data:        function( params ) {
					return {
						term: params.term,
						action: 'thb_json_search_posts',
						security: security
					};
				},
				processResults: function( data ) {
					var terms = [];
					if ( data ) {
						$.each( data, function( id, text ) {
							terms.push( { id: id, text: text } );
						});
					}
					return {
						results: terms
					};
				},
				cache: true
			}
		};
		$(this).select2(select2_args);
	});

	// Posts Widget Selections
	function thb_posts_widget_init() {
		$( '.thb_widget_layout_row' ).each( function() {
			var _this = $(this),
					select = _this.find('select'),
					parent = _this.parents('.widget-content');

				select.on('change', function() {
					var val = this.value;
					if (val === 'thumbnail') {
						parent.find('.thb_thumbnail_style_row, .thb_thumbnail_counter_row').show();
					} else {
						parent.find('.thb_thumbnail_style_row, .thb_thumbnail_counter_row').hide();
					}
				}).trigger('change');
		});
		$( '.thb_orderby_row' ).each( function() {
			var _this = $(this),
					select = _this.find('select'),
					parent = _this.parents('.widget-content');

				select.on('change', function() {
					var val = this.value;
					if (val === 'views') {
						parent.find('.thb_trending_row').show();
						parent.find('.thb_timeframe_row').hide();
					} else {
						parent.find('.thb_timeframe_row').show();
						parent.find('.thb_trending_row').hide();
					}
				}).trigger('change');
		});
	}
	thb_posts_widget_init();
	$(document).on('widget-updated widget-added', thb_posts_widget_init );
});
