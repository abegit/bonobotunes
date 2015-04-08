<?php get_header('player'); ?>			
		<div class="wrap">
		<div class="wrap">
	<div class="col-md-9 col-sm-8 single">
		<div class="col-md-9 col-sm-8 single-in">
			<audio autoplay controls="controls" src="<?php echo pg_enc(); ?>">
				</audio>
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
			
				<?php if ( has_post_thumbnail() ) { ?>

                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>

                <?php } ?>
				
					
				<div class="sing-tit-cont">
					
					<p class="cat"> <?php the_category(','); ?></p> 
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
					<p class="meta">
					
						<i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?>  &nbsp;
					
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
						
						<?php the_content('Leggi...');?>
						

	<?php 	$medias =& get_children( array (
		'post_parent' => $post->ID,
		'post_type' => 'attachment'
	));

	if ( empty($medias) ) {
		// no attachments here
	} else {
		foreach ( $medias as $attachment_id => $attachment ) {
			echo do_shortcode("[video file='".wp_get_attachment_link( $attachment_id )."']");
		}
	} ?>
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
		 
		<div class="col-md-3 col-sm-4 sidebar">
		
			<div class="sec-sidebar well">

				<?php get_sidebar( 'secondary' ); ?>	
										
		    </div>
		   
		 </div>

	</div>			

	<div class="col-md-3 col-sm-4 sidebar">

		<?php get_sidebar( 'primary' ); ?>	
			    
	</div>
</div>
<?php get_footer('player'); ?>