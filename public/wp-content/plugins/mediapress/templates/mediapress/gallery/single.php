<?php
/**
 * Single Gallery View Switcher
 * 
 * If we are here, It must be singl;e gallery
 */

$gallery = mpp_get_gallery();

$type = mpp_get_gallery_type( $gallery );

mpp_locate_sub_template(  'gallery/single/', $type .".php", 'default.php' );
