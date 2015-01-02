<?php define ( 'BP_ENABLE_ROOT_PROFILES', true );
// signin top bar
global $blog_id;
if ( 1 == $blog_id) :

    add_filter( "wp_nav_menu_items", function ($items, $args){
      if ($args->theme_location == 'primary') {
        $items .= firmasite_custom_bpmenu();
        return $items; 
      } else {
        return $items; 
      }
        
    },10,2 );

    add_action("wp_footer","firmasite_custom_bpmenu");
        function firmasite_custom_bpmenu() {
            ob_start();
            ?>
            <?php if ( !is_user_logged_in()) { ?>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle register" data-toggle="dropdown" href="#" title="Login"> <i class="icon-key"> </i>  Members Login <b class="caret"> </b> </a>
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
               <?php } elseif (is_user_logged_in()) { ?>
                        <?php firmasite_bp_adminbar_notifications_menu() ?>
                        <?php } ?>
                <?php
                return ob_get_clean();
            }

            function firmasite_bp_adminbar_notifications_menu() {

                if ( !is_user_logged_in() )
                    return false;

                echo ' <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle notifications" data-toggle="dropdown" href="#" title="Notes">';
                // _e( '<i class="fa-bell-o"></i>', 'buddypress' );

                if ( $notifications = bp_core_get_notifications_for_user( bp_loggedin_user_id() ) ) { 
                      _e( '<i class="icon-bell"></i>', 'buddypress' );  ?>
                    <span> <?php echo count( $notifications ) ?> </span>
                    <?php
                } elseif ( !$notifications = bp_core_get_notifications_for_user( bp_loggedin_user_id() ) ) { 
                      _e( '<i class="icon-bell"></i>', 'buddypress' ); 
                }

            echo ' </a>';
            echo ' <ul class=" dropdown-menu" role="menu">';

            if ( $notifications ) {
                $counter = 0;
                for ( $i = 0, $count = count( $notifications ); $i  < $count; ++$i ) {
                    $alt = ( 0 == $counter % 2 ) ? ' class="alt"' : ''; ?>

                    <li <?php echo $alt ?>> <?php echo $notifications[$i] ?> </li>

                    <?php $counter++;
                } 
                echo '<li class="view"><a href="'.bp_loggedin_user_domain().'notifications"><i class="fa-ellipsis-h"></i></a></li>';
            } else { ?>

            <li> <a href=" <?php echo bp_loggedin_user_domain() ?>notifications"> <?php _e( 'No new notifications.', 'buddypress' ); ?> </a> </li>

            <?php
        }

        echo ' </ul>';
        echo ' </li>';
    }

    endif;



add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'primary') {
    	global $current_user;
        return $items . '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown"><a class="dropdown-toggle account" data-toggle="dropdown" href="#" title="My Account">@'.$current_user->user_login.'<span class="caret" style="display:none;"></span></a>
        <ul class=" dropdown-menu" role="menu"><li class="bp-menu bp-profile-nav menu-item menu-item-type-custom menu-item-object-custom">
        <a href="'.bp_loggedin_user_domain().'"><i class="fa-user"></i>my profile
        '.bp_loggedin_user_avatar( 'type=thumb&width=50&height=50&url=true' ).'</a></li><li class="bp-menu bp-profile-nav menu-item menu-item-type-custom menu-item-object-custom">
        <a href="'.bp_loggedin_user_domain().'profile/edit"><i class="fa-edit"></i>edit profile</a></li>
        <li class="bp-menu bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="/my-account" title="Account"><i class="fa-cogs"></i>Account</a></li><li class="bp-menu bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.bp_loggedin_user_domain().'settings" title="Settings"><i class="fa-cogs"></i>Settings</a></li><li class="bp-menu bp-logout-nav menu-item menu-item-type-custom menu-item-object-custom"><a href="'.wp_logout_url(get_permalink()).'" title="Log Out"><i class="fa-sign-out"></i>log out</a></li></ul></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
    	return $items . '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown" id="menu-item-152"><a href="../register" title="Register"><i class="fa-smile-o"></i>Register</a></li>';
    }
    else {
    	return $items; 
    }
} ?>