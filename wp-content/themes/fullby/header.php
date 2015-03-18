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
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v=1" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts.css" rel="stylesheet">
  
    <!-- animate -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.css" rel="stylesheet">

    <!-- Google web Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,100' rel='stylesheet' type='text/css'>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   
    
    <!-- Analitics -->
	<?php if (get_option('fullby_analytics') <> "") { echo get_option('fullby_analytics'); } ?>
    
	<?php wp_head(); ?> 

  <script src="http://www.google.com/jsapi"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/gfeedfetcher.js"></script>

</head>
<body <?php body_class(); ?>>
    <div class="navbar navbar-inverse">
    	<div id="details" class="hidden">
    		<div class="row">
					<h2>Use This</h2>
		</div>
</div>
     <div class="row">
        <div class="navbar-header">
        	<div id="mainmenu" class="collapse navbar-collapse col-md-3">
<!-- <div id="hello" style="position:absolute;right:0; top:0; color:#fff; text-transform:uppercase; cursor:pointer; height:30px; line-height:30px; display:block;"><i class="icon-menu"></i> menu</div> -->
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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <button type="button" class="navbar-toggle for-submenu" data-toggle="collapse" data-target="#submenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="<?php if (bp_is_directory() && bp_is_activity_component()){
          			echo '#';
					} else {
				  echo home_url(); }; ?>">
		 	</a>
        
        
        <!--/.nav-collapse -->
                <div  id="submenu" class="collapse navbar-collapse">
          <?php /* Primary navigation */
			wp_nav_menu( array(
			  'theme_location' => 'secondary',
			  'container' => false,
			  'menu_class' => 'nav navbar-nav',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?>

	        
        </div>
        </div><!--/.nav-collapse -->

    </div>
    </div>
     <!-- <div class="row spacer"></div> -->
    <?php if (bp_is_activity_directory()) { ?>
    
    		
	    	 <div id="featMenu" class="row"><span class="btn sliderNav btn-primary next" style="cursor: pointer;"><i class="icon-backward2"></i></span><div class="row featured loading menu">
	    	 	<div class="slider">

	    	 			<div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
	    	 				<a href="/bla-bla/">
	    	 					<div class="caption">
	    	 						<div class="cat"><span>hello</span></div>
	    	 						<div class="date"><i class="fa fa-clock-o"></i> hello &nbsp;



	    	 							<i class="fa fa-video-camera"></i> hello



	    	 						</div>

	    	 						<h2 class="title">Bonoboville <br> Bla Bla</h2>

	    	 					</div>


	    	 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nav-StageW.jpg" alt="">
	    	 				</a>
	    	 			</div>
	    	 			
	    	 			<div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
	    	 				<a href="#">
	    	 					<div class="caption">
	    	 						<div class="cat"><span>hello</span></div>
	    	 						<div class="date"><i class="fa fa-clock-o"></i> hello &nbsp;



	    	 							<i class="fa fa-video-camera"></i> hello



	    	 						</div>

	    	 						<h2 class="title">The <br> Institute </h2>

	    	 					</div>


	    	 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nav-institute.jpg" alt="Dr. Susan Block's Institute">
	    	 				</a>
	    	 			</div>
	    	 			<div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
	    	 				<a href="/">
	    	 					<div class="caption">
	    	 						<div class="cat"><span>hello</span></div>
	    	 						<div class="date"><i class="fa fa-clock-o"></i> hello &nbsp;



	    	 							<i class="fa fa-video-camera"></i> hello



	    	 						</div>

	    	 						<h2 class="title"> Bonoboville Theatre </h2>

	    	 					</div>


	    	 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nav-theatre.jpg" alt="Bonoboville Theatre">
	    	 				</a>
	    	 			</div>
	    	 			<div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
	    	 				<a href="/">
	    	 					<div class="caption">
	    	 						<div class="cat"><span>hello</span></div>
	    	 						<div class="date"><i class="fa fa-clock-o"></i> hello &nbsp;



	    	 							<i class="fa fa-video-camera"></i> hello



	    	 						</div>

	    	 						<h2 class="title"> Agwa Liquour </h2>

	    	 					</div>


	    	 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nav-agwa-liquor-ad.jpg" alt="Agwa Liquor Ad">
	    	 				</a>
	    	 			</div>
	    	 			<div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
	    	 				<a href="#">
	    	 					<div class="caption">
	    	 						<div class="cat"><span>hello</span></div>
	    	 						<div class="date"><i class="fa fa-clock-o"></i> hello &nbsp;



	    	 							<i class="fa fa-video-camera"></i> hello



	    	 						</div>

	    	 						<h2 class="title">Attend a<br> Show
	    	 						</h2>

	    	 					</div>


	    	 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nav-StageW.jpg" alt="">
	    	 				</a>
	    	 			</div>

	    	 	</div> <!-- end slider -->
			</div> <!-- end featured -->
			<span class="btn sliderNav btn-primary prev" style="cursor: pointer;"> <i class="icon-forward3"></i></span>
</div>



<div class="accordian wrap closed"><span class="btn-drop"><i class="icon-plus2"></i> <span class="text-hide">Read More</span></span>
<script type="text/javascript">
            var newcss=new gfeedfetcher("blogroll", "", "");
            newcss.addFeed("Bloggamy", "http://bloggamy.com/category/shows/feed") //Specify "label" plus URL to RSS feed
            newcss.displayoptions("description") //show the specified additional fields
            newcss.addregexp(/(\[CDATA\[)|(\]\])/g, '', 'descriptionfield')
            newcss.definetemplate("<span id='hd'>{description}</span><span id='dc'><div class='artistTXT' url='{url}'>{title}</div></span><span id='dcc' style='display:none;'>{datetime}</span><span id='ex'><a href='http://bloggamy.com' target='_new'>DSB Radio</a></span>")
            newcss.setentrycontainer("div", "item") //Display each entry as a DIV (div element)
            newcss.filterfeed(100, "date") //Show 5 entries, sort by date
            // newcss.onfeedload=function(){
            //     alert("RSS Displayer has loaded!")
            // }
            newcss.init() //Always call this last 
</script>

</div>
	<?php }  ?>
	
	 <!-- <div class="navbar navbar-sub row">
     	<div class="row">
        <div class="navbar-header">
        		<div id="mainmenu" class="collapse navbar-collapse col-md-12">
          <?php /* Primary navigation */
			// wp_nav_menu( array(
			  // 'theme_location' => 'third',
			  // 'container' => false,
			  // 'menu_class' => 'nav navbar-nav alignright',
			  // Process nav menu using our custom nav walker
			  // 'walker' => new wp_bootstrap_navwalker())
			// );
			?>
				<div class="search-cont col-md-3 alignright" style="clear:both; max-height:30px;">
					<?php // display_search_box(DISPLAY_RESULTS_CUSTOM); ?>	
				</div>

        </div>


        </div>
	</div>
	</div> -->