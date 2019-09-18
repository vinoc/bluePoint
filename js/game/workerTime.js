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
            timeLeft.innerHTML = (timeLeft.innerHTML - 0.1).toFixed(1);
            if(timeLeft.innerHTML<= 0){
                clearInterval(gameTime);
                pointListenerStop();
                timeLeft.innerHTML = 0;
                endGame();
            }
        }, 100);

    }

}

onmessage = function(e){
    console.log(e)
}