<!DOCTYPE html>
<html  <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php if(!bp_is_blog_page()){ the_title(); ?> - <?php bloginfo('name'); ?><?php } else { wp_title('&raquo;','true','right'); bloginfo('name'); } ?> </title>
    <meta name="description" content="<?php echo get_option('fullby_description'); ?>" />
    
    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png" type="image/x-icon"> 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v=3" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts.css" rel="stylesheet">
  
    <!-- animate -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.css" rel="stylesheet">

    <!-- Google web Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,100|Open+Sans+Condensed:700|PT+Sans+Caption|Paytone+One' rel='stylesheet' type='text/css'>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   
    
    <!-- Analitics -->
  <?php if (get_option('fullby_analytics') <> "") { echo get_option('fullby_analytics'); } ?>
    
  <?php wp_head(); ?> 

  <script src="http://www.google.com/jsapi"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/gfeedfetcher.js"></script>

</head>

<?php if (is_tree( '83' )) {$uniqueCatcher = 'classifiedsindex'; } else {$uniqueCatcher = ''; } ?>
<body <?php body_class($uniqueCatcher); ?>>
    <!-- <div class="spacer"></div> -->
    <div class="spacer sticknav"></div>
    <div class="navbar navbar-inverse">
      
     <div class="row">
        <div class="navbar-header">
          
          <a class="navbar-brand logo" href="<?php echo home_url(); ?>"></a>

<?php if (!is_user_logged_in()) { ?>
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
        </div>

        <?php } ?>

        <div class="clear"></div>
        
        </div><!--/.nav-collapse -->

    </div>
    </div>
    
<div id="loader">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ajax-loader.gif">
</div>
  

