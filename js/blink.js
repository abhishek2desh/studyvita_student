function blinker() {
    $('.blink_me').fadeOut(300);
    $('.blink_me').fadeIn(500);
}

setInterval(blinker, 1200);
