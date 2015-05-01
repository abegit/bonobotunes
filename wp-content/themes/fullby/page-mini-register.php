<?php 
/*
Template Name: Mini Register
*/
get_header('register'); ?>			
<?php if ( has_post_thumbnail() ) {
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
						$thumb_url = $thumb_url_array[0]; ?>
						<img src="<?php echo $thumb_url;?>" style="display:none;">
			<?php } else { ?>
                 <?php }  ?>
                 
	<div class="col-md-12 single">
		<div class="col-md-6 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
	
				<div class="sing-tit-cont">
					<h3 class="sing-tit">Login to Begin.</h3>
				</div>
				<div>
					<div class="sing-spacer">
						<?php the_content('Leggi...');?>
					</div>

				</div>	
				 					
			<?php endwhile; ?>
	        <?php else : ?>

	                <p>Sorry, no posts matched your criteria.</p>
	         
	        <?php endif; ?> 
		</div>	
	</div>			
<?php get_footer('minimal'); ?>			
