<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

	
	
<div class="wrap">
	<div class="col-md-9 single">
		<div class="col-md-9 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

				<?php do_action( 'woocommerce_before_main_content' ); ?>

				<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
					global $product;
					$current_user = wp_get_current_user();
					$author_id = $post->post_author; ?>
				




				<div class="sing-cont">
					
					<div class="sing-spacer">
					
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
						<?php do_action( 'woocommerce_after_main_content' ); ?>
						
						<?php wp_link_pages('pagelink=Page %'); ?>

						<p>
							<?php $post_tags = wp_get_post_tags($post->ID); if(!empty($post_tags)) {?>
								<span class="tag"> <i class="fa fa-tag"></i> <?php the_tags('', ', ', ''); ?> </span>
							<?php } ?>
						</p>

						<hr /> 
						
						<div id="comments">
						        
							<?php comments_template(); ?>
						
						</div> 

					</div>

				</div>
				 					
			<?php endwhile; ?>
	        <?php else : ?>

	                <p>Sorry, no posts matched your criteria.</p>
	         
	        <?php endif; ?> 
	        
		</div>	
		 
		<div class="col-md-3 sidebar">
		
			<div class="sec-sidebar well">

				<?php get_sidebar( 'primary' ); ?>	
										
		    </div>
		   
		 </div>

	</div>			

	<div class="col-md-3 sidebar">
		<div class="well"> <?php get_sidebar( 'secondary' ); ?> </div>
	</div>


<?php get_footer(); ?>






