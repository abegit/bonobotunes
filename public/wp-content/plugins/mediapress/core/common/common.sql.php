<?php

/* * *
 * Common DB Queries and helpers for queries
 */

/**
 * Returns an array of Gallery or Media ids based on other params
 * 
 * @global type $wpdb
 * @param type $args {
 *  @type component string|array comma separated sting or array of components eg 'groups,members' or array('groups', 'members' )
 *  @type component_id int numeric component id (user id or group id)
 *  @type status string|array comma separated list or array of statuses e.g. 'public,private,friends' or array ( 'public', 'private', 'friends' )
 *  @type type   string|array comma separated list or array of media types e.g 'audio,video,photo' or array ( 'audio', 'video', 'photo' )
 * @param string $post_type
 * @return mixed array of post ids
 */
function mpp_get_object_ids( $args, $post_type ) {

	global $wpdb;

	$post_type_sql = '';

	$sql = array();

	$default = array(
		'component'		 => '',
		'component_id'	 => false,
		'status'		 => '',
		'type'			 => '',
		'post_status'	=> 'publish'
	);
	//if component is set to user, we can simply avoid component query 
	//may be next iteration someday

	$args = wp_parse_args( $args, $default );

	extract( $args );
	//do we have a component set
	if ( $component )
		$sql [] = mpp_get_tax_sql( $component, mpp_get_component_taxname() );


	//do we have a component set
	if ( $status )
		$sql [] = mpp_get_tax_sql( $status, mpp_get_status_taxname() );

	//for type, repeat it
	if ( $type )
		$sql [] = mpp_get_tax_sql( $type, mpp_get_type_taxname() );


	$post_type_sql = $wpdb->prepare( "SELECT DISTINCT ID as object_id FROM {$wpdb->posts} WHERE post_type = %s AND post_status =%s", $post_type, $post_status );

	//if a user or group id is given
	if ( $component_id )
		$post_type_sql = $wpdb->prepare( "SELECT DISTINCT p.ID  as object_id FROM {$wpdb->posts} AS p INNER JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id WHERE p.post_type= %s AND p.post_status = %s AND pm.meta_key=%s and pm.meta_value=%d", $post_type, $post_status, '_mpp_component_id', $component_id );

	//$sql[] = $post_type_sql;
	$new_sql	 = $join_sql	 = ''; //array();
	//let us generate inner sub queries
	if ( $sql )
		$join_sql = ' (' . join( ' AND object_id IN (', $sql );

	//we need to append the ) for closing the sub queries
	for ( $i = 0; $i < count( $sql ); $i++ )
		$join_sql .=')';


	$new_sql = $post_type_sql;

	//if the join sql is present, let us append it

	if ( $join_sql )
		$new_sql .= ' AND ID IN ' . $join_sql;

	return $wpdb->get_col( $new_sql );
}

/**
 *  Returns total galleries|media based on other parameters
 * 
 * @param type $args {
 *  @type component string|array comma separated sting or array of components eg 'groups,members' or array('groups', 'members' )
 *  @type component_id int numeric component id (user id or group id)
 *  @type status string|array comma separated list or array of statuses e.g. 'public,private,friends' or array ( 'public', 'private', 'friends' )
 *  @type type   string|array comma separated list or array of media types e.g 'audio,video,photo' or array ( 'audio', 'video', 'photo' )
 * @param string $post_type
 * @return int total no of posts
 */
function mpp_get_object_count( $args, $post_type ) {

	global $wpdb;

	$post_type_sql = '';

	$sql = array();

	$default = array(
		'component'		 => '',
		'component_id'	 => false,
		'status'		 => '',
		'type'			 => '',
		'post_status'	=> 'publish'
	);
	//if component is set to user, we can simply avoid component query 
	//may be next iteration someday

	$args = wp_parse_args( $args, $default );

	extract( $args );

	//do we have a component set
	if ( $component )
		$sql [] = mpp_get_tax_sql( $component, mpp_get_component_taxname() );



	//do we have a component set
	if ( $status )
		$sql [] = mpp_get_tax_sql( $status, mpp_get_status_taxname() );

	//for type, repeat it
	if ( $type )
		$sql [] = mpp_get_tax_sql( $type, mpp_get_type_taxname() );


	$post_type_sql = $wpdb->prepare( "SELECT COUNT( DISTINCT ID ) FROM {$wpdb->posts} WHERE post_type = %s AND post_status =%s", $post_type, $post_status );

	//if a user or group id is given
	if ( $component_id )
		$post_type_sql = $wpdb->prepare( "SELECT COUNT( DISTINCT p.ID ) AS total FROM {$wpdb->posts} AS p INNER JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id WHERE p.post_type= %s AND p.post_status = %s AND pm.meta_key=%s and pm.meta_value=%d", $post_type, $post_status, '_mpp_component_id', $component_id );

	//$sql[] = $post_type_sql;
	$new_sql	 = $join_sql	 = ''; //array();
	//let us generate inner sub queries
	if ( $sql )
		$join_sql	 = ' (' . join( ' AND object_id IN (', $sql );

	//we need to append the ) for closing the sub queries
	for ( $i = 0; $i < count( $sql ); $i++ )
		$join_sql .=')';


	$new_sql = $post_type_sql;

	//if the join sql is present, let us append it
	if ( $join_sql )
		$new_sql .= ' AND ID IN ' . $join_sql;

	return $wpdb->get_var( $new_sql );
}

/**
 * generate sql for tax queries where terms slugs and taxonomy is given
 * @param type $terms
 * @param type $taxonomy
 * @return string|boolean
 */
function mpp_get_tax_sql( $terms, $taxonomy ) {

	//for type, repeat it
	if ( $terms ) {
		//if the comma separated terms are given, convert it to array
		$terms = mpp_string_to_array( $terms );

		//prepend underscore to each of the term
		$terms		 = array_map( 'mpp_underscore_it', $terms );
		//get the term_taxonomy ids array for component
		$term_ids	 = mpp_get_term_ids( $terms );

		$objects_in_terms_sql = mpp_get_objects_in_terms_sql( $term_ids, $taxonomy );

		return $objects_in_terms_sql;

		//find all posts in associated with this tt
	}

	return false;
}

/**
 * Return an array of Terms Ids for given term slugs (an array of slugs can be passed)
 * @global type $wpdb
 * @param type $terms
 * @return type
 */
function mpp_get_term_ids( $terms ) {

	if ( !is_array( $terms ) )
		$terms = explode( ',', $terms );

	global $wpdb;

	$where = array();

	foreach ( $terms as $term )
		$where [] = $wpdb->prepare( 'slug = %s', $term );

	$where_sql = join( ' OR ', $where );

	$term_ids = $wpdb->get_col( "SELECT term_id FROM {$wpdb->terms} WHERE {$where_sql}" );

	return $term_ids;
}

/**
 * Returns an array of term_taxonomy_ids for the terms under given taxonomy
 * @param type $terms
 * @param type $taxonomy
 * @todo need to remove IN and use ORed Condition, just leaving as I don't need it now
 */
function mpp_get_tt_ids( $terms, $taxonomy ) {

	global $wpdb;

	if ( !is_array( $terms ) )
		$terms = explode( ',', $terms );

	//sanitize
	$terms	 = array_map( 'esc_sql', $terms );
	$terms	 = join( ',', $terms );

	$sql = "SELECT tt.term_taxonomy_id FROM $wpdb->term_taxonomy AS tt INNER JOIN $wpdb->terms AS t ON tt.term_id = t.term_id WHERE tt.taxonomy = %s AND t.slug IN ($terms) ";

	$sql = $wpdb->prepare( $sql, $taxonomy );

	return $wpdb->get_col( $sql );
}

/**
 * Returns sql for finding objects in given term ids
 * We Use it when finding media/galleries for perticular term
 * @global type $wpdb
 * @param type $term_ids
 * @param type $taxonomies
 * @param type $args
 * @return WP_Error| sql string
 */
function mpp_get_objects_in_terms_sql( $term_ids, $taxonomies, $args = array() ) {

	global $wpdb;

	if ( !is_array( $term_ids ) )
		$term_ids = (array) $term_ids;

	if ( !is_array( $taxonomies ) )
		$taxonomies = (array) $taxonomies;

	foreach ( (array) $taxonomies as $taxonomy ) {
		if ( !taxonomy_exists( $taxonomy ) )
			return new WP_Error( 'invalid_taxonomy', __( 'Invalid taxonomy', 'mediapress' ) );
	}

	$term_ids = array_map( 'intval', $term_ids );

	$taxonomies	 = "'" . implode( "', '", $taxonomies ) . "'";
	$term_ids	 = "'" . implode( "', '", $term_ids ) . "'";

	$sql = "SELECT tr.object_id AS object_id  FROM $wpdb->term_relationships AS tr INNER JOIN $wpdb->term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id WHERE tt.taxonomy IN ($taxonomies) AND tt.term_id IN ($term_ids) ";

	return $sql;
}
/**
 * Delets activity meta entries by given key/val
 * @global type $wpdb
 * @param type $key
 * @param type $object_id
 * @return type
 */
function mpp_delete_activity_meta_by_key_value( $key, $object_id){
	
	if( ! bp_is_active( 'activity' ) )
		return false;
	
	global $wpdb;
	global $bp;
	$query = $wpdb->prepare( "DELETE FROM {$bp->activity->table_name_meta} WHERE meta_key = %s AND meta_value = %d", $key, $object_id );
	
	return $wpdb->query( $query );
}
/***
 * Delete activity items by activity meta key and value
 * 
 */
function mpp_delete_activity_by_meta_key_value( $key, $object_id =null ){
	
	global $bp, $wpdb;
	
	if( ! bp_is_active( 'activity' ) )
		return false;//or false?
		
		
	
		$where_sql = array();

		$where_sql [] = $wpdb->prepare( 'meta_key=%s', $key );
		
		if( $object_id )
			$where_sql[] = $wpdb->prepare( 'meta_value = %d', $object_id );
		
		$where_sql = join( ' AND ', $where_sql );
		
		// Fetch the activity IDs so we can delete any comments for this activity item
		$activity_ids = $wpdb->get_col( "SELECT activity_id FROM {$bp->activity->table_name_meta} WHERE {$where_sql}" );

		if( empty( $activity_ids ) )
			return false;
		
		$list = '(' . join( ',', $activity_ids ) . ')';
		
		if ( ! $wpdb->query( "DELETE FROM {$bp->activity->table_name} WHERE id IN {$list}" ) ) {
			return false;
		}

		// Handle accompanying activity comments and meta deletion
		if ( $activity_ids ) {
			$activity_ids_comma          = implode( ',', wp_parse_id_list( $activity_ids ) );
			$activity_comments_where_sql = "WHERE type = 'activity_comment' AND item_id IN ({$activity_ids_comma})";

			// Fetch the activity comment IDs for our deleted activity items
			$activity_comment_ids = $wpdb->get_col( "SELECT id FROM {$bp->activity->table_name} {$activity_comments_where_sql}" );

			// We have activity comments!
			if ( ! empty( $activity_comment_ids ) ) {
				// Delete activity comments
				$wpdb->query( "DELETE FROM {$bp->activity->table_name} {$activity_comments_where_sql}" );

				// Merge activity IDs with activity comment IDs
				$activity_ids = array_merge( $activity_ids, $activity_comment_ids );
			}

			// Delete all activity meta entries for activity items and activity comments
			BP_Activity_Activity::delete_activity_meta_entries( $activity_ids );
		}

		return $activity_ids;
	

}
