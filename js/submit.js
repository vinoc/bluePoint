'use strict'

function saveScore() {
// Save by POST
        var ajax = new XMLHttpRequest();


        ajax.open("POST", "saveScore", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Send Data
        ajax.send('difficulty='+ encodeURIComponent(game.getDifficulty()) +'&nbPoint='+ encodeURIComponent(game.getNbPoint())+'&score='+ encodeURIComponent(game.getScore()));

// Answer PHP
        ajax.onreadystatechange = function () {


                if (ajax.readyState === 4 && ajax.status === 200) {
                        //enable for debug
                        //var data = ajax.responseText;
                        //console.log(data);
                }
        }

    }
