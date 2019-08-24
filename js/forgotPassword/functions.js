'use strict'

function verify(e){
    e.preventDefault();

    login = document.querySelector('#login').value;
    mailAdress = document.querySelector('#mailAdress').value;

    if(login !=='' || mailAdress !==''){
        send();
    }


}


function send(){
    var ajax = new XMLHttpRequest();


    ajax.open("POST", "forgotPasswordverify", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Send Data
    ajax.send('login='+ encodeURIComponent(login) +'&mailAdress='+ encodeURIComponent(mailAdress));

// Answer PHP
    ajax.onreadystatechange = function () {

        if (ajax.readyState === 4 && ajax.status === 200) {

            document.querySelector('#debug').innerHTML = ajax.responseText;

        }
    }

}
