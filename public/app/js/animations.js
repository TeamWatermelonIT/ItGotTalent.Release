
var klasses = ["bounce", "pulse", "swing", "rubberBand", "tada", "wobble", "jello", "rotateIn"];

var item = klasses[Math.floor(Math.random()*klasses.length)];

$.fn.extend({
    animateCss: function (animationName) {
        $(this).addClass('animated ' + animationName);
    }
});


$('#active').animateCss(item);

$('.animate').on("mouseenter", function () {
    $(this).addClass('animated ' + 'pulse');
});

$('.animate').on("mouseleave", function () {
    $(this).removeClass('animated ' + 'pulse');
});

$('.partners img').on("mouseenter", function () {
    $(this).addClass('animated ' + 'tada');
})

$('.partners img').on("mouseleave", function () {
    $(this).removeClass('animated ' + 'tada');
});
