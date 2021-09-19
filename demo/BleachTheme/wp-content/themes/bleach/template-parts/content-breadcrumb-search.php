<section class="py-3 border-bottom d-none d-md-flex">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
			    <?php if ( have_posts() ) : ?>
				<h3 class="breadcrumb-title pe-3">
				<?php
					printf( esc_html__( 'Результаты поиска: %s', 'bleach' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h3>
	            <?php endif;?>
						</div>
					</div>
</section>