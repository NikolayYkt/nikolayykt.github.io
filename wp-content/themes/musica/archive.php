<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		    </div>
			</div><!-- #site-main -->
		</div><!--col-6-->
		<div class="col-2 hidden">
		<?php get_sidebar('right');?><!--col-3-->
		</div> 
		</div><!-- #row -->
    </div><!-- #container -->
	</main><!-- #main -->

<?php
get_footer();
