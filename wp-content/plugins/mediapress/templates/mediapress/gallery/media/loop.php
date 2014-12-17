<?php while( mpp_have_media() ): mpp_the_media(); ?>

	<div class="<?php mpp_media_class( 'mpp-gallery-item mpp-u-8-24');?>">

		<a href="<?php mpp_media_permalink() ;?>">
			<img src="<?php mpp_media_src('thumbnail') ;?>" class="mpp-image" />
		</a>
		<a href="<?php mpp_media_permalink() ;?>" class="mpp-media-title"><?php mpp_media_title() ;?></a>

	</div>

<?php endwhile; ?>