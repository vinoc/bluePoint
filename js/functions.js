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

function bluePoint(points){
    var x= random(0, points.length);
    var y= random(0, points.length);
console.log('x= '+ x +' y= '+y)
    points[y][x] = "RGB(0,0,255)";

    createView(points);
}


function randomColor(){
return 'RGB('+random(0,255)+','+random(0,255)+',0)';
}

function random(min, max){

    return Math.floor(Math.random() * (max - min) + min);
}


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

    //todo ajouter html à la page.
}