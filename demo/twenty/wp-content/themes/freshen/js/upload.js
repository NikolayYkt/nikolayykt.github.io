jQuery(document).ready(function($){
	"use strict";
	var freshen_upload;
	var freshen_selector;

	function freshen_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		freshen_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( freshen_upload ) {
			freshen_upload.open();
			return;
		} else {
			// Create the media frame.
			freshen_upload = wp.media.frames.freshen_upload =  wp.media({
				// Set the title of the modal.
				title: "Select Image",

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: "Selected",
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			freshen_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = freshen_upload.state().get('selection').first();

				freshen_upload.close();
				freshen_selector.find('.upload_image').val(attachment.attributes.url).change();
				if ( attachment.attributes.type == 'image' ) {
					freshen_selector.find('.freshen_screenshot').empty().hide().prepend('<img src="' + attachment.attributes.url + '">').slideDown('fast');
				}
			});

		}
		// Finally, open the modal.
		freshen_upload.open();
	}

	function freshen_remove_file(selector) {
		selector.find('.freshen_screenshot').slideUp('fast').next().val('').trigger('change');
	}
	
	$('body').on('click', '.freshen_upload_image_action .remove-image', function(event) {
		freshen_remove_file( $(this).parent().parent() );
	});

	$('body').on('click', '.freshen_upload_image_action .add-image', function(event) {
		freshen_add_file(event, $(this).parent().parent());
	});

});