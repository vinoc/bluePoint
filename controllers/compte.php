<?php
if(!$member->isIdentify()){
    redirection('home');
}

$error = getErrors('update');

$scoreManager= new ScoreManager();

$myScores = $scoreManager->myScore($member->getID());




echo $header;
require (PARTIAL_PATH.'_compte.phtml');