<div class="col-md-12 footer">

	&copy; Copyright <?php echo date("o");?>   &nbsp; <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right arrow"></i>  <span><?php bloginfo('name'); ?></span>
	
</div>
	
	

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/isotope.js"></script>

<script>
(function ($) {
	var $container = $('.grid'),
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
	
	//image fade
	$('.item img').hide().one("load",function(){
    	$(this).fadeIn(500);
    }).each(function(){
    	if(this.complete) $(this).trigger("load");
    });
    
    //tab sidebar
    $('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

	
}(jQuery));


</script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/ioss.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

  <?php if (bp_is_component('activity') && bp_is_component('directory')){ ?>
   	
<script>
var $spl3ndid = jQuery.noConflict();

$spl3ndid(window).load(function() {




        var w = $(window).width();
        if(w>400) {
        	// parralax for profile fields
            $spl3ndid('.profile_header[data-type="background"]').each(function(){
                var $bgobj = $spl3ndid(this); // assigning the object
                var $window = $spl3ndid(window);

                $spl3ndid(window).scroll(function() {
                  var yPos = -($window.scrollTop() / $bgobj.data('speed'));

                    // Put together our final background position
                    var round = '50% '+ yPos;
                    var coords = round + 'px';

                    // Move the background
                    $bgobj.css({ backgroundPosition: coords });
                });
          });
        } else {
        	$spl3ndid('#item-header').iosSlider({
                            desktopClickDrag: true,
                            snapToChildren: true,
                            keyboardControls: true,                
                            onSlideComplete: slideComplete,
                            onSliderLoaded: showMySlider,
                            navNextSelector: $spl3ndid('.next'),
                            navPrevSelector: $spl3ndid('.prev'),
                });
        	function down() {
                Yay('#item-header').one('mouseup', function() {
                    var SNAP_MULTIPLE = 2;
                    var data = Yay('#item-header').data('args');
                    var round = SNAP_MULTIPLE * Math.round((data.currentSlideNumber - 1) / SNAP_MULTIPLE) + 1;
                    setTimeout(function() {
                        Yay('#item-header').iosSlider('goToSlide', round);
                    }, 10);
                });
            }
            
            function showMySlider() {
                Yay('.item').addClass('ready');
            }

            function slideComplete(args) {
                Yay('.next, .prev').removeClass('unselectable');
                if(args.currentSlideNumber == 1) {
                    Yay('.prev').addClass('unselectable');
                } else if(args.currentSliderOffset == args.data.sliderMax) {
                    Yay('.next').addClass('unselectable');
                }
            }
        }
        // end
         

    });

</script>

   <?php endif ?> 

   
<?php if (is_fronsst_page()) { ?>
	<!-- <script type="text/javascript">
    var $frontpg = jQuery.noConflict();
    var hght = $frontpg(".row.featured").height();
    $frontpg(".row.featured").hide();
        $frontpg(window).load(function() {

            $frontpg(".row.featured").delay(400).addClass('animate').attr('style', '');
        });
</script> -->
<?php } ?>

	<?php wp_footer();?>
    
  </body>
</html>

    	