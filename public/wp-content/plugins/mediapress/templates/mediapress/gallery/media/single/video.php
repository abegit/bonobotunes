<?php if( mpp_have_media() ): ?>

    <?php while( mpp_have_media() ): mpp_the_media(); ?>

        <?php if( mpp_user_can_view_media( mpp_get_media_id() ) ) :?>

            <div class="mpp-gallery-item mpp-single-video">
               
				<?php  
				
					$args = array(
							'src' => mpp_get_media_src(),
							'poster' => mpp_get_media_src( 'thumbnail' ),
							
					);
					echo wp_video_shortcode( $args );
				?>
				
				<?php mpp_media_title() ;?>
               
            </div>

        <?php else:?>

            <div class="mpp-notice mpp-gallery-prohibited">

                <p><?php printf( __( 'The privacy policy does not allow you to view this.', 'mediapress' ) ); ?></p>
            </div>

        <?php endif;?>

    <?php endwhile; ?>

    <?php  mpp_next_media_link();?>
    <?php  mpp_previous_media_link();?>
	<?php mpp_locate_template( array('gallery/activity/media-activity.php'), true ); ?>
<?php else:?>

<div class="mpp-notice mpp-no-gallery-notice">
    <p> <?php _ex( 'There is nothing to see here!', 'No Media Message', 'mediapress' ); ?> 
</div>

<?php endif;?>