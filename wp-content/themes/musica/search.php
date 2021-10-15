<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'musica' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
