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
$("").click(function (t) {
    t.preventDefault();
    linkLocation = this.href;
    $("#spinner").fadeIn(500, e);
});


$(window).bind("resize", function() {
  var width = $(window).innerWidth();
  var height = $(window).innerHeight();

  var header = $('header').height();
  var footer = $('footer').height();


  $('.p-single,.p-wrap').width((width*67)/100);
  $('.floorplan_inside').width((width*67)/100);
  $('.floorplan_inside').height(height);

  
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

/* ==========================================================================
   General
   ========================================================================== */

var scrollinit = (function() { var that = {};  that.init = function () {

$(".p-wrap").niceScroll({
  zindex: '999999999',
  cursorcolor: "#999",
  cursoropacitymin: 0,
  cursoropacitymax: 1,
  cursorwidth: "5px",
  cursorborder: "1px solid rgba(255,255,255,0.5)",
  cursorborderradius: "0",
  railpadding: { top: 2, right: 2, left: 2, bottom: 2 }
}).resize();

}; return that; })();

scrollinit.init();


var thumb=$('.thumb');

$( thumb ).mouseenter(function() {
        var id = $(this).attr('data-thumb');
        $('#thumb_'+id).each(function(i){
            $(this).addClass('selected'); // $(this), not the id element
        });
        $('#project_thumbs').addClass('selected');
    
  }).mouseleave(function() {
        var id = $(this).attr('data-thumb');
        $('#thumb_'+id).each(function(i){
            $(this).removeClass('selected'); // $(this), not the id element
        });
        $('#project_thumbs').removeClass('selected');
});


/** floorplan */
$('.floorplan_slide').slick({
  vertical:true,
  dots:true,
  arrows:false,
  infinite: false,
  draggable:false,
});
$('.floorplan_slide').slick('slickGoTo',1);

  $('.floorplan_slide .slick-dots li:first-child a').text('Basement');
  $('.floorplan_slide .slick-dots li:nth-child(2) a').text('Ground Floor');
  $('.floorplan_slide .slick-dots li:nth-child(3) a').text('First Floor');
  $('.floorplan_slide .slick-dots li:last-child a').text('Second Floor');

$('[data-toggle="tooltip"]').tooltip();

/* ==========================================================================
   Single Link
   ========================================================================== */
$.ajaxSetup({cache:false});
$("a.p-link").click(function(){
    var post_div = $(this).closest('section');
    var post_link = $(this).attr("href");

    $('section').removeClass('close');
    $('section').removeClass('active');
    $(post_div).addClass('active');
    $(post_div).prevAll().addClass('close');
    $(post_div).nextAll().addClass('close');

  return false;
});

/*click*/
$('a.p-link').click(function(){

});


/* ==========================================================================
   Single Link
   ========================================================================== */
$.ajaxSetup({cache:false});
$(".thumb a").click(function(){
    $('.single_load').fadeIn(0);
    var post_div = $(this);
    $('.single_post').addClass('loading');
    $('.single_post').fadeIn(700);
    $('#project_thumbs').removeClass('selected');

    var post_link = $(this).attr("href");

      $('.single_post .p-single').load(post_link, function (){
        $('.single_slides').slick({
            dots:false,
            arrows: true,
            infinite: true,
            draggable:false,
        });

        $('.single_post .p-single').imagesLoaded( function() {
          $('.single_post').removeClass('loading');
          $('.single_load').fadeOut(700);
        });
      });
  return false;
});

/*click*/
$('.single-close').click(function(){
 $('.single_post').fadeOut(700);
});



/** call on page **/
if ($("body").hasClass("single-post")) {
    var post_div = $('section#projects');

    $('section').removeClass('close');
    $('section').removeClass('active');
    $(post_div).addClass('active');
    $(post_div).prevAll().addClass('close');
    $(post_div).nextAll().addClass('close');

    $('.single_post').fadeIn(0);
    $('.single_load').fadeOut(0);

    $('.single_slides').slick({
        dots:false,
        arrows: true,
        infinite: true,
        pauseOnHover: false,
        draggable:false,
    });
}

/*projects inits*/
var projects = (function() { var that = {};  that.init = function () {
}; return that; })();
/*programme inits*/
var programme = (function() { var that = {};  that.init = function () {
}; return that; })();
/*floorplan inits*/
var floorplan = (function() { var that = {};  that.init = function () {
  
}; return that; })();
/*information inits*/
var information = (function() { var that = {};  that.init = function () {
}; return that; })();


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
