<?php get_header(); ?>

<?php do_action( 'bp_before_content' ) ?>

<!-- CONTENT START -->
<div class="content">

<div class="content-inner">

<?php do_action( 'bp_before_blog_home' ) ?>

<!-- POST ENTRY START -->
<div id="post-entry">

<?php do_action( 'bp_before_blog_entry' ) ?>

<section class="post-entry-inner">

<?php
$postcount = 1;
$feat_size = 'large';
if (have_posts()) : while ( have_posts() ) : the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">'; ?>
<?php do_action( 'bp_before_blog_post' ) ?>

<!-- POST START -->
<article <?php post_class('home-post'); ?> id="post-<?php the_ID(); ?>">

<h2 class="post-title entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<?php echo get_featured_post_image("<div class='post-thumb'><p>$thepostlink", "</a></p></div>", 650, 250, "alignnone", $feat_size, the_title_attribute('echo=0'),the_title_attribute('echo=0'), false); ?>

<?php get_template_part( 'lib/templates/post-meta' ); ?>

<div class="post-content entry-content">
<?php
if (post_password_required()) {
the_content();
} else {
echo get_custom_the_excerpt(50);
}
?>
</div>

<?php get_template_part( 'lib/templates/post-meta', 'bottom' ); ?>

</article>
<!-- POST END -->

<?php do_action( 'bp_after_blog_post' ); ?>
<?php $postcount++; ?>
<?php endwhile; ?>

<?php endif; ?>

<?php get_template_part( 'lib/templates/paginate' ); ?>

</section>

<?php do_action( 'bp_after_blog_entry' ) ?>
</div>
<!-- POST ENTRY END -->

<?php do_action( 'bp_after_blog_home' ) ?>

</div><!-- CONTENT INNER END -->
</div><!-- CONTENT END -->

<?php do_action( 'bp_after_content' ) ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>