<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package musicA
 */
get_header();
?>
<main id="site-main">
    <div class="container">
     	<div class="row">
		<div class="col-2">
		<?php get_sidebar();?><!--col-3-->
		</div>     		
     		<div class="col-6">
     			<div id="content">
     				<div class="container">
     					<article id="post-7" class="post-7 page type-page status-publish hentry">
	<header class="entry-header">
		<h1 class="entry-title">Страница 404</h1>	</header><!-- .entry-header -->

	
	<div class="entry-content">
		
<p><?php esc_html_e( 'Ой! Эта страница не может быть найдена.', 'musica' ); ?></p>
	</div><!-- .entry-content -->

			<footer class="entry-footer">
            </footer><!-- .entry-footer -->
	</article>
		    </div>
			</div><!-- #site-main -->
		</div><!--col-6-->
		<div class="col-2 hidden">
		<?php get_sidebar('right');?><!--col-3-->
		</div> 
		</div><!-- #row -->
    </div><!-- #container -->

</main>
<?php
get_footer();
