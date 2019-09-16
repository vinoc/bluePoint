'use strict'


function bestScore(){
    var ajax = new XMLHttpRequest();


    ajax.open("POST", "bestScore", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Send Data
    ajax.send('difficulty='+ encodeURIComponent(selectDifficulty.value) +'&nbPoints='+ encodeURIComponent(selectNbPoints.value));

// Answer PHP
    ajax.onreadystatechange = function () {

        if (ajax.readyState === 4 && ajax.status === 200) {
            console.log(ajax.responseText);
             bestScore1.textContent = ajax.responseText;
             bestScore2.textContent = ajax.responseText;
        }
    }
}