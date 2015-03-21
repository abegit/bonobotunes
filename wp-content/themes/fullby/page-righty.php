<?php 
/*
Template Name: Right Main
*/
get_header(); ?>			
		<div class="wrap">
<div class="buddyb wrap">		
	<div class="col-md-9 single col-md-push-3">
		<?php $video = get_post_meta($post->ID, 'fullby_video', true );
				  
				if($video != '') {?>
	
					<div class="videoWrapper">
					 	<div class='video-container'><iframe title='YouTube video player' width='400' height='275' src='http://www.youtube.com/embed/<?php echo $video; ?>' frameborder='0' allowfullscreen></iframe></div>
					</div>
             	<?php } else if ( has_post_thumbnail() ) { ?>
	                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>
                <?php } else { ?>
                <?php }  ?>

		<div class="single-in col-md-12">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

				<?php if ( has_post_thumbnail() ) { ?>

                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>

                <?php } else { ?>
                
                	<!-- <div class="row spacer-sing"></div>	 -->
                
                 <?php }  ?>
				

				<div class="sing-cont">
					
					<div class="sing-spacer">
					
						<?php the_content('Leggi...');?>
						<div class="clear"></div>
          <div class="alert alert-info" role="alert">
          	<a href="/contact" class="alignright btn btn-primary"><i class="icon-user4"></i><span aria-hidden="true">Contact Us</span></a><strong>Want to learn more?</strong> Give us a holler!
      </div>
					</div>

				</div>	
				 					
			<?php endwhile; ?>
	        <?php else : ?>

	                <p>Sorry, no posts matched your criteria.</p>
	         
	        <?php endif; ?> 
	        
		</div>	
		 

	</div>			

	<div class="col-md-3 col-md-pull-9 sidebar">
	<div class="well"> <?php get_sidebar( 'primary' ); ?></div>
		    
	</div>
		
<?php get_footer(); ?>