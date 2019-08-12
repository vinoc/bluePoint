'use strict'

var  Game = function(){
    this.started = false;
    this.difficulty = 1;//1-2-3
    this.nbPoints = 3;//3-6-9
    this.nbPointsClass = 'three'; //tree-six-nine
    this.score = 0;
};

// setter


Game.prototype.setStarted = function(bool){
    this.started = bool;
};

Game.prototype.setDifficulty = function(int){
    switch (int) {
        case '1':
            this.difficulty = 0;
            break;
        case '2':
            this.difficulty = 150;
            break;
        case '3':
            this.difficulty = 220;
            break;
        default:
            this.difficulty = 10;

    }

};

Game.prototype.setNbPoints = function(int){
    this.nbPoints = int;

    switch (int) {
        case '3':
            this.nbPointsClass = 'three';
            break;
        case '6':
            this.nbPointsClass = 'six';
            break;
        case '9':
            this.nbPointsClass = 'nine';
            break;
        default:
            this.nbPointsClass = none
    }

};

Game.prototype.setScore = function(int){
    this.score = int;
};


// Getter


Game.prototype.getStarted = function(){
    return this.started;
}

Game.prototype.getDifficulty = function(){
    return this.difficulty;
}

Game.prototype.getNbPoint = function(){
    return this.nbPoints;
}

Game.prototype.getScore = function(){
    return this.score;
}


// Fonctions

Game.prototype.resetGame = function(){
    this.started = false;
    this.difficulty = 1;//1-2-3
    this.nbPoints = 3;//3-6-9
    this.score = 0;

}
