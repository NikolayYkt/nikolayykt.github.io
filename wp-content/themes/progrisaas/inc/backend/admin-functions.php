<?php

//Admin Style
if ( ! function_exists( 'progrisaas_custom_wp_admin_style' ) ) :
    function progrisaas_custom_wp_admin_style() {
        wp_register_style( 'progrisaas_custom_wp_admin_css', get_template_directory_uri() . '/inc/backend/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'progrisaas_custom_wp_admin_css' );
        
        wp_enqueue_script( 'progrisaas_custom_wp_admin_js', get_template_directory_uri()."/inc/backend/js/admin-script.js", array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'progrisaas_custom_wp_admin_js' );
    }
    add_action( 'admin_enqueue_scripts', 'progrisaas_custom_wp_admin_style' );
endif;

//Upload SVG file
function progrisaas_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'progrisaas_mime_types', 10, 1);