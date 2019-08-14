<?php


$data = $_POST;

if($member->isIdentify()) {

    $scoreManager = new ScoreManager();
    $score = new score($data);
    debug($data);



    $score->setIdPlayer($member->getID());

    if($score->isDuel()){
        $scoreManager->saveDuel($score);
    }
    else{
        $scoreManager->saveScore($score);
    }
}

