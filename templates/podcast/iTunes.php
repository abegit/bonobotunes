<?php
/**
 * Customs RSS template with related posts.
 * 
 * Place this file in your theme's directory.
 *
 * @package sometheme
 * @subpackage theme
 */


function mp3_enclosure() {
	if ( post_password_required() )
		return;

	foreach ( (array) get_post_custom() as $key => $val) {
		if ($key == 'enclosure') {
			foreach ( (array) $val as $enc ) {
				$enclosure = explode("\n", $enc);

				// only get the first element, e.g. audio/mpeg from 'audio/mpeg mpga mp2 mp3'
				$t = preg_split('/[ \t]/', trim($enclosure[2]) );
				$type = $t[0];

				/**
				 * Filter the RSS enclosure HTML link tag for the current post.
				 *
				 * @since 2.2.0
				 *
				 * @param string $html_link_tag The HTML link tag with a URI and other attributes.
				 */
				echo apply_filters( 'mp3_enclosure', trim( htmlspecialchars( $enclosure[0] ) ) );
			}
		}
	}
}

// /**
//  * Get related posts.
//  */
// function my_rss_related() {

//     global $post;

//     // Setup post data
//     $pid     = $post->ID;
//     $tags    = wp_get_post_tags( $pid );
//     $tag_ids = array();

//     // Loop through post tags
//     foreach ( $tags as $individual_tag ) {
//         $tag_ids[] = $individual_tag->term_id;
//     }

//     // Execute WP_Query
//     $related_by_tag = new WP_Query( array(
//         'tag__in'          => $tag_ids,
//         'post__not_in'     => array( $pid ),
//         'posts_per_page'   => 3,
//     ) );

//     // Loop through posts and build HTML
//     if ( $related_by_tag->have_posts() ) :

//         echo 'Related:<br />';

//             while ( $related_by_tag->have_posts() ) : $related_by_tag->the_post();
//                 echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br />';
//             endwhile;

//         else :
//             echo '';
//     endif;

//     wp_reset_postdata();
// }




/**
 * Feed defaults.
 */
header( 'Content-Type: ' . feed_content_type( 'rss-http' ) . '; charset=' . get_option( 'blog_charset' ), true );
$frequency  = 1;        // Default '1'. The frequency of RSS updates within the update period.
$duration   = 'daily'; // Default 'hourly'. Accepts 'hourly', 'daily', 'weekly', 'monthly', 'yearly'.
$postlink   = '<br /><a href="' . get_permalink() . '">See the rest of the story at mysite.com</a><br /><br />';
$postimages = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );

// Check for images
if ( $postimages ) {

    // Get featured image
    $postimage = $postimages[0];

} else {

    // Fallback to a default
    $postimage = get_stylesheet_directory_uri() . '/images/default.jpg';
}


/**
 * Start RSS feed.
 */
ob_clean();
echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
    <channel> 
		<title><![CDATA[<?php echo get_option('iTunesPodcastTitle'); ?>]]></title>
		<link><?php echo get_bloginfo('url'); ?></link>
        <language><?php bloginfo_rss( 'language' ); ?></language>
		<copyright>&#x2117; &amp; &#xA9; 2015 Bonoboville &amp;</copyright>
		<itunes:subtitle><![CDATA[<?php echo get_option('iTunesPodcastSummary'); ?>]]></itunes:subtitle>
		<itunes:author><![CDATA[<?php echo get_option('iTunesAuthorName'); ?>]]></itunes:author>
		<itunes:summary><![CDATA[<?php echo get_option('iTunesPodcastSummary'); ?>]]></itunes:summary>
		<description><![CDATA[<?php echo get_option('iTunesPodcastSummary'); ?>]]></description>
		<itunes:owner>
			<itunes:name><![CDATA[<?php echo get_option('iTunesAuthorName'); ?>]]></itunes:name>
			<itunes:email><![CDATA[<?php echo get_option('iTunesAuthorEmail'); ?>]]></itunes:email>
		</itunes:owner>
		<itunes:image href="<?php echo get_option('iTunesPodcastImage'); ?>" />
		<itunes:category text="Health">
		<itunes:category text="Sexuality"/> </itunes:category>

		<itunes:explicit><![CDATA[<?php if ( get_option('iTunesExplicit') == '1') { echo 'yes';} else { echo 'clean'; } ?>]]></itunes:explicit>

        <!-- Feed Logo (optional) -->
        <image>
            <url><?php echo get_stylesheet_directory_uri(); ?>/images/show.jpg</url>
            <title>
                <?php bloginfo_rss( 'description' ) ?>
            </title>
            <link><?php bloginfo_rss( 'url' ) ?></link>
        </image>

        
        <!-- Start loop -->
        <?php while( have_posts()) : the_post(); ?>

            <item>
                <title><?php the_title_rss(); ?></title>
                <link><?php the_permalink_rss(); ?></link>
                <guid><?php the_guid(); ?></guid>
                <itunes:author><?php the_author(); ?></itunes:author>
                <itunes:subtitle></itunes:subtitle>
                <itunes:summary><![CDATA[]]></itunes:summary>
                <?php if (has_post_thumbnail() ) {
	                	$thumbnail_size = apply_filters( 'itunes_rss_image_size', 'itunes_rss_image_size' );
						$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                		$thumbnail = image_get_intermediate_size( $thumbnail_id, $thumbnail_size ); 
							printf(
								'<itunes:image href="%s" />',
								$thumbnail['url']
							);
                		} ?>
                <datetime></datetime>
                <pubDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_post_time( 'Y-m-d H:i:s', true ), false ); ?></pubDate>
            	<description></description>
            	<?php echo rss_enclosure(); ?>
            </item>

        <?php endwhile; ?>
    </channel>
</rss>