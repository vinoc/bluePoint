'use strict'
// global Var
var btnStart;
var score;
var bestScore;

document.addEventListener('DOMContentLoaded',function(){
    btnStart = document.querySelector('#start');
    score =document.querySelector('#yourScore span');
    bestScore = document.querySelector('#bestScore span')

    btnStart.addEventListener('click',prepareTable);





});