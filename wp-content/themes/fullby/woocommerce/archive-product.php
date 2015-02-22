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
<script>
	// search popup
// var jaMn = jQuery.noConflict();
// 	// search popup
// jaMn(document).ready(function() {
// 		// When clicking on the button close or the mask layer the popup closed
// 		jaMn(window).load(function() {
// 			jaMn('.sing-spacer *').fadeIn('1500');
// 		});
});


</script>
<?php do_action( 'woocommerce_before_main_content' ); ?>
	<div class="wrap">
	<div class="col-md-12 single">
		<div class="col-md-12 single-in">
		
				
				<div class="sing-tit-cont">
					
					<h3 class="sing-tit"><?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : woocommerce_page_title(); endif; ?></h3>
				</div>

				<div class="sing-cont">
					
					<div class="sing-spacer">
<?php if ( have_posts() ) : ?>
	<?php do_action( 'woocommerce_before_shop_loop' ); ?>
	<?php woocommerce_product_loop_start(); ?>
	<?php woocommerce_product_subcategories(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php wc_get_template_part( 'content', 'product' ); ?>
<?php endwhile; // end of the loop. ?>
<?php woocommerce_product_loop_end(); ?>
<?php do_action( 'woocommerce_after_shop_loop' ); ?>
<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
<?php wc_get_template( 'loop/no-products-found.php' ); ?>
<?php endif; ?>
					</div>
				</div>			

	
		</div>
	</div>

<?php do_action( 'woocommerce_after_main_content' ); ?>
<?php get_footer(); ?>






