<?php if( get_theme_option('twitter_widget_id') ) { ?>
<aside id="twitter-blk">
<h3 class="widget-title"><span><?php _e('Recent Tweets', TEMPLATE_DOMAIN); ?></span></h3>
<div class="textwidget" id="twitter-news"></div>
</aside>
<?php } ?>

<?php $get_right_ads_code = get_theme_option('ads_right_sidebar'); if($get_right_ads_code != '') { ?>
<aside class="widget ctr-ad">
<div class="textwidget adswidget"><?php echo stripcslashes(do_shortcode($get_right_ads_code)); ?></div>
</aside>
<?php } ?>

<?php get_template_part('lib/templates/tabber-widget'); ?>

<aside class="widget">
<h3 class="widget-title"><span><?php _e('Topics', TEMPLATE_DOMAIN); ?></span></h3>
<ul><?php wp_list_categories('orderby=name&show_count=1&title_li='); ?></ul>
</aside>
<aside class="widget widget_recent_entries">
<h3 class="widget-title"><span><?php _e('Recent Posts', TEMPLATE_DOMAIN); ?></span></h3>
<ul><?php wp_get_archives('type=postbypost&limit=10'); ?></ul>
</aside>
<aside class="widget">
<h3 class="widget-title"><span><?php _e('Tags', TEMPLATE_DOMAIN); ?></span></h3>
<div class="tagcloud"><?php wp_tag_cloud('smallest=8&largest=21&'); ?></div>
</aside>