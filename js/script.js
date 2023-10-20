$(document).ready(function() {
    // Function to check if an element is in the viewport
    function isElementInViewport(elem) {
      var offset = elem.offset();
      var windowTop = $(window).scrollTop();
      var windowBottom = windowTop + $(window).height();
      var elemTop = offset.top;
      var elemBottom = elemTop + elem.height();
  
      return elemBottom > windowTop && elemTop < windowBottom;
    }
  
    // Initial state: hide the features
    $('.feature').css('opacity', 0);
  
    // Function to animate features when they enter the viewport
    function animateFeatures() {
      $('.feature').each(function() {
        if (isElementInViewport($(this))) {
          //Add dynamic delay to each feature
          $(this).css('animation-delay', ($(this).index() + 1) * 0.5 + 's');
          $(this).css('opacity', 1);
          $(this).addClass('slide-in'); // You can add a slide-in class for the animation effect
          
        }
      });
    }
  
    // Check for animation on page load
    animateFeatures();
  
    // Check for animation on scroll
    $(window).on('scroll', function() {
      animateFeatures();
    });
  });
  