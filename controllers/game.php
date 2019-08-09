<?php

$scoreManager= new ScoreManager();
$myBestScore = $scoreManager->myBestScore($member->getID());
$myBestScore = ($myBestScore == false) ? '<a href="connexion" class="button">Connexion requise</a>' : $myBestScore[0];






echo $header;

require PARTIAL_PATH.'_game.phtml';
