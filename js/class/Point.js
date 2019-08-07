'use strict'

var Point = function(){
    this.color;
    this.autoColor();
}

Point.prototype.setColor= function(color){
    this.color = color;
}

Point.prototype.autoColor= function(){
    this.color = randomColor();
}

Point.prototype.getColor = function () {
    return this.color;
}