<?php get_header(); ?>			
		
	<div class="col-md-9 single">
		<div class="col-md-12 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

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

	<div class="col-md-3 sidebar">

		<?php get_sidebar( 'primary' ); ?>	
		    
	</div>
		
<?php get_footer(); ?>