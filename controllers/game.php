<?php
if(!$member->isIdentify()){
    $myBestScore = '<a href="connexion" class="button">Connexion requise</a>';
}
else {
    $scoreManager = new ScoreManager();
    $myBestScore = $scoreManager->myBestScore($member->getID());
    $myBestScore = ($myBestScore == false) ? 0 : $myBestScore[0];
}

$duel = (isset($_GET['id']) AND intval($_GET['id']) >= 1)? intval($_GET['id']) : 0;

debug($duel);




echo $header;

require PARTIAL_PATH.'_game.phtml';
