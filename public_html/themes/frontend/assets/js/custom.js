$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 800) {
    $('.fade').fadeIn();
  } else {
    $('.fade').fadeOut();
  }
});

$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 100) {
    $('.site-header').addClass('fixed-menu');
  } else {
    $('.site-header').removeClass('fixed-menu');
  }
});