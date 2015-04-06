<?php global $bp; ?>
<?php do_action( 'template_notices' ); ?>
<div class="profile_hd_container">
	<?php if (bp_is_my_profile() && bp_is_user_activity()) { ?>
		<div id="message" class="bp-template-notice updated fixed-top">
			<p>This is your profile page:</p>
		</div>
	<?php }; ?>
		<?php if ( bp_is_my_profile() && bp_is_profile_component() && bp_is_current_action( 'change-bg' )) { ?>
		<form name="bpprofbpg_change" id="bpprofbpg_change" method="post" class="standard-form" enctype="multipart/form-data">
		    
		    <?php $image_url =  bppg_get_image();
			    if(!empty($image_url)): ?>
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
		<?php } else { ?>
		<a class="edit_bg btn btn-default" href="<?php bp_loggedin_user_domain(); ?>profile/change-bg/"><i class="icon-image"></i>BG Image</a>
		<?php } ?>


<div class="profile_header" data-type="background" data-speed="8">
	
</div>
</div>
<div id="buddypress">
	

		
		<?php // echo bp_displayed_user_id(); ?>




	<?php do_action( 'bp_before_member_home_content' ); ?>

	<div class="col-md-9 col-sm-8 col-xs-12 single">
		<div id="item-header" role="complementary" class="panel widget">
		<?php bp_get_template_part( 'members/single/member-header' ) ?>
	</div><!-- #item-header -->
		<div class="col-md-12 single-in">
			<div class="sing-cont">
					
					<div class="sing-spacer">

										<div id="item-body" role="main">

		<?php do_action( 'bp_before_member_body' );

		if ( bp_is_user_activity() || !bp_current_component() ) :
			bp_get_template_part( 'members/single/activity' );

		elseif ( bp_is_user_blogs() ) :
			bp_get_template_part( 'members/single/blogs'    );

		elseif ( bp_is_user_friends() ) :
			bp_get_template_part( 'members/single/friends'  );

		elseif ( bp_is_user_groups() ) :
			bp_get_template_part( 'members/single/groups'   );

		elseif ( bp_is_user_messages() ) :
			bp_get_template_part( 'members/single/messages' );

		elseif ( bp_is_user_profile() ) :
			bp_get_template_part( 'members/single/profile'  );

		elseif ( bp_is_user_forums() ) :
			bp_get_template_part( 'members/single/forums'   );

		elseif ( bp_is_user_notifications() ) :
			bp_get_template_part( 'members/single/notifications' );

		elseif ( bp_is_user_settings() ) :
			bp_get_template_part( 'members/single/settings' );

		// If nothing sticks, load a generic template
		else :
			bp_get_template_part( 'members/single/plugins'  );

		endif;

		do_action( 'bp_after_member_body' ); ?>

	</div><!-- #item-body -->


					</div>

				</div>	
		</div>	
		 
		
	</div>

	<?php do_action( 'bp_after_member_home_content' ); ?>





</div><!-- #buddypress -->

