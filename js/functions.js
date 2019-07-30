'use strict'
function prepareGame(){
    nbPoints = document.querySelector('select').value;
    difficulty= document.querySelector('#niveau').value;

    prepareTable();
}


function prepareTable() {

    var points=[];
    var i;
    var y;

    for (i = 0; i < nbPoints ; i++) {
        points[i]=[];
        for (y = 0; y < nbPoints ; y++) {
            points[i][y] = randomColor();
        }
    }
    bluePoint(points);
}

//selectionne un point au hasard et le change en bleu
function bluePoint(points){
    var x= random(0, points.length);
    var y= random(0, points.length);
    points[y][x] = "RGB(0,0,255)";
    createView(points);
}



function randomColor(){
    return 'RGB('+random(0,255)+','+random(0,255)+','+random(0,parseInt(difficulty))+')';
}




function random(min, max){
    return Math.floor(Math.random() * (max - min) + min);
}




//affiche les points
function createView(points){
    var html='';

    points.forEach(function(line){
        html+= '<div class=\'flex\'>';
        line.forEach(function(point){
            html += '<div class="point" style="background-color:'+point+'"></div>';
        });
        html+= '</div>';
    });

    gameArea.innerHTML=html;
    startIsComming();

}

//ajoute les listener aux points nouvellement créé
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
    prepareTable();
}


function scoreMore(){
    realScore++;
    showScore();

}

function scoreLess(){
    if(realScore >0) {
        realScore--;
    }else {
        realScore = 0;
    }
    showScore();
}

function showScore(){
    score.textContent= realScore;
    prepareTable()
}

function startIsComming(){
    var div = document.querySelector('#startIn');
    var count = document.querySelector('#startIn p');

    classToggle(div, 'hidden');
    var x;
    x=setInterval(function(){
        if(count.innerHTML<2){
            clearInterval(x);
            classToggle(div, 'hidden');
            gameTime();
        }else
        {
            count.innerHTML--;
        }
    }, 1000);
}


function classToggle(variable, toggleClass){
    variable.classList.toggle(toggleClass);

}

//Lancement compte à rebours + activation/desactivations des listners
function gameTime(){
    var timeLeft = document.querySelector('#time span');
    if(newGame === true) {
        pointsListener();
        timeLeft.innerHTML = 30.0;

        var x = setInterval(function () {
            timeLeft.innerHTML = (parseFloat(timeLeft.innerHTML) - 0.1).toFixed(1);
            console.log(parseFloat(timeLeft.innerHTML));

        }, 100);
        newGame = false;
    }
    if (parseFloat(timeLeft.innerHTML) <= 0) {
        console.log('end');
        clearInterval(x);
        timeLeft.innerHTML = 0;
    }

}