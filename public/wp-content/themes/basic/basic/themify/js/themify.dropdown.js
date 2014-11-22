;(function ( $, window, document, undefined ) {
	$.fn.themifyDropdown = function( options ) {

		var settings = $.extend( { }, options );

		return this.each(function(){
			if( $(this).hasClass( 'with-sub-arrow' ) )
				return;

			$(this).addClass( 'with-sub-arrow' )
				.find( 'li.menu-item-has-children > a:not(.lightbox)' )
				.append( '<span class="sub-arrow closed" />' );
		});
    };

	jQuery( 'body' ).on( 'click touchstart', '.sub-arrow', function(e){
		e.stopPropagation();

		var menu_item = $( this ).closest( 'li' );
		var active_tree = $( this ).parents( '.dropdown-open' );
		$( this ).closest( '.with-sub-arrow' ) // get the menu container
			.find( 'li.dropdown-open' ).not( active_tree ) // find open (if any) dropdowns
			.each(function(){
				close_dropdown( $( this ) );
			});

		if( menu_item.hasClass( 'dropdown-open' ) ) {
			close_dropdown( menu_item );
		} else {
			open_dropdown( menu_item );
		}

		return false;
	} );

	function open_dropdown( $li ) {
		var dropdown = $li.find( '.sub-menu' ).first()
			.show();

		$li.addClass( 'dropdown-open' );
		$li.find( '> a .sub-arrow' ).removeClass( 'closed' ).addClass( 'open' );
	}

	function close_dropdown( $li ) {
		var dropdown = $li.find( '.sub-menu' ).first()
			.hide();

		$li.removeClass( 'dropdown-open' );
		$li.find( '> a .sub-arrow' ).removeClass( 'open' ).addClass( 'closed' );
	}
})( jQuery, window, document );