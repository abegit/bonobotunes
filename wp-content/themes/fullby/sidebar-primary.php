<?php if (!is_user_logged_in()) { ?>
	<div class="widget panel-primary panel">
	
<div class="clear"></div>

<div class="tab-spacer">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified" id="myTab">
    
      <li class="active"><a href="#signin" data-toggle="tab"> <i class="icon-bolt"></i> Sign In</a></li>
      <li><a href="#signup" data-toggle="tab"> <i class="icon-clock-o"></i> Sign Up</a></li>
      
    </ul>
      
    <!-- Tab panes -->
    <div class="tab-content">
      
      <div class="tab-pane fade in active" id="signin">
        <h3 style=" font-size: 22px; font-weight: 300; margin-bottom: 20px; text-align: center;">Sign In to Explore!</h3>
  <form name="login-form" id="login-form" action=" <?php echo site_url( 'wp-login.php' ) ?>" method="post">
                       <div class="input-prepend">
                           <span class="add-on"> <i class="icon-user"> </i> </span>
                           <input type="text" name="log" id="user_login" value="" placeholder=" <?php _e( 'Username', 'firmasite' ) ?>" />
                       </div>
                       <div class="input-prepend">
                           <span class="add-on"> <i class="icon-lock"> </i> </span>
                           <input type="password" name="pwd" id="user_pass" value="" placeholder=" <?php _e( 'Password', 'firmasite' ) ?>" />
                       </div>

                       <!-- <label for="rememberme" class="checkbox"> <input name="rememberme" type="checkbox" id="rememberme" value="forever" />  <?php esc_attr_e('Remember Me', 'firmasite'); ?> </label> -->
                       <input type="submit" name="wp-submit" id="wp-submit" value=" <?php _e( 'Log In', 'firmasite' ) ?>"/>
                       <a onclick="myFunction()" class="bblogin bblogin-dv bblogin-provider"></a>
                       <a onclick="yrFunction()" class="bblogin bblogin-rq bblogin-provider"></a>
                       <input class="btn btn-primary pull-right" type="button" name="signup-submit" id="signup-submit" value=" <?php _e( 'Create an Account', 'firmasite' ) ?>" onclick="location.href=' <?php echo bp_signup_page() ?>'" />
                       
                       <input type="hidden" name="redirect_to" value="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
                       <input type="hidden" name="testcookie" value="1" />
                       <?php do_action( 'bp_login_bar_logged_out' ) ?>
  </form>
  <script>
  function yrFunction() {
    var myWindow = window.open("http://testbonoboville.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Twitter", "Twitter Auth for Bonoboville", "width=640, height=640");
}
function myFunction() {
    var myWindow = window.open("http://testbonoboville.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Facebook", "Facebook Login for Bonoboville", "width=640, height=640");
}
</script>
      
      </div>
      
      <div class="tab-pane fade" id="signup">
         
          <?php echo do_shortcode('[wppb-register]'); ?>
      </div>
           
    </div>
  
  </div>

</div>
		<?php } ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar') ) : ?>
	
	<?php endif; ?>		