<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bleach
 */

?>

<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<img class="card-img-top" src="<?php echo get_the_post_thumbnail_url();?>">
			<div class="card-body">
				
					
	<header class="entry-header">	
		<?php

		if ( 'post' === get_post_type() ) :
			?>
			<div class="list-inline">
		<a href="<?php echo get_permalink() ;?>" class="list-inline-item"><i class="bx bx-user me-1"></i><?php the_author();?></a>
		<a href="<?php echo get_permalink() ;?>" class="list-inline-item"><i class="bx bx-comment-detail me-1"></i><?php comments_number(); ?></a>
		<a href="<?php echo get_permalink() ;?>" class="list-inline-item"><i class="bx bx-calendar me-1"></i><?php echo get_the_date('F j Y');?></a>	
		</div>		
		<?php endif; ?>
	</header><!-- .entry-header -->

<?php

if ( is_singular() ) :
			the_title( '<h1 class="mt-4">', '</h1>' );
		else :
			the_title( '<h4 class="mt-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
?>
		<?php
		the_excerpt(
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


	<footer>
      <a href="<?php echo get_permalink() ;?>" class="btn btn-light btn-ecomm">Подробнее <i class="bx bx-chevrons-right"></i></a>
	</footer><!-- .entry-footer -->
		</div><!-- .card-body -->
</article><!-- #post-<?php the_ID(); ?> -->
