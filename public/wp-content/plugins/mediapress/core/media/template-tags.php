<?php
/**
 * like have_posts() alternative for media loop
 * check if there are galleries
 * 
 * 
 * @return boolean
 */
function mpp_have_media() {
	
    $the_media_query = mediapress()->the_media_query;
	return $the_media_query->have_media();
}
/**
 * Fetch the current media
 * 
 * @return type
 */
function mpp_the_media() {
    
	$the_media_query = mediapress()->the_media_query;
	
    return $the_media_query->the_media();
}




/**
 * print media id
 * 
 * @param type $media
 */

function mpp_media_id( $media = false ){
    echo mpp_get_media_id( $media );
}

/**
 * Get media id
 * @param int|object $media
 * @return int media id
 */

function mpp_get_media_id( $media = false ){
    
    $media = mpp_get_media( $media ); 
    return apply_filters( 'mpp_get_media_id', $media->id );
}

function mpp_media_title( $media = false ){
    
    echo mpp_get_media_title( $media );
}

/**
 * Get media title
 * @param type $media
 * @return string
 */

function mpp_get_media_title( $media = false ){
    
    $media = mpp_get_media( $media );
    
    return apply_filters( 'mpp_get_media_title',  $media->title, $media->id ); 
}



function mpp_media_src( $type = '', $media = null ){
    
    echo mpp_get_media_src( $type, $media );
}

function mpp_get_media_src( $type = '', $media = null ) {
    
    $media = mpp_get_media( $media );
    //if media is not photo and the type specified is empty or not 'originial'., get cover
	if( $media->type != 'photo' ) {
		
		if( !empty( $type) && $type != 'original' )
			return mpp_get_media_cover_src ( $type, $media->id );
	}
    $storage_manager = mpp_get_storage_manager( $media->id );
    
    return $storage_manager->get_src( $type, $media->id  );
    
    
    
}

function mpp_media_path( $type = '', $media = null ){
    
    echo mpp_get_media_path( $type, $media );
    
}

function mpp_get_media_path( $type = '', $media = null ){
    
    $media = mpp_get_media( $media );
    
    $storage_manager = mpp_get_storage_manager( $media->id );
    
    return $storage_manager->get_path( $type, $media->id );
    
    
}
/**
 *  Print media slug
 * @param type $media
 */

function mpp_media_slug( $media = false) {
	echo mpp_get_media_slug( $media );
}

/**
 * Get media slug
 * @param type $media int|object
 * @return type
 */

function mpp_get_media_slug( $media = false ) {
        
        $media = mpp_get_media( $media );
        
        return apply_filters( 'mpp_get_media_slug', $media->slug, $media->id );
}
/**
 * To Generate the actual code for showing media
 * We will rewrite it with better api in future, currently, It acts as fallback
 * 
 * The goal of this function is to generate appropriate output for listing media based on media type
 * 
 * @param type $media
 */
function mpp_media_content( $media = null ) {
	
	echo mpp_get_media_content( $media );
	
}

function mpp_get_media_content( $media = null ){
	
	$media = mpp_get_media( $media );
	
	$view = mpp_get_media_view( $media->type );
	
	if( !empty( $view ) )
		return $view->get_html( $media );
	
	return sprintf( __( 'There are no view object registered to handle the display of the content of <strong> %s </strong> type', 'mediapress' ), $media->type );
}
/**
 * Print media description
 * 
 * @param type $media
 */

function mpp_media_description( $media = false ) {
		echo mpp_get_media_description( $media );
}

/**
 * Get media description
 * 
 * @param type $media
 * @return type
 */

function mpp_get_media_description( $media = false ) {
        
        $media = mpp_get_media( $media );

        return apply_filters( 'bp_get_media_description', stripslashes( $media->description ), $media->id );
}

/**
 * print the type of media
 * @param type $media
 */

function mpp_media_type( $media = false ){
    
    echo mpp_get_media_type( $media );
}

/**
 * 
 * @param type $media
 * @return string media type (audio|video|photo etc)
 */

function mpp_get_media_type( $media = false ){
    
    $media = mpp_get_media( $media );
   
    return apply_filters( 'mpp_get_media_type', $media->type, $media->id );
}

/**
 * Print Gallery status (private|public)
 * @param type $media
 */

function mpp_media_status( $media = false ){
    
    echo mpp_get_media_status( $media );
}

/**
 * 
 * @param type $media
 * @return string Gallery status(public|private|friends only)
 */

function mpp_get_media_status( $media = false ){
    
    $media = mpp_get_media( $media );
   
    return apply_filters( 'mpp_get_media_status', $media->status, $media->id );
}


/**
 * Print the date of creation for the media
 * 
 * @param type $media
 */

function mpp_media_date_created( $media = false ) {
	echo mpp_get_media_date_created( $media );
}

/**
 * Get the date this media was created
 * @param type $media
 * @return type 
 */

function mpp_get_media_date_created( $media = false ) {
        
        $media = mpp_get_media( $media );
        return  apply_filters( 'mpp_get_media_date_created', date_i18n( get_option( 'date_format' ), $media->date_created ), $media->id );
}

/**
 * Print When was the last time media was updated
 * 
 * @param type $media
 */

function mpp_media_last_updated( $media = false ) {
	echo mpp_get_media_last_updated( $media );
}

/**
 * Get the date this media was last updated
 * 
 * @param type $media
 * @return type 
 */

function mpp_get_media_last_updated( $media = false ) {
       
        return apply_filters( 'mpp_get_media_date_updated', date_i18n( get_option( 'date_format' ), $media->date_updated ), $media->id );
}

/**
 * Print the user id of the person who created this media
 * 
 * @param type $media
 */

function mpp_media_creator_id( $media = false ){
    echo mpp_get_media_creator_id( $media );
}

/**
 * Get the ID of the person who created this Gallery
 * @param type $media
 * @return type 
 */

function mpp_get_media_creator_id( $media = null ){
    
    $media = mpp_get_media( $media );
              
    return apply_filters( 'mpp_get_media_creator_id', $media->user_id, $media->id );
}

/**
 * Print the css class list 
 * @param type $class
 * @param type $media
 */

function mpp_media_class( $class = '', $media = null ){
    echo mpp_get_media_class( $class, $media );

}

/**
 * Get css class list fo the media 
 * @param type $class
 * @param type $media
 * @return type
 */

function  mpp_get_media_class( $class = '', $media = null ){
     
    $media = mpp_get_media( $media );
	$class_list = "mpp-item mpp-media mpp-media-{$media->type}";
	if( mpp_is_single_media() ){
		$class_list .=" mpp-item-single mpp-media-single mpp-media-single-{$media->type}";
	}
	return apply_filters( 'mpp_get_media_class', "{$class_list} {$class}" );
}



function mpp_next_media_link( $format = '%link &raquo;', $link = '%title' ){
    mpp_next_post_link( $format, $link, mpp_get_media_post_type() );
}

function mpp_previous_media_link( $format = '&laquo; %link  ', $link = '%title' ){
    mpp_previous_post_link( $format, $link, mpp_get_media_post_type() );
}

/**
 * Print pagination
 */

function mpp_media_pagination() {
	echo mpp_get_media_pagination();
}

/**
 * Get the pagination text
 * @return string
 */

function mpp_get_media_pagination() {
	
	
	//check if the current gallery supports playlist. then do not show pagination
	
	if( mpp_gallery_supports_playlist(  mpp_get_gallery() ) )
		return;
	
	
    return "<div class='mpp-paginator'>" . mediapress()->the_media_query->paginate() ."</div>";

}
    
    
/**
 * @todo update
 * @global type $bp
 * @global type $galleries_template
 */
    
function mpp_media_pagination_count() {
	
    mediapress()->the_media_query->pagination_count();
}

/**
 * Stats Related
 * 
 * must be used inside the media loop
 * 
 */


/**
 * print the total media count for the current query
 */
function mpp_total_media_count() {
	echo mpp_get_total_media_count();
}


/**
 * get the total no. of media in current query
 * 
 * @return int
 */
function mpp_get_total_media_count() {

    return apply_filters( 'mpp_get_total_media_count', mediapress()->the_media_query->found_posts );
}

/**
 * Total media count for user
 */
function mpp_total_media_count_for_member() {
	echo mpp_get_total_media_count_for_member();
}



/**
 * @todo update for actual count
 * @return type
 * @todo
 */

function mpp_get_total_media_count_for_member() {
    return apply_filters( 'mpp_get_total_media_count_for_member', mpp_get_total_media_for_user() );
}


/**
 * Other functions
 */


/**
 * Get The Single media ID
 * @global  $bp
 * @return Int 
 */

function mpp_get_current_media_id(){
   
    return mediapress()->current_media->id;
    
}

/**
 * Get current Media
 * @return MPP_Media|null 
 */

function mpp_get_current_media(){

    return mediapress()->current_media;
}

/**
 * Is it media directory?
 * @return type 
 * @todo handle the single media case for root media
 */

function mpp_is_media_directory(){
	
    $action = bp_current_action();
    if( mpp_is_gallery_directory() && !empty( $action ) )
        return true;
    
    return false;
 }
 
 
/**
 * Is Single Media
 * @global  $bp
 * @return type 
 */
 
function mpp_is_single_media(){
   
    return mediapress()->the_media_query->is_single();
    
}


function mpp_is_remote_media( $media = null ){
    
    $media = mpp_get_media( $media );
    
    return  apply_filters( 'mpp_get_media_is_remote', $media->is_remote );
    
 }

 


/**
 * @todo update
 */
function mpp_no_media_message(){
//detect the type here
  
    
    $type_name = bp_action_variable( 0 );

    //$type_name = media_get_type_name_plural( $type );
  
    if( !empty( $type_name ) )
        $message = sprintf( __( 'There are no %s yet.', 'mediapress'),  strtolower ($type_name) );
    else
        $message = __( 'There are no galleries yet.', 'mediapress' );

    echo $message;
}


function mpp_media_action_links( $media = null  ){
	
	echo mpp_get_media_action_links( $media );
	
}
function mpp_get_media_action_links( $media = null ){
	
	$links = array();
	
	$media = mpp_get_media( $media );

	$links ['view'] = sprintf( '<a href="%1$s" title="view %2$s" class="mpp-view-media">%3$s</a>', mpp_get_media_permalink( $media ), esc_attr( $media->title ), __( 'view', 'mediapress' ) );
	
	//upload?
	
	if( mpp_user_can_edit_media( $media->id ) ) {
		
		$links['edit'] = sprintf( '<a href="%s" alt="'. __( 'Edit %s', 'mediapress') .'">%s</a>', mpp_get_media_edit_url( $media ), $media->title, __( 'edit', 'mediapress' ) );
		
	}
	//delete
	if( mpp_user_can_delete_media( $media ) ){
		
		$links['delete'] = sprintf( '<a href="%s" alt="'. __( 'delete %s', 'mediapress') .'" class="confirm mpp-confirm mpp-delete mpp-delete-media">%s</a>', mpp_get_media_delete_url( $media ), $media->title, __( 'delete', 'mediapress' ) );
		
	}
	
	
	return apply_filters( 'mpp_media_actions_links', join(' ', $links ), $links, $media );
	
}

function mpp_get_media_grid_column_class( $media = null ){

	//we are using 1-24 col grid, where 3-24 repsesents 1/8th and so on
	
	$col = mpp_get_option( 'media_columns' );
	
	return mpp_get_grid_column_class( $col );
	
}
