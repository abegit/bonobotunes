<?php get_header(); ?>	
		<div class="wrap buddyb">
	<div class="col-md-9 single">
	<div class="profile_header" data-type="background" data-speed="3"></div>
		<div class="col-md-9 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
				<?php if ( $data = bp_get_profile_field_data( 'field=ccbillaffil&user_id='.$author_id ) ) : ?>
 					<?php $buyLinkHref = 'http://refer.ccbill.com/cgi-bin/clicks.cgi?CA=900936-1000&PA='.$data.'&HTML='.site_url().'/?add-to-cart='.$post->ID;  ?>
				<?php endif ?>




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
		 
		<div class="col-md-3">
		
			<div class="sec-sidebar sidebar">
				

				<?php get_sidebar( 'secondary' ); ?>	
										
		    </div>
		   
		 </div>

	</div>			

	<div class="col-md-3 sidebar">

		<?php get_sidebar( 'primary' ); ?>	
		    
	</div>
		</div>
<?php get_footer(); ?>