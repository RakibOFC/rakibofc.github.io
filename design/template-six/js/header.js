$(document).ready(function () {
    var s = $("#header");
    var pos = s.position();
    var windowpos = $(window).ready(function () {
        s.addClass("stick");
    });
    // if (windowpos >= pos.top) {
    //     s.addClass("stick");
    // } else {
    //     s.removeClass("stick");
    // }
    // $(window).scroll(function () {
    //     var windowpos = $(window).scrollTop();
    //     if (windowpos >= pos.top) {
    //         s.addClass("stick");
    //     } else {
    //         s.removeClass("stick");
    //     }
    // });
});