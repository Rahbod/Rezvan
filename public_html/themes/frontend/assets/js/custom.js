$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 800) {
        $('.fade').fadeIn();
    } else {
        $('.fade').fadeOut();
    }

    if (y > 100) {
        $('.site-header').addClass('fixed-menu');
    } else {
        $('.site-header').removeClass('fixed-menu');
    }
});

$(document).ready(function () {
    var newwidth = $('#way');
    //replace the width
    $('#way').css("min-width", +$(".infography").outerWidth());
    newwidth.css({'min-width': +$(".infography").outerWidth()});
    newwidth.show();

    var newheight = $('.main-info');
    //replace the width
    $('.main-info').css("min-height", +$(".infography").outerWidth());
    newheight.css({'min-height': +$(".infography").outerWidth()});
    newheight.show();

    var newheight = $('.way-line');
    //replace the width
    $('.way-line').css("min-height", +$(".infography").outerWidth());
    newheight.css({'min-height': +$(".infography").outerWidth()});
    newheight.show();
});

$(window).resize(function () {
    var newwidth = $('#way');
    //replace the width
    $('#way').css("min-width", +$(".infography").outerWidth());
    newwidth.css({'min-width': +$(".infography").outerWidth()});
    newwidth.show();

    var newheight = $('.main-info');
    //replace the width
    $('.main-info').css("min-height", +$(".infography").outerWidth());
    newheight.css({'min-height': +$(".infography").outerWidth()});
    newheight.show();

    var newheight = $('.way-line');
    //replace the width
    $('.way-line').css("min-height", +$(".infography").outerWidth());
    newheight.css({'min-height': +$(".infography").outerWidth()});
    newheight.show();
});

$(function () {
    $("body").on("click", ".share-icon a", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        var modalEl = $("#social-share-modal");
        modalEl.find(".social-share-link").each(function () {
            alert($(this).data('url') + url);
            $(this).attr('href', $(this).data('url') + url);
        });
        modalEl.modal("show");
    })
});