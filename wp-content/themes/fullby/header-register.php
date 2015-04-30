<!DOCTYPE html>
<html  <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php echo get_option('fullby_description'); ?>" />
    
    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png" type="image/x-icon"> 

    <!-- Bootstrap core CSS -->
    <!-- <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css"> -->

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v=1" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts.css" rel="stylesheet">
  
    
    <!-- Google web Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,100' rel='stylesheet' type='text/css'>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- Analitics -->
	<?php if (get_option('fullby_analytics') <> "") { echo get_option('fullby_analytics'); } ?>
    
	<?php wp_head(); ?> 
</head>
<body <?php body_class('registration'); ?>>
    <div class="navbar navbar-inverse text-center">
     <div class="row">
        <div class="navbar-header">
          <div id="mainmenu" class="collapse col-md-3">
<!-- <div id="hello" style="position:absolute;right:0; top:0; color:#fff; text-transform:uppercase; cursor:pointer; height:30px; line-height:30px; display:block;"><i class="icon-menu"></i> menu</div> -->
          <ul id="togggle"> <li><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#submenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button></li>
          <li><button type="button" class="navbar-toggle for-submenu" data-toggle="collapse" data-target="#sidebar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button></li> </ul>
          <?php /* Primary navigation */
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav navbar-nav alignright',
        //Process nav menu using our custom nav walker
        'walker' => new wp_bootstrap_navwalker())
      );
      ?>

        <div class="search-cont col-md-3 alignright" style="clear:both; max-height:30px;">
          <?php // display_search_box(DISPLAY_RESULTS_CUSTOM); ?> 
        </div>

        </div>
          <a class="navbar-brand logo" href="<?php if (is_home()){
                    echo '#';
                    } else {
                  echo home_url(); }; ?>">
            </a>
        </div>
    </div>
<?php $hey = $_GET["friend"]; ?>
    <div class="btn-drop row<?php if (!isset($hey) && bp_is_register_page()) { ?> open<?php } ?>"<?php if (!isset($hey)) { ?> data-uri="1"<?php } ?>>
              <i class="icon-user btn-drop-btn" style="background:red;width:auto;padding:10px;color:#fff"></i>
              <div class="accordian">
                
            <?php echo do_shortcode('[wordpress_social_login]'); ?>
                <form name="login-form" id="login-form" class="login-form" action=" <?php echo site_url( 'wp-login.php' ) ?>" method="post">
                       <div class="input-group">
                           <span class="input-group-addon"> <i class="icon-user"> </i> </span>
                           <input type="text" class="form-control" name="log" id="user_login" value="" placeholder=" <?php _e( 'Username', 'firmasite' ) ?>" />
                       </div>
                       <div class="input-group">
                           <span class="input-group-addon"> <i class="icon-lock"> </i> </span>
                           <input type="password" class="form-control" name="pwd" id="user_pass" value="" placeholder=" <?php _e( 'Password', 'firmasite' ) ?>" />
                       </div>

                       <input class="btn btn-primary pull-left" type="submit" name="wp-submit" id="wp-submit" value=" <?php _e( 'Log In', 'firmasite' ) ?>"/>
                        <a href="<?php echo site_url( 'wallet/update-password' ) ?>">Forgot Password?</a>
                        <input type="hidden" name="testcookie" value="1" />
                        <input type="hidden" name="redirect_to" value="<?php echo home_url().'/home' ?>" />
                   </form>
              </div>
            </div>
</div>

<div id="loader">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ajax-loader.gif">
</div>
	

