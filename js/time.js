'use strict'

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

