<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package musicA
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside id="widget-area-right">
	<div class="container">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
</aside><!-- #secondary -->
