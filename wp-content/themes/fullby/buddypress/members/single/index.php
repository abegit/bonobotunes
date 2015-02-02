<?php get_header(); ?>	
				<div class="wrap buddyb">

	
		<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

				<?php if ( $data = bp_get_profile_field_data( 'field=ccbillaffil&user_id='.$author_id ) ) : ?>
 					<?php $buyLinkHref = 'http://refer.ccbill.com/cgi-bin/clicks.cgi?CA=900936-1000&PA='.$data.'&HTML='.site_url().'/register?friend='.$data;  ?>
				<?php endif; ?>		
									<?php the_content('Leggi...');?>
				 					
			<?php endwhile; endif; ?> 
	        
	
	
		<?php if ( bp_is_my_profile() && bp_is_profile_component() && bp_is_current_action( 'change-bg' )) : ?>
		<form name="bpprofbpg_change" id="bpprofbpg_change" method="post" class="standard-form" enctype="multipart/form-data">
		    
		    <?php $image_url =  bppg_get_image();
			    if(!empty($image_url)): ?>
			    <div id="bg-delete-wrapper"> <a href='#' id='bppg-del-image'>Delete</a></div>
			   <?php endif;?> 
		    
		    <label for="bprpgbp_upload">
			<input type="file" name="file" id="bprpgbp_upload"  class="settings-input" />
		</label>
			<p>If you want to change your profile background, please upload a new image.
		    </p>
			
		    	<br />
		<?php wp_nonce_field("bp_upload_profile_bg");?>
		    <input type="hidden" name="action" id="action" value="bp_upload_profile_bg" />
		 <p class="submit"><input type="submit" id="bpprofbg_save_submit" name="bpprofbg_save_submit" class="button" value="<?php _e('Save','bppg') ?>" /></p>
		</form>
		<?php endif; ?>


				

	<div class="col-md-3">
		<div class="sidebar well"> <?php get_sidebar( 'secondary' ); ?> </div>
	</div>
		

		   	
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

</div> <!-- end wrap -->

<?php get_footer(); ?>