'use strict'

function saveScore() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "saveScore", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Send Data
    ajax.send('difficulty=' + encodeURIComponent(game.getDifficulty()) + '&nbPoints=' + encodeURIComponent(game.getNbPoint()) + '&score=' + encodeURIComponent(game.getScore()));

// Answer PHP
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            //enable for debug
            // document.querySelector('#debug').innerHTML = ajax.responseText;

            if (ajax.responseText !== 'ok') {
                document.location.href = "duelEnd?id=" + ajax.responseText;
            }
        }
    }

}
