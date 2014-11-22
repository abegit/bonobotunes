<div class="post-meta the-icons<?php if(is_page()){ echo ' meta-no-display'; } ?>">
<span class="post-author vcard"><?php _e('Posted by', TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?></span>
<span class="post-time entry-date"> <?php _e('on', TEMPLATE_DOMAIN); ?> <abbr class="published" title="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php $getmodtime = get_the_modified_time(); if( !$getmodtime ) { $modtime = '<span class="date updated meta-no-display">'. get_the_time('c') . '</span>'; } else { $modtime = '<span class="date updated meta-no-display">'. get_the_modified_time('c') . '</span>'; } ?>
<span class="meta-no-display"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo the_title_attribute(); ?></a></span><?php echo $modtime; ?>
<?php if( get_post_type() != 'post' ) { ?>
<?php echo the_taxonomies(array('template' => '% %l','before' => '<span class="post-category">', 'after' => '</span>')); ?>
<?php } else { ?>
<span class="post-category"> <?php _e('under', TEMPLATE_DOMAIN); ?> <?php echo get_singular_cat(); ?></span>
<?php } ?>
</div>
