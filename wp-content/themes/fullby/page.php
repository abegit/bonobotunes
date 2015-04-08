<?php get_header(); ?>			
		<div class="row">
		<div class="buddyb">
	<div class="col-md-9 single">
	
		<div class="col-md-9 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

				<?php if ( has_post_thumbnail() ) { ?>

                    <?php the_post_thumbnail('single', array('class' => 'sing-cop')); ?>

                <?php } else { ?>
                
                
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
		 
		<div class="col-md-3 sidebar">
            <div class="sec-sidebar well"> <?php get_sidebar( 'primary' ); ?> </div>
         </div>

	</div>			

	<div class="col-md-3 sidebar">
		<div class="well"> <?php get_sidebar( 'secondary' ); ?> </div>
	</div>
<?php get_footer(); ?>