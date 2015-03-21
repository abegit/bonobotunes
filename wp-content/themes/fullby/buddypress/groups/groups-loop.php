<?php

/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_groups_loop' ); ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-top">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>
	
	<ul id="groups-list" class="item-list" role="main">

	<?php while ( bp_groups() ) : bp_the_group(); ?>

		<li <?php bp_group_class(); ?>>
			<div class="item-avatar">
				<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar('type=full'); ?></a>
			</div>

			<div class="item">
				<div class="item-title"><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></div>
				<div class="item-meta"><span class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span></div>

				<div class="item-desc"><?php bp_group_description_excerpt(); ?></div>

				<?php do_action( 'bp_directory_groups_item' ); ?>

			</div>

			<div class="action">

				<?php do_action( 'bp_directory_groups_actions' ); ?>

				<div class="meta">

					<?php bp_group_type(); ?> / <?php bp_group_member_count(); ?>

				</div>

			</div>
             <canvas id="backdrop" width="100%" height="100%" data-canvas style="width:100%; vertical-align:middle; position:absolute; height: 100% !important; z-index:0; opacity:0;"></canvas>

			<div class="clear"></div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>

<script>
	var $groupLst = jQuery.noConflict();
	$groupLst(window).load(function() {
        var w = $groupLst(window).width();
        if(w>400) {
        	// parralax for profile fields
            $groupLst('[data-type="background"]').each(function(){
                var $bgobj = $groupLst(this); // assigning the object
                var $window = $groupLst(window);

                $groupLst(window).scroll(function() {
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