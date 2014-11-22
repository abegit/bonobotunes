<?php
$featured_on = get_theme_option('slider_on');
$featured_category = get_theme_option('feat_cat');
$featured_number = get_theme_option('feat_cat_count');
$featured_post = get_theme_option('feat_post');
?>

<?php if($featured_on == 'Enable'): ?>
<?php if(!$featured_category && !$featured_post): ?>
<?php else: ?>
<?php if($featured_category): ?>

<div class="article-wrapper">
<div class="article-slider">
<ul>
<?php
$oddpost = 'alt-post';$postcount = 0;
$query = new WP_Query( "cat=$featured_category&posts_per_page=$featured_number&orderby=date" );
while ( $query->have_posts() ) : $query->the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
if($postcount > '0') { $thumb = 'medium'; $wx = '320'; $hx = '240'; } else { $thumb = 'large'; $wx = '640'; $hx = '480'; }
?>
<li class="post-<?php echo $postcount; ?> <?php echo $oddpost; ?><?php if($postcount == '0') { echo ' li_wide'; } ?>">
<?php echo get_featured_post_image($thepostlink, "</a>", $wx, $hx, "alignleft", $thumb, the_title_attribute('echo=0') ,the_title_attribute('echo=0'), false); ?>
<div class="article-title-wrapper"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
</li>
<?php ($oddpost == "alt-post") ? $oddpost="" : $oddpost="alt-post"; $postcount++; ?>
<?php endwhile; wp_reset_query(); ?>
</ul>
</div>
</div>

<?php elseif($featured_post && !$featured_category): ?>

<div class="article-wrapper">
<div class="article-slider">
<ul>
<?php
$oddpost = 'alt-post';$postcount = 0;
$allposttype = mp_get_all_posttype();
query_posts( array( 'post__in' => explode(',', $featured_post), 'post_type'=> $allposttype, 'posts_per_page' => 100, 'ignore_sticky_posts' => 1, 'orderby' => 'post__in', 'order' => '' ) );
while ( have_posts() ) : the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
if($postcount > '0') { $thumb = 'medium'; $wx = '320'; $hx = '240'; } else { $thumb = 'large'; $wx = '640'; $hx = '480'; }
?>
<li class="post-<?php echo $postcount; ?> <?php echo $oddpost; ?><?php if($postcount == '0') { echo ' li_wide'; } ?>">
<?php echo get_featured_post_image($thepostlink, "</a>", $wx, $hx, "alignleft", $thumb, the_title_attribute('echo=0') ,the_title_attribute('echo=0'), false); ?>
<div class="article-title-wrapper"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
</li>
<?php ($oddpost == "alt-post") ? $oddpost="" : $oddpost="alt-post"; $postcount++; ?>
<?php endwhile; wp_reset_query(); ?>
</ul>
</div>
</div>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>