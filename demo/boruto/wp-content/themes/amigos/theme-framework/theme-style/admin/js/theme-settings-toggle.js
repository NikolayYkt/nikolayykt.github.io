/**
 * @package 	WordPress
 * @subpackage 	Amigos
 * @version		1.0.0
 * 
 * Theme Admin Settings Toggles Scripts
 * Created by CMSMasters
 * 
 */


(function ($) { 
	"use strict";
	
	/* Hide Theme Layout Option */
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_theme_layout"]').parents('tr').hide();
	
	
	
	/* General 'Header' Tab Fields Load */
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_add_cont"]').parents('tr').hide();
	$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
	$('#' + cmsmasters_theme_settings.shortname + '_header_bot_height').parents('tr').hide();
	
	
	if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'side') {
		$('#' + cmsmasters_theme_settings.shortname + '_fixed_header').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_overlaps').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_mid_height').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_top_line').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_top_height').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_top_line_short_info').parents('tr').hide();
		$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_top_line_add_cont"]').parents('tr').hide();
	} else if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'default') {
		$('#' + cmsmasters_theme_settings.shortname + '_fixed_header').parents('tr').show();
		$('#' + cmsmasters_theme_settings.shortname + '_header_overlaps').parents('tr').show();
		$('#' + cmsmasters_theme_settings.shortname + '_header_mid_height').parents('tr').show();
		$('#' + cmsmasters_theme_settings.shortname + '_header_top_line').parents('tr').show();
		
		if ($('#' + cmsmasters_theme_settings.shortname + '_header_top_line').is(':checked')) {
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_height').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_line_short_info').parents('tr').show();
			$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_top_line_add_cont"]').parents('tr').show();
		} else {
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_height').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_line_short_info').parents('tr').hide();
			$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_top_line_add_cont"]').parents('tr').hide();
		}
	}
	
	
	/* General 'Header' Tab Fields Change */
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]').on('change', function () {
		$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_add_cont"]').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_header_bot_height').parents('tr').hide();
		
		if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'side') {
			$('#' + cmsmasters_theme_settings.shortname + '_fixed_header').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_header_overlaps').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_header_mid_height').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_line').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_height').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_line_short_info').parents('tr').hide();
			$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_top_line_add_cont"]').parents('tr').hide();
		} else if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'default') {
			$('#' + cmsmasters_theme_settings.shortname + '_fixed_header').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_overlaps').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_mid_height').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_top_line').parents('tr').show();
			
			if ($('#' + cmsmasters_theme_settings.shortname + '_header_top_line').is(':checked')) {
				$('#' + cmsmasters_theme_settings.shortname + '_header_top_height').parents('tr').show();
				$('#' + cmsmasters_theme_settings.shortname + '_header_top_line_short_info').parents('tr').show();
				$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_top_line_add_cont"]').parents('tr').show();
			} else {
				$('#' + cmsmasters_theme_settings.shortname + '_header_top_height').parents('tr').hide();
				$('#' + cmsmasters_theme_settings.shortname + '_header_top_line_short_info').parents('tr').hide();
				$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_top_line_add_cont"]').parents('tr').hide();
			}
		}
	} );
	
	
	
	/* General 'Footer' Tab Fields Load */
	if (cmsmasters_theme_settings.header_style === 'side') {
		$('input[name*="' + cmsmasters_theme_settings.shortname + '_footer_type"]').parents('tr').hide();
		$('input[name*="' + cmsmasters_theme_settings.shortname + '_footer_additional_content"]').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_footer_logo').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_footer_logo_url').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_footer_logo_url_retina').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_footer_nav').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_footer_social').parents('tr').show();
		$('#' + cmsmasters_theme_settings.shortname + '_footer_html').parents('tr').show();
	}
} )(jQuery);

