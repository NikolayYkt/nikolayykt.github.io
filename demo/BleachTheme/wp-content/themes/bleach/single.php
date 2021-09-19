<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bleach
 */

get_header();
?>

<div class="page-content">
<?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
<section class="py-4">
<div class="container">
<div class="row">
	 <div class="col-12 col-lg-9">
	 	<div class="blog-right-sidebar p-3">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	  </div>
	</div>
<div class="col-12 col-lg-3">	
<div class="blog-left-sidebar p-3 ">	
<?php get_sidebar();?>
</div>
</div>
    </div><!--row-->
  </div><!--container-->
  </section>
</div><!--page-content-->

<?php
get_footer();
