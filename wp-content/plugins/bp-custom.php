<?php define ( 'BP_ENABLE_ROOT_PROFILES', true );

/*
Plugin Name: Default to GD
Plugin URI: http://wordpress.org/extend/plugins/default-to-gd
Description: Sets GD as default WP_Image_Editor class.
Author: Mike Schroder
Version: 1.0
Author URI: http://www.getsource.net/
*/

function ms_image_editor_default_to_gd( $editors ) {
  $gd_editor = 'WP_Image_Editor_GD';

  $editors = array_diff( $editors, array( $gd_editor ) );
  array_unshift( $editors, $gd_editor );

  return $editors;
}
add_filter( 'wp_image_editors', 'ms_image_editor_default_to_gd' );


// hide adminbar
add_filter('show_admin_bar', '__return_false');

// custom header
global $blog_id;
if ( 1 == $blog_id) :
	add_filter( "wp_nav_menu_items", function ($items, $args){
		if ($args->theme_location == 'primary') {
			$items .= bpCustom_Header();
			return $items; 
		} else {
			return $items; 
		}

	},10,2 );

add_action("wp_footer","bpCustom_Header");
function bpCustom_Header() {
	ob_start(); ?>
	<?php if ( !is_user_logged_in()) { ?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle register" data-toggle="dropdown" href="#" title="Login"> <i class="icon-key"> </i> Login <b class="caret"> </b> </a>
				<ul class=" dropdown-menu" role="menu">
					<li>
						<form name="login-form" id="login-form" action=" <?php echo site_url( 'wp-login.php' ) ?>" method="post">
							<div class="input-prepend">
								<span class="add-on"> <i class="icon-user"> </i> </span>
								<input type="text" name="log" id="user_login" value="" placeholder=" <?php _e( 'Username', 'firmasite' ) ?>" />
							</div>
							<div class="input-prepend">
								<span class="add-on"> <i class="icon-lock"> </i> </span>
								<input type="password" name="pwd" id="user_pass" value="" placeholder=" <?php _e( 'Password', 'firmasite' ) ?>" />
							</div>
							<label for="rememberme" class="checkbox"> <input name="rememberme" type="checkbox" id="rememberme" value="forever" />  <?php esc_attr_e('Remember Me', 'firmasite'); ?> </label>
							<input type="submit" name="wp-submit" id="wp-submit" value=" <?php _e( 'Log In', 'firmasite' ) ?>"/>
							<?php if ( 'none' != bp_get_signup_allowed() && 'blog' != bp_get_signup_allowed() ) {?>
							<input class="btn btn-primary pull-right" type="button" name="signup-submit" id="signup-submit" value=" <?php _e( 'Create an Account', 'firmasite' ) ?>" onclick="location.href=' <?php echo bp_signup_page() ?>'" />
							<?php }?>
							<input type="hidden" name="redirect_to" value=" <?php echo bp_root_domain() ?>" />
							<input type="hidden" name="testcookie" value="1" />
							<?php do_action( 'bp_login_bar_logged_out' ) ?>
						</form>
					</li>
				</ul>
			</li>
	<?php } elseif (is_user_logged_in()) { ?>
			<?php bpCustom_notifications_menu() ?>
			<?php } ?>
			<?php
			return ob_get_clean();
		}

		function bpCustom_notifications_menu() {

			if ( !is_user_logged_in() )
				return false;

			echo ' <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle notifications" data-toggle="dropdown" href="#" title="Notes">';
					// _e( '<i class="fa-bell-o"></i>', 'buddypress' );

			if ( $notifications = bp_core_get_notifications_for_user( bp_loggedin_user_id() ) ) { ?>
			<span> <?php echo count( $notifications ) ?> </span>
			<i class="icon-bell"></i>
			<?php } elseif ( !$notifications = bp_core_get_notifications_for_user( bp_loggedin_user_id() ) ) { ?>
				<i class="icon-bell"></i>
			<?php }

			echo ' </a>';
			echo ' <ul class=" dropdown-menu" role="menu">';
			echo ' <li role="presentation" class="dropdown-header">Notifications</li> ';

			if ( $notifications ) {
				$counter = 0;
				for ( $i = 0, $count = count( $notifications ); $i  < $count; ++$i ) {
					$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : ''; ?>

					<li <?php echo $alt ?>> <?php echo $notifications[$i] ?> </li>

					<?php $counter++;
				} 
				echo '<li class="view"><a href="'.bp_loggedin_user_domain().'notifications"><i class="icon-ellipsis"></i></a></li>';
			} else { ?>

			<li> <a href=" <?php echo bp_loggedin_user_domain() ?>notifications"> <?php _e( 'No new notifications.', 'buddypress' ); ?> </a> </li>

		<?php }

		echo ' </ul>';
		echo ' </li>';
	}

endif;



	add_filter( 'wp_nav_menu_items', 'bpCustom_menu_item', 10, 2 );
	function bpCustom_menu_item ( $items, $args ) {
		if (is_user_logged_in() && $args->theme_location == 'primary') {
			global $current_user;
			return $items . '
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle account" data-toggle="dropdown" href="#" title="Hi, '.$current_user->user_login.'">@'.$current_user->user_login.'<span class="caret" style="display:none;"></span></a>
				<ul class=" dropdown-menu" role="menu">
				<li role="presentation" class="dropdown-header">Places:</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">'.bp_loggedin_user_avatar( 'type=thumb&width=50&height=50&url=true' ).'
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'messages" title="Messages"><i class="icon-mail2"></i>Post Office</a></li>
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'friends" title="Friends"><i class="icon-mail2"></i>My Friends</a></li>
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'groups" title="Groups"><i class="icon-mail2"></i>My Groups</a></li>
				<li class="divider" role="presentation"></li>
				<li role="presentation" class="dropdown-header">Wallet:</li>
			    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'" title="My Profile"><i class="icon-user2"></i>My Profile</a></li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'profile/change-avatar"><i class="icon-pencil"></i>Edit Profile</a></li>
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="/membership" title="Citizenship"><i class="icon-gift"></i>Citizenship</a></li>
				<li role="presentation" class="divider"></li>
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="/forum/support" title="Help and Support"><i class="icon-settings"></i>Tech Support</a></li>
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'settings" title="Privacy Settings"><i class="icon-settings"></i>Privacy</a></li>
				<li class="bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.wp_logout_url(get_permalink()).'" title="Log Out"><i class="icon-exit"></i>log out</a></li></ul></li>';
		}
		elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
			return $items . '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown" id="menu-item-152"><a href="../register" title="Register"><i class="icon-signup"></i>Register</a></li>';
		}
		else {
			return $items; 
		}
	}
?>