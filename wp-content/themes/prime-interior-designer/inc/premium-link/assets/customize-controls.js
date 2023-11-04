( function( api ) {

	// Extends our custom "prime-interior-designer" section.
	api.sectionConstructor['prime-interior-designer'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );