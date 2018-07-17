/**
 * Install Kemet Starter Sites
 *
 *
 * @since 1.2.4
 */

(function($){

	KemetThemeAdmin = {

		init: function()
		{
			this._bind();
		},


		/**
		 * Binds events for the Kemet Theme.
		 *
		 * @since 1.0.0
		 * @access private
		 * @method _bind
		 */
		_bind: function()
		{
			$( document ).on('click' , '.ast-sites-notinstalled', KemetThemeAdmin._installNow );
			$( document ).on('click' , '.ast-sites-inactive', KemetThemeAdmin._activatePlugin);
			$( document ).on('wp-plugin-install-success' , KemetThemeAdmin._activatePlugin);
			$( document ).on('wp-plugin-installing'      , KemetThemeAdmin._pluginInstalling);
			$( document ).on('wp-plugin-install-error'   , KemetThemeAdmin._installError);
		},

		/**
		 * Plugin Installation Error.
		 */
		_installError: function( event, response ) {

			var $card = jQuery( '.ast-sites-notinstalled' );

			$card
				.removeClass( 'button-primary' )
				.addClass( 'disabled' )
				.html( wp.updates.l10n.installFailedShort );
		},

		/**
		 * Installing Plugin
		 */
		_pluginInstalling: function(event, args) {
			event.preventDefault();

			var $card = jQuery( '.ast-sites-notinstalled' );

			$card.addClass('updating-message');

		},
		/**
		 * Activate Success
		 */
		_activatePlugin: function( event, response ) {

			event.preventDefault();

			var $message = $( '.ast-sites-notinstalled' );
			if ( 0 === $message.length ) {
				$message = $( '.ast-sites-inactive' );
			}

			// Transform the 'Install' button into an 'Activate' button.
			var $init = $message.data('init');

			$message.removeClass( 'install-now installed button-disabled updated-message' )
				.addClass('updating-message')
				.html( kemet.btnActivating );

			// WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
			setTimeout( function() {

				$.ajax({
					url: kemet.ajaxUrl,
					type: 'POST',
					data: {
						'action'            : 'kemet-sites-plugin-activate',
						'init'              : $init,
					},
				})
				.done(function (result) {

					if( result.success ) {
						var output = '<a href="'+ kemet.kemetSitesLink +'" aria-label="'+ kemet.kemetSitesLinkTitle +'">' + kemet.kemetSitesLinkTitle +' </a>'
						$message.removeClass( 'ast-sites-inactive ast-sites-notinstalled button button-primary install-now activate-now updating-message' )
							.html( output );

					} else {

						$message.removeClass( 'updating-message' );

					}

				});

			}, 1200 );

		},

		/**
		 * Install Now
		 */
		_installNow: function(event)
		{
			event.preventDefault();

			var $button 	= jQuery( event.target ),
				$document   = jQuery(document);

			if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
				return;
			}

			if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
				wp.updates.requestFilesystemCredentials( event );

				$document.on( 'credential-modal-cancel', function() {
					var $message = $( '.ast-sites-notinstalled.updating-message' );

					$message
						.addClass('ast-sites-inactive')
						.removeClass( 'updating-message ast-sites-notinstalled' )
						.text( wp.updates.l10n.installNow );

					wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
				} );
			}

			wp.updates.installPlugin( {
				slug:    $button.data( 'slug' )
			} );
		},
	};

	/**
	 * Initialize KemetThemeAdmin
	 */
	$(function(){
		KemetThemeAdmin.init();
	});

})(jQuery);