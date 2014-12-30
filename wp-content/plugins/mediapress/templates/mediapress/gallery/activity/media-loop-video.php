<div class="mpp-container mpp-media-list mpp-activity-media-list mpp-activity-video-list mpp-activity-video-player">
<?php
	$ids = mpp_activity_get_attached_media_ids( bp_get_activity_id() );
	if( count( $ids ) == 1 ){
		$ids = array_pop( $ids );
		$media = mpp_get_media( $ids );
		$args = array(
			'src' => mpp_get_media_src('', $media ),
			'poster' => mpp_get_media_src( 'thumbnail', $media ),

		);
// replace the above output with this
// <div class="videoWrapper">		
// 				 		<?php $abevidURL = get_post_meta($product->id, 'mp4', true);
// 				 		echo do_shortcode('[KGVID poster="'.$thumb_url.'" view_count="true" autoplay="false" right_click="true" resize="true" embedcode="html code"]'.$abevidURL.'[/KGVID]'); ?>
		</div>
	echo wp_video_shortcode( $args );
	}else{
	
		echo wp_playlist_shortcode( array( 'ids' => $ids , 'type' => 'video' ));
	
	}
?>
</div>