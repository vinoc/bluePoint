'use strict'
var login;
var mailAdress;

document.addEventListener('DOMContentLoaded', function(){
        var sendButton = document.querySelector('#submitButton');

        sendButton.addEventListener('click', verify);
});


