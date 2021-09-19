<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bleach
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="d-lg-none d-xl-block d-xl-none d-md-none d-lg-block">
		<?php
		if ( is_singular() ) :
			the_title( '<h4 class="mt-4">', '</h4>' );
		else :
			the_title( '<h4 class="mt-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;

?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bleach' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bleach' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Редактировать <span class="screen-reader-text">%s</span>', 'bleach' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->