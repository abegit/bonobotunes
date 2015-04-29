<?php get_header('register'); ?>			


	<div class="col-md-12 single">
		<div class="col-md-6 single-in">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
	
				<?php if (bp_get_current_signup_step() !== 'completed-confirmation' ) { ?>
				<div class="sing-tit-cont">
					<h3 class="sing-tit">or Sign Up!</h3>
				</div>
				<?php } else { ?>
				<div class="sing-tit-cont">
					<h3 class="sing-tit">One Last Step!</h3>
				</div>
				<?php } ?>
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

	
<!-- <video autoplay loop muted id="bgvid" style="position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -100;
  background: url('//demosthenes.info/assets/images/polina.jpg') no-repeat;
  background-size: cover;
  transition: 1s opacity;">
<source src="<?php bloginfo('stylesheet_directory'); ?>/img/20121117_patreus_vicky_vixen.webm" type="video/webm">
</video> -->


<?php get_footer('minimal'); ?>