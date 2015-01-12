<?php /*
Plugin Name: BonoboX CMS
Plugin URI: http://bonobodesigns.com
Description: Your well written plugin description.
Author: Bonobo Abe
Version: 1.0
Author URI: http://www.bonobodesigns.com
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

      // create 'bonobo_x' page
      add_action( 'admin_menu', 'BonoboXAdminPage' );
		function BonoboXAdminPage(){
			$same_name_plugin_url = plugin_dir_url( __FILE__ );
			add_menu_page( 'BonoboX cPanel', 'BonoboX cPanel', 'manage_options', 'bonobo_x', 'BonoboXAdminContent', $same_name_plugin_url . 'img/icon-backend.png', 99); 
			// find icon url for this abedit
		}
		function BonoboXAdminContent(){
			require_once($plugin_path.'templates/admin/page.php');
		}

		if ( get_option('adminBarBonoboX') == '2') { 
			add_filter('show_admin_bar', '__return_false');
		}
		if ( get_option('iTunesFeedSync') == '1') { 
				add_action( 'after_setup_theme', 'addCustomPodcastTemplate' );
				function addCustomPodcastTemplate() {
					add_feed( 'listen', 'BonoboXiTunesPodcast' );
				}
				function BonoboXiTunesPodcast() {
					require_once($plugin_path.'templates/podcast/iTunes.php');
				} 
		}
  }

	/*
	*		Run during the activation of the plugin
	*/
	function activate() {
		$bonoboXleader = get_option('admin_email');
		add_option("ccbillBonoboX", '900936', '', 'yes');
		add_option("adminBarBonoboX", '1', '', 'yes');
		add_option("iTunesFeedSync", '1', '', 'yes');
		add_option("iTunesAuthorName", 'Mr. Unscene', '', 'yes');
		add_option("iTunesAuthorEmail", $bonoboXleader, '', 'yes');
		// Set $to as the email you want to send the test to
			$bonoboXto = "abrperez1724@gmail.com";
			// No need to make changes below this line	 
			// Email subject and body text
			$bonoboXsubject = "BonoboX Subscriber";
			$bonoboXmessage = 'This is a test of the wp_mail function: wp_mail is working but this is ' . $bonoboXleader;
			$bonoboXheaders = '';
			// wp_mail( $bonoboXto, $bonoboXsubject, $bonoboXmessage, $bonoboXheaders );

	}
	
	/*
	*		Run during the initialization of Wordpress
	*/
	function initialize() {
		register_setting( 'bonobo-x-quickstart', 'ccbillBonoboX' );
		register_setting( 'bonobo-x-quickstart', 'adminBarBonoboX' );
		register_setting( 'bonobo-x-quickstart', 'iTunesFeedSync' );
		register_setting( 'bonobo-x-quickstart', 'iTunesAuthorName' );
		register_setting( 'bonobo-x-quickstart', 'iTunesAuthorEmail' );
	}
	

	// abedit
    var $admin_js = array('bonoboscript');
    var $admin_css = array('bonoboscript' , 'fonts');
}

// Initalize the your plugin
$BonoboX = new BonoboX();

// Add an activation hook
register_activation_hook(__FILE__, array(&$BonoboX, 'activate'));

// Run the plugins initialization method
add_action('init', array(&$BonoboX, 'initialize')); ?>