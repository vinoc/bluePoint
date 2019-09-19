'use strict'

function gameTime(time) {
    time = parseInt(time);
    var gameTimeInterval = setInterval(function () {
        time = (time - 0.1).toFixed(1);
        postMessage(time);

        if (time <= 0) {
            postMessage('end');
            clearInterval(gameTimeInterval);
        }
    }, 100);
}


onmessage = function (e) {
    gameTime(e.data);
}
