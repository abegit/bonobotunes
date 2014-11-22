<?php
/**
 * @package mediapress
 * @subpackage mpp-base
 * 
 * Lists all the Photos
 *	
 * Fallback single Gallery View
 */
?>

<?php if( mpp_have_media() ): ?>

    <?php if( mpp_user_can_list_media( mpp_get_current_gallery_id() ) ):?>

		<div class='mpp-g mpp-single-gallery-media-list mpp-single-gallery-videos-list'>
						<?php 
			$slug = '';
			$type = mpp_get_gallery_type();
			if( mpp_gallery_supports_playlist( false, $type ) ){
				$slug = "{$type}-playlist";
			}else{
				$slug = $type;
			}
			
			?>
			<?php mpp_get_template_part( 'gallery/media/loop', $slug );?>
			
		</div>

        <?php mpp_media_pagination();?>
				
		<?php mpp_locate_template( array('gallery/activity/gallery-activity.php'), true );?>
    <?php else:?>

            <div class="mpp-notice mpp-gallery-prohibited">

                <p><?php printf( __( 'The privacy policy does not allow you to view this.', 'mediapress' ) ); ?></p>
                
            </div>

    <?php endif;?>
        
<?php else:?>

    <div class="mpp-notice mpp-no-gallery-notice">
        <p> <?php _ex( 'Nothing to see here!', 'No Gallery Message', 'mediapress' ); ?> 
    </div>

<?php endif;?>