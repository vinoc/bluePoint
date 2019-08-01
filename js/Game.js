'use strict'

var  Game = function(){
    this.started = false;
    this.difficulty = 1;//1-2-3
    this.nbPoints = 3;//3-6-9
    this.score = 0;
};

Game.prototype.setStarted = function(bool){
    this.started = bool;
}:

Game.prototype.setDifficulty = function(int){
    this.difficulty = int;
};

Game.prototype.setNbPoints = function(int){
    this.nbPoints = int;
};

Game.prototype.setScore = function(int){
    this.score = int;
};

