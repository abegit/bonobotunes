<?php if( mpp_have_media() ): ?>

    <?php while( mpp_have_media() ): mpp_the_media(); ?>

        <?php if( mpp_user_can_view_media( mpp_get_media_id() ) ) :?>
			<?php if ( function_exists( 'mycred_get_users_cred' ) && mycred_get_users_cred( get_current_user_id() ) != 0  ) { ?>
				<?php $author_id = $post->post_author; ?>
				<?php $viewer_id = bp_loggedin_user_id(); ?>
				<?php //mycred_add( 'someone_viewed_group_photo', $author_id, 8, 'Someone Viewed Group Photo!', date( 'y' ) ); ?>
				<?php mycred_add( 'viewing_group_photo', $viewer_id, 10, 'Viewing Group Photo!', date( 'y' ) ); ?>
			<?php } ?>
			<div class="<?php mpp_media_class( );?>" id="mpp-media-<?php mpp_media_id();?>">
					
					<?php do_action( 'mpp_before_single_media_item' ); ?>
				
					<div class="mpp-item-title mpp-media-title"> <?php mpp_media_title() ;?></div>
					
					<?php do_action( 'mpp_after_single_media_title' ); ?>
					
					<div class="mpp-item-entry mpp-media-entry" >
						
						<?php do_action( 'mpp_before_single_media_content' ); ?>
						
						<img src="<?php mpp_media_src() ;?>" alt="<?php mpp_media_title(); ?>" class="mpp-large"/>
						
						<div class="mpp-item-description mpp-media-description"><?php mpp_media_description();?></div>
						
						<?php do_action( 'mpp_after_single_media_content' );?>
						
					</div>
					
					<div class="mpp-item-meta mpp-media-meta">
						<?php do_action( 'mpp_media_meta' );?>
					</div>
										
					<?php do_action( 'mpp_after_single_media_item' ); ?>	
					
            </div>

        <?php else:?>

            <div class="mpp-notice mpp-gallery-prohibited">

                <p><?php printf( __( 'The privacy policy does not allow you to view this.', 'mediapress' ) ); ?></p>
            </div>

        <?php endif;?>

    <?php endwhile; ?>
	
   
	<?php  mpp_previous_media_link();?>
    <?php  mpp_next_media_link();?>
   
	<?php mpp_locate_template( array('gallery/activity/media-activity.php'), true ); ?>

<?php else:?>

<div class="mpp-notice mpp-no-gallery-notice">
    <p> <?php _ex( 'There is nothing to see here!', 'No media message', 'mediapress' ); ?> 
</div>

<?php endif;?>