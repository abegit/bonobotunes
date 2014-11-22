</div><!-- CONTAINER WRAP END -->
</section><!-- CONTAINER END -->


</div><!-- BODYCONTENT END -->



<footer class="footer-top">


<div class="ftop">
<div class="footer-container-wrap">
<div class="fbox footer-one">
<div class="widget-area the-icons">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
<?php else: ?>
<aside class="widget widget_recent_entries">
<h3 class="widget-title"><span><?php _e('About This Theme', TEMPLATE_DOMAIN); ?></span></h3>
<div class="textwidget">
<?php if( function_exists('mp_theme_info') ) { echo mp_theme_info(); } ?>
</div>
</aside>
<?php endif; ?>
</div>
</div>


<div class="fbox wider-cat footer-two">
<div class="widget-area the-icons">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
<?php else: ?>
<aside class="widget widget_recent_entries">
<h3 class="widget-title"><span><?php _e('Recent Posts', TEMPLATE_DOMAIN); ?></span></h3>
<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
</aside>
<?php endif; ?>
</div>
</div>


<div class="fbox footer-three">
<div class="widget-area the-icons">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
<?php else: ?>
<aside class="widget">
<h3 class="widget-title"><span><?php _e('Hot Topics',TEMPLATE_DOMAIN); ?></span></h3>
<?php get_hot_topics(5); ?>
</aside>
<?php endif; ?>
</div>
</div>


</div>
</div>


<div class="fbottom">

<?php if ( has_nav_menu('footer') ) { ?>
<div class="footer-nav">
	<?php wp_nav_menu( array(
	'theme_location' => 'footer',
	'container' => false,
	'depth' => 1,
	'fallback_cb' => 'none'
	)); ?>
    </div>
<?php } ?>

<div class="footer-left">
<?php _e('Copyright &copy;', TEMPLATE_DOMAIN); ?> <?php echo gmdate(__('Y', TEMPLATE_DOMAIN)); ?>. <?php bloginfo('name'); ?>
</div>

<div class="footer-right">
<div class="ffeed">
<?php if(get_theme_option('rss_feed')) { ?> <a title="<?php _e('Subscribe to posts feeds with feedburner', TEMPLATE_DOMAIN); ?>" href="<?php echo get_theme_option('rss_feed'); ?>"><i class="fa fa-rss"></i><?php _e('Post RSS Feeds', TEMPLATE_DOMAIN); ?></a><?php } else {?> <a title="<?php _e('Subscribe to posts rss feeds', TEMPLATE_DOMAIN); ?>" href="<?php echo bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i><?php _e('Post RSS Feeds', TEMPLATE_DOMAIN); ?></a><?php } ?>  <a title="<?php _e('Subscribe to comments rss feeds', TEMPLATE_DOMAIN); ?>" href="<?php echo bloginfo('comments_rss2_url'); ?>"><i class="fa fa-rss"></i><?php _e('Comments RSS Feeds', TEMPLATE_DOMAIN); ?></a>
</div>
<?php echo mp_theme_author_credit_info(); ?>
</div>

</div>
<!-- FOOTER RIGHT END -->




</footer><!-- FOOTER TOP END -->

</div><!-- INNERWRAP BODYWRAP END -->

</div><!-- WRAPPER MAIN END -->


</div><!-- WRAPPER END -->

<?php wp_footer(); ?>

<?php $footer_code = get_theme_option('footer_code'); echo stripcslashes($footer_code); ?>

</body>

</html>