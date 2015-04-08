<?php get_header(); ?>			
		<div class="row">
		<div class="buddyb">
	<div class="col-md-9 single">
	
		<div class="col-md-12 single-in">
		
	
				
				<div class="sing-tit-cont">
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
				</div>

				<div class="sing-cont">
					
					<div class="sing-spacer">
					
						<?php the_content('Leggi...');?>
						
					</div>

				</div>	
				 					
			
	        
		</div>	
		 
	

	</div>			

	<div class="col-md-3 sidebar">
		<div class="well"> <?php get_sidebar( 'primary' ); ?> </div>
	</div>
<?php get_footer(); ?>