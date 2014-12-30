<?php get_header(); ?>	
		<div class="wrap buddyb">
	<div class="col-md-9 single">
		<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
				<?php if ( $data = bp_get_profile_field_data( 'field=ccbillaffil&user_id='.$author_id ) ) : ?>
 					<?php $buyLinkHref = 'http://refer.ccbill.com/cgi-bin/clicks.cgi?CA=900936-1000&PA='.$data.'&HTML='.site_url().'/register?friend='.$data;  ?>
				<?php endif; ?>
	<div class="profile_header" data-type="background" data-speed="3">
		<?php if ( bp_current_component() == 'activity') : ?>
		<a class="edit_bg" href="<?php bp_loggedin_user_domain(); ?>profile/change-bg/"><i class="icon-image"></i>BG Image</a>
		<?php elseif ( bp_is_my_profile() && bp_is_profile_component() && bp_is_current_action( 'change-bg' )) : ?>
		<form name="bpprofbpg_change" id="bpprofbpg_change" method="post" class="standard-form" enctype="multipart/form-data">
		    
		    <?php $image_url=  bppg_get_image();
			    if(!empty($image_url)):?>
			    <div id="bg-delete-wrapper"> <a href='#' id='bppg-del-image'>Delete</a></div>
			   <?php endif;?> 
		    
		    <label for="bprpgbp_upload">
			<input type="file" name="file" id="bprpgbp_upload"  class="settings-input" />
		</label>
			<p>If you want to change your profile background, please upload a new image.
		    </p>
			
		    	<br />
		<?php wp_nonce_field("bp_upload_profile_bg");?>
		    <input type="hidden" name="action" id="action" value="bp_upload_profile_bg" />
		 <p class="submit"><input type="submit" id="bpprofbg_save_submit" name="bpprofbg_save_submit" class="button" value="<?php _e('Save','bppg') ?>" /></p>
		</form>



		<?php endif; ?>
	</div>
		<div class="col-md-9 single-in">
		
			

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