'use strict'

function saveScore() {
        var data={'difficulty': game.getDifficulty(), 'nbPoint': game.getNbPoint(), 'score': game.getScore()};
        data= JSON.stringify(data);

        var ajax = new XMLHttpRequest();

// Seta tipo de requisição: Post e a URL da API
        ajax.open("POST", "saveScore", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Seta paramêtros da requisição e envia a requisição
        ajax.send(data);

// Cria um evento para receber o retorno.
        ajax.onreadystatechange = function () {

                // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
                if (ajax.readyState == 4 && ajax.status == 200) {

                        var data = ajax.responseText;

                        // Retorno do Ajax
                        var debug = document.querySelector("#debug");
                        debug.innerHTML= data;
                        console.log(data);
                }
        }

    }


function test() {

}