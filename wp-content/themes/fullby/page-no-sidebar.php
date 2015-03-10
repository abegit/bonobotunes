<?php 
/*
Template Name: No Sidebar
*/
get_header(); ?>			
		<?php if ( has_post_thumbnail() ) {
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
						$thumb_url = $thumb_url_array[0];
					} else { ?>
                
                
                 <?php }  ?>
                 <img src="<?php echo $thumb_url;?>" data-canvas-image style="display:none;">
                 <canvas id="backdrop" width="100%" height="100%" data-canvas style="width:100%; vertical-align:middle; position:absolute; height: 100% !important; z-index:0; opacity:0;"></canvas>
<div class="wrap">	
<div class="wrap">	
	<div class="col-md-12 single" style="background:url('<?php echo $thumb_url;?>'); background-size:cover; background-position:center top;" data-type="background" data-speed="2">
	
		<div class="col-md-12 single-in" style="float:none;">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 

				
				
				<div class="sing-tit-cont" style="margin-top:0;">
					
					<h3 class="sing-tit"><?php the_title(); ?></h3>
				
				</div>

				<div class="sing-cont">
					
					<div class="sing-spacer">
					
						<?php the_content('Leggi...');?>
						<div class="clear"></div>
					</div>

				</div>	
				 					
			<?php endwhile; ?>
	        <?php else : ?>

	                <p>Sorry, no posts matched your criteria.</p>
	         
	        <?php endif; ?> 
	        
		</div>	
		 

	</div>		

<script>
var $spl3ndid = jQuery.noConflict();

$spl3ndid(window).load(function() {
        var w = $spl3ndid(window).width();
        if(w>400) {
        	// parralax for profile fields
            $spl3ndid('[data-type="background"]').each(function(){
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
        } 
        
    });

</script>	
<?php get_footer(); ?>