'use strict'

function startIsComming(){
    var div = document.querySelector('#startIn');
    var count = document.querySelector('#startIn p');
    count.innerHTML = WaitingTime;

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



function gameTime(){

    var timeLeft = document.querySelector('#time span');
    if(game.getStarted() === false) {
        classToggle(theGame, 'hidden');
        //On démarre le jeu afin de ne pas relancer le compte à rebour

        game.setStarted(true);
        prepareTable();
        pointsListener();
        timeLeft.innerHTML = timeOfTheGame;

        var x = setInterval(function () {
            //tofixed: Pour n'afficher qu'1 après la virgule (29.2)
            timeLeft.innerHTML = (parseFloat(timeLeft.innerHTML) - 0.1).toFixed(1);
            if(timeLeft.innerHTML<= 0){
                clearInterval(x);
                pointListenerStop();
                endGame();
                timeLeft.innerHTML = 0;
                //todo activer la fin du jeu
            }
        }, 100);

    }


}