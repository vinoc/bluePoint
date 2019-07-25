'use strict'

function prepareTable() {
    var nbpoint = document.querySelector('select');


    var points=[];
    var i;
    var y;

    for (i = 0; i < nbpoint.value ; i++) {
        points[i]=[];
        for (y = 0; y < nbpoint.value ; y++) {
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
    return 'RGB('+random(0,255)+','+random(0,255)+',0)';
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

    var view = document.querySelector('#bluePoint .border');
    view.innerHTML=html;

    pointsListener()
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

    }
    else{
        console.log('raté');
    }
}