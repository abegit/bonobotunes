<div class="clear"></div>
</div> <!-- end buddyb wrap -->
<?php global $bp; ?>
<div class="col-md-12 footer">
	<!--
<?php if (bp_is_profile_component()) : echo 'bp_is_profile_component'; endif; ?>
<?php if (bp_is_blog_page()) : echo 'bp_is_blog_page'; endif; ?>
<?php if (bp_is_my_profile()) : echo 'bp_is_my_profile'; endif; ?>
<?php if (bp_is_home()) : echo 'bp_is_home'; endif; ?>
<?php if (bp_is_front_page()) : echo 'bp_is_front_page'; endif; ?>
<?php if (bp_is_activity_front_page()) : echo 'bp_is_activity_front_page'; endif; ?>
<?php if (bp_is_directory()) : echo 'bp_is_directory'; endif; ?>
<?php if (bp_is_profile_component()) : echo 'bp_is_profile_component'; endif; ?>
<?php if (bp_is_activity_component()) : echo 'bp_is_activity_component'; endif; ?>
<?php if (bp_is_blogs_component()) : echo 'bp_is_blogs_component'; endif; ?>
<?php if (bp_is_messages_component()) : echo 'bp_is_messages_component'; endif; ?>
<?php if (bp_is_friends_component()) : echo 'bp_is_friends_component'; endif; ?>
<?php if (bp_is_groups_component()) : echo 'bp_is_groups_component'; endif; ?>
<?php if (bp_is_settings_component()) : echo 'bp_is_settings_component'; endif; ?>
<?php if (bp_is_member()) : echo 'bp_is_member'; endif; ?>
<?php if (bp_is_user_activity()) : echo 'bp_is_user_activity'; endif; ?>
<?php if (bp_is_user_friends_activity()) : echo 'bp_is_user_friends_activity'; endif; ?>
<?php if (bp_is_activity_permalink()) : echo 'bp_is_activity_permalink'; endif; ?>
<?php if (bp_is_user_profile()) : echo 'bp_is_user_profile'; endif; ?>
<?php if (bp_is_profile_edit()) : echo 'bp_is_profile_edit'; endif; ?>
<?php if (bp_is_change_avatar()) : echo 'bp_is_change_avatar'; endif; ?>
<?php if (bp_is_user_groups()) : echo 'bp_is_user_groups'; endif; ?>
<?php if (bp_is_group()) : echo 'bp_is_group'; endif; ?>
<?php if (bp_is_group_home()) : echo 'bp_is_group_home'; endif; ?>
<?php if (bp_is_group_create()) : echo 'bp_is_group_create'; endif; ?>
<?php if (bp_is_group_admin_page()) : echo 'bp_is_group_admin_page'; endif; ?>
<?php if (bp_is_group_forum()) : echo 'bp_is_group_forum'; endif; ?>
<?php if (bp_is_group_activity()) : echo 'bp_is_group_activity'; endif; ?>
<?php if (bp_is_group_forum_topic()) : echo 'bp_is_group_forum_topic'; endif; ?>
<?php if (bp_is_group_forum_topic_edit()) : echo 'bp_is_group_forum_topic_edit'; endif; ?>
<?php if (bp_is_group_members()) : echo 'bp_is_group_members'; endif; ?>
<?php if (bp_is_group_invites()) : echo 'bp_is_group_invites'; endif; ?>
<?php if (bp_is_group_membership_request()) : echo 'bp_is_group_membership_request'; endif; ?>
<?php if (bp_is_group_leave()) : echo 'bp_is_group_leave'; endif; ?>
<?php if (bp_is_group_single()) : echo 'bp_is_group_single'; endif; ?>
<?php if (bp_is_user_blogs()) : echo 'bp_is_user_blogs'; endif; ?>
<?php if (bp_is_user_recent_posts()) : echo 'bp_is_user_recent_posts'; endif; ?>
<?php if (bp_is_user_recent_commments()) : echo 'bp_is_user_recent_commments'; endif; ?>
<?php if (bp_is_create_blog()) : echo 'bp_is_create_blog'; endif; ?>
<?php if (bp_is_user_friends()) : echo 'bp_is_user_friends'; endif; ?>
<?php if (bp_is_friend_requests()) : echo 'bp_is_friend_requests'; endif; ?>
<?php if (bp_is_user_messages()) : echo 'bp_is_user_messages'; endif; ?>
<?php if (bp_is_messages_inbox()) : echo 'bp_is_messages_inbox'; endif; ?>
<?php if (bp_is_messages_sentbox()) : echo 'bp_is_messages_sentbox'; endif; ?>
<?php if (bp_is_notices()) : echo 'bp_is_notices'; endif; ?>
<?php if (bp_is_messages_compose_screen()) : echo 'bp_is_messages_compose_screen'; endif; ?>
<?php if (bp_is_single_item()) : echo 'bp_is_single_item'; endif; ?>
<?php if (bp_is_activation_page()) : echo 'bp_is_activation_page'; endif; ?>
<?php if (bp_is_register_page()) : echo 'bp_is_register_page'; endif; ?>
-->
	<div class="alignright"><div class="navbar-brand title logo"></div></div>
	<?php /* Primary navigation */
			wp_nav_menu( array(
			  'theme_location' => 'footer',
			  'container' => false,
			  'menu_class' => 'nav navbar-nav alignleft',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?>
			<div class="clear"></div>
</div>
</div> <!-- end wrap -->
<!-- <div class="friends"><div class="row">
<ul class="colum dropup">
  <li><a href="./sitemap" class="ui-link">Sitemap</a><ul class="dropdown-menu dropdown-menu-left" role="menu">
  	<li><a href="#">one</a></li>
  	<li><a href="#">two</a></li>
  	<li><a href="#">three</a></li>
  </ul></li>
  <li><a href="./featured" class="ui-link">Featured Posts</a><ul class="dropdown-menu dropdown-menu-left" role="menu">
  	<li><a href="#">one</a></li>
  	<li><a href="#">two</a></li>
  	<li><a href="#">three</a></li>
  </ul></li>
  <li><a class="ui-link" href="./radio">Bonobo Radio</a><ul class="dropdown-menu dropdown-menu-left" role="menu">
  	<li><a href="#">one</a></li>
  	<li><a href="#">two</a></li>
  	<li><a href="#">three</a></li>
  </ul></li>
  <li><a class="ui-link" href="./studio-membership">Visit the HQ</a><ul class="dropdown-menu dropdown-menu-left" role="menu">
  	<li><a href="#">one</a></li>
  	<li><a href="#">two</a></li>
  	<li><a href="#">three</a></li>
  </ul></li>
  <li><a class="ui-link" href="http://Clip-o-Rama.com">Clip-o-Rama</a><ul class="dropdown-menu" role="menu">
  	<li><a href="#">one</a></li>
  	<li><a href="#">two</a></li>
  	<li><a href="#">three</a></li>
  </ul></li></ul>

<div class="colum">
<a style=" background: none repeat scroll 0 0 #000; display: inline-block; float: left; height: 35px; line-height: 25px; margin: 0; padding: 0 10px; position: relative; width: 150px; z-index: 12;" href="http://drsusanblock.tv/main/pages.php?id=listen" class="ui-link" target="_blank" data-rel="external"><img width="100%" src="http://www.drsusanblock.com/main/wp-content/themes/bonoboville/img/radio-suzy-1-logo.png" style="float:left;" class="dsb"></a>
<div style="margin:8px 0; float:left;"></div>
<div style="display: inline-block; background: none repeat scroll 0% 0% rgb(110, 157, 81); height: 26px; overflow: hidden; box-shadow: 0px 0px 20px 0px rgb(0, 0, 0) inset; color: rgb(16, 16, 16); margin: 0px auto; float: left; z-index: 1; position: absolute; top: 0px; left: 130px; width: 53%; line-height: 27px;">SEX, FUN, &amp; WISDOM   :   Recording Live Every Saturday Night From Bonoboville in LAX
</div>
<div style="right: 0px; position: absolute; height: 0px; float: right; display: inline-block;">
<a style="background: none repeat scroll 0px 0px rgb(127, 0, 0); box-shadow: none; text-transform: uppercase; z-index: 99; position: relative; padding: 6px 13px; line-height: 10px; border: 3px solid rgb(0, 0, 0); top: -3px;" class="button small  ui-link" href="http://drsusanblock.tv/main/pages.php?id=listen"><i style="padding: 3px 4px; background: none repeat scroll 0px 0px rgb(223, 223, 223); color: rgb(127, 0, 0); border-radius: 20px;" class="icon-play"></i>Listen</a>
</div></div>


</div></div> -->

<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/isotope.js"></script>
	<?php $afil = $_GET["friend"]; ?>
<script>
function setCookie(c_name,value,expiredays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays == 0) ? "" : ";expires="+exdate.toGMTString())+
	";path=/";
}
function getCookie(c_name){
	if (document.cookie.length>0) {
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1) {
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return "";
}

// start plugin
var jQone = jQuery.noConflict();
jQone(document).ready(function() {

	/** Splash page stuff **/
	jQone(window).load(function() {
		
		var helpa=getCookie("helper");


		<?php global $bp; ?>
		<?php if (isset($afil)) { ?>

 				if (helpa!=null && helpa!="") {
					return false;
				}		
				if (helpa=="") {
					var php_code = "<?php echo $afil; ?>";
					setCookie("helper",php_code,30);
				}
				if (helpa=="0") {
					var php_code = "<?php echo $afil; ?>";
					setCookie("helper",php_code,30);
				}

		<?php } else { ?>

 				if (helpa!=null && helpa!="") {
					return false;
				}		
				if (helpa=="") {
					var php_code = "<?php echo bp_displayed_user_id(); ?>";
					setCookie("helper",php_code,30);
				}
				if (helpa=="0") {
					var php_code = "<?php echo bp_displayed_user_id(); ?>";
					setCookie("helper",php_code,30);
				}

		<?php }; ?>



	});		

});
</script>


<script>

var $mmbrCookie  = jQuery.noConflict();
$mmbrCookie (document).ready(function() {
	$mmbrCookie (window).load(function() {
		
		// If there's a warning cookie in place, fade out the mask.
		
		var hoverContain=$mmbrCookie ('.row.featured');
		var vizibleInit=hoverContain.attr('visible', 1).removeClass('loading').addClass('animated');
		
			vizibleInit;

	
			//Fade in the Popup
			  // $mmbrCookie ('.navbar-brand, .featured.row').hover(function(e){
		   //  	 	 hoverContain.attr('visible', 1).addClass('animated').removeClass('ready');
				 //  },
				 //  function(e){
				 //      hoverContain.addClass('ready');
				 //  });	
	});		
});
</script>

 <?php wp_footer();?>



<script>
(function ($) {
	var $container = $('.grid'),
	colWidth = function () {
		var w = $container.width(), 
		columnNum = 1,
		columnWidth = 0;
		if (w > 1200) {
			columnNum  = 2;
		}
			  else if (w > 900) {
					columnNum  = 2;
		}
			  else if (w > 600) {
					columnNum  = 2;
		}
			  else if (w > 300) {
					columnNum  = 2;
		}
		columnWidth = Math.floor(w/columnNum);
		$container.find('.item').each(function() {
			var $item = $(this),
			multiplier_w = $item.attr('class').match(/item-w(\d)/),
			multiplier_h = $item.attr('class').match(/item-h(\d)/),
			width = multiplier_w ? columnWidth*multiplier_w[1]-10 : columnWidth-10,
			height = multiplier_h ? columnWidth*multiplier_h[1]*0.5-40 : columnWidth*0.5-40;
			$item.css({
				width: width,
					//height: height
				});
		});
		return columnWidth;
	},
	isotope = function () {
		$container.imagesLoaded( function(){
			$container.isotope({
				resizable: false,
				itemSelector: '.item',
				masonry: {
					columnWidth: colWidth(),
					gutterWidth: 20
				}
			});
		});
	};

	isotope();
	
	$(window).smartresize(isotope);


	
	// //image fade
	// $('.activity-item img').hide().one("load",function(){
	// 	$(this).fadeIn(500);
	// }).each(function(){
	// 	if(this.complete) $(this).trigger("load");
	// });

    // //tab sidebar
    // $('#myTab a').click(function (e) {
    // 	e.preventDefault()
    // 	$(this).tab('show')
    // })

    // $(document).ready(function(){
    // 	$('.load-more').on('click',function(){
    // 		$(window).smartresize(isotope);
    // 	});
    // });
}(jQuery));


</script>
<script>
// var $navDropz = jQuery.noConflict();
// $navDropz(document).ready(function(){
	// var $butan =  $navDropz('.netmenu');
	// $butan.attr('href','#');
	// $butan.click(function(){
	// 	var X=$navDropz(this).attr('data-uri');
	// 	if(X==1){
	// 		$navDropz(this).removeClass('open');
	// 		$navDropz('#details').removeClass('zoomIn animated').addClass('hidden');
	// 		$navDropz(this).attr('data-uri', '0');
	// 	} else{
	// 		$navDropz(this).addClass('open');
	// 		$navDropz('#details').removeClass('hidden').addClass('zoomIn animated');
	// 		$navDropz(this).attr('data-uri', '1');
	// 	}
	// });

	// var $butan =  $navDropz('.navbar-brand');
	// $butan.click(function(){
	// 	var X=$navDropz(this).attr('data-uri');
	// 	if(X==1){
	// 		$navDropz(this).removeClass('open');
	// 		$navDropz('.featured.row').removeClass('ready');
	// 		$navDropz(this).attr('data-uri', '0');
	// 	} else{
	// 		$navDropz(this).addClass('open');
	// 		$navDropz('.featured.row').addClass('ready animated');
	// 		$navDropz(this).attr('data-uri', '1');
	// 	}
	// });
// });
</script>

<?php if (is_buddypress()){ ?>
<script>
var $navSidebarz = jQuery.noConflict();
$navSidebarz(document).ready(function(){
	var $butan =  $navSidebarz('#dashboard');
	$butan.attr('href','#');
	$butan.click(function(){
		var X=$navSidebarz(this).attr('data-uri');
		if(X==1){
			$navSidebarz(this).removeClass('open');
			$navSidebarz('.single-in').removeClass('open');
			$navSidebarz('.single .col-md-3').delay(1500).removeClass('hidden').addClass('zoomIn animated');
			$navSidebarz(this).attr('data-uri', '0');
		} else{
			$navSidebarz(this).addClass('open');
			$navSidebarz('.single .col-md-3').removeClass('zoomIn animated').addClass('hidden');
			$navSidebarz('.single-in').delay(1000).addClass('open');
			$navSidebarz(this).attr('data-uri', '1');
		}
	});
});
</script>
<?php }; ?>






<!-- <script src="http://www.google.com/jsapi"></script>
<script src="./wp-content/plugins/google-custom-search/js/gsc.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script> -->


	<script>
    var $finalInit = jQuery.noConflict();
    var hght = $finalInit(".row.featured").height();
    // $finalInit(".row.featured").hide();
        $finalInit(window).load(function() {
            $finalInit(".row.featured").delay(400).addClass('animate');
            $finalInit("body").addClass('init');
        });
    </script>

   


<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jq-1.4.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ioss.js"></script>

<?php if (bp_is_activity_directory()) { ?>
<script>
var $sliderInit = jQuery.noConflict();

$sliderInit(window).load(function() {
        	var arrayOfImages = new Array();
				var bufferDistance = 0;
				
				$sliderInit('.row.featured').iosSlider({
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
	                $sliderInit('.item').addClass('ready');
	            }

	            function showMySlider() {
	                $sliderInit('.item').addClass('ready');
	            }

	            function slideComplete(args) {
	                	$sliderInit('span.next, span.prev').removeClass('unselectable');
	                if(args.currentSlideNumber == 1) {
	                    $sliderInit('span.prev').addClass('unselectable');
	                } else if(args.currentSliderOffset == args.data.sliderMax) {
	                    $sliderInit('span.next').addClass('unselectable');
             	   }
            	}
</script>
<?php }; ?>

<?php if (is_page_template('page-boiler.php')) { ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/parallax.js"></script>

<script>
jQuery(document).ready(function()
{
    jQuery('.layer').parallax({
		mouseport: jQuery(".row.featured")
	});
});
</script>

<?php } ?>

<?php if (is_page('6')) { ?>
	<script>    

var mmberPostBlur = jQuery.noConflict();
mmberPostBlur(function() {
  // Change this value to adjust the amount of blur
  var BLUR_RADIUS = 30;

  var canvas = document.querySelector('[data-canvas]');
  var canvasContext = canvas.getContext('2d');
  var image = new Image();
  image.src = document.getElementsByClassName('.avatar').src;
  
  var drawBlur = function() {
    var w = canvas.width;
    var h = canvas.height;
    canvasContext.drawImage(image, 0, 0, w, h);
    stackBlurCanvasRGBA('backdrop', 0, 0, w, h, BLUR_RADIUS);
  };
  
  image.onload = function() {
    drawBlur();
    mmberPostBlur('#backdrop').attr('class', 'visible').delay( 800 ).fadeIn(400);
  }
});

</script>
<?php }; ?>





<?php if (is_page_template('page-no-sidebar.php')) { ?>
	<script>    

var mmberPostBlur = jQuery.noConflict();
mmberPostBlur(function() {
  // Change this value to adjust the amount of blur
  var BLUR_RADIUS = 30;

  var canvas = document.querySelector('[data-canvas]');
  var canvasContext = canvas.getContext('2d');
  var image = new Image();
  image.src = document.querySelector('[data-canvas-image]').src;
  
  var drawBlur = function() {
    var w = canvas.width;
    var h = canvas.height;
    canvasContext.drawImage(image, 0, 0, w, h);
    stackBlurCanvasRGBA('backdrop', 0, 0, w, h, BLUR_RADIUS);
  };
  
  image.onload = function() {
    drawBlur();
    mmberPostBlur('#backdrop').attr('class', 'visible').delay( 800 ).fadeIn(400);
  }
});

</script>
<?php }; ?>


</body>
</html>

