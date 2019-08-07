'use strict'
// global Var
var btnStart;
var score;
var bestScore;

var gameArea = document.querySelector('#gameArea');
var theGame = document.querySelector('#theGame');
var pointView = document.querySelector('#pointView');

var game = new Game;

document.addEventListener('DOMContentLoaded',function(){
    btnStart = document.querySelector('#start');
    score =document.querySelector('#yourScore span');
    bestScore = document.querySelector('#bestScore span')

    btnStart.addEventListener('click',prepareGame,false);

});