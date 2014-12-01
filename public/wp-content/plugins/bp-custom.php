<?php 
define ( 'BP_ENABLE_ROOT_PROFILES', true );

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'primary') {
    	global $current_user;
        return $items . '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" title="My Account">@'.$current_user->user_login.'<span class="caret" style="display:none;"></span></a>
<ul class=" dropdown-menu" role="menu"><li class="bp-menu bp-profile-nav menu-item menu-item-type-custom menu-item-object-custom">
<a href="'.bp_loggedin_user_domain().'"><i class="fa-user"></i>my profile
'.bp_loggedin_user_avatar( 'type=thumb&width=50&height=50&url=true' ).'</a></li><li class="bp-menu bp-profile-nav menu-item menu-item-type-custom menu-item-object-custom">
<a href="'.bp_loggedin_user_domain().'profile/edit"><i class="fa-edit"></i>edit profile</a></li>
<li class="bp-menu bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'settings" title="Settings"><i class="fa-cogs"></i>Settings</a></li><li class="bp-menu bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.wp_logout_url(get_permalink()).'" title="Log Out"><i class="fa-sign-out"></i>log out</a></li></ul></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
    	return $items . '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown" id="menu-item-152"><a href="../register" title="Register"><i class="fa-smile-o"></i>Register</a></li>';
    }
    else {
    	return $items; 
    }
}
?>
 

