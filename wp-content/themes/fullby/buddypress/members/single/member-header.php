<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>


<?php do_action( 'bp_before_member_header' ); ?>

<div id="item-header-avatar">
	<a href="<?php bp_displayed_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

	<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
		<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
	<?php endif; ?>

	<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

	<?php do_action( 'bp_before_member_header_meta' ); ?>

	<div id="item-meta">

		<?php if ( $data = bp_get_profile_field_data( 'field=ccbillaffil&user_id='.$author_id ) ) : ?>
				<?php $buyLinkHref = 'http://refer.ccbill.com/cgi-bin/clicks.cgi?CA=900936-1000&PA='.$data.'&HTML='.site_url().'/register?friend='.$data;  ?>
			
		<?php echo $buyLinkHref;
		endif; ?>


		<?php
		/***
		 * If you'd like to show specific profile fields here use:
		 * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
		 */
		 do_action( 'bp_profile_header_meta' );

		 ?>

	</div><!-- #item-meta -->

	
<div id="item-nav">
<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
<ul>

<?php bp_get_displayed_user_nav(); ?>

<?php do_action( 'bp_member_options_nav' ); ?>

<li class="last">
	<div id="item-buttons"> <?php do_action( 'bp_member_header_actions' ); ?> </div><!-- #item-buttons -->
</li>

</ul>
</div>
</div><!-- #item-nav -->




</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ); ?>
