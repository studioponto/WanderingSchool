/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages


/*page loadings*/

function e() {
  window.location = linkLocation;
}
$("a").click(function (t) {
    t.preventDefault();
    linkLocation = this.href;
    $("#spinner").fadeIn(500, e);
});


$(window).bind("resize", function() {
  var width = $(window).innerWidth();
  var height = $(window).innerHeight();

  var header = $('header').height();
  var footer = $('footer').height();

  
  if( window.innerHeight > window.innerWidth && width > 992){
    /* desktop portrait */
    $('body').addClass('portrait desktop');
    $('body').removeClass('landscape mobile tablet');

  } else if ( window.innerHeight > window.innerWidth && width > 769 ){
    /* tablet portrait */
    $('body').addClass('portrait tablet');
    $('body').removeClass('landscape mobile desktop');

  } else if ( window.innerHeight > window.innerWidth && width < 768 ){
    /* mobile portrait */
    $('body').addClass('portrait mobile');
    $('body').removeClass('landscape tablet desktop');

  } else if ( window.innerHeight < window.innerWidth && width > 992 ){
    /* desktop landscape */
    $('body').addClass('landscape desktop');
    $('body').removeClass('portrait tablet mobile');
    $('.profile').removeClass('open-top');

  } else if ( window.innerHeight < window.innerWidth && width > 769 ){
    /* tablet landscape */
    $('body').addClass('landscape tablet');
    $('body').removeClass('portrait mobile desktop');
    $('.profile').removeClass('open-top');

  } else {
    /* mobile landscape */
    $('body').addClass('landscape mobile');
    $('body').removeClass('portrait tablet desktop');

  }

  /** jump **/



}).trigger("resize");



    }
  },
  // Home page
  home: {
    init: function() {






    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
