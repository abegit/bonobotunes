<?php get_header(); ?>

<div id="redfix"></div>

<div class="wrap buddyb row" id="content">
	<div class="col-md-9 single">
          <?php display_gsc_results(); ?>
		<div class="col-md-9 single-in">
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
				<div class="sing-cont">

						<div id="buddypress">
    <?php do_action( 'template_notices' ); ?>
    <div class="activity no-ajax" role="main">
        <?php if ( bp_has_activities( 'display_comments=threaded&show_hidden=true&include=' . bp_current_action() ) ) : ?>

            <ul id="activity-stream" class="activity-list item-list">
                <li style="width:100%; vertical-align:middle; position:absolute; height: 615px !important;"><canvas id="backdrop" width="100%" height="615" data-canvas style="width:100%; vertical-align:middle; position:absolute; height: 615px !important;"></canvas></li>
            <?php while ( bp_activities() ) : bp_the_activity(); ?>
                
                <?php bp_get_template_part( 'activity/entry-photo' ); ?>

            <?php endwhile; ?>
            </ul>

        <?php endif; ?>
    </div>
</div>

				</div>					 					
			<?php endwhile; ?>
	        <?php else : ?>
	                <p>Sorry, no posts matched your criteria.</p>
	        <?php endif; ?> 
		</div>	
        <div class="col-md-3">
            <div class="sec-sidebar sidebar well"> <?php get_sidebar( 'primary' ); ?> </div>
         </div>
	</div>			
	<div class="col-md-3"> <div class="sidebar well"><?php get_sidebar( 'secondary' ); ?></div></div>

<script>    

var abeLur = jQuery.noConflict();
abeLur(function() {
  // Change this value to adjust the amount of blur
  var BLUR_RADIUS = 50;

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
    abeLur('#backdrop').attr('class', 'visible');
    abeLur('#redfix').attr('class', 'backdrop');
  }
});

</script>

<script type="text/javascript">

    var $dd = jQuery.noConflict();

        $dd(document).ready(function() {
            createDropDown();


            $dd(".selectwrap .dropdown dt").click(function() {
                //inside select wrapper only toggle ul inside wrapper
                $dd(this).closest('.selectwrap').find("dd ul").toggle();
            });

            $dd(document).bind('click', function(e) {
                var $ddclicked = $dd(e.target);
                //if you click and the parent does not have dropdown then hide dropdowns
                if (! $ddclicked.parents().hasClass("dropdown"))
                    $dd(".dropdown dd ul").hide();
            });

            $dd(".dropdown dd ul li a").click(function() {
                var text = $dd(this).html();
                var selfie = $dd(this).closest(".dropdown").attr('class').split(' ')[1];
                $dd('.dropdown.' + selfie + ' dt a').html(text);
                $dd('.dropdown.' + selfie + ' dd ul').hide();
                $dd('.dropdown.' + selfie + ' dd ul').hide();

                var source = $dd('select#' + selfie);
                source.val($dd(this).find("span.value").html())
                return false;
            });
        });

function createDropDown(){
    $dd("select").each(function() {
        var source = $dd(this);
        var selected = source.find("option[selected]");
        var options = $dd("option", source);
        var self = $dd(this).attr('id');
        $dd(this).wrap( '<div class="selectwrap ' + self + '"></div>')
        $dd(this).after('<dl class="dropdown ' + self + '"></dl>')
        $dd('.dropdown.' + self).append('<dt><a href="#">' + selected.text() + 
            '<span class="value">' + selected.val() + 
            '</span></a></dt>')
        $dd('.dropdown.' + self).append('<dd><ul class="dropdown-menu"></ul></dd>')
        options.each(function(){
            $dd('.dropdown.' + self + ' dd ul').append('<li><a href="#">' + 
                $dd(this).text() + '<span class="value">' + 
                $dd(this).val() + '</span></a></li>');
        });
    });
}
</script>

<?php get_footer(); ?>