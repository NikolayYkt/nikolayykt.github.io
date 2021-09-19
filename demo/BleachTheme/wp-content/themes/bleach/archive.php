<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bleach
 */

get_header();
?>
<div class="page-content">
<?php get_template_part( 'template-parts/content', 'breadcrumb-cat' ); ?>
<section class="py-4">
<div class="container">
<div class="row">
	 <div class="col-12 col-lg-9">
	 	<div class="blog-right-sidebar p-3">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'main'  );

			endwhile;?>

		  <div class="bleach-pagination"><?php echo paginate_links();?></div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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
