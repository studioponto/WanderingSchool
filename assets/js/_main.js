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




  
  if (width > 766 ){
    /* tablet landscape */
    $('body').addClass('desktop tablet');
    $('body').removeClass('mobile');


    var widthsection = ((width*67)/100);
    var widthsectionclose = ((width-widthsection)/2);


    $('.p-single,.p-wrap').width(widthsection);
    $('.floorplan_inside').width(widthsection);
    $('.floorplan_inside').height(height);
    $('.single_tools').width(widthsection);

    $('.background').width(widthsection);
    $('.background').addClass('back_active');


  } else {
    /* mobile landscape */
    $('body').addClass('mobile');
    $('body').removeClass('desktop tablet');

    var widthsectionmob = ((width*80)/100);
    var widthsectionclosemob = ((width-widthsectionmob)/2);


    $('.p-single,.p-wrap').width(widthsectionmob);
    $('.floorplan_inside').width(widthsectionmob);
    $('.floorplan_inside').height(height);
    $('.single_tools').width(widthsectionmob);

    $('.background').width(widthsectionmob);
    $('.background').addClass('back_active');


  }

  /** jump **/


}).trigger("resize");

/* ==========================================================================
   General
   ========================================================================== */

$('img.fullBleed').fullBleed({
  className: 'fullbleedimg'
});
// init Packery
var $grid = $('.grid').packery({
  percentPosition: true
});
// layout Packery after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.packery();
});



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




/* ==========================================================================
   Single Link
   ========================================================================== */
$.ajaxSetup({cache:false});
$("a.p-link").click(function(){
    var post_div = $(this).closest('section');
    var post_link = $(this).attr("href");
    var post_div_id = $(post_div).attr("id");

    $('section').removeClass('close');
    $('section').removeClass('active');
    $(post_div).addClass('active');
    $(post_div).prevAll().addClass('close');
    $(post_div).nextAll().addClass('close');

    $('#back_'+post_div_id).addClass('active');
    $('#back_'+post_div_id).prevAll().addClass('close');
    $('#back_'+post_div_id).nextAll().addClass('close');

    window.history.pushState('obj', 'newtitle', post_link);


  return false;
});

/*click*/
$('a.p-link').click(function(){

});

// $('a.p-link-projects').mousetip('.tip-projects', 0, 0);
// $('a.p-link-programme').mousetip('.tip-programme', 0, 0);
// $('a.p-link-information').mousetip('.tip-information', 0, 0);

// $('a.p-link-homepage').mousetip('.tip-information', 0, 0);


/* ==========================================================================
   Single Link
   ========================================================================== */
$.ajaxSetup({cache:false});
$(".thumb a").click(function(){
    $('.single_load').fadeIn(0);
    var post_div = $(this);
    $('.single_post').addClass('loading');
    $('.single_post').fadeIn(400);
    $('#project_thumbs').removeClass('selected');

    var post_link = $(this).attr("href");

      $('.single_post .p-single').load(post_link, function (){
       

        $('.single_post .p-single').imagesLoaded( function() {
          window.history.pushState('obj', 'newtitle', post_link);
          $('.single_post').removeClass('loading');
          $('.single_load').fadeOut(400);
        });
      });
  return false;
});



$.ajaxSetup({cache:false});
$("#programme .event_title a").click(function(){
    $('.single_load').fadeIn(0);
    var post_div = $(this);
    $('.single_post').addClass('loading');
    $('.single_post').fadeIn(400);
    $('#project_thumbs').removeClass('selected');

    $('section').removeClass('close');
    $('section').removeClass('active');
    $('#projects').addClass('active');
    $('#projects').prevAll().addClass('close');
    $('#projects').nextAll().addClass('close');

    $('#back_projects').addClass('active');
    $('#back_projects').prevAll().addClass('close');
    $('#back_projects').nextAll().addClass('close');


    var post_link = $(this).attr("href");

      $('.single_post .p-single').load(post_link, function (){
       

        $('.single_post .p-single').imagesLoaded( function() {
          $('.single_post').removeClass('loading');
          $('.single_load').fadeOut(400);
        });
      });
  return false;
});


/*click*/
$.ajaxSetup({cache:false});
$(".back_projects").click(function(){
    $('.single_post').fadeOut(400);
    var post_div = $(this);
    var post_link = $(this).attr("href");

    window.history.pushState('obj', 'newtitle', post_link);

  return false;
});


$.ajaxSetup({cache:false});
$(".look_programme").click(function(){
    $('.single_post').fadeOut(400);
    var post_div = $(this);
    var post_link = $(this).attr("href");

    window.history.pushState('obj', 'newtitle', post_link);

    $('section').removeClass('close');
    $('section').removeClass('active');
    $('#programme').addClass('active');
    $('#programme').prevAll().addClass('close');
    $('#programme').nextAll().addClass('close');

    $('#back_programme').addClass('active');
    $('#back_programme').prevAll().addClass('close');
    $('#back_programme').nextAll().addClass('close');

    window.history.pushState('obj', 'newtitle', post_link);

  return false;
});



/** call on page **/
// if ($("body").hasClass("single-post")) {
//     var post_div = $('section#projects');

//     $('section').removeClass('close');
//     $('section').removeClass('active');
//     $(post_div).addClass('active');
//     $(post_div).prevAll().addClass('close');
//     $(post_div).nextAll().addClass('close');

//     $('.single_post').fadeIn(0);
//     $('.single_load').fadeOut(0);

    
// }

/** draggable **/



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
  single: {
    init: function() {
/* ==========================================================================
   home link
   ========================================================================== */
/*click*/
$('.loader').click(function(){

  $("#spinner").addClass('loadcomplete');
  $("body").addClass('loadcomplete');

  $("#background").removeClass('splash-active');
  $(".wrap-section").removeClass('splash-active');

    setTimeout(function(){
      $(".wrap-section").removeClass('slide-active');
    }, 1);

    setTimeout(function(){
      $('section').removeClass('close');
      $('section').removeClass('active');
      $('#projects').addClass('active');
      $('#projects').prevAll().addClass('close');
      $('#projects').nextAll().addClass('close');

      $('#back_projects').addClass('active');
      $('#back_projects').prevAll().addClass('close');
      $('#back_projects').nextAll().addClass('close');
       $('.single_post').fadeIn(0);
      $('.single_load').fadeOut(0);
    }, 1000);

});


    }
  },
  // Home page
  home: {
    init: function() {
/* ==========================================================================
   home link
   ========================================================================== */
/*click*/
$('.loader').click(function(){

  var post_link = $('#information').attr("href");

  $("#spinner").addClass('loadcomplete');
  $("body").addClass('loadcomplete');

  $("#background").removeClass('splash-active');
  $(".wrap-section").removeClass('splash-active');

    setTimeout(function(){
      $(".wrap-section").removeClass('slide-active');
    }, 1);

    setTimeout(function(){
      $('section').removeClass('close');
      $('section').removeClass('active');
      $('#information').addClass('active');
      $('#information').prevAll().addClass('close');
      $('#information').nextAll().addClass('close');

      $('#back_information').addClass('active');
      $('#back_information').prevAll().addClass('close');
      $('#back_information').nextAll().addClass('close');
      window.history.pushState('obj', 'newtitle', post_link);
    }, 1000);

});


    }
  },
  // Home page
  programme: {
    init: function() {
$('.loader').click(function(){


 var post_link = $('#programme').attr("href");


      $("#spinner").addClass('loadcomplete');
  $("body").addClass('loadcomplete');

  $("#background").removeClass('splash-active');
  $(".wrap-section").removeClass('splash-active');

    setTimeout(function(){
      $(".wrap-section").removeClass('slide-active');
    }, 1);

    setTimeout(function(){
      $('section').removeClass('close');
      $('section').removeClass('active');
      $('#programme').addClass('active');
      $('#programme').prevAll().addClass('close');
      $('#programme').nextAll().addClass('close');

      $('#back_programme').addClass('active');
      $('#back_programme').prevAll().addClass('close');
      $('#back_programme').nextAll().addClass('close');
      window.history.pushState('obj', 'newtitle', post_link);
    }, 1000);
});


    }
  },
  // Home page
  projects: {
    init: function() {
$('.loader').click(function(){


 var post_link = $('#projects').attr("href");


      $("#spinner").addClass('loadcomplete');
  $("body").addClass('loadcomplete');

  $("#background").removeClass('splash-active');
  $(".wrap-section").removeClass('splash-active');

    setTimeout(function(){
      $(".wrap-section").removeClass('slide-active');
    }, 1);

    setTimeout(function(){
      $('section').removeClass('close');
      $('section').removeClass('active');
      $('#projects').addClass('active');
      $('#projects').prevAll().addClass('close');
      $('#projects').nextAll().addClass('close');

      $('#back_projects').addClass('active');
      $('#back_projects').prevAll().addClass('close');
      $('#back_projects').nextAll().addClass('close');
      window.history.pushState('obj', 'newtitle', post_link);
    }, 1000);
});


    }
  },
  // About us page, note the change from about-us to about_us.
  information: {
    init: function() {
$('.loader').click(function(){

   var post_link = $('#information').attr("href");


      $("#spinner").addClass('loadcomplete');
  $("body").addClass('loadcomplete');

  $("#background").removeClass('splash-active');
  $(".wrap-section").removeClass('splash-active');

    setTimeout(function(){
      $(".wrap-section").removeClass('slide-active');
    }, 1);

    setTimeout(function(){
      $('section').removeClass('close');
      $('section').removeClass('active');
      $('#information').addClass('active');
      $('#information').prevAll().addClass('close');
      $('#information').nextAll().addClass('close');

      $('#back_information').addClass('active');
      $('#back_information').prevAll().addClass('close');
      $('#back_information').nextAll().addClass('close');
      window.history.pushState('obj', 'newtitle', post_link);
    }, 1000);
});

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
