<?php  $items = new MPP_Media_Query( array( 'gallery_id' => mpp_get_current_gallery_id(), 'per_page' => -1, 'nopaging' => true ) );	?>
<?php if( $items->have_media() ):?>
	<form action="" method="post" id="mpp-media-reorder-form" class="mpp-form mpp-form-stacked mpp-form-reorder-media ">

		<div class="mpp-g mpp-media-edit-bulk-action-row">
			<div class="mpp-u-2-24">
				<?php //allow to check/uncheck ?>
				<input type="checkbox" name="mpp-check-all" value="1" id="mpp-check-all" />
			</div>

			<div class="mpp-u-17-24">

				<select name="mpp-edit-media-bulk-action" id="mpp-edit-media-bulk-action">
					<option value="">Bulk Action</option>
					<option value="delete">Delete</option>
				</select>
				<?php //bulk action ?>
				<button class="mpp-button mpp-button-success mpp-button-primary mpp-bulk-action-apply-button" name="bulk-action-apply"><?php _e( 'Apply', 'mediapress' ) ;?></button>

			</div>

			<div class="mpp-u-5-24">
				<button type="submit" name="mpp-edit-media-submit"  id="mpp-edit-media-submit" ><?php _e( 'Update','mediapress' );?> </button>

			</div>

		</div> <!-- end of bulk action row -->
	
		<div id="mpp-editable-media-list" class="mpp-g">
	
	

			<?php while( $items->have_media() ) : $items->the_media(); ?>
	
				<?php $media_id = mpp_get_media_id();?>
		
				<div class='mpp-edit-media' id="mpp-edit-media-<?php mpp_media_id(); ?>">

					<div class="mpp-u-2-24">
						<input type='checkbox' name="mpp-delete-media-check[<?php echo $media_id;?>]" class="mpp-delete-media-check" value='1' />
					</div>	

					<div class='mpp-u-8-24 mpp-edit-media-cover'>
						<img src="<?php mpp_media_src('thumbnail');?>" class="mpp-image">			
					 </div>

					<div class='mpp-u-14-24'>
							<div class="mpp-g">
								<?php do_action( 'mpp_before_edit_media_item_form_fields' ); ?>


								<?php $status_name = 'mpp-media-status[' .$media_id .']'; ?>	
								<div class="mpp-u-1-1 mpp-media-status">
									<label for="<?php echo $status_name;?>">Status</label>
									<?php mpp_valid_gallery_status_dd( array( 'name' => $status_name, 'id'=> $status_name, 'selected' => mpp_get_media_status()  ) );?>
								</div>
								<div class="mpp-u-1-1 mpp-media-title">
									<label for="mpp-gallery-title[<?php echo $media_id;?>]">Title:</label>
									<input type='text' class='mpp-input-1' placeholder="<?php _ex( 'Title (Required)', 'Placeholder for media edit form title', 'mediapress' ) ;?>" name="mpp-media-title[<?php echo $media_id;?>]" value="<?php echo esc_attr(mpp_get_media_title() );?>"/>

								</div>

								<div class="mpp-u-1 mpp-media-description">
									<label for="mpp-media-description">Description</label>
									<textarea name="mpp-media-description[<?php echo $media_id;?>]" rows="5" class='mpp-input-1'><?php echo esc_textarea( mpp_get_media_description() ) ;?></textarea>
								</div>

								<?php do_action( 'mpp_after_edit_media_item_form_fields' ); ?>


							</div><!-- end of .mpp-g -->	
					</div>	<!--end of edit section -->
					<hr />
				</div>	
			<?php endwhile;	?>
			
			<?php $ids = $items->get_ids();?>
			
			<input type='hidden' name='mpp-editing-media-ids' value="<?php echo join( ',', $ids );?>" />

		</div>

		<input type='hidden' name="mpp-action" value='edit-gallery-media' />
		<?php wp_nonce_field( 'mpp-edit-gallery-media', 'mpp-nonce' ); ?>		

		<button type="submit" name="mpp-edit-media-submit"  id="mpp-edit-media-submit" ><?php _e( 'Update','mediapress' );?> </button>

	</form>
<?php else:?>
	<div class="mpp-notice mpp-empty-gallery-notice">
		<p><?php _e( 'There is no media in this gallery. Please add media to see them here!', 'mediapress' );?></p>
	</div>
<?php endif;?>