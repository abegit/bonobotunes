<div class="post-meta the-icons pmeta-bottom">
<?php get_template_part( 'lib/templates/share-box' ); ?>


<div class="meta-bottom">
<?php if ( comments_open() ) { ?>
<span class="post-comment"><?php comments_popup_link(__('0',TEMPLATE_DOMAIN), __('1',TEMPLATE_DOMAIN), __('%',TEMPLATE_DOMAIN) ); ?></span><?php } ?>
<?php
$postview = get_theme_option('post_view');
if( $postview == 'Enable' ) {
$countview = get_post_meta($post->ID, 'post_views_count', true);
if ( $countview ) { ?>
<span class="post-view"><?php echo number_format($countview); ?></span>
<?php } } ?>
<div class="post-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">&raquo;</a></div>
</div>

</div>

