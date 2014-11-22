<div id="sharebox-wrap">
<div class="share_box">
<?php
global $post;
if( get_theme_option('social_on') == 'Enable') { ?>
<p class="fb"><a rel="nofollow" class="fa fa-facebook-square" title="<?php _e('Share this post in Facebook', TEMPLATE_DOMAIN); ?>" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><span><?php _e('Share', TEMPLATE_DOMAIN); ?></span></a></p>
<p class="tw"><a rel="nofollow" class="fa fa-twitter-square" title="<?php _e('Share this post in Twitter', TEMPLATE_DOMAIN); ?>" href="http://twitter.com/share?text=<?php echo urlencode( the_title_attribute('echo=0')); ?>&url=<?php echo urlencode(get_permalink()); ?>"><span><?php _e('Tweet', TEMPLATE_DOMAIN); ?></span></a></p>
<p class="gp"><a rel="nofollow" class="fa fa-google-plus-square" title="<?php _e('Share this post in Google+', TEMPLATE_DOMAIN); ?>" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>"><span><?php _e('Google', TEMPLATE_DOMAIN); ?></span></a></p>
<p class="pinit"><a rel="nofollow" class="fa fa-pinterest-square" title="<?php _e('Pin this post in Pinterest', TEMPLATE_DOMAIN); ?>" href="//pinterest.com/pin/create/link/?url=<?php echo urlencode( get_permalink()); ?>&media=<?php $image_id = get_post_thumbnail_id($post->ID);$image_url = wp_get_attachment_image_src($image_id,'full', true); echo $image_url[0];  ?>&description=<?php echo urlencode(the_title_attribute()); ?>"><span><?php _e('Pinit', TEMPLATE_DOMAIN); ?></span></a></p>
<?php } ?>
</div>
</div>
