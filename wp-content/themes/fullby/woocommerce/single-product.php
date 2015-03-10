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
					$author_id = $post->post_author;

					if ( has_post_thumbnail() ) {
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'video', true);
						$thumb_url = $thumb_url_array[0];
					}

					// Add items to the footer
					function add_requirejs() {
						$vid_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'video' );
						$small_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'smallvideo' );
						
						echo '<style media="screen"> .videoWrapper {background-image:url('. $vid_thumb[0] .') !important} </style>';
						echo '<style media="screen and (max-width:760px)"> .videoWrapper {background-image:url('. $small_thumb[0] .') !important} </style>';

					}
					add_filter('wp_footer', 'add_requirejs');

				// checks if user bought product
			if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id)) { 
					$buyLink = 'Purchased'; ?>
		
						<div class="videoWrapper">		
						 		<?php $abevidURL = get_post_meta($product->id, 'mp4', true);
						 		echo do_shortcode('[KGVID poster="'.$thumb_url.'" view_count="true" autoplay="false" right_click="true" resize="true" embedcode="html code"]'.$abevidURL.'[/KGVID]'); ?>
						</div>

			<?php 	} else { 
						// fires if user has not bought product 
							if ( $data = bp_get_profile_field_data( 'field=ccbillaffil&user_id='.$author_id ) ) :
								$buyLinkHref = 'http://refer.ccbill.com/cgi-bin/clicks.cgi?CA=900936-1000&PA='.$data.'&HTML='.site_url().'/?add-to-cart='.$post->ID; 
	 	 					endif ?>
						  	<?php $buyLink = '<button onClick="location.href='.$buyLinkHref.'" class="button alt" alt="Continue to Checkout">Add To Collection</button>'; ?>

	                	<div class="videoWrapper" style="cursor:pointer; background: repeat scroll 0 0 / cover #000;" onClick="location.href='<?php echo $buyLinkHref; ?>'">
	                		<button class="button alt" onClick="location.href='<?php echo $buyLinkHref; ?>'" alt="Play Video"><i class="icon-play3"></i></button>
			                    <?php // the_post_thumbnail('video'); ?>
			                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/16px.png" style="width:100%;">
						</div>	    

			<?php }  ?>
				





				
				<div class="sing-tit-cont">
					
					<p class="cat"> <?php the_category(','); ?></p> 
					<p style="float:right;"><?php echo $buyLink; ?></p>
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
					<p class="meta"><?php echo bp_core_fetch_avatar( array( 'item_id' => $author_id ) );
							echo BP_Friends_Friendship::total_friend_count( $author_id );
							 $args = array(
								    'field'     => 'Occupation',
								    'user_id'   => $author_id
								); ?>
						<i class="fa fa-user"></i> <?php echo bp_core_get_userlink( $author_id, $no_anchor = false, $just_link = false ); ?> <?php bp_profile_field_data( $args ); ?>  &nbsp;
							<?php if (!is_user_logged_in()) {
								echo "<a href='../register' class='button'>Bonobo</a>";
							} else {
								bp_add_friend_button( $author_id );
							} ?>
						<?php $video = get_post_meta($post->ID, 'fullby_video', true );
						
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
		 
		<div class="col-md-3 sidebar">
		
			<div class="sec-sidebar well">

				<?php get_sidebar( 'secondary' ); ?>	
										
		    </div>
		   
		 </div>

	</div>			

	<div class="col-md-3 sidebar">
		<div class="well"> <?php get_sidebar( 'primary' ); ?> </div>
	</div>

<script>
	if (document.addEventListener) {
        document.addEventListener('contextmenu', function(e) {
            alert("You've tried to open context menu"); //here you draw your own menu
            e.preventDefault();
        }, false);
    } else {
        document.attachEvent('oncontextmenu', function() {
            alert("You've tried to open context menu");
            window.event.returnValue = false;
        });
    }
</script>

<?php get_footer(); ?>






