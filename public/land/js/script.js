$(document).ready(function(){

  /* parallax background */
  $('.promo').parallax();
  $('.promo-alt').parallax();
  $('.promo-02').parallax();
  $('.promo-03').parallax();
  $('.promo-04').parallax();

  /* nice scroll */
  $( 'html' ).niceScroll({
    cursorcolor: '#434a54', /* change with your own color */
    cursorwidth: '10px',
    cursorborder: '1px solid #434a54', /* change with your own color */
    cursoropacitymax: 0.9,          
    spacebarenabled: false,      
    scrollspeed: 120,
    autohidemode: false,
    horizrailenabled: false,
    cursorborderradius: 2,
    zindex: 1060
  });

  /* scrolltop */
  $('.navbar-nav li a, .menus').on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });

  if( $(window).scrollTop() > 100 ){
    $('.navbar-fixed-top').addClass('navbar-scroll')
  }else{
    $('.navbar-fixed-top').removeClass('navbar-scroll')
  }

  /* scrollspy highlighting active navbar menu */
	$('body').scrollspy({
	    target: '.navbar-fixed-top'
	})

  /* close navbar collapse after click in mobile */
	$('.navbar-collapse ul li a').click(function() {
	    $('.navbar-toggle:visible').click();
	});

	/* map contact */
  $("#map").gmap3({
    map: {
        options: {
          center: [-7.866315,110.389574], /* change langitude latitude of your location here */
          zoom: 12,
          scrollwheel: false
        }  
     },
    marker:{
        latLng: [-7.866315,110.389574], /* change langitude latitude of your location here */
        options: {
         icon: new google.maps.MarkerImage(
           "https://dl.dropboxusercontent.com/u/29545616/Preview/location.png",
           new google.maps.Size(48, 48, "px", "px")
         )
        }
     }
  });

});
