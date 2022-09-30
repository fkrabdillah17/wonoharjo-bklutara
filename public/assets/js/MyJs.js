$(document).ready(function() {
    // Transition effect for navbar 
    $(window).scroll(function() {
      // checks if window is scrolled more than 500px, adds/removes solid class
      $('nav').toogleClass('scrolled', $(this).scrollTop() > 100);
    });
});