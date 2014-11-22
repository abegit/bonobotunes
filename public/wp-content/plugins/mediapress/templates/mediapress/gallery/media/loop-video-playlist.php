<div class="mpp-item-playlist mpp-u-1-1">
<?php
	$ids = mpp_get_all_media_ids();
	echo wp_playlist_shortcode( array( 'ids' => $ids, 'type' => 'video' ));

?>
</div>