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

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>


			<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

				global $product;
				$current_user = wp_get_current_user();

				if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id)) { ?>
					<video controls loop poster="http://placehold.it/1920x1080.jpg" id="bgvid" style="width:100%;height:auto;">
					<source src="<?php echo get_post_meta($product->id, 'webm', true); ?>" type="video/webm">
					<source src="<?php echo get_post_meta($product->id, 'mp4', true); ?>" type="video/mp4">
					<source src="<?php echo get_post_meta($product->id, 'mp4', true); ?>" type="video/ogg">
					</video>
		  <?php } else {} ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>