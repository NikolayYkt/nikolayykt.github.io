<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProgriSaaS
 */

$format = get_post_format();

$gallery_img  = get_post_meta(get_the_ID(),'post_gallery', true);
$post_image  = get_post_meta(get_the_ID(),'post_image', true);
$bg_video  = get_post_meta(get_the_ID(),'bg_video', true);
$link_video  = get_post_meta(get_the_ID(),'post_video', true);
$link_audio  = get_post_meta(get_the_ID(),'post_audio', true);
$link_link   = get_post_meta(get_the_ID(),'post_link', true);
$text_link   = get_post_meta(get_the_ID(),'text_link', true);
$quote_text  = get_post_meta(get_the_ID(),'post_quote', true);
$quote_name  = get_post_meta(get_the_ID(),'quote_name', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
	<div class="post-inner <?php if(($format=='gallery' && $gallery_img != '' ) || ($format == 'image' && $post_image !='' ) || ($format == 'video' && $bg_video !='') || ($format == '' && has_post_thumbnail() )){echo 's1';}else { echo's2';} ?>">
		<?php if(progrisaas_get_option('blog_date')){ ?>
		<div class="entry-date">
			<span class="day"><?php the_time('d'); ?></span>
			<span class="month"><?php the_time('M'); ?></span>
		</div>
		<?php } ?>
	    <?php if( $format == 'gallery' ) { ?>

			<div class="entry-media">
				<div class="gallery-post owl-carousel owl-theme">
				<?php if( function_exists( 'rwmb_meta' ) ) { $images = rwmb_meta( 'post_gallery', array( 'size' =>'full' ) );  ?>
		            <?php if($images){ ?>              
		                <?php foreach ( $images as $image ) { ?>
							<div class="item-image">
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>">
							</div>                
		                <?php } ?>                
		            <?php } ?>
		        <?php } ?>
		        </div>
			</div>			

	    <?php }elseif( $format == 'image' ) { ?>

	    	<div class="entry-media">
				<?php if( function_exists( 'rwmb_meta' ) ) {  $images = rwmb_meta( 'post_image', array( 'size' =>'full' ) ); ?>
				    <?php if($images){ ?>              
				        <?php foreach ( $images as $image ) { ?>				            
				            <a href="<?php the_permalink(); ?>">
				            	<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>">
				            </a>
				        <?php } ?>                
				    <?php } ?>
				<?php } ?>
			</div>
			
	    <?php }elseif( $format == 'audio' ){ ?>

			<div class="audio-box padding-box">
				<iframe scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
			</div>

	    <?php }elseif( $format == 'video' ){ ?>

			<div class="entry-media">
				<?php if( function_exists( 'rwmb_meta' ) ) { $images = rwmb_meta( 'bg_video', array( 'size' =>'full' ) ); ?>
					<?php if($images){ ?>     
						<div class="video-popup">        
							<a class="btn-play" href="<?php echo esc_url( $link_video ); ?>">
								<i class="ot-flaticon-play"></i>
							</a> 
						</div>
				        <?php  foreach ( $images as $image ) {  ?>
				            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>">
				        <?php } ?>                
				    <?php } ?>
				<?php } ?>
			</div>

	    <?php }elseif( $format == 'link' ){ ?>
	    	<?php if($text_link){ ?>
			<div class="link-box padding-box">
				<i class="ot-flaticon-link1"></i>
				<a href="<?php echo esc_url( $link_link ); ?>"><?php echo esc_html( $text_link ); ?></a>
			</div>
			<?php } ?>

	    <?php }elseif( $format == 'quote' ){ ?>
	    	<?php if($quote_text){ ?>
			<div class="quote-box padding-box font-second">
				<i class="ot-flaticon-left-quotes-sign"></i>
				<div class="quote-text">
					<?php echo esc_html( $quote_text ); ?>
					<span><?php echo esc_html( $quote_name ); ?></span>
				</div>
			</div>
			<?php } ?>

	    <?php }elseif ( has_post_thumbnail() ) { ?>

	        <div class="entry-media">
	            <a href="<?php the_permalink(); ?>">
	                <?php the_post_thumbnail(); ?>
	            </a>
	        </div>
	        
	    <?php } ?>
		<div class="inner-post">
			<?php if(progrisaas_get_option('blog_categories')){ ?>
				<?php progrisaas_posted_in(); ?>
			<?php } ?>
	        <div class="entry-header">

	            <?php the_title( '<h3 class="entry-title"><a class="title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	        </div><!-- .entry-header -->

	        <?php if(the_excerpt()){ ?>
	        <div class="entry-summary the-excerpt">

	            <?php the_excerpt(); ?>

	        </div><!-- .entry-content -->
	        <?php } ?>

	        <?php if(progrisaas_get_option('blog_author_post') || progrisaas_get_option('blog_comment_post')){ ?>
	        <div class="entry-meta">
				<?php if(progrisaas_get_option('blog_author_post')){ ?>
	        		<?php progrisaas_posted_by(); ?>
        		<?php } ?>
				<?php if(progrisaas_get_option('blog_comment_post')){ ?>
	        		<?php progrisaas_posted_cmt(); ?>
	        	<?php } ?>
	        </div>
	        <?php } ?>

	        
            <?php if(progrisaas_get_option('blog_read_more')){ ?>
            <div class="entry-footer">
                <?php if(progrisaas_get_option('blog_read_more')){ ?><a href="<?php the_permalink(); ?>" class="octf-btn btn-small octf-btn-second btn-detail"> <?php echo esc_html(progrisaas_get_option('blog_read_more')); ?></a><?php } ?>
            </div>
            <?php } ?>
	    </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
