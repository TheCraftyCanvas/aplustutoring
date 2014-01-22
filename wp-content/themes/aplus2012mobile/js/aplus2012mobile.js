jQuery.noConflict();
jQuery(document).ready(function($) {

  if( $('#featured-upcoming-events') ) {
    $('#featured-upcoming-events > li:first').addClass('first');
    $('#featured-upcoming-events > li:last').addClass('last');
  }

});