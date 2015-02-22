<div class="clear"></div>
<div class="col-md-12 footer">

	<div class="alignright"><a href="/"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bonoboville-skinny-logo.png"></a></div>
	<?php /* Primary navigation */
			wp_nav_menu( array(
			  'theme_location' => 'footer',
			  'container' => false,
			  'menu_class' => 'nav navbar-nav alignleft',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?>
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

var $n4w  = jQuery.noConflict();
$n4w (document).ready(function() {
	$n4w (window).load(function() {
		
		// If there's a warning cookie in place, fade out the mask.
		var warn=getCookie("warn");
		var warn2=getCookie("warn2");
		var warn3=getCookie("warn3");
		var warn4=getCookie("warn4");
		var hoverContain=$n4w ('.row.featured');
		var vizibleInit=hoverContain.attr('visible', 1).removeClass('loading').addClass('animated');
		
			vizibleInit;

		if (warn=null){
			setCookie("warn",1,30);
		}	
		if (warn!=null && warn!=""){
			setCookie("warn2",1,30);
		}	
		if (warn2!=null && warn2!=""){
			setCookie("warn3",1,30);
		}	
		if (warn3!=null && warn3!=""){
			setCookie("warn4",1,30);
		}	
		if (warn4!=null && warn4!=""){
			setCookie("warn5",1,30);
			//Fade in the Popup
			  $n4w ('.navbar-brand, .featured.row').hover(function(e){
	    	 	 hoverContain.attr('visible', 1).addClass('animated').removeClass('ready');
			  },
			  function(e){
			      hoverContain.addClass('ready');
			  });
		}		
	});		
});
</script>

<script>
(function ($) {
	var $container = $('.activity-lisdt'),
	colWidth = function () {
		var w = $container.width(), 
		columnNum = 1,
		columnWidth = 0;
		if (w > 1200) {
			columnNum  = 4;
		} else if (w > 900) {
			columnNum  = 4;
		} else if (w > 600) {
			columnNum  = 3;
		} else if (w > 300) {
			columnNum  = 2;
		}
		columnWidth = Math.floor(w/columnNum);
		$container.find('.activity-itdem').each(function() {
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
				itemSelector: '.activity-item',
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

// var $n3w = jQuery.noConflict();
// $n3w(document).ready(function(){
	// var $butan =  $n3w('.netmenu');
	// $butan.attr('href','#');
	// $butan.click(function(){
	// 	var X=$n3w(this).attr('data-uri');
	// 	if(X==1){
	// 		$n3w(this).removeClass('open');
	// 		$n3w('#details').removeClass('zoomIn animated').addClass('hidden');
	// 		$n3w(this).attr('data-uri', '0');
	// 	} else{
	// 		$n3w(this).addClass('open');
	// 		$n3w('#details').removeClass('hidden').addClass('zoomIn animated');
	// 		$n3w(this).attr('data-uri', '1');
	// 	}
	// });

	// var $butan =  $n3w('.navbar-brand');
	// $butan.click(function(){
	// 	var X=$n3w(this).attr('data-uri');
	// 	if(X==1){
	// 		$n3w(this).removeClass('open');
	// 		$n3w('.featured.row').removeClass('ready');
	// 		$n3w(this).attr('data-uri', '0');
	// 	} else{
	// 		$n3w(this).addClass('open');
	// 		$n3w('.featured.row').addClass('ready animated');
	// 		$n3w(this).attr('data-uri', '1');
	// 	}
	// });


// });
</script>

<?php if (is_buddypress()){ ?>
<script>

var $desh = jQuery.noConflict();
$desh(document).ready(function(){
	var $butan =  $desh('#dashboard');
	$butan.attr('href','#');
	$butan.click(function(){
		var X=$desh(this).attr('data-uri');
		if(X==1){
			$desh(this).removeClass('open');
			$desh('.single-in').removeClass('open');
			$desh('.single .col-md-3').delay(1500).removeClass('hidden').addClass('zoomIn animated');
			$desh(this).attr('data-uri', '0');
		} else{
			$desh(this).addClass('open');
			$desh('.single .col-md-3').removeClass('zoomIn animated').addClass('hidden');
			$desh('.single-in').delay(1000).addClass('open');
			$desh(this).attr('data-uri', '1');
		}
	});



});
</script>
<?php }; ?>
<?php if (bp_is_activity_component() && bp_is_user()){ ?>


	<script>
	var braekon = jQuery.noConflict();
	braekon(document).ready(function() {
	 // ---------------------nav sticktop---------------------------
   var scroll_div = braekon('#item-header'); // the div that is going to be stuck on the top
   var sticktop = braekon('#item-header').offset().top; // grab the initial top offset of the navigation
   var socialtab = braekon('#social-tabs');
   var contacttab = braekon('.slide-out-div .handle')

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticknav = function () {
   var scroll_top = braekon(window).scrollTop(); // our current vertical position from the top



        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scroll_top > sticktop) {
        	braekon(scroll_div).addClass('sticktop');  
        } else {
        	braekon(scroll_div).removeClass('sticktop');
        }
        
     // ---------------------------------this is for after 200 pixels under the nav sticktop
     if (scroll_top - 200 > sticktop) {
     	braekon(socialtab).stop().animate({
     		marginRight: 0,
     	}, 150 );
     	braekon(contacttab).stop().animate({
     		left: "-40px",
     	}, 150 );
     } else {
     	braekon(socialtab).stop().animate({
     		marginRight: "34px",
     	}, 150 );
     	braekon(contacttab).stop().animate({
     		left: 0,
     	}, 150 );
     }
     
     
 };

    // run our function on load
    sticknav();

   // and run it again every time you scroll
   braekon(window).scroll(function () {
   	sticknav();
   });




});
</script>
<?php } ?>


<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ioss.js"></script>


<?php if (is_page('6')) { ?>
	<script>    

var abeLur = jQuery.noConflict();
abeLur(function() {
  // Change this value to adjust the amount of blur
  var BLUR_RADIUS = 30;

  var canvas = document.querySelector('[data-canvas]');
  var canvasContext = canvas.getContext('2d');
  var image = new Image();
  image.src = document.querySelector('.avatar').src;
  
  var drawBlur = function() {
    var w = canvas.width;
    var h = canvas.height;
    canvasContext.drawImage(image, 0, 0, w, h);
    stackBlurCanvasRGBA('backdrop', 0, 0, w, h, BLUR_RADIUS);
  };
  
  image.onload = function() {
    drawBlur();
    abeLur('#backdrop').attr('class', 'visible').delay( 800 ).fadeIn(400);
  }
});

</script>
<?php }; ?>


<?php if (is_page_template('page-no-sidebar.php')) { ?>
	<script>    

var abeLur = jQuery.noConflict();
abeLur(function() {
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
    abeLur('#backdrop').attr('class', 'visible').delay( 800 ).fadeIn(400);
  }
});

</script>
<?php }; ?>




<!-- <script src="http://www.google.com/jsapi"></script>
<script src="./wp-content/plugins/google-custom-search/js/gsc.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script> -->


	<!-- <script>
    var $frontpg = jQuery.noConflict();
    var hght = $frontpg(".row.featured").height();
    $frontpg(".row.featured").hide();
        $frontpg(window).load(function() {

            $frontpg(".row.featured").delay(400).addClass('animate').attr('style', '');
        });
    </script> -->

    <?php wp_footer();?>
</body>
</html>

