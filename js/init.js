(function($){
  $(function(){

    $('.sidenav').sidenav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(".dropdown-trigger").dropdown();

$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: true,
});

// setInterval(function() {
//   $('.carousel.carousel-slider').carousel('next');
// }, 2000); 