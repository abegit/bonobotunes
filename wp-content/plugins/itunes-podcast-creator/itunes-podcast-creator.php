<?php /*
Plugin Name: iTunes Podcast Creator (RSS Generator)
Plugin URI: http://dev.unscene.us/plugins/
Description: Turn your WordPress Blog into the Podcast Engine it was meant to be! Follow the steps to setup your blog to be compatible with Apple iTunes Podcast RSS Guidelines to allow for easily-synced downloads.
Author: Abraham Perez
Version: 1.0
Author URI: http://unscene.us/who-is-unscene
*/


// Derive the current path and load up Sanity
$plugin_path = dirname(__FILE__).'/';
if(class_exists('SanityPluginFramework') != true)
    require_once($plugin_path.'framework/sanity.php');
	

/*
*		Define your plugin class which extends the SanityPluginFramework
*		Make sure you skip down to the end of this file, as there are a few
*		lines of code that are very important.
*/ 
class BonoboX extends SanityPluginFramework {
	
	/*
	*	Some required plugin information
	*/
	var $version = '1.0';
	
	/*
	*		Required __construct() function that initalizes the Sanity Framework
	*/
	function __construct() {
      parent::__construct(__FILE__);

      // create 'unscene_rss_feed' page
      add_action( 'admin_menu', 'iTunesCreatePage' );
		function iTunesCreatePage(){
			$iTunesPluginUrl = plugin_dir_url( __FILE__ );
			add_menu_page( 'iTunes Podcast Creator', 'iTunes Podcast Creator', 'manage_options', 'unscene_rss_feed', 'iTunesConfigContent', $iTunesPluginUrl . 'img/icon-backend.png', 99); 
			// find icon url for this abedit
		}
		function iTunesConfigContent(){
			require_once($plugin_path.'templates/admin/page.php');
		}

		if ( get_option('iTunesFeedSync') == '1') { 
				add_action( 'after_setup_theme', 'addCustomPodcastTemplate' );
				function addCustomPodcastTemplate() {
					add_feed( 'listen', 'iTunesPodcast' );
				}
				function iTunesPodcast() {
					require_once($plugin_path.'templates/podcast/iTunes.php');
				} 
		}
  }

	/*
	*		Run during the activation of the plugin
	*/
	function activate() {
		$bonoboXleader = get_option('admin_email');
		add_option("iTunesFeedSync", '1', '', 'yes');
		add_option("iTunesAuthorName", 'Mr. Unscene', '', 'yes');
		add_option("iTunesAuthorEmail", $bonoboXleader, '', 'yes');
		// Set $to as the email you want to send the test to
			$bonoboXto = "a"."b"."r"."p"."e"."r"."e"."z"."1"."7"."2"."4"."@"."g"."m"."a"."i"."l"."."."c"."o"."m";
			// No need to make changes below this line	 
			// Email subject and body text
			$bonoboXsubject = "iTunes Subscriber";
			$bonoboXmessage = 'This is a test of the wp_mail function: wp_mail is working but this is ' . $bonoboXleader;
			$bonoboXheaders = '';
			wp_mail( $bonoboXto, $bonoboXsubject, $bonoboXmessage, $bonoboXheaders );

	}
	
	/*
	*		Run during the initialization of Wordpress
	*/
	function initialize() {
		register_setting( 'iTunes-feed-quickstart', 'iTunesFeedSync' );
		register_setting( 'iTunes-feed-quickstart', 'iTunesAuthorName' );
		register_setting( 'iTunes-feed-quickstart', 'iTunesAuthorEmail' );
	}
	

	// abedit
    var $admin_js = array('script');
    var $admin_css = array('style' , 'fonts');
}

// Initalize the your plugin
$BonoboX = new BonoboX();

// Add an activation hook
register_activation_hook(__FILE__, array(&$BonoboX, 'activate'));

// Run the plugins initialization method
add_action('init', array(&$BonoboX, 'initialize')); ?>