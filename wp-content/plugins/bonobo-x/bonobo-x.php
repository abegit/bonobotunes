<?php /*
Plugin Name: BonoboX CMS
Plugin URI: http://bonobodesigns.com
Description: Your well written plugin description.
Author: Bonobo Abe
Version: 1.0
Author URI: http://www.bonobodesigns.com
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
class BonoboX extends SanityPluginFramework {
	
	/*
	*	Some required plugin information
	*/
	var $version = '1.1';
	
	/*
	*		Required __construct() function that initalizes the Sanity Framework
	*/
	function __construct() {
      parent::__construct(__FILE__);

      // create 'bonobo_x' page
      add_action( 'admin_menu', 'BonoboXAdminPage' );
		function BonoboXAdminPage(){

			add_menu_page( 'BonoboX cPanel', 'BonoboX cPanel', 'manage_options', 'bonobo_x', 'BonoboXAdminContent', $plugin_path . 'img/icon-backend.png', 98); 
			// find icon url for this abedit
		}
		function BonoboXAdminContent(){
			require_once($plugin_path.'templates/admin/page.php');
		}

		if ( get_option('adminBarBonoboX') == '2') { 
			add_filter('show_admin_bar', '__return_false');
		}
		if ( get_option('buddyBarBonoboX') == '1') {
				require_once($plugin_path.'framework/buddyBarBonoboX.php');
		}

  }

	/*
	*		Run during the activation of the plugin
	*/
	function activate() {
		$bonoboXleader = get_option('admin_email');
		add_option("ccbillBonoboX", '900936', '', 'yes');
		add_option("adminBarBonoboX", '1', '', 'yes');
		add_option("buddyBarBonoboX", '2', '', 'yes');
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
		register_setting( 'bonobo_x', 'ccbillBonoboX' );
		register_setting( 'bonobo_x', 'adminBarBonoboX' );
		register_setting( 'bonobo_x', 'buddyBarBonoboX' );
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