<?php 
/*
Template Name: Search
*/
get_header(); ?>	
<?php 
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query); ?>
        <div class="row"><div class="buddyb">
	<div class="col-md-9 col-sm-8 single">
        <p class="result">Result for: <strong><i><?php echo $s ?></i></strong></p>

        <div class="grid">

            <?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
            <div class="item">

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <p class="grid-cat"><?php the_category(','); ?></p> 

                    <h2 class="grid-tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <p class="meta"> <i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> &nbsp;

                        <?php $video = get_post_meta($post->ID, 'fullby_video', true );
                            if($video != '') { ?>
                            <i class="fa fa-video-camera"></i> Video
                        <?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
                            <i class="fa fa-th"></i> Gallery
                        <?php } else {?>
                        <?php } ?>
                    </p>
                    <?php $video = get_post_meta($post->ID, 'fullby_video', true ); if($video != '') {?>
                        <a href="<?php the_permalink(); ?>" class="link-video">
                            <img src="http://img.youtube.com/vi/<?php echo $video ?>/hqdefault.jpg" class="grid-cop"/>
                            <i class="fa fa-play-circle fa-4x"></i> 
                        </a>
                    <?php } else if ( has_post_thumbnail() ) { ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', array('class' => 'grid-cop')); ?>
                        </a>
                    <?php } ?>

                    <div class="grid-text">
                        <?php the_content('More...');?>
                    </div>
                    <p>
                        <?php $post_tags = wp_get_post_tags($post->ID); if(!empty($post_tags)) {?>
                        <span class="tag-post"> <i class="fa fa-tag"></i> <?php the_tags('', ', ', ''); ?> </span>
                        <?php } ?>
                    </p>

                </div> <!-- end post -->

            </div>  <!-- end item -->
            <?php endwhile; ?>
            <?php else : ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?> 
        </div>  
        <div class="pagination">

        <?php global $wp_query;
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
            ) );
            ?>
        </div>
	</div>			
	<div class="col-md-3 col-sm-4 sidebar">
        <div class="well"> <?php get_sidebar( 'secondary' ); ?> </div>
	</div>

<?php get_footer(); ?>