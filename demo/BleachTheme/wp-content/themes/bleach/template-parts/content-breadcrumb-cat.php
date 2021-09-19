<section class="py-3 border-bottom d-none d-md-flex">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
								<?php if ( have_posts() ) : ?>
				<?php
				the_archive_title( '<h3 class="breadcrumb-title pe-3">', '</h3>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
		                         <?php endif;?>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="<?php echo home_url();?>"><i class="bx bx-home-alt"></i> Главная</a>
										</li>						
                                          <li class="breadcrumb-item active"><a href=""><?php the_category( ' &bull; ' );?></a>			
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
</section>