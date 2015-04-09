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
       /*
		* #1 - Create Post Type
		*/
		function iosPostType() {
		// Set UI labels
			$labels = array(
				'name'                => _x( 'Sliders', 'Post Type General Name', 'twentythirteen' ),
				'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'twentythirteen' ),
				'menu_name'           => __( 'Sliders', 'twentythirteen' ),
				'parent_item_colon'   => __( 'Parent Slider', 'twentythirteen' ),
				'all_items'           => __( 'All Sliders', 'twentythirteen' ),
				'view_item'           => __( 'View Slider', 'twentythirteen' ),
				'add_new_item'        => __( 'Add New Slider', 'twentythirteen' ),
				'add_new'             => __( 'Add New', 'twentythirteen' ),
				'edit_item'           => __( 'Edit Slider', 'twentythirteen' ),
				'update_item'         => __( 'Update Slider', 'twentythirteen' ),
				'search_items'        => __( 'Search Slider', 'twentythirteen' ),
				'not_found'           => __( 'Not Found', 'twentythirteen' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
			);

		// #1.1 - technical options
			$args = array(
				'label'               => __( 'sliders', 'twentythirteen' ),
				'description'         => __( 'Slider news and reviews', 'twentythirteen' ),
				'labels'              => $labels,
				// Features this CPT supports in Post Editor
				'supports'            => array( 'title', 'excerpt', 'author', 'thumbnail', 'custom-fields' ),
				// You can associate this CPT with a taxonomy or custom taxonomy. 
				'taxonomies'          => array( 'genres' ),
				/* A hierarchical CPT is like Pages and can have
				* Parent and child items. A non-hierarchical CPT
				* is like Posts.
				*/	
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
			);
			// Registering your Custom Post Type
			register_post_type( 'sliders', $args );

		}
		// #1.1 initialize iosPostType
		add_action( 'init', 'iosPostType', 0 );

		// #2 - create meta boxes
		add_action( 'add_meta_boxes', 'meta_box_post' );
		function meta_box_post( $post ) {
		    add_meta_box(
		            'sliderUrl', // ID, should be a string
		            'Slider URL', // Meta Box Title
		            'meta_box_post_content', // Your call back function, this is where your form field will go
		            'sliders', // The post type you want this to show up on, can be post, page, or custom post type
		            'normal', // The placement of your meta box, can be normal or side
		            'high' // The priority in which this will be displayed
		        );
		}
		// #2.1 - Content for the custom meta box
		function meta_box_post_content() {
			// info current post
		    global $post;		    
		    //metabox value if is saved
		    $sliderUrl = get_post_meta($post->ID, 'sliderUrl', true);
		    // ADD here more custom field 	    
		    // security check
		    wp_nonce_field(__FILE__, 'ios_nonce');
		    ?>
		    <p>URL you want the slider to point to. <br/><input name="sliderUrl" id="sliderUrl" value="<?php echo $sliderUrl; ?>" style="border: 1px solid #ccc; margin: 10px 10px 0 0"/> <small>Example: ---> <strong>http://bonoboville.com</strong></small></p>
		    <!-- *** ADD here more custom field  *** -->	    
		    <?php
			
		}
		// #2.2 - save function only when save
		add_action('save_post', 'iosSaveResource');
		function iosSaveResource(){
		    global $post;
		    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		        return;
		    }
		    if ($_POST && wp_verify_nonce($_POST['ios_nonce'], __FILE__) ) {
		        if ( isset($_POST['sliderUrl']) ) {
		            update_post_meta($post->ID, 'sliderUrl', $_POST['sliderUrl']);
		            //ADD here more custom field 
		        }
		    }  
		}

      // #3 - Create Options Page
		add_action( 'admin_menu', 'iosCreatePage' );
		function iosCreatePage(){
			global $iosPage;
			$file = dirname(__FILE__) . '/ios-podcast-creator/';
			$plugin_url = plugin_dir_url($file);
			$iosPage = add_menu_page( 'iosSlider', 'iosSlider', 'manage_options', 'iosSlider', 'iosConfigPage', $plugin_url . 'templates/assets/images/icon-backend.png', 61);
			add_action( 'admin_init', 'iosRegisterSettings' );
		}
		// #3.1 - Register Options
		function iosRegisterSettings() {
			register_setting( 'iosStart', 'iosEnablejQuery');
			// register_setting( 'iosStart', 'iosAuthorName');
			// register_setting( 'iosStart', 'iosAuthorEmail');
			// register_setting( 'iosStart', 'iosPodcastTitle');
			// register_setting( 'iosStart', 'iosPodcastSummary');
			// register_setting( 'iosStart', 'iosPodcastImage');
			// register_setting( 'iosStart', 'iosExplicit');
			// register_setting( 'iosStart', 'iosCategories');
			// register_setting( 'iosStart', 'UnsceneMusicPlayer');
			// register_setting( 'iosStart', 'UnsceneMusicLogo');
		}

		function iosConfigPage(){
			require_once($plugin_path.'templates/admin/page.php');
		}


		// #4 - Define Image Sizes
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'iosSlider-image', 650, 290, true );
		}	
		
		
		

		function show_featured_posts($category,$numbers) {
			global $post;
			//get $numbers of featured posts
			$featured_posts_array = get_posts( 'post_type=any&orderby=rand&category_name='.$category.'&numberposts='.$numbers.'&post_status=publish');
			
			$output .= '<div id="featMenu"><span class="btn sliderNav btn-primary next" style="cursor: pointer;"><i class="icon-backward2"></i></span>';
	        $output .= '<div class="row featured loading menu"> <div class="slider">';

			foreach ($featured_posts_array as $post) :  setup_postdata($post); 
			$slider_title = "nivo".get_the_ID(); //assign the postID as title of the image
				$output .= "<div class='item'>";
				if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { 
				$iosImage = get_the_post_thumbnail(get_the_ID(), array(650,290), array( "class" => "post_thumbnail", 'title' => $slider_title )); }
				$output .= $iosImage."<div id='nivo".get_the_ID()."' class='nivo-html-caption'>";
				$output .= "<h2><a href='".get_the_permalink()."'>".get_the_title()."</a></h2>".get_the_excerpt()."</div></div>";

			endforeach;


			$output .= '</div></div>';
			$output .= '<span class="btn sliderNav btn-primary prev" style="cursor: pointer;"> <i class="icon-forward3"></i></span></div>';
			return $output;
			//reset WP query
			wp_reset_query();
	}


		
		
		add_action('wp_print_styles', 'add_ios_stylesheets');
		function add_ios_stylesheets() {
			 wp_register_style('ios_theme_style', $plugin_path.'/themes/default/default.css');
			 wp_register_style('ios_main_style', $plugin_path.'/js/ios-slider.css');
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
			</script>';}
		
		function tg_featured_posts($atts, $content = null) {
			ob_start();
			extract(shortcode_atts(array(
				"numbers" => '5',
				"category" => 'featured'
			), $atts));
			echo show_featured_posts($category,$numbers);
		 	$result = ob_get_contents(); // get everything in to $result variable
		    ob_end_clean();
		    return $result;
		}
		add_shortcode('featured', 'tg_featured_posts');





		// misc
		if ( get_option('iosEnablejQuery') == '1') { 
			function include_ios_scripts() {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
				wp_enqueue_script( 'jquery' );
			}    
			 
			add_action('wp_enqueue_scripts', 'include_ios_scripts');
		}


}
	/*
	*		Run during the activation of the plugin
	*/
	function activated() {
		add_option("iosEnablejQuery", '1', '', 'yes');
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