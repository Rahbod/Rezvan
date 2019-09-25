$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 800) {
    $('.overly').fadeIn();
  } else {
    $('.overly').fadeOut();
  }
});