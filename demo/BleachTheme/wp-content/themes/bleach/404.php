<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bleach
 */

get_header();
?>
			<div class="page-content">
		<section class="error-404 not-found">
				<div class="container"> 
					<div class="row">
			<header class="page-header">
				<h4 class="mt-4"><?php esc_html_e( 'Ой! Эту страницу невозможно найти.', 'bleach' ); ?></h4>
			</header><!-- .page-header -->

       </div><!-- .row -->	
		</div><!-- .container -->	
		</section><!-- .error-404 -->
		</div><!-- .page-content -->	
<?php
get_footer();
