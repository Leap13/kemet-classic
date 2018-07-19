/**
 * Customizer controls
 *
 * @package Kemet
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Helper class for the main Customizer interface.
	 *
	 * @since 1.0.0
	 * @class KMTCustomizer
	 */
	KMTCustomizer = {

		controls	: {},

		/**
		 * Initializes our custom logic for the Customizer.
		 *
		 * @since 1.0.0
		 * @method init
		 */
		init: function()
		{
			KMTCustomizer._initToggles();
		},

		/**
		 * Initializes the logic for showing and hiding controls
		 * when a setting changes.
		 *
		 * @since 1.0.0
		 * @access private
		 * @method _initToggles
		 */
		_initToggles: function()
		{
			// Trigger the Adv Tab Click trigger.
			KMTControlTrigger.triggerHook( 'kemet-toggle-control', api );

			// Loop through each setting.
			$.each( KMTCustomizerToggles, function( settingId, toggles ) {

				// Get the setting object.
				api( settingId, function( setting ) {

					// Loop though the toggles for the setting.
					$.each( toggles, function( i, toggle ) {

						// Loop through the controls for the toggle.
						$.each( toggle.controls, function( k, controlId ) {

							// Get the control object.
							api.control( controlId, function( control ) {

								// Define the visibility callback.
								var visibility = function( to ) {
									control.container.toggle( toggle.callback( to ) );
								};

								// Init visibility.
								visibility( setting.get() );

								// Bind the visibility callback to the setting.
								setting.bind( visibility );
							});
						});
					});
				});

				// Hide Section without Controls.
				$( '.customize-control *[data-customize-setting-link="' + settingId + '"]' ).on('change', function() {

					setTimeout( function() {
						$.each(toggles, function( i, toggle) {

							$.each(toggle.controls, function( k, controlId) {

								controlId = controlId.replace( 'kemet-settings[','' ).replace( ']','' );
								var parent = $( '#customize-control-kemet-settings-' + controlId ).closest( '.control-section' );
								if ( typeof parent != 'undefined' ) {

									var parentId = parent.attr( 'id' );
									var visibleIt = false;

									parent.find( ' > .customize-control' ).each(function(i,e) {
										if ( $( this ).css( 'display' ) != 'none' ) {
											visibleIt = true;
										}
									});

									if ( ! visibleIt ) {
										$( '.control-section[aria-owns="' + parentId + '"]' ).addClass( 'kmt-hide' );
									} else {
										$( '.control-section[aria-owns="' + parentId + '"]' ).removeClass( 'kmt-hide' );
									}
								}
							});
						});
					},300);
				});

				$.each(toggles, function( i, toggle) {

					$.each(toggle.controls, function( k, controlId) {

						controlId = controlId.replace( 'kemet-settings[','' ).replace( ']','' );
						var parent = $( '#customize-control-kemet-settings-' + controlId ).closest( '.control-section' );

						if ( typeof parent != 'undefined' ) {

							var parentId = parent.attr( 'id' );
							var visibleIt = false;

							parent.find( ' > .customize-control' ).each(function(i,e) {
								if ( $( this ).css( 'display' ) != 'none' ) {
									visibleIt = true;
								}
							});

							if ( ! visibleIt ) {
								$( '.control-section[aria-owns="' + parentId + '"]' ).addClass( 'kmt-hide' );
							} else {
								$( '.control-section[aria-owns="' + parentId + '"]' ).removeClass( 'kmt-hide' );
							}
						}
					});
				});

			});
		}
	};

	$( function() { KMTCustomizer.init(); } );

})( jQuery );


( function( api ) {
    // Extends our custom kemet-pro section.
    api.sectionConstructor['kemet-pro'] = api.Section.extend( {
        // No events for this type of section.
        attachEvents: function () {},
        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );