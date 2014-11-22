<?php
/**
 * Gallery API
 * @since 1.0
 */
/**
 * Register a New gallery or media status
 * @param array|string $args {
 *  Various options to create new status
 *      @type boolean 'media' does this stgatus applies to media?
 *      @type boolean 'gallery' does this status applies to gallery?
 *      @type string  'key'     the unique string to identify this status eg. public|private|friends etc
 *      @type string  'label'   the actual redable name of this status
 *      @type string   'description'  description for this status 
 * 
 *  }
 */
function mpp_register_status( $args ) {
    
    $default = array(
            'media'         => true, //enable this status for media?
            'gallery'       => true, //enable this status for gallery?
            'key'           => '',
            'label'         => '',
			'labels'		=> array(),//singular_name, plural_name
            'description'   => '',
            'callback'      => '',//callback to test for this status access
    );
    
    $args =  wp_parse_args( $args, $default );
    
    extract( $args );
    
    if( empty( $key ) || empty( $label ) ){
        _doing_it_wrong( __FUNCTION__, __( 'You must provide valid key and label for privacy', 'mediapress' ), '1.0' );
    }
    
    $mediapress = mediapress();
    //if it was not already registered
    if( !isset( $mediapress->statuses[$key] ) ) {
        
        //internally we store the status as _statusname(slug is made by prefixing underscore to the key)
        
        $term_slug = mpp_underscore_it( $key );
        
        $taxonomy = mpp_get_status_taxname ();
        
        //if the terms does not exists, add it
        if( ! mpp_term_exists( $term_slug, $taxonomy ) )
            wp_insert_term ( $label, $taxonomy, array(
                    'slug'          => $term_slug,
                    'description'   => $description
            ));
        
        
        $status_object = new MPP_Status( array( 
			'key'		=> $key,
			'label'		=> $label,
			'labels'	=> $labels,
			
			) );
		
        $status_object->callback = $callback;
        
        $mediapress->statuses[$key] = $status_object;
        
        //if this privacy applies to gallery
        if( $gallery )
            $mediapress->gallery_statuses[$key] = $status_object;
        
        //does this status applies to media too?
        if( $media )
            $mediapress->media_statuses[$key] = $status_object;
        
        
        
    }
        
 
}
/**
 * De register a previously registered Status(or privacy)
 * 
 * @param type $privacy_key
 * @return boolean true on success false if the privacy was not found in the registered list
 */
function mpp_deregister_status( $status ) {
    
   $mediapress = mediapress();
   
   if( isset( $mediapress->statuses[$status] ) ) {
       
       unset( $mediapress->statuses[$status] );
       
       //it could be registered for media or gallery or both, let us remove that
       
       if( isset( $mediapress->gallery_statuses[$status] ) )
           unset( $mediapress->gallery_statuses[$status] );
       
       
       if( isset( $mediapress->media_statuses[$status] ) )
           unset( $mediapress->media_statuses[$status] );
       
       //we do not remove the taxonomy term and leave it for future
       
       return true;//successfully deregistered 
   }
    
   //else
   return false;//no such privacy exists
   
    
}
/**
 *  Register a new Gallery Type
 * 
 * @param type $args
 */
function mpp_register_type( $args ) {
    
    $default = array(
            'key'           => '',
            'label'         => '',
			'labels'		=> array(),
            'description'   => '',
            'extensions'    => ''//allowed file extensions as array of filetypes
    );
    
    $args =  wp_parse_args( $args, $default );
    
    extract( $args );
	
    if( empty( $key ) || empty( $label ) || empty( $extensions ) ) {
        _doing_it_wrong( __FUNCTION__, __( 'You must provide valid key, label and extensions for gallery/media type', 'mediapress' ), '1.0' );
    }
    
    $mediapress = mediapress();
    //if it was not already registered
    if( !isset( $mediapress->types[$key] ) ) {
        
        $term_slug = mpp_underscore_it( $key );
        $taxonomy  = mpp_get_type_taxname();
       
        
        //if the terms does not exists, add it
        if( ! mpp_term_exists( $term_slug, $taxonomy ) ) {
            
            
            wp_insert_term ( $label, $taxonomy, 
					array(
						'slug'			=> $term_slug,
						'description'	=> $description
            ) );
            
            $extensions = mpp_string_to_array( $extensions );
            mpp_update_media_extensions( $key, $extensions );
            
        }
        
        
        
		$type_object = new MPP_Type( array(
				'key'		=> $key,
				'label'		=> $label,
				'labels'	=> $labels
		) );//$term->term_id );
        $mediapress->types[$key] = $type_object;
        
                
       
    }
        
    
}
/**
 * De register a previously registered gallery type
 * 
 * @param type $key slug of the type eg: photo|audio|video
 * @return boolean true if success false if the type was not found in registered list
 */
function mpp_deregister_type( $key ) {
    
    $mediapress = mediapress();
    
    if( isset( $mediapress->types[$key] ) ) {
        unset( $mediapress->types[$key] );
        return true;
    }
    
    return false;
    
    
}
/**
 * Register a new Associated/Supported component
 * 
 * @param type $args
 */
function mpp_register_component( $args ) {
    
    $default = array(
            'key'           => '',
            'label'         => '',
			'labels'		=> array(),
            'description'   => ''
    );
    
    $args =  wp_parse_args( $args, $default );
    
    extract( $args );
    
    if( empty( $key ) || empty( $label ) ) {
        _doing_it_wrong( __FUNCTION__, __( 'You must provide valid key and label for associated component.', 'mediapress' ), '1.0' );
    }
    
    $mediapress = mediapress();
    //if it was not already registered
    if( !isset( $mediapress->components[$key] ) ) {
		
        $term_slug = mpp_underscore_it( $key );
                
        $taxonomy  = mpp_get_component_taxname();
        
        //if the terms does not exists, add it
        if( ! mpp_term_exists( $term_slug, $taxonomy ) )
            wp_insert_term ( $label, $taxonomy, array(
                    'slug'          => $term_slug,
                    'description'   => $description
            ));
        
       
        
        $component_object = new MPP_Component( array(
				'key'		=> $key,
				'label'		=> $label,
				'labels'	=> $labels
		) );
        $mediapress->components[$key] = $component_object;
        
        
    }
        
    
}
/**
 * Deregister a previously registered associated component
 * 
 * @param type $key slug of the component eg user/groups/events
 * @return boolean true if success false if component does not exists in registered list
 */
function mpp_deregister_component( $key ) {
    
    $mediapress = mediapress();
    
    if( isset( $mediapress->components[$key] ) ){
        unset( $mediapress->components[$key] );
        return true;
    }
    
    return false;
    
    
}


/****
 * Media Sizes
 */

//cover image: 2 dimensions(for audio, video,gallery can we allow setting up different cover image sizes?)
//media size( original, we will store+ register thumb, mid, large, can we make it apllicable for different media type?)

/**
 * Register a new media Size
 * @param mixed $args{
 * 
 *  @type string $name the name for the media size
 *  @type int    $width the width of the image
 *  @type int    $height required, height of the image
 *  @type boolean $crop optional, whether to crop or resize       
 * 
 * }
 */
function mpp_register_media_size( $args ) {
  /*
    $default = array(
        'name'=> 'thumb',
        'width'=> 200,
        'height'=> 200,
        'crop'=> true,
        'type'=> 'audio,video,photo'//allow multiple types
        
        );
    */
    extract( $args );
    
    if( ! $name || ! $width || ! $height || ! $type )
        return false;//unable to register
    
    if( !isset( $crop ) )
        $crop = false;//by default no crop, only resize
    
    $mp = mediapress();
    $types = mpp_string_to_array ( $type );
    
    foreach( $types as $media_type )
        $mp->media_sizes[$media_type][$name] = array( 'height' => absint( $height), 'width' => absint( $width), 'crop' => $crop );
  
    return true;//successfully registered
}
/**
 * Deregister an already registered media size
 * 
 * @param mixed $args {
 * 
 *  @type string $name required, the name of  the registered media size
 *  @type string|array type(s) for which to be deregistered. e.g 'audio,video,photo' or 'audio,photo' or array('audio', 'photo') 
 * 
 * }
 */
function mpp_deregister_media_size( $args ) {
    
    extract( $args);
    
    if( ! $name || ! $type )
        return false;// can not de register
    
    $mp = mediapress();
    
    $types = mpp_string_to_array( $type );
    //remove the size setting for each type
    foreach( $types as $media_type )
        unset( $mp->media_sizes[$media_type][$name] );
    
    return true;
    
}

/**
 * 
 * @param string $name
 * @param string $media_type
 * @return boolean|mixed {
 *  
 *  @type int $width
 *  @type int $height
 *  @type boolean $crop
 * 
 * }
 */
function mpp_get_media_size( $name = 'thumbnail',  $media_type = 'photo' ) {
    
    $mp = mediapress();
    
    if( isset( $mp->media_sizes[$media_type][$name] ))
        return $mp->media_sizes[$media_type][$name];
    //if we are here, this media type or size was not registerd
    //check if default is registered, return that
    
    if( isset( $mp->media_sizes['default'][$name] ) )
        return $mp->media_sizes['default'][$name];
    
    return false;// no size error
    
    
}
/**
 * 
 * @param string $name
 * @param string $media_type
 * @return boolean|mixed array of mixed array{
 *  
 *  @type int $width
 *  @type int $height
 *  @type boolean $crop
 * 
 * }
 */
function mpp_get_media_sizes( $media_type = 'photo' ) {
    
    $mp = mediapress();
    
    $sizes = array();
    if( isset( $mp->media_sizes[$media_type] ) )
        $sizes= $mp->media_sizes[$media_type];
    //if we are here, this media type or size was not registerd
    //check if default is registered, return that
    
    if( ! $sizes && isset( $mp->media_sizes['default'] ) )
        $sizes = $mp->media_sizes['default'];
    
    return apply_filters( 'mpp_get_media_sizes', $sizes );// no size error
    
    
}



/**
 * 
 * @param type $type
 * @param MPP_Media_View $view
 * @return boolean
 */
function mpp_register_media_view( $type, $view ){
	
	if( ! $type || ! $view )
		return false;
	
	$mp = mediapress();
	
	$mp->media_views[$type] = $view;
	return true;
	
}
/**
 * 
 * @param string $type media type
 * @return boolean always true 
 */
function mpp_deregister_media_view( $type ) {
	
	if( ! $type )
		return false;
	
	$mp = mediapress();
	unset( $mp->media_views[$type] );
	
	return true;
	
}
/**
 * Get registered View for this media type
 * 
 * @param type $type
 * @return MPP_Media_View|boolean
 */
function mpp_get_media_view( $type ){
	
	if( ! $type )
		return false;
	
	$mp = mediapress();
	if( isset( $mp->media_views[$type] ) )
		return $mp->media_views[$type];
	
	return false;//none registered
	
}
