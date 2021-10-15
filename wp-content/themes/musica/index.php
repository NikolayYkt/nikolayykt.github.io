<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
     			<div id="content" class="hero">
     			   <div class="row">
     			   	<div class="col-10">
     			   <h2 class="entry-title"><?php bloginfo('name');?></h2>
     			   </div>
     			   <div class="row str">
     			   <div class="col-3 block-guid">
     			   	<div class="row-a">
     			   <h4 class="red"><?php echo get_cat_name(7); ?></h4>&nbsp;<h4>(Наруто)</h4>
     			   </div>
                   <?php echo category_nbwar(7);?>
                   </div>                
                   <div class="col-3 block-guid">
                   	<div class="row-a">
                   <h4 class="green"><?php echo get_cat_name(10); ?></h4>&nbsp;<h4>(Наруто)</h4>
                    </div>
                   <?php echo category_nbwar(10);?>
                     </div>       
                   <div class="col-3 block-guid">  
                   <div class="row-a">              
                   <h4 class="blue"><?php echo get_cat_name(11); ?></h4>&nbsp;<h4>(Наруто)</h4>
                    </div>
                   <?php echo category_nbwar(11);?>     
                   </div>    
                   <div class="col-3 block-guid">
                   	<div class="row-a">
                   <h4 class="red"><?php echo get_cat_name(8); ?></h4>&nbsp;<h4>(Блич)</h4>
                    </div>
                   <?php echo category_nbwar(8);?> 
                   </div>         
                  <div class="col-3 block-guid">
                  	<div class="row-a">
                   <h4 class="green"><?php echo get_cat_name(9); ?></h4>&nbsp;<h4>(Блич)</h4>  
                   </div>
                   <?php echo category_nbwar(9);?> 
                   </div>    
                   <div class="col-3 block-guid">            
                   <div class="row-a">       
                   <h4 class="blue"><?php echo get_cat_name(12); ?></h4>&nbsp;<h4>(Блич)</h4>  
                   </div>
                   <?php echo category_nbwar(12);?>  
                   </div> 
                   </div><!--row-->            
			</div><!-- #content -->
		</div><!--col-6-->
		</div><!-- #row -->
				<div class="col-2 hidden">
		<?php get_sidebar('right');?><!--col-3-->
		</div> 
    </div><!-- #container -->

</main>
<?php
get_footer();