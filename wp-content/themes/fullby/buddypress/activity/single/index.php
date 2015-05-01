<?php get_header(); ?>
<?php $author_id = $post->post_author; ?>
<div id="redfix"></div>
<canvas id="backdrop" width="100%" height="615" data-canvas style="width:100%; top:0; vertical-align:middle; position:fixed; height: 100vh !important;"></canvas>
<div class="wrap"><div class="wrap buddyb row" id="content">
	<div class="col-md-12 single" style="margin:0 auto;">
		<div class="col-md-12 single-in">
			
				<div class="sing-cont">

						<div id="buddypress">
    <?php do_action( 'template_notices' ); ?>
    <div class="activity no-ajax" role="main">
        <?php if ( bp_has_activities( 'display_comments=threaded&show_hidden=true&include=' . bp_current_action() ) ) : ?>

            <ul id="activity-stream" class="activity-list item-list">
            <?php while ( bp_activities() ) : bp_the_activity(); ?>
                
            <?php /**
                 * BuddyPress - Activity Stream (Single Item)
                 *
                 * This template is used by activity-loop.php and AJAX functions to show
                 * each activity.
                 *
                 * @package BuddyPress
                 * @subpackage bp-legacy
                 */

                ?>

                <?php do_action( 'bp_before_activity_entry' ); ?>

                <li class="<?php bp_activity_css_class(); ?>" id="activity-<?php bp_activity_id(); ?>">
                    <?php if ( bp_activity_has_content() ) : ?>

                    <div class="activity-inner col-md-8">


                        <?php bp_activity_content_body(); ?>

                        <?php $blogpost_id = bp_get_activity_secondary_item_id();
                        if ($blogpost_id) :
                            if (has_post_thumbnail( $blogpost_id ) )    :
                                $theimg = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost_id ), 'large' ); ?>
                            <a href="<?php echo get_post_permalink($blogpost_id); ?>"> <img style="thumbnail" style="width:100%;" src="<?php echo $theimg[0]; ?>"></a>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>

                <?php endif; ?>
                <div class="col-md-4">
                    <div class="activity-avatar">
                    <a href="<?php bp_activity_user_link(); ?>">

                        <?php bp_activity_avatar(); ?>

                    </a>
                </div>

                <div class="activity-content">

                    <div class="activity-header">

                        <?php bp_activity_action(); ?>

                    </div>
                    <?php if (!is_user_logged_in()) { ?>
                        <?php $user_affil = bp_displayed_user_id(); ?>    
                        <form><input onclick="location.href='<?php echo bp_signup_page(); if($user_affil != '') { echo '?friend='.$user_affil; }; ?>'" value="Follow & Sign Up" class="btn btn-primary" type="button"></form>
                   <?php } else {
                        bp_add_friend_button( $author_id );
                    } ?>

                </div>
                <?php do_action( 'bp_activity_entry_content' ); ?>

                <div class="activity-meta">

                    <?php if ( bp_get_activity_type() == 'activity_comment' ) : ?>

                    <a href="<?php bp_activity_thread_permalink(); ?>" class="button view bp-secondary-action" title="<?php esc_attr_e( 'View Conversation', 'buddypress' ); ?>"><?php _e( 'View Conversation', 'buddypress' ); ?></a>

                <?php endif; ?>

                <?php if ( is_user_logged_in() ) : ?>

                    <?php if ( bp_activity_can_comment() ) : ?>

                    <a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a>

                <?php endif; ?>

                <?php if ( bp_activity_can_favorite() ) : ?>

                    <?php if ( !bp_get_activity_is_favorite() ) : ?>

                    <a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>

                <?php else : ?>

                    <a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>

                <?php endif; ?>

                <?php endif; ?>

                <?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

                <?php do_action( 'bp_activity_entry_meta' ); ?>

                <?php endif; ?>

                </div>

                <?php do_action( 'bp_before_activity_entry_comments' ); ?>

                <?php if ( ( bp_activity_get_comment_count() || bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

                    <div class="activity-comments">

                        <?php bp_activity_comments(); ?>

                        <?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>

                        <form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>
                            <div class="ac-reply-avatar"><?php bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
                            <div class="ac-reply-content">
                                <div class="ac-textarea">
                                    <textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
                                </div>
                                <input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" /> &nbsp; <a href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
                                <input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
                            </div>

                            <?php do_action( 'bp_activity_entry_comments' ); ?>

                            <?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

                        </form>

                    <?php endif; ?>

                </div>

                <?php endif; ?>

                <?php do_action( 'bp_after_activity_entry_comments' ); ?>
            </div>
        <div class="clear"></div>
                </li>

                <?php do_action( 'bp_after_activity_entry' ); ?>
                <!-- end post -->


            <?php endwhile; ?>
            </ul>

                        <?php endif; ?>
                </div>
                </div>

                    </div>
                </div>
		</div>	

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
