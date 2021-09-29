		<?php
		function category_nbwar($real){
		query_posts( 'category__in='.$real.'');
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				musica_post_thumbnail(); 
			endwhile;
           

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		wp_reset_query();
	}
		?>