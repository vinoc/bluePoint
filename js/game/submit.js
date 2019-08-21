'use strict'

function saveScore() {
// Save by POST
        var ajax = new XMLHttpRequest();


        ajax.open("POST", "saveScore", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Send Data
        console.log(game.getNbPoint());
        ajax.send('difficulty='+ encodeURIComponent(game.getDifficulty()) +'&nbPoints='+ encodeURIComponent(game.getNbPoint())+'&score='+ encodeURIComponent(game.getScore()));

// Answer PHP
        ajax.onreadystatechange = function () {


                if (ajax.readyState === 4 && ajax.status === 200) {
                        //enable for debug
                         //document.querySelector('#debug').innerHTML = ajax.responseText;
                    console.log(ajax.responseText);
                         if(ajax.responseText === 'duel'){
                                 document.location.href="duelEnd";
                         }
                }
        }

    }
