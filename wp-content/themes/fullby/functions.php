<?php 
/**
* #1 - hide adminbar on front
* #2 - logout redirect
* #3 - remove WordPress Social Login's get_avatar filter so that we can add our own
* #4 - Fullby CONTENT WIDTH & feedlinks 
* #5 - Fullby REPLY comment script 
* #6 - Fullby MENU 
* #11 - AdRotate integration
* #12 - uniqueCatcher - classifieds array checklist
* #13 - woocommerce support
*
*
*
*
*
*
*
*
*
*
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} elseif ( in_array( 'author', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} elseif ( in_array( 'customer', $user->roles ) ) {
			// redirect them to the default place
			return home_url().'/home';
		} elseif ( in_array( 'subscriber', $user->roles ) ) {
			// redirect them to the default place
			return home_url().'/home';
		} else {
			return home_url().'/home';
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

// #1 - hide admin bar on front
add_filter('show_admin_bar', '__return_false');

// #2 - logout redirect
add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

// #3 - remove WordPress Social Login's get_avatar filter so that we can add our own
remove_filter( 'get_avatar', 'wsl_user_custom_avatar' );
function my_user_custom_avatar($avatar, $id_or_email, $size, $default, $alt) {
        global $comment;

        if( get_option ('wsl_settings_users_avatars') && !empty ($avatar)) {
                //Check if we are in a comment
                if (!is_null ($comment) && !empty ($comment->user_id)) {
                        $user_id = $comment->user_id;
                } elseif(!empty ($id_or_email)) {
                        if ( is_numeric($id_or_email) ) {
                                $user_id = (int) $id_or_email;
                        } elseif ( is_string( $id_or_email ) && ( $user = get_user_by( 'email', $id_or_email ) ) ) {
                                $user_id = $user->ID;
                        } elseif ( is_object( $id_or_email ) && ! empty( $id_or_email->user_id ) ) {
                                $user_id = (int) $id_or_email->user_id;
                        }
                }
                // Get the thumbnail provided by WordPress Social Login
                if ($user_id) {
                        if (($user_thumbnail = get_user_meta ($user_id, 'wsl_user_image', true)) !== false) {
                                if (strlen (trim ($user_thumbnail)) > 0) {
                                        $user_thumbnail = preg_replace ('#src=([\'"])([^\\1]+)\\1#Ui', "src=\\1" . $user_thumbnail . "\\1", $avatar);
                                        return $user_thumbnail;
                                }
                        }
                }
        }
        // No avatar found.  Return unfiltered.
        return $avatar;
}

// #4 - Fullby CONTENT WIDTH & feedlinks 

// /**
//  * Login Redirect
//  * @since 0.1
//  * @version 1.0
//  */
// add_filter( 'login_redirect', 'mycred_pro_login_redirect', 10, 3 );
// function mycred_pro_login_redirect( $redirect_to, $request, $user = NULL )
// {
// 	// Make sure myCRED is enabled
// 	if ( ! function_exists( 'mycred_get_users_cred' ) ) return $redirect_to;

// 	if ( is_object( $user ) )
// 		$user_id = $user->ID;
// 	else
// 		$user_id = get_current_user_id();

// 	// Page ID to redirect users to
// 	$redirect_to_page = 99;

// 	// Check for negative balances
// 	if ( mycred_get_users_cred( $user_id ) <= 0 ) {
// 		return get_permalink( $redirect_to_page );
// 	}
	
// 	return $redirect_to;
// }

// CONTENT WIDTH & feedlinks 
	
	if ( ! isset( $content_width ) ) $content_width = 900;
	add_theme_support( 'automatic-feed-links' );


// #5 - Fullby REPLY comment script 

	function fullby_enqueue_comments_reply() {
		if( get_option( 'thread_comments' ) )  {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'comment_form_before', 'fullby_enqueue_comments_reply' );
	

// #6 - Fullby MENU

	add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() { 
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
            register_nav_menu( 'secondary', __( 'Secondary navigation', 'wptuts' ) );
            register_nav_menu( 'footer', __( 'Footer', 'wptuts' ) );
            register_nav_menu( 'third', __( 'Third', 'wptuts' ) );
    } endif;

// BOOTSTRAP MENU - Custom navigation walker (Required)

    require_once('wp_bootstrap_navwalker.php');
    

// CUSTOM THUMBNAIL 

	add_theme_support('post-thumbnails');
	
	if ( function_exists('add_theme_support') ) {
		add_theme_support('post-thumbnails');
	}

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'thumbnail', 400, 400, true ); //(cropped)
		add_image_size( 'quad', 410, 308, false ); //(cropped)
		add_image_size( 'single', 800, 494, false ); //(cropped)
		add_image_size( 'video', 800, 450, true ); //(cropped)
		add_image_size( 'smallvideo', 400, 225, true ); //(cropped)
	}


// WIDGET SIDEBAR 

	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Primary Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s panel">',	
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array('name'=>'Secondary Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s panel">',	
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array('name'=>'Rotator',
		'before_widget' => '<div id="%1$s" class="widget %2$s panel">',	
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));


// METABOX POST (Video,[...])

add_action( 'add_meta_boxes', 'meta_box_post' );

	function meta_box_post( $post ) {
	
	    add_meta_box(
	            'meta-box-post', // ID, should be a string
	            'YouTube Video', // Meta Box Title
	            'meta_box_post_content', // Your call back function, this is where your form field will go
	            'post', // The post type you want this to show up on, can be post, page, or custom post type
	            'normal', // The placement of your meta box, can be normal or side
	            'high' // The priority in which this will be displayed
	        );
	        
	}
	
	// Content for the custom meta box
	function meta_box_post_content() {
	
		// info current post
	    global $post;
	    
	    //metabox value if is saved
	    $fullby_video = get_post_meta($post->ID, 'fullby_video', true);
	    // ADD here more custom field 	    
	    
	    // security check
	    wp_nonce_field(__FILE__, 'fullby_nonce');
	    ?>
	    <p>To show a video in the article paste the id of a YouTube video in the box below. <br/><input name="fullby_video" id="fullby_video" value="<?php echo $fullby_video; ?>" style="border: 1px solid #ccc; margin: 10px 10px 0 0"/> <small>If the url is http://www.youtube.com/watch?v=<strong>UWHeEI7aOvc</strong>, the ID is <strong>UWHeEI7aOvc</strong>.</small></p>
	    <!-- *** ADD here more custom field  *** -->	    
	    
	    <?php
		
	}

// save function only when save
add_action('save_post', 'save_resource_meta');

	function save_resource_meta(){
    // post info
	    global $post;
	    // don't autosave metabox
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
	        return;
	    }
	    
	    // security check:
	    // chek if hidden field wp_nonce_field()
	    // is correct, if isn't don't save the field
	    if ($_POST && wp_verify_nonce($_POST['fullby_nonce'], __FILE__) ) {
	        // check if the value is in the form
	        if ( isset($_POST['fullby_video']) ) {
	            // save info metabox
	            update_post_meta($post->ID, 'fullby_video', $_POST['fullby_video']);
	            //ADD here more custom field 
	        }
	    }  
	}

// POPULAR POST 

if ( !function_exists('wpb_set_post_views') ) {

	function wpb_set_post_views($postID) {
	    $count_key = 'wpb_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* add post views to single page */
if ( !function_exists('wpb_track_post_views') ) {

	function wpb_track_post_views ($post_id) {
	    if ( !is_single() ) return;
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;    
	    }
	    wpb_set_post_views($post_id);
	}
}
add_action( 'wp_head', 'wpb_track_post_views');


// THEME OPTIONS

add_action('admin_menu', 'fullby_theme_page');
function fullby_theme_page ()
{
	if ( count($_POST) > 0 && isset($_POST['fullby_settings']) )
	{
		$options = array ('description','analytics');
		
		foreach ( $options as $opt )
		{
			delete_option ( 'fullby_'.$opt, $_POST[$opt] );
			add_option ( 'fullby_'.$opt, $_POST[$opt] );	
		}			
		 
	}
	add_theme_page('Theme Options', 'Theme Options', 'edit_themes', basename(__FILE__), 'fullby_settings');
	
}
function fullby_settings() {?>
<div class="wrap">
<h2>SEO Options</h2>
	
<form method="post" action="">
 
    <fieldset style="border:1px solid #ddd; padding:20px; margin-top:20px;">
	<legend style="margin-left:5px; color:#2481C6;text-transform:uppercase;"><strong>SEO</strong></legend>
		<table class="form-table">
        
        <tr>
			<th><label for="description">Meta Description</label></th>
			<td>
				<textarea name="description" id="description" rows="7" cols="70" style="font-size:11px;"><?php echo get_option('fullby_description'); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="ads">Google Analytics code:</label></th>
			<td>
				<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('fullby_analytics')); ?></textarea>
			</td>
		</tr>
        
	</table>
	</fieldset>
    
    <p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
		<input type="hidden" name="fullby_settings" value="save" style="display:none;" />
		</p>

</form>
</div>
<?php }

// woo - Remove Main Product Image & Display Thumbnails	
add_filter('add_to_cart_redirect', 'imageSlashVid');
function imageSlashVid() {
	// if (!wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id)) {
	// 	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	// }
 	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
}
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_thumbnails', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );






// Determine if it's an email using the WooCommerce email header
add_action( 'woocommerce_email_header', function(){ add_filter( "better_wc_email", "__return_true" ); } );
 
// Hide the WooCommerce Email header and footer
add_action( 'woocommerce_email_header', function(){ ob_start(); }, 1 );
add_action( 'woocommerce_email_header', function(){ ob_get_clean(); }, 100 );
add_action( 'woocommerce_email_footer', function(){ ob_start(); }, 1 );
add_action( 'woocommerce_email_footer', function(){ ob_get_clean(); }, 100 );
 
// Selectively apply WPBE template if it's a WooCommerce email
add_action( 'phpmailer_init', 'better_phpmailer_init', 20 );
function better_phpmailer_init( $phpmailer ){
    if ( apply_filters( 'better_wc_email', false ) ){
        global $wp_better_emails;
 
        // Add template to message
        $phpmailer->Body = $wp_better_emails->set_email_template( $phpmailer->Body );
 
        // Replace variables in email
        $phpmailer->Body = apply_filters( 'wpbe_html_body', $wp_better_emails->template_vars_replacement( $phpmailer->Body ) );
    }
}


 function add_post_content($content) {
	if(is_single()) {
		$content .= '<p class="bitly-shortlink">Shortlink: <input type="text" value="' . wp_get_shortlink() . '" onclick="this.focus();this.select();" > <small>(click to copy)</small></p>';
	}
 	return $content;
 }
 add_filter('the_content', 'add_post_content', '0');



// #10 - block users from backend
function block_init_admin() {
	if (strpos(strtolower($_SERVER),'/wp-admin/') !== false) {
		if ( !is_site_admin() ) {
			wp_redirect( get_option('siteurl'), 302 );
		}
	}
}
add_action('init','block_init_admin',0);


function bp_plugin_filter_latest_update( $update = '' ) {
	if(function_exists('pmpro_hasMembershipLevel') && pmpro_hasMembershipLevel()) {
	 	if( bp_is_user() && ! bp_get_member_user_id() ) {
	        $user_id = bp_displayed_user_id();
	    } else {
	        $user_id = bp_get_member_user_id();
	    }

		$customNameHook = pmpro_getMembershipLevelForUser($user_id);
		if ($customNameHook->ID == 3) {
			$update .= "-b";
		} else if ($customNameHook->ID == 5) {
			$update .= "-b";
		} else if ($customNameHook->ID == 4) {
			$update .= "-b";
		} else if ($customNameHook->ID == 1) {
			$update .= "-b";
		}
		return $update;
	}
}  

add_filter( 'bp_before_member_header_meta', 'bp_plugin_filter_latest_update', 10, 1 );
add_filter( 'bp_member_name', 'bp_plugin_filter_latest_update', 10, 1 );


// #11 - AdRotate integration
require_once WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'adrotate' . DIRECTORY_SEPARATOR . 'adrotate-widget.php';

class fullbyRotator extends adrotate_widgets {

	function fullbyRotator() { // or just __construct if you're on PHP5
	    parent::WP_Widget(false, 'My not blocked AdRotate widget', array('description' => "Show unlimited ads in the sidebar."));
	}
}
add_action('widgets_init', create_function('', 'return register_widget("fullbyRotator");'));



// #12 - uniqueCatcher - classifieds array checklist
function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) ) 
        return true;            // we're at the page or at a sub page

        $anc = get_post_ancestors( $post->ID );
        return ( isset($anc) && in_array( $pid , $anc ) ) ? true : false;
    	//is the $pid in the ancestors array
    }
    
// #13 woocommerce support
add_theme_support('woocommerce');


 ?>