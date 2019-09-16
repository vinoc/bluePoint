<?php
if(!$member->isIdentify()){
    redirection('home');
}

$error = getErrors('update');

$scoreManager= new ScoreManager();

$myScores = $scoreManager->myScores($member->getID());