<?php 
/*
Template Name: Left Main
*/
get_header(); ?>			
		<div class="row">
<div class="buddyb">		
	<div class="col-md-9 col-sm-8 single">
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
				
				<div class="sing-tit-cont">
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
				</div>

				<div class="sing-cont">
					
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

	<div class="col-md-3 col-sm-4 sidebar">
	<div class="well"> <?php get_sidebar( 'primary' ); ?></div>
		    
	</div>
		
<?php get_footer(); ?>