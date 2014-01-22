jQuery.noConflict();
jQuery(document).ready(function($) {
	// Menu
		$('#menu-main-menu').dropotron({ baseZIndex: 2, offsetY: -10, IEOffsetX: -40, mode: 'slide' });

	// Banner
		var banner = $('#banner');

		if (banner.length > 0)
		{
			var boxes = banner.find('.box'), i = 0;

			boxes
				.fadeTo(0,0.01)
				.each(function() {
					var t = $(this), o = t.find('.box-overlay');

					t
						.mouseenter(function() { o.stop().animate({ top: 0 }, 300, 'swing'); })
						.mouseleave(function() { o.stop().animate({ top: 263 }, 300, 'swing'); });

					window.setTimeout(function() { t.fadeTo(600, 1.0); }, 400 * i++);
				});
		} //end if banner


  if( $('#featured-upcoming-events') ) {
    /* console.log("featured events listing found"); */
    $('#featured-upcoming-events > li:first').addClass('first');
    $('#featured-upcoming-events > li:last').addClass('last');
  }

});
