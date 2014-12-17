<?php

/**
 * like have_posts() alternative for gallery loop
 * 
 * check if there are galleries available
 * 
 * 
 * @return boolean true if there are galleries available, else false
 */
function mpp_have_galleries() {

	$the_gallery_query = mediapress()->the_gallery_query;
	
	return $the_gallery_query->have_galleries();
}

/**
 * Fetch the current gallery
 * 
 * @return type
 */
function mpp_the_gallery() {

	$the_gallery_query = mediapress()->the_gallery_query;
	return $the_gallery_query->the_gallery();
}

/**
 * print gallery id
 * 
 * @param type $gallery
 */
function mpp_gallery_id( $gallery = false ) {

	echo mpp_get_gallery_id( $gallery );
}

/**
 * Get gallery id
 * 
 * @param int|object $gallery
 * @return int gallery id
 */
function mpp_get_gallery_id( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );
	return apply_filters( 'mpp_get_gallery_id', $gallery->id );
}
/**
 * Print gallery title
 * 
 * @param type $gallery
 */
function mpp_gallery_title( $gallery = false ) {

	echo mpp_get_gallery_title( $gallery );
}

/**
 * Get gallery title
 * 
 * @param type $gallery
 * @return string
 */
function mpp_get_gallery_title( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_title', $gallery->title, $gallery->id );
}

/**
 * Print gallery slug
 * 
 * @param int|MPP_Gallery $gallery
 * 
 * @return string gallery slug(post slug)
 */
function mpp_gallery_slug( $gallery = false ) {

	echo mpp_get_gallery_slug( $gallery );
}

/**
 * Get gallery slug
 * 
 * @param type $gallery int|object
 * @return string
 */
function mpp_get_gallery_slug( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_slug', $gallery->slug, $gallery->id );
}

/**
 * Print gallery description
 * 
 * @param type $gallery
 */
function mpp_gallery_description( $gallery = false ) {

	echo mpp_get_gallery_description( $gallery );
}

/**
 * Get gallery description
 * 
 * @param type $gallery
 * @return type
 */
function mpp_get_gallery_description( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_description', stripslashes( $gallery->description ), $gallery->id );
}

/**
 * print the type of gallery
 * 
 * @param type $gallery
 */
function mpp_gallery_type( $gallery = false ) {

	echo mpp_get_gallery_type( $gallery );
}

/**
 * 
 * @param type $gallery
 * @return string gallery type (audio|video|photo etc)
 */
function mpp_get_gallery_type( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_type', $gallery->type, $gallery->id );
}

/**
 * Print Gallery status (private|public etc)
 * 
 * @param type $gallery
 */
function mpp_gallery_status( $gallery = false ) {

	echo mpp_get_gallery_status( $gallery );
}

/**
 * Get gallery status
 * 
 * @param type $gallery
 * @return string Gallery status(public|private|friends only)
 */
function mpp_get_gallery_status( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_status', $gallery->status, $gallery->id );
}

/**
 * Print the date of creation for the gallery
 * 
 * @param type $gallery
 */
function mpp_gallery_date_created( $gallery = false ) {

	echo mpp_get_gallery_date_created( $gallery );
}

/**
 * Get the date this gallery was created
 * @param type $gallery
 * @return type 
 */
function mpp_get_gallery_date_created( $gallery = false ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_date_created', date_i18n( get_option( 'date_format' ), $gallery->date_created ), $gallery->id );
}

/**
 * Print When was the last time gallery was updated
 * 
 * @param type $gallery
 */
function mpp_gallery_last_updated( $gallery = false ) {

	echo mpp_get_gallery_last_updated( $gallery );
}

/**
 * Get the date this gallery was last updated
 * 
 * @param type $gallery
 * @return type 
 */
function mpp_get_gallery_last_updated( $gallery = false ) {

	return apply_filters( 'mpp_get_gallery_date_updated', date_i18n( get_option( 'date_format' ), $gallery->date_updated ), $gallery->id );
}

/**
 * Print the user id of the person who created this gallery
 * 
 * @param type $gallery
 */
function mpp_gallery_creator_id( $gallery = false ) {

	echo mpp_get_gallery_creator_id( $gallery );
}

/**
 * Get the ID of the person who created this Gallery
 * @param type $gallery
 * @return type 
 */
function mpp_get_gallery_creator_id( $gallery = null ) {

	$gallery = mpp_get_gallery( $gallery );

	return apply_filters( 'mpp_get_gallery_creator_id', $gallery->user_id, $gallery->id );
}

/**
 * Print the css class for the gallery
 * 
 * @param type $class
 * @param type $media
 */
function mpp_gallery_class( $class = '', $gallery = null ) {

	echo mpp_get_gallery_class( $class, $gallery );
}

/**
 * Get css class list for the gallery
 *  
 * @param string $class
 * @param int|MPP_Gallery $gallery
 * @return type
 */
function mpp_get_gallery_class( $class = '', $gallery = null ) {

	$gallery = mpp_get_gallery( $gallery );
	
	return apply_filters( 'mpp_get_gallery_class', "mpp-item mpp-gallery mpp-gallery-{$gallery->type} $class" );
}



/**
 * Print the current gallery loop pagination links
 * 
 */
function mpp_gallery_pagination() {

	echo mpp_get_gallery_pagination();
}
/**
 * Get the pagination links for the current loop
 * 
 * @return type
 */
function mpp_get_gallery_pagination() {

	return mediapress()->the_gallery_query->paginate();
}

/**
 * Prints the pagination count text e.g. Viewing gallery 3 of 5 etc
 * 
 */
function mpp_gallery_pagination_count() {

	mediapress()->the_gallery_query->pagination_count();
}


/**
 * Get the total gallery count for the current query
 * 
 * Use inside the loop only
 */
function mpp_total_gallery_count() {

	echo mpp_get_total_gallery_count();
}

/**
 * Get total gallery count for the current query
 * 
 * Use inside the loop only
 * 
 * @return type
 */
function mpp_get_total_gallery_count() {

	return apply_filters( 'mpp_get_total_gallery_count', mediapress()->the_gallery_query->found_posts );
}

/**
 * Total Gallery count for user
 */
function mpp_total_gallery_count_for_member() {

	echo mpp_get_total_gallery_count_for_member();
}

//fix
/**
 * @todo update for actual count
 * 
 * @return type
 */
function mpp_get_total_gallery_count_for_member() {

	return apply_filters( 'mpp_get_total_gallery_count_for_member', mpp_get_total_gallery_for_user() );
}

/**
 * Is Single Gallery
 * 
 * @return type 
 */
function mpp_is_single_gallery() {

	return mediapress()->the_gallery_query->is_single();
}

/**
 * Get The Single gallery ID
 *
 * @return Int 
 */
function mpp_get_current_gallery_id() {

	return mediapress()->current_gallery->id;
}

/**
 * Get current Gallery
 * @return MPP_Gallery|null 
 */
function mpp_get_current_gallery() {

	return mediapress()->current_gallery;
}
function mpp_gallery_action_links( $gallery = null  ){
	
	echo mpp_get_gallery_action_links( $gallery );
	
}
function mpp_get_gallery_action_links( $gallery = null ){
	
	$links = array();
	
	$gallery = mpp_get_gallery( $gallery );

	$links ['view'] = sprintf( '<a href="%1$s" title="view %2$s" class="mpp-view-gallery">%3$s</a>', mpp_get_gallery_permalink( $gallery),esc_attr( $gallery->title ), __( 'view', 'mediapress' ) );
	
	//upload?
	
	if( mpp_user_can_upload( $gallery->component, $gallery->component_id, $gallery ) ){
		
		$links['upload'] = sprintf( '<a href="%s" alt="'. __( 'upload files to %s', 'mediapress') .'">%s</a>', mpp_get_gallery_add_media_url( $gallery ), $gallery->title, __( 'upload', 'mediapress' ) );
		
	}
	//delete
	if( mpp_user_can_delete_gallery( $gallery ) ){
		
		$links['delete'] = sprintf( '<a href="%s" alt="'. __( 'delete %s', 'mediapress') .'" class="confirm mpp-confirm mpp-delete mpp-delete-gallery">%s</a>', mpp_get_gallery_delete_url( $gallery ), $gallery->title, __( 'delete', 'mediapress' ) );
		
	}
	
	
	return apply_filters( 'mpp_gallery_actions_links', join(' ', $links ), $links, $gallery );
	
}
/**
 * List galleries drop down
 * 
 * @param type $args
 * @return string
 */
function mpp_list_galleries_dropdown( $args = null ) {
	
	$default = array(
			'name'				=> 'mpp-gallery-list',
			'id'				=> 'mpp-gallery-list',
			'selected'			=> 0,
			'type'				=> '',
			'status'			=> '',
			'component'			=> '',
			'component_id'		=> '',
			'posts_per_page'	=> -1,
			
		
	);
	
	$args = wp_parse_args( $args, $default );
	
	extract( $args );
	
	if( !$component || !$component_id )
		return;
	
	
	
	$mppq = new MPP_Gallery_Query( $args );
	
	$html			= '';
	$selected_attr	= '';
	
	while( $mppq->have_galleries() ) {
		
		$selected_attr = selected( $selected, mpp_get_gallery_id(), false );
		
		$html .= "<option value='". mpp_get_gallery_id() . " '". $selected_attr .">". mpp_get_gallery_title() ."</option>";
		
	}
	//reset current gallery
	mpp_reset_gallery_data();
	
	if( !empty( $html ) )
		$html = "<select name='{$name}' id='{$id}'>" . $html ."</select>";
		
	if( ! $echo )
		return $html;
	else
		echo $html;

	
}
function mpp_get_editable_stattuses(){
	
	return apply_filters( 'mpp_get_editable_statuses', mpp_get_registered_gallery_statuses() );
	
}
/**
 * Get Gallery Status Dropdown to be used in theme
 * 
 * @param <type> $gallery
 */
function mpp_valid_gallery_status_dd( $args = null ) {

	$default = array(
		'name'		 => 'mpp-gallery-status',
		'id'		 => 'mpp-gallery-status',
		'echo'		 => true,
		'selected'	 => '',
	);

	$args = wp_parse_args( $args, $default );
	extract( $args );

	$statuses = mpp_get_editable_stattuses();

	$html = "<select name='{$name}' id='{$id}'>";

	foreach ( $statuses as $key => $status ) {

		$html .= "<option value='{$key}'" . selected( $selected, $key, false ) . " >{$status->label}</option>";
	}

	$html .= "</select>";

	if ( $echo )
		echo $html;
	else
		return $html;
}

/**
 * Get the Gallery Status drop down when we are editing multiple items
 * 
 * @param type $args
 * @return string
 */
function mpp_valid_gallery_status_dd_bulkedit( $args = null ) {

	$default = array(
		'name'		 => 'mpp-gallery-status',
		'id'		 => 'mpp-gallery-status',
		'echo'		 => true,
		'selected'	 => '',
		'item_id'	 => ''
	);

	$args = wp_parse_args( $args, $default );
	extract( $args );

	$statuses = mpp_get_editable_stattuses();

	$html = "<select name='{$name}[{$item_id}]' id='{$id}[{$item_id}]'>";

	foreach ( $statuses as $key => $status ) {

		$html .= "<option value='{$key}'" . selected( $selected, $key, false ) . " >{$status->label}  </option>";
	}

	$html .= '</select>';

	if ( $echo )
		echo $html;
	else
		return $html;
}

/**
 * Gallery Type drop down for use in themes
 * 
 * 
 */
function mpp_type_dd( $args = null ) {

	$default = array(
		'name'		 => 'mpp-gallery-type',
		'id'		 => 'mpp-gallery-type',
		'echo'		 => true,
		'selected'	 => '',
	);

	$args = wp_parse_args( $args, $default );
	extract( $args );


	$allowed_types = mpp_get_registered_gallery_types();


	$html = "";

	$html = "<select name='{$name}' id='{$id}'>";

	foreach ( $allowed_types as $key => $type )
		$html .="<option value='{$key}'" . selected( $key, $selected, false ) . " >{$type->label} </option>";

	$html.="</select>";

	if ( $echo )
		echo $html;
	else
		return $html;
}
function mpp_component_dd( $args = null ) {

	$default = array(
		'name'		 => 'mpp-gallery-component',
		'id'		 => 'mpp-gallery-component',
		'echo'		 => true,
		'selected'	 => '',
	);

	$args = wp_parse_args( $args, $default );
	extract( $args );


	$allowed = mpp_get_registered_gallery_components();


	$html = "";

	$html = "<select name='{$name}' id='{$id}'>";

	foreach ( $allowed as $key => $component )
		$html .="<option value='{$key}'" . selected( $key, $selected, false ) . " >{$component->label} </option>";

	$html.="</select>";

	if ( $echo )
		echo $html;
	else
		return $html;
}

/**
 * Output the Gallery directory search form.
 */
function mpp_directory_gallery_search_form() {

	$default_search_value = bp_get_search_default_text( 'mediapress' );
	$search_value         = !empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : $default_search_value;

	$search_form_html = '<form action="" method="get" id="search-mpp-form">
		<label><input type="text" name="s" id="mpp_search" placeholder="'. esc_attr( $search_value ) .'" /></label>
		<input type="submit" id="mpp_search_submit" name="mpp_search_submit" value="' . __( 'Search', 'mediapress' ) . '" />
	</form>';

	echo apply_filters( 'mpp_directory_gallery_search_form', $search_form_html );
}

function mpp_get_gallery_grid_column_class( $gallery = null ){

	//we are using 1-24 col grid, where 3-24 repsesents 1/8th and so on
	
	$col = mpp_get_option( 'gallery_columns' );
	
	return mpp_get_grid_column_class( $col );
	
}
