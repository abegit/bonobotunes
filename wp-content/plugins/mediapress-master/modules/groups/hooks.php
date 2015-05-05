<?php

/**
 * Set the group id as the component_id for the default current component
 * @see mpp_get_current_component_id()
 * @param type $component_id
 * @return type
 */
function mpp_current_component_id_for_groups( $component_id ) {

  if( bp_is_group() ){
   
		$group = groups_get_current_group();
		return $group->id;
  }
  return $component_id;
}

add_filter( 'mpp_get_current_component_id', 'mpp_current_component_id_for_groups' );//won't work in ajax mode


/**
 * set current component_type to groups if we are on groups page
 * @see mpp_get_current_component()
 * @param type $component
 * @return type
 */

function mpp_current_component_type_for_groups( $component ) {
    
	if ( bp_is_active('groups') && bp_is_group () )
        return buddypress()->groups->id;

    return $component;
}
add_filter( 'mpp_get_current_component', 'mpp_current_component_type_for_groups' );




//filter privacy type for groups

//in future, we won't need to do it when we add the component supports args in api,( Reminder, a component should have the args to explain which type, status it supports)

function mpp_group_form_uploaded_activity_action( $action, $activity, $media_id, $media_ids, $gallery ) {
	
	if( $gallery->component != 'groups' )
		return $action;
	$media_count = count( $media_ids );
			



	$type = $gallery->type;

	//we need the type plural in case of mult
	$type = _n( $type, $type.'s', $media_count );//photo vs photos etc
	
	$group_id = $activity->item_id;
	
	$group = new BP_Groups_Group( $group_id );
	
	$group_link = sprintf( "<a href='%s'>%s</a>", bp_get_group_permalink( $group ), bp_get_group_name( $group ) );
	$action = sprintf( __( '%s uploaded %d new %s to %s', 'mediapress' ), bp_core_get_userlink( $activity->user_id ), $media_count, $type, $group_link );
	
	return $action;
}

add_filter( 'mpp_activity_action_media_upload', 'mpp_group_form_uploaded_activity_action', 10, 5 );

//Create gallery
function mp_group_nav(){
	if( ! bp_is_group() )
		return;
	
	$component		= 'groups';
	$component_id	= groups_get_current_group()->id;
	
if( mpp_user_can_create_gallery( $component, $component_id ) ) {
	
	echo sprintf( "<li><a href='%s'>%s</a></li>", mpp_get_gallery_base_url( $component, $component_id) , __( 'All Galleries', 'mediapress' ) );
	echo sprintf( "<li><a href='%s'>%s</a></li>", mpp_get_gallery_create_url( $component, $component_id) , __( 'Create Gallery', 'mediapress' ) );
}	
	
}
add_action( 'mpp_group_nav', 'mp_group_nav',  0 );
