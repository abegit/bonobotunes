<?php do_action( 'bp_before_commentpost' ); ?>

<div id="commentpost">

<?php if ( !comments_open() && !have_comments() ) : ?>
<?php else: ?>
<h4 id="comments"><span><?php comments_number(__('No Comments Yet', TEMPLATE_DOMAIN), __('1 Comment Already', TEMPLATE_DOMAIN), __('% Comments Already', TEMPLATE_DOMAIN)); ?></span></h4>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<div id="post-navigator-single">
<div id="rssfeed" class="alignleft"><a title="<?php __('stay updated with', TEMPLATE_DOMAIN); ?> <?php the_title(); ?>" href="<?php echo home_url() ?>/?feed=rss2&amp;p=<?php the_ID(); ?>"><?php _e('Subscribe to comments feed', TEMPLATE_DOMAIN); ?></a></div>
</div>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
<?php do_action( 'bp_before_blog_comment_list' ) ?>
<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=get_the_list_comments'); ?>
</ol>
<?php do_action( 'bp_after_blog_comment_list' ) ?>
<?php endif; ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<?php comment_form(); ?>
<?php else: ?>
<?php endif; ?>

</div>

<?php do_action( 'bp_after_commentpost' ); ?>