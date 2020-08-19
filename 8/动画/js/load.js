function rotateLoad(container) {
    for (let index = 0; index < 12; index++) {
        var span = $('<span>');
        span.addClass('rotate-loading');
        span.css({
            transform: `rotate(${30 * index}deg)`,
            animation: `rotateLoading 1s ${index * 1 / 12}s infinite`
        })
        span.appendTo(container);
    }
}
