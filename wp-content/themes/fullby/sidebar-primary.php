	<?php if (!is_user_logged_in()) { ?>
		<div style="background:#000; padding:10px; margin:10px;">      
		<!-- Tab panes -->
		<div style="padding:10px; border:solid 1px #55571f">
		  
		   <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-good.png" width="123">

		<div class="clear"></div>
		<!-- end -->

		</div>
		</div>
    <?php } ?>




	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar') ) : ?>
	
	<?php endif; ?>		