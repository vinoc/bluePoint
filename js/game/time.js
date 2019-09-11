'use strict'

function startIsComming(){
    var div = document.querySelector('#startIn');
    var count = document.querySelector('#startIn p');
    count.innerHTML = WaitingTime;

    classToggle(div, 'hidden');
    var wait;
    wait=setInterval(function(){
        if(count.innerHTML<2){
            clearInterval(wait);
            classToggle(div, 'hidden');
            count.innerHTML = WaitingTime;
            gameTime();
        }
        else {
            count.innerHTML--;
        }
    }, 1000);

}



function gameTime(){

    var timeLeft = document.querySelector('#time span');
    if(game.getStarted() === false) {
        classToggle(theGame, 'hidden');
        //On démarre le jeu afin de ne pas relancer le compte à rebour

        game.setStarted(true);
        prepareTable();
        pointsListener();
        timeLeft.innerHTML = timeOfTheGame;

        var gameTime = setInterval(function () {
            //tofixed: Pour n'afficher qu'1 après la virgule (29.2)
            timeLeft.innerHTML = (parseFloat(timeLeft.innerHTML) - 0.1).toFixed(1);
            if(timeLeft.innerHTML<= 0){
                clearInterval(gameTime);
                pointListenerStop();
                timeLeft.innerHTML = 0;
                endGame();
            }
        }, 100);

    }

}

// 3 seconds before start a new game. Prevent click on "demarrer" when game disappear
function pauseBeforeNewGame(){
    var i=0;
    var pause=setInterval(function(){
        if( i>2){
            game.resetGame();
            clearInterval(pause);
        }
        else {
            i++;
        }
    }, 1000);
}