<?php
/**
 * Base class used for storing basic details
 * name may change in future
 */
class MPP_Taxonomy {
    public $id;
    public $label;
    public $singular_name = '';
	public $plural_name = '';
	
	public $slug;
    
    
    public function __construct( $args, $taxonomy ) {
		
	$term = null;
	
	if( isset( $args['key'] ) ) {	
		
		
		$term = get_term_by( 'slug', mpp_underscore_it( $args['key'] ), $taxonomy );
	
	}elseif( isset( $args['id'] ) ) {
		
		$term = get_term( $args['id'], $taxonomy );
		
		
	}
	 
    if( $term && ! is_wp_error( $term ) ) {
		
         $this->id		= $term->term_id;
         $this->label	= $term->name;
		 
         $this->slug	= str_replace( '_', '', $term->slug );//remove _ from the slug name to make it private/public etc
         
		 if( isset( $args['labels']['singular_name'] ) )
			 $this->singular_name = $args['labels']['singular_name'];
		 else
			 $this->singular_name = $this->label;
		 
		 
		 if( isset( $args['labels']['plural_name'] ) )
			 $this->plural_name = $args['labels']['plural_name'];
		 else
			 $this->plural_name = $this->label;
		 
		 
     }
    }
    /**
     * 
     * @return string the label for this taxonomy
     */
    public function get_label(){
        return $this->label;
    } 
    /**
     * 
     * @return int the actual internal term id
     */
    public function get_id(){
        return $this->id;
    }
    /**
     * 
     * @return string, slug (It has underscores appended)
     */
    public function get_slug(){

        return $this->slug;
    }
}
/**
 * Gallery|Media Status class
 */
class MPP_Status extends MPP_Taxonomy{
    
    public function __construct( $args ) {
        parent::__construct( $args, mpp_get_status_taxname() );
    }
}
/**
 * Gallery|Media Type object
 */
class MPP_Type extends MPP_Taxonomy{
    /**
     *
     * @var mixed file extentions for the media type array('jpg', 'gif', 'png'); 
     */
    private $extensions;
	
    public function __construct( $args ) {
		
        parent::__construct( $args, mpp_get_type_taxname() );
		
        $this->extensions = mpp_get_media_extensions( $this->get_slug() );
		//$this->extensions = mpp_string_to_array( $this->extensions );
    }
    
    public function get_extensions( ){
        return $this->extensions;
    }
    
}

/**
 * Gallery|Media Component 
 */
class MPP_Component extends MPP_Taxonomy{
    
    public function __construct( $args ) {
        parent::__construct( $args, mpp_get_component_taxname() );
    }
}



/**
 * 
 * @param string $key private|public etc
 * 
 * @return MPP_Status|Boolean
 */
function mpp_get_status_object( $key ) {
	
	if( ! $key )
		return '';
	
	if( is_numeric( $key ) ) {
		
		$term = get_term(  absint( $key ) , mpp_get_status_taxname() );
		
		if( ! $term )
			return '';
		
		
		$key = mpp_strip_underscore( $term->slug );
		
	}
	
	$mpp = mediapress();
	
	if( isset( $mpp->statuses[$key] ) && is_a( $mpp->statuses[$key], 'MPP_Status' ) ) {
		
		return $mpp->statuses[$key];
		
	}
	
	return false;
}

/**
 * 
 * @param string $key members|groups etc
 * 
 * @return MPP_Component|boolean
 */
function mpp_get_component_object( $key ) {

	if( ! $key )
		return '';
	
	if( is_numeric( $key ) ) {
		$term = get_term(  absint( $key ) , mpp_get_component_taxname() );
		
		if( !$term )
			return '';
		
		$key = $term->slug;
	}
	
	$mpp = mediapress();
	
	if( isset( $mpp->components[$key] ) && is_a( $mpp->components[$key], 'MPP_Component' ) ) {
		
		return $mpp->components[$key];
		
	}
	
	return false;
}

/**
 * 
 * @param string|int $key component term_name keys members|groups  etc
 * 
 * @return MPP_Type|boolean
 */
function mpp_get_type_object( $key ) {
	if( ! $key )
		return '';
	
	if( is_numeric( $key ) ) {
		$term = get_term(  absint( $key ) , mpp_get_type_taxname() );
		
		if( !$term )
			return '';
		
		$key = mpp_strip_underscore( $term->slug );
		
	}	
	$mpp = mediapress();
	
	if( isset( $mpp->types[$key] ) && is_a( $mpp->types[$key], 'MPP_Type' ) ) {
		
		return $mpp->types[$key];
		
	}
	
	return false;
}


/**
 * Get allowed file extensions for this type as array
 * 
 * @param type $type audio|photo|video etc
 * @return array( 'jpg', 'gif', ..)//allowed extensions for a given type
 */
function mpp_get_allowed_file_extensions( $type ) {
	
	if( !mpp_is_registered_gallery_type( $type ) )
		return array();
	
	$type_object = mpp_get_type_object( $type );
	
	return  $type_object->get_extensions() ;
}

/**
 * Get the list of allowed file extensions
 * 
 * @param type $type
 * @param type $separator
 * @return string
 */
function mpp_get_allowed_file_extensions_as_string( $type, $separator = ',' ) {
	
	$extensions = mpp_get_allowed_file_extensions( $type );
	if( empty( $extensions ) )
		return '';
	
	return join( $separator, $extensions );
}