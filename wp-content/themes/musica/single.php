<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


		endwhile; // End of the loop.
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
