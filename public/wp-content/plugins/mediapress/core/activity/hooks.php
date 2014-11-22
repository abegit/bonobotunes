<?php

/**
 * Hooks for activity
 * 
 */

/**
 * Filter activity permalink and make it point to single media if the activity has an associated media
 * 
 * @param string $link
 * @param type $activity
 * @return string
 */
function mpp_filter_activity_permalink( $link, $activity ) {

	$activity_id = $activity->id;

	if ( 'activity_comment' == $activity->type ) {
		$activity_id = $activity->item_id;
	}

	if ( $media_id = mpp_activity_get_media_id( $activity_id ) ) {

		$link = mpp_get_media_permalink( $media_id ) . "#activity-{$activity_id}";
		
	}elseif( $gallery_id = mpp_activity_get_gallery_id( $activity->id ) ){
		
		
		$link = mpp_get_gallery_permalink( $gallery_id ) ."#activity-{$activity_id}";
	}

	return $link;
}

add_filter( 'bp_activity_get_permalink', 'mpp_filter_activity_permalink', 10, 2 );

/**
 * Show the list of attached media in an activity
 * Should we add a link to view gallery too?
 * 
 * @return type
 */

function mpp_activity_inject_attached_media_html(){
    
    $media_list = mpp_activity_get_attached_media_ids( bp_get_activity_id() );
	
    if( empty( $media_list ) )
        return ;
	
	$activity_id = bp_get_activity_id();
	
	$gallery_id = mpp_activity_get_gallery_id( $activity_id );
	$gallery = mpp_get_gallery( $gallery_id );
	
		//media-loop-audio/media-loop-video,media-loop-photo, media-loop
    mpp_get_template_part( 'gallery/activity/media-loop', $gallery->type );

}

add_action( 'bp_activity_entry_content', 'mpp_activity_inject_attached_media_html' );
