'use strict'
function prepareGame(){
    if(game.getStarted()===false) {
        game.setNbPoints(selectNbPoints.value);
        game.setDifficulty(selectDifficulty.value);

        score2.textContent = 0;

        // Faire apparaitre l'aire de jeu
        classToggle(gameArea, 'hidden');
        // Lancement du compte à rebour avant le jeu
        startIsComming();
    }
}


//show point
function createView(){
    //First launch
    if(typeof points === 'undefined'){
        prepareTable();
    }
    var html='';

    points.forEach(function(line){
        html+= '<div class=\'flex\'>';
        line.forEach(function(point){
            html += '<div class="point '+game.nbPointsClass+'" style="background-color:'+point.getColor()+'"></div>';
        });
        html+= '</div>';
    });

    pointView.innerHTML=html;
    pointsListener();
    prepareTable();
}


function prepareTable() {
    var i;
    var y;
    points = [];
    for (i = 0; i < game.getNbPoint() ; i++) {
        points[i]=[];
        for (y = 0; y < game.getNbPoint() ; y++) {
            points[i][y] = new Point;
        }
    }
    bluePoint();
}


//One point need to be blue ;)
function bluePoint(){
    var x= random(0, points.length);
    var y= random(0, points.length);
   var point=points[x][y];
    point.setColor("RGB(0,0,255)");

}


function randomColor(){
    var blue;

    switch (game.getDifficulty()) {
        case '1':
            blue = 0;
            break;
        case '2':
            blue = 150;
            break;
        case '3':
            blue = 220;
            break;
        default:
            blue = 10;
    }


    return 'RGB('+random(0,255)+','+random(0,255)+','+random(0,blue)+')';
}


function random(min, max){
    return Math.floor(Math.random() * (max - min) + min);
}


//Add listener to new points
function pointsListener(){
    var points = document.querySelectorAll('.point');

    points.forEach(function (point){
        point.addEventListener('click', clickOnPoint);
    });
}


function clickOnPoint(){
    if(this.style.backgroundColor=== "rgb(0, 0, 255)"){
        scoreMore();
    }
    else{
        scoreLess();
    }
    createView();
}


function scoreMore(){
    game.setScore(game.getScore()+1);
    showScore();
}


function scoreLess(){
    if(game.getScore() >0) {
        game.setScore(game.getScore()-1)
    }else {
        game.setScore(0);
    }
    showScore();
}


function showScore(){
    score1.textContent= game.getScore();
    score2.textContent= game.getScore();

    if(bestScore1.textContent< game.getScore()){
        bestScore1.textContent = game.getScore();
        bestScore2.textContent = game.getScore();
    }
}


function classToggle(variable, toggleClass){
    variable.classList.toggle(toggleClass);
}


function pointListenerStop(){
    var points = document.querySelectorAll('.point');

    points.forEach(function (point){
        point.removeEventListener('click', clickOnPoint);
    });
}


function endGame(){
    classToggle(gameArea, 'hidden');
    classToggle(theGame, 'hidden');
    scoresFinal.classList.remove('hidden');
    saveScore();
    points = undefined
    pauseBeforeNewGame();
}
