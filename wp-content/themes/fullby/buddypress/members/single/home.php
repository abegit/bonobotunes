<?php global $bp; ?>
<?php do_action( 'template_notices' ); ?>
<div class="profile_hd_container profile_header">
	<?php if (bp_is_my_profile()) { ?>
		<div id="message" class="bp-template-notice updated">
			<p>This is your profile page:</p>
		</div>
	<?php }; ?>

<a class="edit_bg btn btn-default" href="<?php bp_loggedin_user_domain(); ?>profile/change-bg/"><i class="icon-image"></i>BG Image</a>
<div class="profile_header" data-type="background" data-speed="3">
	
</div>
</div>
<div id="buddypress">
	

		
		<?php $author_id = wp_get_current_user()->ID; ?>
		<?php $has_members_str = "user_id=" . $author_id; ?>




	<?php do_action( 'bp_before_member_home_content' ); ?>

	<div class="col-md-9 single">
		<div id="item-header" role="complementary" class="panel widget">
		<?php bp_get_template_part( 'members/single/member-header' ) ?>
	</div><!-- #item-header -->
		<div class="col-md-9 single-in">
<!-- 	<?php 
global $bp;
foreach ( (array)$bp as $key => $value ) {
    echo '<pre>';
    echo '<strong>' . $key . ': </strong><br />';
    print_r( $value );
    echo '</pre>';
} ?> -->
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
		 
		<div class="col-md-3">






			<div class="sec-sidebar sidebar well"> <?php get_sidebar( 'primary' ); ?> </div>
		 </div>
	</div>

	<?php do_action( 'bp_after_member_home_content' ); ?>





</div><!-- #buddypress -->

