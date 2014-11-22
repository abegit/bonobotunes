<?php

/**
 * MediaPress Media class.
 *
 * @since 1.0
 *
 */
class MPP_Media {

	/**
	 * Media id.
	 *
	 * @var int post id for the media
	 */
	public $id;

	/**
	 * Gallery id.
	 *
	 * @var int post id for the gallery
	 */
	public $gallery_id;

	/**
	 * id of media uploader.
	 *
	 * A numeric.
	 *
	 * @var int creator id
	 */
	public $user_id = 0;

	/**
	 * The post's local publication time.
	 *
	 * @var string
	 */
	public $date_created = '0000-00-00 00:00:00';

	/**
	 * The post's GMT publication time.
	 *
	 * @var string
	 */
	public $date_created_gmt = '0000-00-00 00:00:00';

        
	/**
	 * The Media title.
	 *
	 * @var string
	 */
	public $title = '';
        
	/**
	 * The post's slug.
	 *
	 * @var string
	 */
	public $slug = '';
        
        
	/**
	 * The media description.
	 *
	 * @var string
	 */
	public $description = '';



	/**
	 * The media excerpt.
	 *
	 * @var string
	 */
	public $excerpt = '';

	/**
	 * The media status
	 *
	 * @var string
	 */
	//public $status = 'public';
        
    /**
     *  The Media type
     * 
     * audio|video|photo|mixed
     * 
     * @var string
     */
     //public $type = '';
	/**
	 * Whether comments are allowed.
	 *
	 * @var string
	 */
	public $comment_status = 'open';

	/**
	 * The post's password in plain text.
	 *
	 * @var string
	 */
	public $password = '';



	/**
	 * The gallery's local modified time.
	 *
	 * @var string
	 */
	public $date_modified = '0000-00-00 00:00:00';

	/**
	 * The Gallery's GMT modified time.
	 *
	 * @var string
	 */
	public $date_modified_gmt = '0000-00-00 00:00:00';

	/**
	 * A utility DB field for gallery content.
	 *
	 *
	 * @var string
	 */
	public $content_filtered = '';

	

	/**
	 * A field used for ordering posts.
	 *
	 * @var int
	 */
	public $sort_order = 0;

	

	/**
	 * Cached comment count.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @var string
	 */
	public $comment_count = 0;

        
        
        
   // public $cover_id;//cover image id in case of non image media
   // public $cover_thumbnail;//thumbnail cover image
   // public $cover_mid;//mid size cover image
    //public $cover_large;//large cover image
   // public $cover_original;//original cover image


    //public $component;//type of component it is the term_id for components _user|_groups etc
    //public $component_id;//actual id of user/group etc

        /**
	 * was the file actually uploaded by the user? 
	 *
	 * @var bool true if uploaded to local or remote location by the user
	 */
	public $is_uploaded = 0;
        
        
        /**
	 * Is the file stored at remote location. (have we used ftp|cdn for storing files?)
	 *
	 * @var bool true if the file is not stored on local server
	 */
	public $is_remote = 0;
        /**
	 * Which remote Service Is being Used (id will dep[end on type of service, It uniquely identifies the remote)
	 *
	 * @var int
	 */
	public $remote_service_id = 0;

        
        
        /**
	 * Is imported file, in this case we treat it as local file but store the original url from where it was imported
	 *
	 * @var boolean true if file is imported from somewhere else
	 */
	public $is_imported = 0;
        
        /**
	 * In case of imported file, from where it was imported?
	 *
	 * @var int
	 */
	public $imported_url = 0;
        
        /**
	 * Is Embedded content
	 *
	 * @var int
	 */
	public $is_embedded = 0;
        
        /**
	 * In case of embedded content, from where it originates?
	 *
	 * @var string
	 */
	public $embed_url = 0;
        
        /**
	 * the html content of the embedded thing?
	 *
	 * @var string
	 */
	public $embed_html = 0;
    

	/**
	 * Stores the post object's sanitization level.
	 *
	 * Does not correspond to a DB field.
	 *
	 * @var string
	 */
	public $filter;
    
    
    /**
     *
     * @var MPP_Storage_Manager 
     */
    public $storage = null;
    
    public function __construct( $media_id = false) {

        global $wpdb;

        $media_id = (int) $media_id;

        if ( !$media_id )
            return;

        $_media = mpp_get_media_from_cache( $media_id );

        if ( !$_media ) {
            $_media = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE ID = %d LIMIT 1", $media_id ) );

            if ( !$_media )
                return;

            $_media = sanitize_post( $_media, 'raw' );
            
           
        } elseif ( empty( $_media->filter)) {
            $_media = sanitize_post( $_media, 'raw' );
        }

        $field_map = $this->get_field_map();

        foreach ( get_object_vars($_media) as $key => $value) {
            if (isset($field_map[$key]))
                $this->$field_map[$key] = $value;
        }
        mpp_add_media_to_cache( $_media );
        //now add it ot 
    }
            
        /**
         * Get field map
         * 
         * Maps WordPress post table fields to gallery field
         * @return type
         */
        private function get_field_map(){

                return array(
                    'ID'                        => 'id',
                    'post_author'               => 'user_id',
                    'post_title'                => 'title',
                    'post_content'              => 'description',
                    'post_excerpt'              => 'excerpt',
                    'post_name'                 => 'slug',
                    'post_password'             => 'password',
                    'post_date'                 => 'date_created',
                    'post_date_gmt'             => 'date_created_gmt',
                    'post_modified'             => 'date_modified',
                    'post_modified_gmt'         => 'date_modified_gmt',
                    'comment_status'            => 'comment_status',
                    'post_content_filtered'     => 'content_filtered',
                    'post_parent'               => 'gallery_id',
                    'menu_order'                => 'sort_order',
                    'comment_count'             => 'comment_count'


                );
            }
	
        /**
         * Get reverse field map
         * Maps gallery variables to WordPress post table fields  
         * @return type
         */    
        private function get_reverse_field_map(){

            return array_flip( $this->get_field_map());
        }
        
        
	public function __isset( $key ) {
		 
		return metadata_exists( 'post', $this->id, '_mpp_'. $key );//eg _mpp_is_remote etc on call of $obj->is_remote
	}

	public function __get( $key ) {
	

		if ( 'status' == $key ) {
			return mpp_get_object_status( $this->id );
		}
		if ( 'type' == $key ) {
			return mpp_get_object_type( $this->id );
		}
		if ( 'component' == $key ) {

			return mpp_get_object_component( $this->id );
		}




		$value = mpp_get_media_meta( $this->id, '_mpp_' . $key, true );

		
		return $value;
	}

	public function filter( $filter ) {
        
		if ( $this->filter == $filter )
			return $this;

		if ( $filter == 'raw' )
			return new self( $this->id );

		return sanitize_post( $this, $filter );
	}
    /**
     * Convert Object to array
     * 
     * @return array
     */
	public function to_array() {
		$post = get_object_vars( $this );

		foreach ( array( 'ancestors') as $key ) {
			if ( $this->__isset( $key ) )
				$post[ $key ] = $this->__get( $key );
		}

		return $post;
	}
}

/**
 * Retrieves Media data given a media id or media object.
 *
 * @param int|object $media media id or media object. Optional, default is the current media from the loop.
 * @param string $output Optional, default is Object. Either OBJECT, ARRAY_A, or ARRAY_N.
 * @param string $filter Optional, default is raw.
 * @return MPP_Media|null MPP_Media on success or null on failure
 */
function mpp_get_media( $media = null, $output = OBJECT, $filter = 'raw' ) {
    if ( empty( $media ) && mediapress()->current_media )
        $media = mediapress()->current_media;
    
    //if already an instance of gallery object
    if ( is_a( $media, 'MPP_Media' ) ) {

        $_media = $media;
    } elseif ( is_object( $media ) ) {
        //if it is an object but not an instance of gallery 

        if ( empty( $media->filter ) ) {
            $_media = sanitize_post( $media, 'raw' );
            $_media = new MPP_Media( $_media );
           
        } else {

            $_media = new MPP_Media( $media );
          
        }
    } else {
        $_media = new MPP_Media( $media );
        
    }
      
    if ( !$_media )
        return null;

    $_media = $_media->filter($filter);

    if ( $output == ARRAY_A )
        return $_media->to_array();
    elseif ( $output == ARRAY_N )
        return array_values( $_media->to_array());

    return $_media;
}


function mpp_get_media_from_cache( $media_id ){
    
    return  wp_cache_get( 'mpp_gallery_media_' . $media_id, 'bp' ) ;
            

}

function mpp_add_media_to_cache( $media ){
    
     wp_cache_set( 'mpp_gallery_media_' . $media->ID, $media, 'bp' );
     
}
//clear media cache
function mpp_clean_media_cache( $post ) {
	global $_wp_suspend_cache_invalidation;

	if ( ! empty( $_wp_suspend_cache_invalidation ) )
		return;

	$post = get_post( $post );
	if ( empty( $post ) )
		return;

	wp_cache_delete( 'mpp_gallery_media_' . $post->ID, 'bp' );


}