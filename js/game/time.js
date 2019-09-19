'use strict'
function startIsComming(){
    var div = document.querySelector('#startIn');
    var count = document.querySelector('#startIn p');

    classToggle(div, 'hidden');

    count.innerHTML = WaitingTime;

    var wait=setInterval(function(){
        if(count.innerHTML<2){
            clearInterval(wait);
            classToggle(div, 'hidden');
            gameTime();
        }
        else {
            count.innerHTML--;
        }
    }, 1000);
}


function gameTime(){
    var timeLeft = document.querySelector('#time span');

    //Worker for not having freeze during the game
    if(window.Worker){
        var timerWorker = new Worker('js/game/workerTime.js');
        timerWorker.postMessage(timeOfTheGame);

        //Start Game only once.
        game.setStarted(true);
        classToggle(theGame, 'hidden');
        timeLeft.innerHTML = timeOfTheGame;
        createView()

        timerWorker.onmessage = function(event){
            if(event.data === 'end') {
                pointListenerStop();
                timeLeft.innerHTML = 0;
                endGame();
                timerWorker.terminate(); // for release memory
             }
            else{
                timeLeft.innerHTML = event.data;
            }
        }
    }
    // Timer for old systeme who don't support workers
    else {
        if (game.getStarted() === false) {
            classToggle(theGame, 'hidden');
            //Game start only once
            game.setStarted(true);

            createView();
            pointsListener();
            timeLeft.innerHTML = timeOfTheGame;

            var gameTime = setInterval(function () {
                //tofixed: to display only one decimal
                timeLeft.innerHTML = (timeLeft.innerHTML - 0.1).toFixed(1);
                if (timeLeft.innerHTML <= 0) {
                    clearInterval(gameTime);
                    pointListenerStop();
                    timeLeft.innerHTML = 0;
                    endGame();
                }
            }, 100);

        }
    }

}


// 3 seconds before start a new game. Prevent click on "démarrer" when game disappear
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