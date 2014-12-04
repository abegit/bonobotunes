<?php
/*
Plugin Name: Allow Capital Letters In Username
Version: 0.3
Plugin URI: http://ru.forums.wordpress.org/topic/3738
Description: Allows to use uppercase latin letters when registering a new user.
Author: Sergey Biryukov
Author URI: http://sergeybiryukov.ru/
Network: true
*/

class Allow_Capital_Letters_In_Username {

	function __construct() {
		remove_filter( 'sanitize_user', 'strtolower' );

		add_filter( 'wpmu_validate_user_signup',    array( $this, 'wpmu_validate_user_signup' ) );
		add_filter( 'bp_core_validate_user_signup', array( $this, 'bp_core_validate_user_signup' ) );
	}

	function remove_error( $result, $error_string ) {
		if ( empty( $result['errors']->errors['user_name'] ) )
			return $result;

		$error_index = array_search( $error_string, $result['errors']->errors['user_name'] );

		if ( false !== $error_index ) {
			unset( $result['errors']->errors['user_name'][ $error_index ] );

			if ( empty( $result['errors']->errors['user_name'] ) )
				unset( $result['errors']->errors['user_name'] );
			else
				sort( $result['errors']->errors['user_name'] );
		}

		return $result;
	}

	function wpmu_validate_user_signup( $result ) {
		if ( 0 !== strcasecmp( $result['user_name'], $result['orig_username'] ) )
			return $result;

		if ( preg_match( '/[A-Z]/', $result['user_name'] ) )
			$result = $this->remove_error( $result, __( 'Only lowercase letters (a-z) and numbers are allowed.' ) );

		return $result;
	}

	function bp_core_validate_user_signup( $result ) {
		$illegal_names = get_site_option( 'illegal_names' );

		if ( ! validate_username( $result['user_name'] ) || in_array( $result['user_name'], (array) $illegal_names ) )
			return $result;

		if ( preg_match( '/[A-Z]/', $result['user_name'] ) ) {
			$result = $this->remove_error( $result, __( 'Only lowercase letters and numbers allowed', 'buddypress' ) );
			$result = $this->remove_error( $result, __( 'Username must be in lowercase characters', 'buddypress' ) );
		}

		return $result;
	}
}

new Allow_Capital_Letters_In_Username;
?>