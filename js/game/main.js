'use strict'

// global Var
var btnStart;
var score1;//After the game
var score2;//During the game

var bestScore1;//After the game
var bestScore2;//During the game

var gameArea = document.querySelector('#gameArea');
var theGame = document.querySelector('#theGame');

var pointView = document.querySelector('#pointView');

var selectNbPoints = document.querySelector('#nbCase');
var selectDifficulty = document.querySelector('#niveau');

var game = new Game;
console.log(game);
// CONFIG
var WaitingTime = 3;
var timeOfTheGame = 30.0;

document.addEventListener('DOMContentLoaded',function(){
    btnStart = document.querySelector('#start');
    score1 =document.querySelector('#yourScore1 span');
    score2 =document.querySelector('#yourScore2 span');
    bestScore1 = document.querySelector('#bestScore1 span');
    bestScore2 = document.querySelector('#bestScore2 span');

    //Change Best Scores
    selectNbPoints.addEventListener('change', bestScore, false);
    selectDifficulty.addEventListener('change', bestScore, false);
    //game Start
    btnStart.addEventListener('click',prepareGame,false);
});