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

	
	
		
	<div class="col-md-9 single">
		<div class="col-md-9 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
				<?php do_action( 'woocommerce_before_main_content' ); ?>

				<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
				global $product;
				$current_user = wp_get_current_user();

				if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id)) { ?>
	
					<div class="videoWrapper">		
						
					 	<div class='video-container'>
									<video controls loop poster="http://placehold.it/1920x1080.jpg" id="bgvid" style="width:100%;height:auto;">
									<source src="<?php echo get_post_meta($product->id, 'webm', true); ?>" type="video/webm">
									<source src="<?php echo get_post_meta($product->id, 'mp4', true); ?>" type="video/mp4">
									<source src="<?php echo get_post_meta($product->id, 'mp4', true); ?>" type="video/ogg">
									</video>
						</div>
					</div>

				<?php } else { ?>
                
                	<div class="row spacer-sing"> </div>	
                
                <?php }  ?>
				
				
				<div class="sing-tit-cont">
					
					<p class="cat"> <?php the_category(','); ?></p> 
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
					<p class="meta">
					
						<i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?>  &nbsp;
					
						<?php 
						$video = get_post_meta($post->ID, 'fullby_video', true );
						
						if($video != '') { ?>
		             			
		             		<i class="fa fa-video-camera"></i> Video
		             			
		             	<?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
		             			
		             		<i class="fa fa-th"></i> Gallery

	             		<?php } else {?>

	             		<?php } ?>
	             		
					</p>
					
				</div>

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
		 
		<div class="col-md-3">
		
			<div class="sec-sidebar sidebar">

				<?php get_sidebar( 'secondary' ); ?>	
										
		    </div>
		   
		 </div>

	</div>			

	<div class="col-md-3 sidebar">

		<?php get_sidebar( 'primary' ); ?>	
			    
	</div>


<?php get_footer( 'shop' ); ?>






