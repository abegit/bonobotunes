<form action="" method="post" id="mpp-media-reorder-form" class="mpp-form mpp-form-stacked mpp-form-reorder-media ">
	
<div id="mpp-sortable" class='mpp-g'>
	
	<?php  $items = new MPP_Media_Query( array( 'gallery_id' => mpp_get_current_gallery_id(), 'per_page' => -1, 'nopaging' => true ) );	?>

	<?php while( $items->have_media() ) : $items->the_media(); ?>

		<div class='mpp-u-1-4 mpp-reorder-media ' id="mpp-reorder-media-<?php mpp_media_id(); ?>">
			<div class='mpp-reorder-media-cover'>
				<img src="<?php mpp_media_src('thumbnail');?>">	
				<input type='hidden' name="mpp-media-ids[]" value="<?php mpp_media_id();?>" />
				<h4><?php mpp_media_title();?></h4>
			 </div>
		</div>	
	<?php endwhile;	?>
	
</div>
	
<?php wp_nonce_field( 'mpp-reorder-gallery-media', 'mpp-nonce' ); ?>		
	<input type="hidden" name='mpp-action' value='reorder-gallery-media' />
	
	<button type="submit" name="mpp-reorder-media-submit"  id="mpp-reorder-media-submit" ><?php _e('Save','mediapress');?> </button>


	

</form>