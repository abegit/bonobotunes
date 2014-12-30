<?php
//initialize core

add_action( 'mpp_init', 'mpp_init', 1 );

/**
 * Register various core features
 * Registers statuses
 * Registers types(media type)
 * Also registers Component types
 */
function mpp_init(){
    
    //register privacies
    //private
    mpp_register_status( array(
            'key'           => 'public',
            'label'         => __( 'Public', 'mediapress' ),
            'labels'        => array( 
									'singular_name' => __( 'Public', 'mediapress' ),
									'plural_name'	=> __( 'Public', 'mediapress' )
			),
            'description'   => __( 'Public Gallery Privacy Type'),
            'callback'      => 'mpp_check_public_access'
    ));
    
    mpp_register_status( array(
            'key'           => 'private',
            'label'         => __( 'Private', 'mediapress' ),
            'labels'        => array( 
									'singular_name' => __( 'Private', 'mediapress' ),
									'plural_name'	=> __( 'Private', 'mediapress' )
			),
            'description'   => __('Private Privacy Type'. 'mediapress' ),
            'callback'      => 'mpp_check_private_access'
    ));
    
    mpp_register_status( array(
            'key'           => 'friends',
            'label'         => __( 'Friends Only', 'mediapress' ),
            'labels'        => array( 
									'singular_name' => __( 'Friends Only', 'mediapress' ),
									'plural_name'	=> __( 'Friends Only', 'mediapress' )
			),
            'description'   => __('Friends Only Privacy Type', 'mediapress' ),
            'callback'      => 'mpp_check_friends_access'
    ));

    
    
    //register types
    //photo
    mpp_register_type( array(
            'key'           => 'photo',
            'label'         => __( 'Photo', 'mediapress' ),
            'description'   => __( 'taxonomy for image media type', 'mediapress' ),
			'labels'		=> array(
								'singular_name'	=> __( 'Photo', 'mediapress' ),
								'plural_name'	=> __( 'Photos', 'mediapress' )
			),
            'extensions'    => array( 'jpeg', 'jpg', 'gif', 'png' ),
    ) );
    //video
    mpp_register_type( array(
            'key'           => 'video',
            'label'         => __( 'Video', 'mediapress' ),
			'labels'		=> array(
								'singular_name'	=> __( 'Video', 'mediapress' ),
								'plural_name'	=> __( 'Videos', 'mediapress' )
			),
            'description'   => __( 'Video media type taxonomy', 'mediapress' ),
			'extensions'	=> array( 'mp4', 'flv', 'mpeg' )
    ) );
    mpp_register_type( array(
            'key'           => 'audio',
            'label'         => __( 'Audio', 'mediapress' ),
			'labels'		=> array(
								'singular_name'	=> __( 'Audio', 'mediapress' ),
								'plural_name'	=> __( 'Audios', 'mediapress' )
			),
            'description'   => __( 'Audio Media type taxonomy', 'mediapress' ),
			'extensions'	=> array( 'mp3', 'wmv', 'midi' )
    ) );
    mpp_register_type( array(
            'key'           => 'doc',
            'label'         => __( 'Documents', 'mediapress' ),
			'labels'		=> array(
								'singular_name'	=> __( 'Document', 'mediapress' ),
								'plural_name'	=> __( 'Documents', 'mediapress' )
			),
            'description'   => __( 'This is documents gallery', 'mediapress' ),
            'extensions'    => array( 'zip', 'gz', 'doc')
    ) );
    
	
    mpp_register_component( array(
            'key'           => 'members',
            'label'         => __( 'User', 'mediapress' ),
			'labels'		=> array(
								'singular_name'	=> __( 'User', 'mediapress' ),
								'plural_name'	=> __( 'Users', 'mediapress' )
			),
            'description'   => __( 'User Galleries', 'mediapress' ),
    ) );
    mpp_register_component( array(
            'key'           => 'groups',
            'label'         => __( 'Groups', 'mediapress' ),
			'labels'		=> array(
								'singular_name'	=> __( 'Group', 'mediapress' ),
								'plural_name'	=> __( 'Groups', 'mediapress' )
			),
            'description'   => __( 'Groups Galleries', 'mediapress' ),
    ) );
            
            
    //register media sizes
    
    mpp_register_media_size( array(
            'name'  => 'thumbnail',
            'height'=> 200,
            'width' => 200,
            'crop'  => true,
            'type'  => 'default'
    ) );
    
    mpp_register_media_size( array(
            'name'  => 'mid',
            'height'=> 300,
            'width' => 500,
            'crop'  => true,
            'type'  => 'default'
    ) );
    
    mpp_register_media_size( array(
            'name'  => 'large',
            'height'=> 800,
            'width' => 600,
            'crop'  => false,
            'type'  => 'default'
    ) );
    
    //register storage managers here
    //local storage manager
    mpp_register_storage_manager( 'local', MPP_Local_Storage::get_instance() );
    //mpp_register_storage_manager( 'aws', MPP_Local_Storage::get_instance() );
    
	
	//register viewer
	//please note, google doc viewer will not work for local files
	//files must be somewhere accessible from the web
	mpp_register_media_view( 'doc', new MPP_Media_View_Docs() );
	
    //setup the tabs
    mediapress()->add_menu( 'gallery', new MPP_Gallery_Menu() );
    mediapress()->add_menu( 'media', new MPP_Media_Menu() );
}

add_action( 'mpp_setup_globals', 'mpp_setup_gallery_nav' );

function mpp_setup_gallery_nav() {
    
	//only add on single gallery
	
	if( ! mpp_is_single_gallery() )
		return;
	
    $gallery = mpp_get_current_gallery();
	
    $url = '';
	
    if( $gallery ){
        
        $url = mpp_get_gallery_permalink( $gallery );
    }
    
	//only add view/edit/dele links on the single mgallery view
	
    mpp_add_gallery_nav_item( array(
        'label'=> 'View',
        'url'   => $url,
        'action' => 'view',
        'slug'  => 'view'
        
    ));
    
    mpp_add_gallery_nav_item( array(
        'label'=> 'Edit Media', //we can change it to media type later
        'url'   => mpp_get_gallery_edit_media_url( $gallery ),
        'action' => 'edit',
        'slug'  => 'edit'
        
    ));
	
    mpp_add_gallery_nav_item( array(
        'label'=> 'Add Media', //we can change it to media type later
        'url'   => mpp_get_gallery_add_media_url( $gallery ),
        'action' => 'add',
        'slug'  => 'add'
        
    ));
	
    mpp_add_gallery_nav_item( array(
        'label'=> 'Reorder', //we can change it to media type later
        'url'   => mpp_get_gallery_reorder_media_url( $gallery ),
        'action' => 'reorder',
        'slug'  => 'reorder'
        
    ));
	
    mpp_add_gallery_nav_item( array(
        'label'=> 'Edit Details',
        'url'   => mpp_get_gallery_settings_url( $gallery ),
        'action' => 'settings',
        'slug'  => 'settings'
        
    ));
	
    mpp_add_gallery_nav_item( array(
        'label'=> 'Delete',
        'url'   => mpp_get_gallery_delete_url( $gallery ),
        'action' => 'delete',
        'slug'  => 'delete'
        
    ));
    
    
}

add_action( 'template_redirect', 'mpp_actions', 4  );

function mpp_actions() {
	
	do_action( 'mpp_actions' );
}