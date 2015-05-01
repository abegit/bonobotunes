<?php if (bp_is_activity_directory()) { ?>
<?php wp_reset_query(); ?> 
<?php $nextNewPosts = new WP_Query();
$nextNewPosts->query('category_name=news&showposts=3'); ?>

<?php if ($nextNewPosts->have_posts()) { while($nextNewPosts->have_posts()) { $nextNewPosts->the_post(); ?>
	<div class="col-sm-6 col-xs-6 col-md-4 bare">
	<?php $externalPost = get_post_meta($post->ID, '_yoast_wpseo_redirect', true ); ?>		    	
		<a href="<?php if($externalPost != '') { echo $externalPost.'" target="_new'; } else { the_permalink(); } ?>">
			<?php $video = get_post_meta($post->ID, 'fullby_video', true );
				if($video != '') {?>
				 <img class="yt-featured" src="http://img.youtube.com/vi/<?php echo $video ?>/hqdefault.jpg" class="grid-cop"/>
			<?php } else if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('quad', array('class' => 'quad')); ?>
            <?php } ?>
	    </a>
	
	</div>

<?php } ?>
<?php } ?>	
<div class="col-sm-6 col-xs-6 col-md-4 bare sm-show">
		<a href="/news" class="panel">
				View More
	    </a>	
	</div>
<?php } ?>




<div class="clear"></div>
</div> <!-- end buddyb -->
<?php global $bp; ?>
<div class="col-md-12 footer">
	<div style="display:none;"></div>
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



<div id="friends" class="bar"><div class="row">
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


</div></div>

<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popRocks.js"></script>
	<?php if (is_page('46869')) {?>
      <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jwplayer.js"></script>
	  <script type="text/javascript">jwplayer.key="qLzynSodouEg2o+gukjzO+6P0dzyHYq1TqcHaUF9cJE=";</script>
	  <script>
		jwplayer("mediaPlayer").setup({
			        height: 270,
			        width: 448,
			        title : 'Tune in Saturday Nights to Watch Live 10 to 12 pm PST',
			        file: 'rtmp://cs2055.mojohost.com/streamtest/testing'
			    });
      </script>
	 <?php } ?>

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
					setCookie("helper",<?php echo $afil; ?>,30);
				}
				if (helpa=="0") {
					setCookie("helper",<?php echo $afil; ?>,30);
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
var $navDropz = jQuery.noConflict();
$navDropz(document).ready(function(){
	var $butan =  $navDropz('.btn-drop');
	$butan.attr('href','#');
	$butan.click(function(){
		var X=$navDropz(this).attr('data-uri');
		if(X==1){
			$navDropz(this).removeClass('open');
			$navDropz(this).attr('data-uri', '0');
		} else{
			$navDropz(this).addClass('open');
			$navDropz(this).attr('data-uri', '1');
		}
	});

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
});
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







	<script>
    var $finalInit = jQuery.noConflict();
    var hght = $finalInit(".row.featured").height();
    // $finalInit(".row.featured").hide();
        $finalInit(window).load(function() {
            $finalInit(".row.featured").delay(400).addClass('animate');
            $finalInit("body").addClass('init');
        });
    </script>

   




<?php if (bp_is_activity_directory()) { ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jq-1.4.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ioss.js"></script>


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
		mouseport: jQuery(".row.featured");
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
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jq-1.4.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ioss.js"></script>
	<script>    

var mmberPostBlur = jQuery.noConflict();
mmberPostBlur(function() {
  // Change this value to adjust the amount of blur
  var BLUR_RADIUS = 40;

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



    <script>
    var ourNav = jQuery.noConflict();
    ourNav(window).load(function() {
     // ---------------------nav sticktop---------------------------
   var scroll_div = ourNav('.navbar.navbar-fixed-top'); // the div that is going to be stuck on the top
   var sticktop = ourNav('.navbar.navbar-fixed-top').offset().top; // grab the initial top offset of the navigation
   // var socialtab = ourNav('#social-tabs');
   // var contacttab = ourNav('.slide-out-div .handle')

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var OurStickNav = function () {
       var scroll_top = ourNav(window).scrollTop(); // our current vertical position from the top



            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scroll_top > sticktop) {
                ourNav(scroll_div).addClass('sticktop');
                ourNav('.spacer.sticknav').css('height', 90);
            } else {
                ourNav(scroll_div).removeClass('sticktop');
                ourNav('.spacer.sticknav').css('height', 0);
		         // // ---------------------------------this is for after 200 pixels under the nav sticktop
		         // if (scroll_top - 200 > sticktop) {
		         //    ourNav(socialtab).stop().animate({
		         //        marginRight: 0,
		         //    }, 150 );
		         //    ourNav(contacttab).stop().animate({
		         //        left: "-40px",
		         //    }, 150 );
		         // } else {
		         //    ourNav(socialtab).stop().animate({
		         //        marginRight: "34px",
		         //    }, 150 );
		         //    ourNav(contacttab).stop().animate({
		         //        left: 0,
		         //    }, 150 );
		         // }
		         
         
        };
    };

    // run our function on load
    OurStickNav();

   // and run it again every time you scroll
   ourNav(window).scroll(function () {
    OurStickNav();
   });




});
</script>





<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61576092-1', 'auto');
  ga('send', 'pageview');

</script>
 <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=8171400; 
var sc_invisible=1; 
var sc_security="f4667f58"; 
var sc_https=1; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hit counter"
href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/8171400/0/f4667f58/1/"
alt="hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->  

</body>
</html>

