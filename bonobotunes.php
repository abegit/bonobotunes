<?php /*
Plugin Name: Bonobo Tunes
Plugin URI: http://unscene.us/podcast-creator
Description: Turn your WordPress Blog into the Podcast Engine it was meant to be! Follow the steps to setup your blog to be compatible with Apple bvt Podcast RSS Guidelines to allow for easily-synced downloads.
Author: Abraham Perez
Version: 1.0
Author URI: http://unscene.us
*/


// Derive the current path and load up Sanity
$plugin_path = plugin_dir_path(__FILE__).'/';
if(class_exists('BonoboTunesPluginFramework') != true)
    include($plugin_path.'framework/bvt.php');

/*
*		Define your plugin class which extends the BonoboTunesPluginFramework
*		Make sure you skip down to the end of this file, as there are a few
*		lines of code that are very important.
*/ 
class bvtRSS extends BonoboTunesPluginFramework {
	
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
		add_action( 'admin_menu', 'bvtCreatePage' );
		function bvtCreatePage(){
			global $bvtPage;
			$file = dirname(__FILE__) . '/bonobotunes/';
			$plugin_url = plugin_dir_url($file);
			$bvtPage = add_menu_page( 'BonoboTunes by Unscene', 'BonoboTunes', 'manage_options', 'bvt', 'bvtConfigPage', $plugin_url . 'templates/assets/images/icon-backend.png', 61);
			add_action( 'admin_init', 'bvtRegisterSettings' );
		}
		
		function bvtRegisterSettings() {
			register_setting( 'bvtStart', 'bvtSync');
			register_setting( 'bvtStart', 'bvtAuthorName');
			register_setting( 'bvtStart', 'bvtAuthorEmail');
			register_setting( 'bvtStart', 'bvtPodcastTitle');
			register_setting( 'bvtStart', 'bvtPodcastSummary');
			register_setting( 'bvtStart', 'bvtPodcastImage');
			register_setting( 'bvtStart', 'bvtExplicit');
			register_setting( 'bvtStart', 'bvtCategories');
			register_setting( 'bvtStart', 'bvtMusicPlayer');
			register_setting( 'bvtStart', 'bvtMusicLogo');
		}

		function bvtConfigPage(){
			require_once(plugin_dir_path(__FILE__).'/templates/admin/page.php');
		}

	if ( get_option('bvtSync') == '1') { 
			add_action( 'after_setup_theme', 'addCustomPodcastRSS' );
			function addCustomPodcastRSS() {
				add_feed( 'listen', 'bvtPodcast' );
				add_feed( 'ios', 'bvtiOS' );
				function bvtPodcast() {
					require_once(plugin_dir_path(__FILE__).'/templates/podcast/rss-itunes.php');
				}
				function bvtiOS() {
					require_once(plugin_dir_path(__FILE__).'/templates/podcast/iosSlider.php');
				}
			}
			 
	}
	if ( get_option('bvtMusicPlayer') == '1') { 
			//add my_print to query vars
			function bvtPlayerCallback($vars) {
			    // add my_print to the valid list of variables
			    $new_vars = array("embed");
			    $vars = $new_vars + $vars;
			    return $vars;
			}

			add_filter("query_vars", 'bvtPlayerCallback');

			// Template selection
			function bvtPlayerTemplate() {
			    global $wp;
			    global $wp_query;
			    if (isset($wp->query_vars["embed"])) {
			        require_once(plugin_dir_path(__FILE__).'/templates/podcast/single-player.php');
			        die();
			    }
			}
			add_action("template_redirect", 'bvtPlayerTemplate');


			function Cus_enc() {

				foreach ( (array) get_post_custom() as $key => $val) {
					if ($key == 'enclosure') {
						foreach ( (array) $val as $enc ) {
							$enclosure = explode("\n", $enc);

							// only get the first element, e.g. audio/mpeg from 'audio/mpeg mpga mp2 mp3'
							$t = preg_split('/[ \t]/', trim($enclosure[2]) );
							$type = $t[0];

							/**
							 * Filter the RSS enclosure HTML link tag for the current post.
							 *
							 * @since 2.2.0
							 *
							 * @param string $html_link_tag The HTML link tag with a URI and other attributes.
							 */
							$enclosure[0] = rtrim($enclosure[0]);
							echo apply_filters( 'Cus_enc', $enclosure[0] );
							
						}
					}
				}
			} // end pg_enc
			

	} // end if option UnsceneMusicPlayer = 1 aka yes
}
	/*
	*		Run during the activation of the plugin
	*/
	function activated() {
		// if (get_option('bvtAuthorEmail') == '') {
		// 	$bvtleader = get_option('admin_email');
		// } else {

		// }
		
		add_option("bvtSync", '1', '', 'yes');
		add_option("bvtAuthorName", 'Mr. Unscene', '', 'yes');
		add_option("bvtAuthorEmail", '', '', 'yes');
		add_option("bvtPodcastTitle", '', '', 'yes');
		add_option("bvtPodcastSummary", '', '', 'yes');
		add_option("bvtPodcastImage", '', '', 'yes');
		add_option("bvtExplicit", '1', '', 'yes');
		add_option("bvtCategories", 'Design', '', 'yes');
		add_option("bvtMusicPlayer", '1', '', 'yes');	
		add_option("bvtMusicLogo", '', '', 'yes');
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
$bvtRSS = new bvtRSS();

// Add an activation hook
register_activation_hook(__FILE__, array(&$bvtRSS, 'activated'));

// Run the plugins initialization method
add_action('admin_init', __FILE__, array(&$bvtRSS, 'initialized')); ?>