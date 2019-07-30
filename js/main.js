'use strict'
// global Var
var btnStart;
var score;
var bestScore;
var difficulty;
var nbPoints;

//Un nouveau jeu peut-il être lancé ? True == oui, false == non
var newGame = true;

// Pour que l'utilisateur ne puisse pas modifier le score directement sur la page, on l'enregistré dans une variable séparé.
var realScore = 0;


var gameArea = document.querySelector('#gameArea');

document.addEventListener('DOMContentLoaded',function(){
    btnStart = document.querySelector('#start');
    score =document.querySelector('#yourScore span');
    bestScore = document.querySelector('#bestScore span')

    btnStart.addEventListener('click',prepareGame);

});