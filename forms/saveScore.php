<?php


$data = $_POST;

if($member->isIdentify()){

    $scoreManager = new ScoreManager();
    $score = new score($data);


    $score->setIdPlayer($member->getID());

    if($_SESSION['duel'] != ''){
        $score->setDuel(true);
        $score->setIdPlayer2($_SESSION['duel']['id']);
        $scoreManager->saveDuel($score);
        $_SESSION['duel']['score']= $score->getScore();
        echo 'duel';
    }
    else{
        $scoreManager->saveScore($score);
    }
}


