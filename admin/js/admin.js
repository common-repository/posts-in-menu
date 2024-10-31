(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 */

	$(function(){
		$(".pim-plugin-nag-dismiss button").click( function(){
			$.post(
				ajaxurl,
				{
					'action': 'set_pim_nag_transient'
				}
			);
		});
	});

})( jQuery );
