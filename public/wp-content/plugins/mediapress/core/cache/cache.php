<?php
/**
 * Gallery Cache functions
 * @package bp-gallery
 * @since 1.1
 * 
 */
/**
 * Add global cache groups for gallery to wordpress object cache
 */
function bp_gallery_add_global_cache_groups(){
    $cache_groups=array(
        'galleries',
        'media',
        'gallery_meta',
        'media_meta'
        );
    
    //add these to wordpress global cache groups                    
    wp_cache_add_global_groups( $cache_groups);
}
add_action('bp_loaded','bp_gallery_add_global_cache_groups');
/**
 * 
 *  Used for Gallery 
 * 
 */
/**
 * Update Galleries/Gallery Meta cache
 * 
 * @uses bp_gallery_update_gallery_cache
 * @param array $galleries
 * @param type $type
 * @param type $update_meta_cache
 * @return type 
 */

function bp_gallery_update_gallery_caches(&$galleries,  $update_meta_cache = true) {
	// No point in doing all this work if we didn't match any posts.
	if ( !$galleries )
		return;

	bp_gallery_update_gallery_cache($galleries);

	$gallery_ids = array();
	foreach ( $galleries as $gallery )
		$gallery_ids[] = $gallery->id;

	

	

	if ( $update_meta_cache )
		bp_gallery_update_gallery_meta_cache($gallery_ids);
}

/**
 * Add a galleries to the object cache
 * @param type $galleries
 * @return type 
 */
function bp_gallery_update_gallery_cache( &$galleries ) {
	if ( ! $galleries )
		return;

	foreach ( $galleries as $gallery )
		wp_cache_add( $gallery->id, $gallery, 'galleries' );
}
/**
 * Update Gallry Meta Cache
 * @param type $gallery_ids
 * @return type 
 */
function bp_gallery_update_gallery_meta_cache($gallery_ids) {
	return bp_gallery_update_meta_cache('gallery', $gallery_ids);
}

/**
 * Cache all galleries given
 * 
 * @global type $wpdb
 * @param type $ids
 * @param type $update_meta_cache 
 */
function _bp_gallery_prime_gallery_caches( $ids,  $update_meta_cache = true ) {
	global $wpdb;
        $gallery_table=bp_gallery_get_table('gallery');
	$non_cached_ids = _get_non_cached_ids( $ids, 'galleries' );//get non cached galleries
	if ( !empty( $non_cached_ids ) ) {
		$fresh_galleries = $wpdb->get_results( sprintf( "SELECT {$gallery_table}.* FROM {$gallery_table} WHERE id IN (%s)", join( ",", $non_cached_ids ) ) );

		bp_gallery_update_gallery_caches( $fresh_galleries,  $update_meta_cache );
	}
}


/**
 * 
 * For Gallery Media 
 */

/**
 * Update Media/Media Meta cache
 * 
 * @uses bp_gallery_update_media_cache
 * @param type $media
 * @param type $update_gallery_cache
 * @param type $update_meta_cache
 * @return type 
 */

function bp_gallery_update_media_caches(&$media, $update_gallery_cache = true, $update_meta_cache = true) {
	// No point in doing all this work if we didn't match any posts.
	if ( !$media )
		return;

	bp_gallery_update_media_cache($media);

	$media_ids = array();
	foreach ( $media as $media_item )
		$media_ids[] = $media_item->id;

	
        //need to call update gallery cach
	

	if ( $update_meta_cache )
		bp_gallery_update_media_meta_cache($media_ids);
}

/**
 * Add a List of Media to the object cache
 * @param array $media
 * @return type 
 */
function bp_gallery_update_media_cache( &$media ) {
	if ( ! $media )
		return;

	foreach ( $media as $media_item )
		wp_cache_add( $media_item->id, $media_item, 'media' );
}
/**
 * Update Media Meta Cache
 * @param type $media_ids
 * @return type 
 */
function bp_gallery_update_media_meta_cache($media_ids) {
	return bp_gallery_update_meta_cache('media', $media_ids);
}

/**
 * Cache all Media
 * @global type $wpdb
 * @param type $ids
 * @param type $update_meta_cache 
 */
function _bp_gallery_prime_media_caches( $ids,  $update_meta_cache = true ) {
	global $wpdb;
        $media_table=bp_gallery_get_table('media');
	$non_cached_ids = _get_non_cached_ids( $ids, 'media' );//get non cached galleries
	if ( !empty( $non_cached_ids ) ) {
		$fresh_media = $wpdb->get_results( sprintf( "SELECT {$media_table}.* FROM {$media_table} WHERE id IN (%s)", join( ",", $non_cached_ids ) ) );

		bp_gallery_update_media_caches( $fresh_media, false,  $update_meta_cache );
	}
}


