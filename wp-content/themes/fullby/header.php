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
    <div class="navbar navbar-inverse navbar-fixed-top">
    	<div id="details" class="hidden">
    		<div class="row">
					<h2>Use This</h2>
		</div>
</div>
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
          <a class="navbar-brand logo" href="<?php echo home_url(); ?>">
		 	</a>
        
        
        <!--/.nav-collapse -->
                <div  id="submenu" class="collapse">
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
    
    <?php if (bp_is_activity_directory()) { ?>

	<div class="row">
	    	 <div id="featMenu"><span class="btn sliderNav btn-primary next" style="cursor: pointer;"><i class="icon-backward2"></i></span><div class="row featured loading menu">
	    	 	<div class="slider">

						<?php wp_reset_query(); ?> 
					<?php $nextNewPosts = new WP_Query();
					$nextNewPosts->query('tag=featured&showposts=6'); ?>
					
					<?php if ($nextNewPosts->have_posts()) : while($nextNewPosts->have_posts()) : $nextNewPosts->the_post(); ?>
						<div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
						<?php $externalPost = get_post_meta($post->ID, '_yoast_wpseo_redirect', true ); ?>		    	

							<a href="<?php if($externalPost != '') { echo $externalPost.'" target="_new'; } else { the_permalink(); } ?>">
								<?php $video = get_post_meta($post->ID, 'fullby_video', true );
					  
								if($video != '') {?>
					
									 <img class="yt-featured" src="http://img.youtube.com/vi/<?php echo $video ?>/hqdefault.jpg" class="grid-cop"/>
										
								<?php } else if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail('quad', array('class' => 'quad')); ?>
				                <?php } ?>

					    		<div class="caption">
						    		<div class="cat"><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span></div>
						    		<div class="date"><i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> &nbsp;
						    		
						    			<?php if ($video != '') { ?>
						             			
						             		<i class="fa fa-video-camera"></i> Video
						             			
						             	<?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
						             			
						             		<i class="fa fa-th"></i> Gallery

					             		<?php } else {?>

					             		<?php } ?>

						    		
						    		</div>
						    		
						    		<h2 class="title"><?php the_title(); ?></h2>
						    		
					    		</div>

						    </a>
						
						</div>
					
					<?php endwhile;  else : ?>

						<p>Sorry, no posts matched your criteria.</p>

					<?php endif; ?>	
	    	 	</div> <!-- end slider -->
			</div> <!-- end featured -->
			<span class="btn sliderNav btn-primary prev" style="cursor: pointer;"> <i class="icon-forward3"></i></span>
</div>

</div>
	<?php }  ?>
	
	 <!-- <div class="navbar navbar-sub row">
     	<div class="row">
        <div class="navbar-header">
        		<div id="mainmenu" class="collapse col-md-12">
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