<?php

debug($_POST);
$data = json_decode($_POST);
debug($data);


if($member->isIdentify()) {
    $scoreManager = new ScoreManager();
    $score = new score($data);



    $score->setIdPlayer($member->getID());

    if($score->isDuel()){
        $scoreManager->saveDuel($score);
    }
    else{
        $scoreManager->saveScore($score);
    }
}

