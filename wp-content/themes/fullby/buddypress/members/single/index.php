
<?php get_header(); ?>	

        <div class="wrap">
        <div class="buddyb">

	
		<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 		
									<?php the_content('Leggi...');?>
				 					
			<?php endwhile; endif; ?> 
	       
	<div class="col-md-3 col-sm-4 col-xs-12 sidebar collapse" id="sidebar">
		<div class="well"> <?php get_sidebar( 'secondary' ); ?> </div>
	</div>
		
<?php if (bp_is_activity_component() && bp_is_member() && bp_is_user_activity()){ ?>


    <script>
    var mmbrContact = jQuery.noConflict();
    mmbrContact(window).load(function() {
     // ---------------------nav sticktop---------------------------
   // var scroll_div = mmbrContact('#item-header'); // the div that is going to be stuck on the top
   // var sticktop = mmbrContact('#item-header').offset().top + 200; // grab the initial top offset of the navigation
   // var socialtab = mmbrContact('#social-tabs');
   // var contacttab = mmbrContact('.slide-out-div .handle')

   //  // our function that decides weather the navigation bar should have "fixed" css position or not.
   //  var sticknav = function () {
   //     var scroll_top = mmbrContact(window).scrollTop(); // our current vertical position from the top



   //          // if we've scrolled more than the navigation, change its position to fixed to stick to top,
   //          // otherwise change it back to relative
   //          if (scroll_top > sticktop) {
   //              mmbrContact(scroll_div).addClass('sticktop');  
   //          } else {
   //              mmbrContact(scroll_div).removeClass('sticktop');
   //              mmbrContact('.profile_header[data-type="background"]').each(function(){
   //                  var $bgobj = mmbrContact(this); // assigning the object
   //                  var $window = mmbrContact(window);

   //                    var yPos = -($window.scrollTop() / $bgobj.data('speed'));

   //                      // Put together our final background position
   //                      var round = '50% '+ yPos;
   //                      var coords = round + 'px';

   //                      // Move the background
   //                      $bgobj.css({ backgroundPosition: coords });
   //          });
            
         // ---------------------------------this is for after 200 pixels under the nav sticktop
         // if (scroll_top - 200 > sticktop) {
         //    mmbrContact(socialtab).stop().animate({
         //        marginRight: 0,
         //    }, 150 );
         //    mmbrContact(contacttab).stop().animate({
         //        left: "-40px",
         //    }, 150 );
         // } else {
         //    mmbrContact(socialtab).stop().animate({
         //        marginRight: "34px",
         //    }, 150 );
         //    mmbrContact(contacttab).stop().animate({
         //        left: 0,
         //    }, 150 );
         // }
         
         
   //      };
   //  };

   //  // run our function on load
   //  sticknav();

   // // and run it again every time you scroll
   // mmbrContact(window).scroll(function () {
   //  sticknav();
   // });




});
</script>
<?php } ?>

		   	
<script>
// var $spl3ndid = jQuery.noConflict();
// $spl3ndid(window).load(function() {
        // var w = $spl3ndid(window).width();
        // if(w>400) {
        // 	// parralax for profile fields
        //   });
        // } else {
        // 	$spl3ndid('#item-header').iosSlider({
        //                     desktopClickDrag: true,
        //                     snapToChildren: true,
        //                     keyboardControls: true,                
        //                     onSlideComplete: slideComplete,
        //                     onSliderLoaded: showMySlider,
        //                     navNextSelector: $spl3ndid('.next'),
        //                     navPrevSelector: $spl3ndid('.prev'),
        //         });
        // 	function down() {
        //         Yay('#item-header').one('mouseup', function() {
        //             var SNAP_MULTIPLE = 2;
        //             var data = Yay('#item-header').data('args');
        //             var round = SNAP_MULTIPLE * Math.round((data.currentSlideNumber - 1) / SNAP_MULTIPLE) + 1;
        //             setTimeout(function() {
        //                 Yay('#item-header').iosSlider('goToSlide', round);
        //             }, 10);
        //         });
        //     }
            
        //     function showMySlider() {
        //         Yay('.item').addClass('ready');
        //     }

        //     function slideComplete(args) {
        //         Yay('.next, .prev').removeClass('unselectable');
        //         if(args.currentSlideNumber == 1) {
        //             Yay('.prev').addClass('unselectable');
        //         } else if(args.currentSliderOffset == args.data.sliderMax) {
        //             Yay('.next').addClass('unselectable');
        //         }
        //     }
        // }
        // end
         

    // });

</script>


<?php get_footer(); ?>