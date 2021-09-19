<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bleach
 */

get_header();
?>
<div class="page-content">
<?php get_template_part( 'template-parts/content', 'breadcrumb-search' ); ?>
<section class="py-4">
<div class="container">
<div class="row">
	 <div class="col-12 col-lg-9">
       <div class="blog-right-sidebar p-3">
       	<header class="d-lg-none d-xl-block d-xl-none d-md-none d-lg-block">
         <h4 class="mt-4"><?php printf( esc_html__( 'Результаты поиска: %s', 'bleach' ), '<span>' . get_search_query() . '</span>' );?></h4>
	</header><!-- .entry-header -->
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'main' );

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
</div>
<?php
get_footer();
