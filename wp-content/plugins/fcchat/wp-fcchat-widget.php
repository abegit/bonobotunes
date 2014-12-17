<?php
/*
Plugin Name: FCChat Widget
Plugin URI: http://www.fastcatsoftware.com
Description: Add full featured chat to the sidebar.
Version: 3.8.5
Author: Fastcat Software
Author URI: http://www.fastcatsoftware.com
License: GPL2
*/

/*  Copyright 2012 Fastcat Software (www.fastcatsoftware.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include('fcchat-config.php');

$fcchat_options;
$fcchat_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) ).'/';


function get_fcchat_widget_options() {
	if(($fcchat_options = get_option('fcchat_widget')) === FALSE) $fcchat_options = array();
  	return fcchat_array_merge(fcchat_widget_options(), $fcchat_options);
}

function fcchat_array_merge($Arr1, $Arr2)
{
  foreach($Arr2 as $key => $Value)
  {
      //Compatible with previous versions
      if($key=='chatid'){
		if($Arr1['chat_id']['value']==''){
      			$Arr1['chat_id']['value'] = $Value;
		}
      }
      if(array_key_exists($key, $Arr1))
      $Arr1[$key]['value'] = $Value;
  }

  return $Arr1;

}

//widget header js
function fcchat_add_header_js(){
	global $fcchat_options,$fcchat_plugin_url;
        if (!is_admin()){
		$fcchat_options = get_fcchat_widget_options();
		echo '<script type="text/javascript">if(!window["FCChatConfig"]){window["FCChatConfig"] = {}}(function(){var a = window["FCChatConfig"];';
		foreach($fcchat_options as $key => $value){
			if($key=='custom_buttons'||$key=='templates'||$key=='quickstyling'||$key=='chatbox'){
				echo 'a.' . $key . '=' . '{' . $fcchat_options[$key]['value'] . '};';
			}else if($fcchat_options[$key]['type']!='hidden'&&$fcchat_options[$key]['type']!='comment'&&$key!='template_overrides'){
				if($fcchat_options[$key]['quote']=='1'||($fcchat_options[$key]['quote']=='2'&&$fcchat_options[$key]['value']!='true'&&$fcchat_options[$key]['value']!='false')){
					echo 'a.' . $key . '=' . '"' . $fcchat_options[$key]['value'] . '";';
				}else{
					if($fcchat_options[$key]['value']==''){
						$fcchat_options[$key]['value']='""';
					}
					echo 'a.' . $key . '=' . str_replace("window['fc_chat_path']",'"' . $fcchat_plugin_url . '"',$fcchat_options[$key]['value']) . ';';
				}
			}
		}
		//Global Config
		if ($fcchat_options['template_overrides']['value']!=""){
			echo 'function getObj(a,b,d){var c=window;for(var i=0;i<b.length-d;i++){c=c[b[i]]}return c};function setOption(a,d){try{var b=a.split(".");var c= getObj(a,b,1);c[b[b.length-1]]=d}catch(e){}};function mergeOption(a,d){try{var b=a.split(".");var c = getObj(a,b,1);c[b[b.length-1]]+=d}catch(e){}};function mergeBlock(a,d){try{var b=a.split(".");var c=getObj(a,b,0);jGo.$.extend(true,c,d)}catch(e){}};';
			echo 'function getCSSProp(a,d,g){try{var b=a.split(".");var c;c=getObj(a,b,1);var f=((c[b[b.length-1]].split(d+":"))[1].split(";"))[0];return (g?jGo.util.eN(f):f)}catch(e){}};';
			echo 'a.global = {template_overrides:function(){'.$fcchat_options['template_overrides']['value'].'}}';
		}
		echo '}())</script>';
        }
}


//widget scripts
function fcchat_add_header_scripts(){
        $fcchat_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
        if (!is_admin()){
		    wp_register_script('fc-chat-import-google.loader', $fcchat_plugin_url.'/js/import.google.loader.js');
                wp_enqueue_script('fc-chat-import-google.loader');
		    wp_register_script('fc-chat-import-config', $fcchat_plugin_url.'/js/import.config.alt.php?path='.str_ireplace(array(".","http"), array("||period||","||protocol||"), $fcchat_plugin_url).'&t=1');
               wp_enqueue_script('fc-chat-import-config');
		    wp_register_script('fc-chat-import-libs', $fcchat_plugin_url.'/js/import.libs.js');
                wp_enqueue_script('fc-chat-import-libs');
		    wp_register_script('fc-chat-import-includes', $fcchat_plugin_url.'/js/import.includes.js');
                wp_enqueue_script('fc-chat-import-includes');
		     
        }
}


function fcchat_add_footer_script(){
        $fcchat_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
        if (!is_admin()){
                echo '<script type="text/javascript">document.write("</div>" + (true?FCChatConfig.load_standalone:FCChatConfig.load_integrated));</script>';    
        }
}

// Inserts scripts into page
add_action( 'wp_print_scripts', 'fcchat_add_header_js' );
add_action('wp_enqueue_scripts', 'fcchat_add_header_scripts');
add_action('wp_footer','fcchat_add_footer_script');

//the widget
function fcchat_widget_init() {
        if ( !function_exists('register_sidebar_widget') )
                return;      

	//Echo widget to sidebar
        function fcchat_widget($args) {
		global $fcchat_options;
  		extract($args);
		//$fcchat_options = get_fcchat_widget_options();
		$fcchat_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
  		echo $before_widget;
  		echo $before_title . $fcchat_options['title']['value'] . $after_title;
  		echo '<div id="fc_package"><script type="text/javascript" src="'.$fcchat_plugin_url.'/js/install.prep.js"></script><script type="text/javascript" ></script></div><script type="text/javascript" src="'.$fcchat_plugin_url.'/js/embed.js"></script>';
  		echo $after_widget;
	}
                
        //widget control form
        function fcchat_widget_control() {
                $fcchat_options = get_fcchat_widget_options();
		$fcchat_options2 = array();
		//unset($fcchat_options[0]); //returned by get_option(), but we don't need it

		// If user is submitting custom option values for this widget
		if ( $_POST['fcchat-submit'] ) {
                        // Remember to sanitize and format use input appropriately.
                        foreach($fcchat_options as $key => $value){
				if(isset($_POST['fcchat-'.$key])){
					$fcchat_options[$key]['value'] = str_replace('"', '&quot;', stripslashes($_POST['fcchat-'.$key]));
				}
				$fcchat_options2[$key] = $fcchat_options[$key]['value'];
			}
                        
                        // Save changes
			update_option('fcchat_widget', $fcchat_options2);
		}
        
                //Go to activation page
		echo '<p style="text-align:left"><b>Step 1:</b> <a href="http://www.fastcatsoftware.com/chat/wp-activation.aspx" TARGET="_blank" >Click here to activate your chat</a></p>';
		   
		//Upgrade notice 
		echo '<p style="text-align:left"><b>Upgrade notice:</b> If you are upgrading from a previous version, please read the <a target=_blank href="http://www.fastcatsoftware.com/chat/userguide/upgrading2.2.12.asp">Upgrade Notice</a>.<br>Upgrading from a version prior to 2.1.8 requires that you obtain a new chat ID from the link above.</p>';
		    echo '<p style="text-align:left"><b>Step 2:</b> Enter your activation info below, and press save.</p>';
		
		//Title                
		echo '<p style="text-align:left"><label for="fcchat-title">Title: <input style="width: 200px;" id="fcchat-title" name="fcchat-title" type="text" value="'.$fcchat_options['title']['value'].'" /></label></p>';
                                        
                //Host
                 echo '<p style="text-align:left"><label for="fcchat-host">Host: <br/><input id="fcchat-host" name="fcchat-host" type="text" value="'.$fcchat_options['host']['value'].'" /></label></p>';
                
                //Chat ID
                echo '<p style="text-align:left"><label for="fcchat-chat_id">Chat ID: <br/><input id="fcchat-chat_id" name="fcchat-chat_id" type="text" value="'.$fcchat_options['chat_id']['value'].'" /></label></p>';
                
		//Links
		echo '<p style="text-align:left">Here are some other helpful links:</p>';
		echo '<p style="text-align:left"><a href="http://www.fastcatsoftware.com/chat/userguide/Step6.asp" TARGET="_blank" >FCChat Configuration Topics</a></p>';
		echo '<p style="text-align:left"><a href="http://www.fastcatsoftware.com/chat/Manual3.html" TARGET="_blank" >FCChat Manual</a></p>';
		echo '<p style="text-align:left">If you need assistance, or have any ideas on making this product better, please contact us at <a href="mailto:support@fastcatsoftware.com">support@fastcatsoftware.com</a></p>';

                // Submit
                echo '<input type="hidden" id="fcchat-submit" name="fcchat-submit" value="1" />';
        }
        // This registers our widget so it appears with the other available
        // widgets and can be dragged and dropped into any active sidebars.
        //register_sidebar_widget('FCChat Widget', 'fcchat_widget');
        wp_register_sidebar_widget( 'fcchat-widget', 'FCChat Widget', 'fcchat_widget');

        // This registers our optional widget control form.
        wp_register_widget_control('fcchat-widget', 'FCChat Widget', 'fcchat_widget_control');
}

// Run code later in case this loads prior to any required plugins.
add_action('plugins_loaded', 'fcchat_widget_init');

//Administration page

// mt_settings_page() displays the page content for the FCChat settings submenu
function fcchat_settings_page() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    $fcchat_options = get_fcchat_widget_options();
    $fcchat_options2 = array();
    //unset($fcchat_options[0]); //returned by get_option(), but we don't need it

	// If user is submitting custom option values for this widget
	if ( $_POST['fcchat-settings-submit'] && $_POST['fcchat-settings-submit']=='1') {
                  // Remember to sanitize and format use input appropriately.
                 foreach($fcchat_options as $key => $value){
			if(isset($_POST['fcchat-'.$key])){
				if($key!='custom_buttons'&&$key!='templates'&&$key!='quickstyling'&&$key!='chatbox'&&$key!='template_overrides'){
    					$fcchat_options[$key]['value'] = str_replace('"', '&quot;', stripslashes($_POST['fcchat-'.$key]));	
				}else{
					$fcchat_options[$key]['value'] = stripslashes($_POST['fcchat-'.$key]);	
				}
			}
			$fcchat_options2[$key] = $fcchat_options[$key]['value'];
		}
                        
                // Save changes
		update_option('fcchat_widget', $fcchat_options2)


        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Settings Saved.', 'menu-fcchat' ); ?></strong></p></div>
<?php

    	}
	if ( $_POST['fcchat-settings-submit'] && $_POST['fcchat-settings-submit']=='2') {
                // Remember to sanitize and format use input appropriately.
		$fcchat_options=fcchat_widget_options();
		if(($fcchat_options3 = get_option('fcchat_widget')) === FALSE) $fcchat_options3 = array();
		if(isset($fcchat_options3['chatid'])){
			$fcchat_options2['chat_id'] = $fcchat_options3['chatid'];
		}
		if(isset($fcchat_options3['chat_id'])){
			$fcchat_options2['chat_id'] = $fcchat_options3['chat_id'];
		}
		if(isset($fcchat_options3['host'])){
			$fcchat_options2['host'] = $fcchat_options3['host'];
		}
		if(isset($fcchat_options3['updates'])){
			$fcchat_options2['updates'] = $fcchat_options3['updates'];
		}
                        
                // Save changes
		update_option('fcchat_widget', $fcchat_options2);
		$fcchat_options = get_fcchat_widget_options();

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Settings Reset.', 'menu-fcchat' ); ?></strong></p></div>
<?php

    	}
    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'FCChat Plugin Settings', 'menu-fcchat' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" id="fcchat-settings-submit" name="fcchat-settings-submit" value="1" />

<?php
_e('This page is an HTML implemention of the FCChat configuration file (fcchat/config/config.js). For a complete description of the functions and usage of the variables below, refer to the <a href="http://www.fastcatsoftware.com/chat/Manual3.html" TARGET="_blank" >FCChat Manual</a>. Some additional tutorials are found in the <a href="http://www.fastcatsoftware.com/chat/userguide/index.html" TARGET="_blank" >User Guide</a>. You can restore all the settings to their default values by pressing the reset button below.', 'menu-fcchat' );
echo '<br /><br />';
foreach($fcchat_options as $key => $value){
	if($fcchat_options[$key]['type']=='comment'){
		echo '<br /><br /><div style="color:blue;font-weight:bold"><big>';
		_e($fcchat_options[$key]['desc'], 'menu-fcchat' ); 
		echo '</big></div><br>';
	}else if($fcchat_options[$key]['type']=='text'){
		echo '<p>' . _e($fcchat_options[$key]['desc'], 'menu-fcchat' ); 
		echo '<b>' . $key . '</b>&nbsp; <input type="text" name="fcchat-' . $key . '" value="' . $fcchat_options[$key]['value'] . '" size="' . $fcchat_options[$key]['sz'] . '">';
		echo '</p><hr />';
	}else if($fcchat_options[$key]['type']=='radio'){
		echo '<p><b>' . $key . '</b>&nbsp; ' . _e($fcchat_options[$key]['desc'], 'menu-fcchat' ); 
		echo '<input type="radio"  name="fcchat-' . $key . '" value="true" ' . ($fcchat_options[$key]['value'] == "true"? 'checked="checked"':'') . ' /> Yes&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="fcchat-' . $key . '" value="false" ' . ($fcchat_options[$key]['value'] == "false"? 'checked="checked"':'') . ' /> no ';
		echo '</p><hr />';
	}else if($fcchat_options[$key]['type']=='textarea'){
		echo '<p>' . _e($fcchat_options[$key]['desc'], 'menu-fcchat' ); 
		echo '&nbsp;&nbsp;<b>' . $key . '</b><br>&nbsp; <textarea style="font-size:16px;font-family:arial;width:100%;height:300px" name="fcchat-' . $key . '">' . $fcchat_options[$key]['value'] . '</textarea>';
		echo '</p><hr />';
	}else if($fcchat_options[$key]['type']=='hidden'){
		
	}else{
		echo '<p><b>' . $key . '</b>&nbsp; ' . _e($fcchat_options[$key]['desc'], 'menu-fcchat' ); 
		foreach($fcchat_options[$key]['ops'] as $op => $val){
			echo '<input type="radio"  name="fcchat-' . $key . '" value="' . $fcchat_options[$key]['ops'][$op]['value'] . '" ' . ($fcchat_options[$key]['value'] == $fcchat_options[$key]['ops'][$op]['value']? 'checked="checked"':'') . ' /> ' . $fcchat_options[$key]['ops'][$op]['desc'] . '&nbsp;&nbsp;&nbsp;';
		}
		echo '</p><hr />';
	}
}

?>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
<input type="submit" name="Reset" class="button-primary" onclick="if(confirm('<?php esc_attr_e('Are you sure you want to restore the settings to their default values?') ?>')){document.getElementById('fcchat-settings-submit').value='2'}else{return false};" value="<?php esc_attr_e('Reset Settings') ?>" />
</p>

</form>
</div>

<?php
 
}

add_action('admin_menu', 'fcchat_add_pages');

// action function for above hook
function fcchat_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('FCChat Settings','menu-fcchat'), __('FCChat Settings','menu-fcchat'), 'manage_options', 'fcchatsettings', 'fcchat_settings_page');
}

function fcchat_update() {
    $current_revision=2;
    if(($fcchat_options = get_option('fcchat_widget')) !== FALSE){
	$revision=0;
	if(isset($fcchat_options['revision'])){
		$revision = $fcchat_options['revision'];
	}
	if($revision>=$current_revision){
		return false;
	}
	$updates_found=false;
	$updated=false;

	// look for 3.0 updates
    	foreach($fcchat_options as $key => $value){
	 	if($key=='updates'){
			if(strpos($value , "update 3.0;") !== false){
				$updated=true;
			}
			$updates_found=true;
         	}
    	}
	if(!$updates_found){
		$fcchat_options['updates']='update 3.0;';
	}else{
		if(!$updated){
			$fcchat_options['updates'].='update 3.0;';
		}
	}

	// apply 3.0 updates
	if(!$updated){
		foreach($fcchat_options as $key => $value){
	 		if($key=='forum_proxy'){
				$proxy="";
				if(strpos($value , "wordpress_proxy")){
					$proxy="wordpress";
				}
				if(strpos($value , "wordpress_proxy2")){
					$proxy="wordpress2";
				}
				if(strpos($value , "joomla")){
					$proxy="joomla";
				}
				if(strpos($value , "phpbb3")){
					$proxy="phpbb";
				}
				if(strpos($value , "smf")){
					$proxy="smf";
				}
				if(strpos($value , "mybb")){
					$proxy="mybb";
				}
				$fcchat_options['user_integration_bridge']=$proxy;
			}
         	}
		$fcchat_options['startText']="Click here to join our chat.";
		$fcchat_options['loginText']="Please sign in to join our chat.";
		$fcchat_options['autoGreet']="Wellcome!! ";
		$fcchat_options['max_video_streams']="100";
		$fcchat_options['avatars_dir']="";
		$fcchat_options['images_dir']="";
		$fcchat_options['smileys_dir']="";
		$fcchat_options['avatar_sz']="18";
		$fcchat_options['window_height_offset']="-160";
		$fcchat_options['chat_room_height_offset']="105";
	}

	// look for 3.2 updates
	$updated=false;
	$quickstyling='';
    	foreach($fcchat_options as $key => $value){
	 	if($key=='updates'){
			if(strpos($value , "update 3.2") !== false){
				$updated=true;
			}
         	}
		if($key=='quickstyling'){
			$quickstyling=$value;
         	}
    	}

	// apply 3.2 updates
	if(!$updated){
		if($quickstyling!=''){
			$quickstyling = str_replace('border_css','background_css',$quickstyling);
			$pos = strpos($quickstyling,'application_window');
			if($pos !== false){
				$pos = strpos($quickstyling,'frame_color',$pos);
			}
			if ($pos !== false) {
				$pos = strpos($quickstyling,'title_css',$pos);
			}
			if ($pos !== false) {
				$quickstyling = substr($quickstyling,0,$pos)."background_color:'',
	panel_color:'',
	".substr($quickstyling,$pos);
			}
			$fcchat_options['quickstyling']=$quickstyling;
		}
		$fcchat_options['updates'].='update 3.2;';
	}

	// look for 3.7.3 updates
	$updated=false;
	$chatbox='';
    	if(isset($fcchat_options['updates'])){
		if(strpos($fcchat_options['updates'] , "update 3.7.3;") !== false){
			$updated=true;
		}
         }
    	if(isset($fcchat_options['chatbox'])){
		$chatbox=$fcchat_options['chatbox'];
    	}

	// apply 3.7.3 updates
	if(!$updated){
		if($chatbox!=''){
			$pos = strpos($chatbox,'dialog_width');
			if ($pos !== false) {
				$chatbox = substr($chatbox,0,$pos)."layout:1,  /* 0 - horizontal, 1 - vertical */
		dialog_height:384,
		".substr($chatbox,$pos);
			}
			$fcchat_options['chatbox']=$chatbox;
		}
		$fcchat_options['updates'].='update 3.7.3;';
	}
    }else{
	$fcchat_options = array();
	$fcchat_options['updates']='update 3.0;update 3.2;update 3.7.3;';
	
    }
    // Save changes
    $fcchat_options['revision']=$current_revision;
    update_option('fcchat_widget', $fcchat_options);
}
add_action('init','fcchat_update',1);
register_activation_hook( __FILE__, 'fcchat_update' );

// Add settings link on plugin page
function fcchat_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=fcchatsettings">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'fcchat_settings_link' );

?>