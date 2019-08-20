<?php
if(!$member->isIdentify()){
    redirection('home');
}

$error = getErrors('update');

$scoreManager= new ScoreManager();
$myScores= [];

foreach ($scoreManager->myScore($member->getID()) as $scores){
    $myScores[] = new Score($scores);
}



echo $header;
require (PARTIAL_PATH.'_compte.phtml');