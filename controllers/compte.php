<?php
if(!$member->isIdentify()){
    redirect('home');
}

$error = getErrors('update');

$scoreManager= new ScoreManager();

$myScores = $scoreManager->myScores($member->getID());