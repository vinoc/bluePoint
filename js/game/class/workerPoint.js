var nbPoint;
function prepareTable() {
    var points=[];
    var i;
    var y;
    for (i = 0; i < nbPoint ; i++) {
        points[i]=[];
        for (y = 0; y < nbPoint ; y++) {
            points[i][y] = new Point;
        }
    }
    bluePoint(points);
}

//selectionne un point au hasard et le change en bleu
function bluePoint(points){
    var x= random(0, points.length);
    var y= random(0, points.length);
    var point=points[x][y];
    point.setColor("RGB(0,0,255)");
    createView(points);
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