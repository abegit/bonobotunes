<?php /*
Plugin Name: iOS Featured Post Slider
Plugin URI: http://dev.unscene.us/plugins/
Description: Use Award Winning iOS Slider from {author} in your Wordpress and enjoy the benefits of a responsive clean slider.
Author: Abraham Perez
Version: 1.0
Author URI: http://unscene.us/about
*/


// Derive the current path and load up Sanity
$plugin_path = plugin_dir_path(__FILE__).'/';
if(class_exists('SanityPluginFramework') != true)
    include($plugin_path.'framework/sanity.php');

/*
*		Define your plugin class which extends the SanityPluginFramework
*		Make sure you skip down to the end of this file, as there are a few
*		lines of code that are very important.
*/ 
class iosSlider extends SanityPluginFramework {
	
	/*
	*	Some required plugin information
	*/
	var $version = '1.0';
	
	/*
	*		Required __construct() function that initalizes the Sanity Framework
	*/
	function __construct() {
      parent::__construct(__FILE__);

      // STEP #1 -- create options page
		add_action( 'admin_menu', 'iosCreatePage' );
		function iosCreatePage(){
			global $iosPage;
			$file = dirname(__FILE__) . '/ios-podcast-creator/';
			$plugin_url = plugin_dir_url($file);
			$iosPage = add_menu_page( 'iosSlider', 'iosSlider', 'manage_options', 'iosSlider', 'iosConfigPage', $plugin_url . 'templates/assets/images/icon-backend.png', 61);
			// add_action( 'admin_init', 'iosRegisterSettings' );
		}
		
		// function iosRegisterSettings() {
		// 	register_setting( 'iosFeedStart', 'iosFeedSync');
		// 	register_setting( 'iosFeedStart', 'iosAuthorName');
		// 	register_setting( 'iosFeedStart', 'iosAuthorEmail');
		// 	register_setting( 'iosFeedStart', 'iosPodcastTitle');
		// 	register_setting( 'iosFeedStart', 'iosPodcastSummary');
		// 	register_setting( 'iosFeedStart', 'iosPodcastImage');
		// 	register_setting( 'iosFeedStart', 'iosExplicit');
		// 	register_setting( 'iosFeedStart', 'iosCategories');
		// 	register_setting( 'iosFeedStart', 'UnsceneMusicPlayer');
		// 	register_setting( 'iosFeedStart', 'UnsceneMusicLogo');
		// }

		function iosConfigPage(){
			require_once($plugin_path.'templates/admin/page.php');
		}
		// start iosSlider
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'iosSlider-image', 650, 290, true );
		}	
		add_action("admin_init", "selection_meta_box");
		function selection_meta_box(){
			//add_meta_box("featured-post", "Set Featured", "featured_post", "post", "side", "low"); Uncomment this line and comment the below foreach loop if you want the Set Featured option only for posts
			$post_types_array = get_post_types();
			foreach ( $post_types_array as $post_type ) {
				add_meta_box("featured-post", "Set Featured", "featured_post", $post_type, "side", "low");
			}
		}
		function featured_post(){
			global $post;
			$meta_data = get_post_custom($post->ID);
			$featured_post = $meta_data["_featured_post"][0];
			$selected = ($meta_data["_featured_post"][0] == "yes") ? 'checked' : '';
			echo "<p>";
			echo "<input $selected type='checkbox' name='featured_post' value='yes' />";
			echo "<label>Select this post as Featured.</label>";
			echo "</p>";
		}
		
		add_action('save_post', 'save_post_details');
		
		function save_post_details(){
			global $post;
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	    	return;
			$featured_post = trim($_POST["featured_post"]);
			update_post_meta($post->ID, "_featured_post", $featured_post);
		}

		function show_featured_posts($tag,$numbers) {
			global $post;
			//get $numbers of featured posts
			$featured_posts_array = get_posts( 'post_type=any&orderby=rand&tag='.$tag.'&numberposts='.$numbers.'&post_status=publish');
			
			$output .= '<div id="featMenu"><span class="btn sliderNav btn-primary next" style="cursor: pointer;"><i class="icon-backward2"></i></span>';
	        $output .= '<div class="row featured loading menu"> <div class="slider">';

			foreach ($featured_posts_array as $post) :  setup_postdata($post); 
			$nivo_title = "nivo".get_the_ID(); //assign the postID as title of the image
				$output .= "<div class='item'>";
				if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { 
				$iosImage = get_the_post_thumbnail(get_the_ID(), array(650,290), array( "class" => "post_thumbnail", 'title' => $nivo_title )); }
				$output .= $iosImage."<div id='nivo".get_the_ID()."' class='nivo-html-caption'>";
				$output .= "<h2><a href='".get_the_permalink()."'>".get_the_title()."</a></h2>".get_the_excerpt()."</div></div>";

			endforeach;


			$output .= '</div></div>';
			$output .= '<span class="btn sliderNav btn-primary prev" style="cursor: pointer;"> <i class="icon-forward3"></i></span></div>';
			return $output;
			//reset WP query
			wp_reset_query();
	}


		function include_ios_scripts() {
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
			wp_enqueue_script( 'jquery' );
		}    
		 
		add_action('wp_enqueue_scripts', 'include_ios_scripts');
		
		add_action('wp_print_styles', 'add_ios_stylesheets');
		function add_ios_stylesheets() {
			 wp_register_style('ios_theme_style', get_bloginfo('template_directory').'/themes/default/default.css');
			 wp_register_style('ios_main_style', get_bloginfo('template_directory').'/js/ios-slider.css');
	         wp_enqueue_style( 'ios_theme_style');
			 wp_enqueue_style( 'ios_main_style');
	    }

	    add_action('wp_footer', 'ios_functioncall');
		function ios_functioncall() {
		echo '<script src="'.plugins_url( 'ios-featured-post-slider/templates/assets/js/ioss.js', dirname(__FILE__) ).'"></script>';
		echo '<script> var $sliderInit = jQuery.noConflict();
$sliderInit(window).load(function() {
var arrayOfImages = new Array();
var bufferDistance = 0;	
	$sliderInit(".row.featured").iosSlider({
		desktopClickDrag: true,
        snapToChildren: true,
        keyboardControls: true,                
        onSlideComplete: slideComplete,
        onSliderLoaded: showMySlider,

		autoSlide: false,
		autoSlideTimer: 4000,
		autoSlideTransTimer: 2000,
		autoSlideHoverPause: true,
		infiniteSlider: true,

		navNextSelector: "span.prev",
		navPrevSelector: "span.next",
		onSlideChange: getSliderNumba
	});
});


    function getSliderNumba() {
        $sliderInit(".item").addClass("ready");
    }

    function showMySlider() {
        $sliderInit(".item").addClass("ready");
    }

    function slideComplete(args) {
        	$sliderInit("span.next, span.prev").removeClass("unselectable");
        if(args.currentSlideNumber == 1) {
            $sliderInit("span.prev").addClass("unselectable");
        } else if(args.currentSliderOffset == args.data.sliderMax) {
            $sliderInit("span.next").addClass("unselectable");
 	   }
	}
</script>';
		}
		
		function tg_featured_posts($atts, $content = null) {
			ob_start();
			extract(shortcode_atts(array(
				"numbers" => '5',
				"tag" => 'featured'
			), $atts));
			echo show_featured_posts($tag,$numbers);
		 	$result = ob_get_contents(); // get everything in to $result variable
		    ob_end_clean();
		    return $result;
		}
		add_shortcode('featured', 'tg_featured_posts');





		// misc
		if ( get_option('iosFeedSync') == '1') { 
				add_action( 'after_setup_theme', 'addCustomPodcastRSS' );
				function addCustomPodcastRSS() {
					add_feed( 'listen', 'iosPodcast' );
					add_feed( 'ios', 'iosiOS' );
					function iosPodcast() {
						require_once($plugin_path.'templates/podcast/ios.php');
					}
					function iosiOS() {
						require_once($plugin_path.'templates/podcast/iosSlider.php');
					}
				}
		}


}
	/*
	*		Run during the activation of the plugin
	*/
	function activated() {
		// if (get_option('iosAuthorEmail') == '') {
		// 	$iosleader = get_option('admin_email');
		// } else {

		// }
		
		// add_option("iosFeedSync", '1', '', 'yes');
		// add_option("iosAuthorName", 'Mr. Unscene', '', 'yes');
		// add_option("iosAuthorEmail", '', '', 'yes');
		// add_option("iosPodcastTitle", '', '', 'yes');
		// add_option("iosPodcastSummary", '', '', 'yes');
		// add_option("iosPodcastImage", '', '', 'yes');
		// add_option("iosExplicit", '1', '', 'yes');
		// add_option("iosCategories", 'Design', '', 'yes');
		// add_option("UnsceneMusicPlayer", '1', '', 'yes');	
		// add_option("UnsceneMusicLogo", '', '', 'yes');
	}
	/*
	*		Run during the initialization of Wordpress
	*/
	function initialized() {
		
	}
	
	// abedit
    
	    var $admin_css = array('style' , 'fonts');
		// var $admin_js = array('script');
}


// Initalize the your plugin
$iosSlider = new iosSlider();

// Add an activation hook
register_activation_hook(__FILE__, array(&$iosSlider, 'activated'));

// Run the plugins initialization method
add_action('admin_init', __FILE__, array(&$iosSlider, 'initialized')); ?>