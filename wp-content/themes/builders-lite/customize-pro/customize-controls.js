( function( api ) {

	// Extends our custom "builders-lite" section.
	api.sectionConstructor['builders-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );