<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ProgriSaaS
 */

if ( ! function_exists( 'progrisaas_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function progrisaas_posted_on() {
		$time_string = '<time class="entry-date-default published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'progrisaas' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'progrisaas_posted_in' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function progrisaas_posted_in() {
        $categories_list = get_the_category_list( esc_html__( ' ', 'progrisaas' ) );
        $posted_in = '';
        if ( !empty( $categories_list ) ) {
            /* translators: 1: list of categories. */
            $posted_in = sprintf( esc_html__( '%1$s', 'progrisaas' ), $categories_list ); // WPCS: XSS OK.
        }
        echo '<div class="post-cat"><div class="posted-in">' . $posted_in . '</div></div>'; // WPCS: XSS OK.
    };
endif;

if ( ! function_exists( 'progrisaas_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function progrisaas_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'progrisaas' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"><i class="ot-flaticon-profile"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'progrisaas_posted_cmt' ) ) :
    function progrisaas_posted_cmt() {
        $comment_num = sprintf(
        /* translators: %s: post comment. */
        esc_html_x( '%s', 'post comment', 'progrisaas' ),
        '<a href="' .get_comments_link(). '">'. get_comments_number_text( esc_html__('0 Comments', 'progrisaas'), esc_html__('1 Comment', 'progrisaas'), esc_html__(  '% Comments', 'progrisaas') ). '</a>' );
        echo '<span class="comment-num"><i class="ot-flaticon-chat-1"></i> ' . $comment_num . '</span>';
    }
endif;

if ( ! function_exists( 'progrisaas_post_meta' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function progrisaas_post_meta() {
        $time_string = '<time class="entry-post-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( 'Post %s', 'post date', 'progrisaas' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x( 'By %s', 'post author', 'progrisaas' ),
            '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
        );

        $categories_list = get_the_category_list( esc_html__( ', ', 'progrisaas' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            $posted_in = sprintf( esc_html__( '%1$s', 'progrisaas' ), $categories_list ); // WPCS: XSS OK.
        }

        $comment_num = sprintf(
            /* translators: %s: post author. */
            esc_html_x( '%s', 'post comment', 'progrisaas' ),
            '<i class="ot-flaticon-chat-1"></i> <a href="' .get_comments_link(). '">'. get_comments_number_text( esc_html__('0 Comments', 'progrisaas'), esc_html__('1 Comment', 'progrisaas'), esc_html__(  '% Comments', 'progrisaas') ). '</a>' );

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'progrisaas' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            $tag_with = sprintf( '<span class="tags-links">' . esc_html__( '%1$s', 'progrisaas' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
        $metas = progrisaas_get_option( 'post_entry_meta' );
        if ( ! empty( $metas ) ) :
            if( in_array('author', $metas) ) echo '<span class="post-meta-left byline">' . get_avatar( get_the_author_meta('ID') , 40 ) . ' ' . $byline . '</span> ';
            if( in_array('date', $metas) ) echo '<span class="post-meta-left posted-on">' . $posted_on . '</span> ';
            if( in_array('comments', $metas) ) echo '<span class="comment-num">' . $comment_num . '</span>';
        endif;

    }
endif;

if ( ! function_exists( 'progrisaas_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function progrisaas_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'progrisaas' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tagcloud">' . esc_html__( '%1$s', 'progrisaas' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
            if( progrisaas_get_option('post_socials') ) progrisaas_socials_share();
		}

	}
endif;

/** Posts Navigation **/
if ( ! function_exists( 'progrisaas_posts_navigation' ) ) :
    function progrisaas_posts_navigation($prev = '<i class="ot-flaticon-left-arrow"></i>', $next = '<i class="ot-flaticon-right-arrow"></i>', $pages='') {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if($pages==''){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages)
            {
                $pages = 1;
            }
        }
        $pagination = array(
            'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
            'format'        => '',
            'current'       => max( 1, get_query_var('paged') ),
            'total'         => $pages,
            'prev_text'     => $prev,
            'next_text'     => $next,
            'type'          => 'list',
            'end_size'      => 3,
            'mid_size'      => 3
        );
        $return =  paginate_links( $pagination );
        echo str_replace( "<ul class='page-numbers'>", '<ul class="page-pagination none-style">', $return );
    }
endif;

/** Excerpt Section Blog Post **/
if ( ! function_exists( 'progrisaas_excerpt' ) ) :
    function progrisaas_excerpt($limit) {
    
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    
        return $excerpt;
    };
endif;

/** custom comment list **/
if ( ! function_exists( 'progrisaas_comment_list' ) ) :
    function progrisaas_comment_list($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-item'); ?>>
            <article class="comment-wrap clearfix">

                <div class="gravatar">
                    <?php echo get_avatar( $comment, 60 ); ?>
                </div>

                <div class="comment-content">
                    <div class="comment-meta">
                        <h6 class="comment-author"><?php esc_html_e('By ','progrisaas'); ?><?php printf(__('%s','progrisaas'), the_author_posts_link()) ?></h6>
                        <span class="comment-time"><?php comment_time( get_option( 'date_format' ) ); ?></span>
                    </div>
                    <div class="comment-text">
                        <?php if ($comment->comment_approved == '0'){ ?>
                            <em><?php esc_html_e('Your comment is awaiting moderation.','progrisaas') ?></em>
                        <?php }else{ ?>
                            <?php comment_text() ?>
                        <?php } ?>
                    </div>
                    <div class="comment-reply"><?php echo preg_replace( '/comment-reply-link/', 'comment-reply-link btn-details', get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))); ?></div>
                </div>

            </article>
        </li>

        <?php
    }
endif;

//Generate custom search form
function progrisaas_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '" >
    <label><span class="screen-reader-text">Search for:</span>
    <input type="search" class="search-field" placeholder="' . esc_attr__( 'Search', 'progrisaas' ) . '" value="' . get_search_query() . '" name="s" /></label>
	<button type="submit" class="search-submit"><i class="ot-flaticon-magnifiying-glass"></i></button>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'progrisaas_search_form' );

//Add span to category post count
function progrisaas_cat_count_span($links) {
    $links = str_replace('</a> (', '</a> <span class="count">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('wp_list_categories', 'progrisaas_cat_count_span');

//Add span to archive post count
function progrisaas_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="count">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'progrisaas_archive_count_span');

/** Socials Share Post**/
if ( ! function_exists( 'progrisaas_socials_share' ) ) :

    function progrisaas_socials_share(){
        $share = progrisaas_get_option( 'post_socials' );
        echo '<div class="share-post">';

        if( in_array('twit', $share) ) echo '<a class="twit" target="_blank" href="https://twitter.com/intent/tweet?text=' .get_the_title(). '&url=' .get_the_permalink(). '" title="Twitter"><i class="fab fa-twitter"></i></a>';
        if( in_array('face', $share) ) echo '<a class="face" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' .get_the_permalink(). '" title="Facebook"><i class="fab fa-facebook-f"></i></a>';
        if( in_array('pint', $share) ) echo '<a class="pint" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=' .get_the_permalink(). '&description=' .get_the_title(). '" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>';
        if( in_array('link', $share) ) echo '<a class="linked" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' .get_the_permalink(). '&title=' .get_the_title(). '&summary=' .esc_url( get_home_url('/') ). '&source=' .get_bloginfo( 'name' ). '" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>';
        if( in_array('google', $share) ) echo ' <a class="google" target="_blank" href="https://plus.google.com/share?url=' .get_the_permalink(). '" title="Google Plus"><i class="fab fa-google-plus-g"></i></a>';
        if( in_array('tumblr', $share) ) echo ' <a class="tumblr" target="_blank" href="http://www.tumblr.com/share/link?url=' .get_the_permalink(). '&name=' .get_the_title(). '&description=' .get_the_excerpt(). '" title="Tumblr"><i class="fab fa-tumblr"></i></a>';
        if( in_array('reddit', $share) ) echo '<a class="reddit" href="http://reddit.com/submit?url=' .get_the_permalink(). '&title=' .get_the_title(). '" target="_blank" title="Reddit"><i class="fab fa-reddit-alien" aria-hidden="true"></i></a>';
        if( in_array('vk', $share) ) echo '<a class="vk" href="http://vk.com/share.php?url=' .get_the_permalink(). '" target="_blank" title="VK"><i class="fab fa-vk"></i></a>';

        echo '</div>';
    };
endif;

function progrisaas_author_info_box() {

    global $post;

    $author_details = '';
    // Get author's display name - NB! changed display_name to first_name. Error in code.
    $display_name = get_the_author_meta( 'display_name', $post->post_author );

    // If display name is not available then use nickname as display name
    if ( empty( $display_name ) )
    $display_name = get_the_author_meta( 'nickname', $post->post_author );

    // Get author's biographical information or description
    $user_description   = get_the_author_meta( 'user_description', $post->post_author );
    $user_twitter       = get_the_author_meta('twitter', $post->post_author);
    $user_facebook      = get_the_author_meta('facebook', $post->post_author);
    $user_skype         = get_the_author_meta('skype', $post->post_author);
    $user_linkedin      = get_the_author_meta('linkedin', $post->post_author);
    $user_youtube       = get_the_author_meta('youtube', $post->post_author);
    $user_googleplus    = get_the_author_meta('googleplus', $post->post_author);
    $user_pinterest     = get_the_author_meta('pinterest', $post->post_author);
    $user_instagram     = get_the_author_meta('instagram', $post->post_author);
    $user_github        = get_the_author_meta('github', $post->post_author);

    // Get link to the author archive page
    $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
    if ( ! empty( $display_name ) )
    // Author avatar - - the number 90 is the px size of the image.
    $author_details .= '<div class="author-image">' . get_avatar( get_the_author_meta('ID') , 160 ) . '</div>';
    $author_details .= '<div class="author-info">';
    $author_details .= '<h5 class="title">' . esc_html__('About Author', 'progrisaas'). '</h5>';
    $author_details .= '<p class="des">' . get_the_author_meta( 'description' ). '</p>';


    $author_details .= '</div>';

    // Pass all this info to post content 
    echo '<div class="author-bio" >' . $author_details . '</div>';
}

/** Single Post Navigation **/
if ( ! function_exists( 'progrisaas_single_post_nav' ) ) :

    function progrisaas_single_post_nav(){
        echo '<div class="post-nav clearfix">';
        $class = '';
        $pcate = '';
        $ncate = '';
        if ( get_previous_post() ) {
            $ppost  = get_previous_post();
            $ptitle = get_the_title( $ppost->ID );
            $pdate  = get_the_time( get_option( 'date_format' ), $ppost->ID );
            $pimage = get_the_post_thumbnail( $ppost->ID , 'thumbnail');
            if( is_singular('ot_portfolio') ){
                $terms  = get_the_terms($ppost->ID,'portfolio_cat');
                if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
                    foreach ( $terms as $term ) { 
                        $pcate   .= $term->name. '<span> / </span>';
                    }
                }
                $pdate = $pcate; 
            }
            if( !$pimage ) $class = ' not-thumb';
            echo '<div class="post-prev'.$class.'">';
            previous_post_link( '%link', '<div class="post-nav-btn prev"><i class="ot-flaticon-left-arrow"></i></div><div class="info-post"><h6>'.$ptitle.'</h6><span>'.$pdate.'</span></div>' );
            echo '</div>';
        }
        if ( get_next_post() ) {
            $npost  = get_next_post();
            $ntitle = get_the_title( $npost->ID );
            $ndate  = get_the_time( get_option( 'date_format' ), $npost->ID );
            $nimage = get_the_post_thumbnail( $npost->ID , 'thumbnail');
            if( is_singular('ot_portfolio') ){
                $terms  = get_the_terms($npost->ID,'portfolio_cat');
                if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
                    foreach ( $terms as $term ) { 
                        $ncate   .= $term->name. '<span> / </span>';
                    }
                }
                $ndate = $ncate; 
            }
            if( !$nimage ) $class = ' not-thumb';
            echo '<div class="post-next'.$class.'">';
            next_post_link( '%link', '<div class="post-nav-btn next"><i class="ot-flaticon-right-arrow"></i></div><div class="info-post"><h6>'.$ntitle.'</h6><span>'.$ndate.'</span></div>' );
            echo '</div>';
        }
        echo '</div>';
    };
endif;

/** Related Posts **/
function progrisaas_related_posts() {

    global $post;

    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
    if( $related ) : 

    echo '<div class="related-posts">';
    echo '<h3>'.esc_html__( 'Related Posts', 'progrisaas' ).'</h3>';
    echo '<div class="row">';
    foreach( $related as $post ) {
    setup_postdata($post); ?>
    
    <div class="col-sm-6">
        <div class="post-box post-item">
            <div class="post-inner">
                <div class="entry-date <?php if(!has_post_thumbnail()) {echo 'entry-date-no-img';} ?>">
                    <span class="day"><?php the_time('d'); ?></span>
                    <span class="month"><?php the_time('M'); ?></span>
                </div>
                <div class="entry-media post-cat-abs">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'progrisaas-post-thumbnail-grid' ); ?></a>
                </div>
                <div class="inner-post">
                    <?php progrisaas_posted_in(); ?>
                    <div class="entry-header">
                        <?php the_title( '<h4 class="entry-title"><a class="title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
                    </div>
                    <?php if(progrisaas_get_option('relate_button')){ ?>
                        <a href="<?php the_permalink(); ?>" class="octf-btn octf-btn-second btn-detail"><?php echo esc_html(progrisaas_get_option('relate_button')); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php } wp_reset_postdata();

    echo '</div>';
    echo '</div>';

    endif;
};

/** Custom widget recent post **/
require get_template_directory() . '/inc/frontend/widgets/recent-posts.php';
require get_template_directory() . '/inc/frontend/widgets/author-widget.php';