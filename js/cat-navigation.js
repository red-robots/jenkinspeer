/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var catnav = document.getElementById( 'cat-navigation' ), catbutton, catmenu;
	if ( ! catnav )
		return;
	catbutton = catnav.getElementsByTagName( 'h3' )[0];
	catmenu   = catnav.getElementsByTagName( 'ul' )[0];
	if ( ! catbutton )
		return;
		
	// Hide button if menu is missing or empty.
	if ( ! catmenu || ! catmenu.childNodes.length ) {
		catbutton.style.display = 'none';
		return;
	}

	

	
	catbutton.onclick = function() {
		if ( -1 == catmenu.className.indexOf( 'cat-menu' ) )
			catmenu.className = 'cat-menu';

		if ( -1 != catbutton.className.indexOf( 'toggled-on' ) ) {
			catbutton.className = catbutton.className.replace( ' toggled-on', '' );
			catmenu.className = catmenu.className.replace( ' toggled-on', '' );
		} else {
			catbutton.className += ' toggled-on';
			catmenu.className += ' toggled-on';
		}
	};
	
	
	
} )();