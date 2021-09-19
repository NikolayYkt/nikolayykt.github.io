<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bleach
 */

?>

		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

<footer id="colophon" class="site-footer">
<section class="py-4 bg-dark-1">
				<div class="container">
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				    </div>
					<hr>
					<div class="row row-cols-1 row-cols-md-2 align-items-center">
						<div class="col">
							<p class="mb-0">
			<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bleach' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Сайт работает на %s', 'bleach' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'тема: %1$s | автор: %2$s.', 'bleach' ), 'bleach', '<a href="http://GetUnitXNikolay@yandex.ru">Nikolay Web</a>' );
				?>
		</div><!-- .site-info -->
							</p>
						</div>
						<div class="col text-end">
						</div>
					</div>
					<!--end row-->
				</div>
			</section>		
	</footer><!-- #colophon -->
</div><!-- #page -->
<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class="bx bx-cog bx-spin"></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Настройки Темы</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr>
			<p class="mb-0">Цветовая текстура</p>
			<hr>
			<ul class="switcher">
				<li id="theme1"></li>
				<li id="theme2"></li>
				<li id="theme3"></li>
				<li id="theme4"></li>
				<li id="theme5"></li>
				<li id="theme6"></li>
			</ul>
			<hr>
			<p class="mb-0">Градиентный фон</p>
			<hr>
			<ul class="switcher">
				<li id="theme7"></li>
				<li id="theme8"></li>
				<li id="theme9"></li>
				<li id="theme10"></li>
				<li id="theme11"></li>
				<li id="theme12"></li>
				<li id="theme13"></li>
				<li id="theme14"></li>
				<li id="theme15"></li>
			</ul>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>