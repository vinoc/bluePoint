<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 13:48
 */

$scoreManager= new ScoreManager();

//Préparation des scores depuis toujours !
$scoreRandom = scoreRandom();
$bestNiveauAleatoire = $scoreRandom['niveau'];
$bestPointsAleatoire = $scoreRandom['nbPoints'];
$bestScores = $scoreManager->bestScores($bestNiveauAleatoire, $bestPointsAleatoire);
switch ($bestNiveauAleatoire){
    case 1:
        $bestNiveauAleatoire = 'facile';
        break;
    case 2:
        $bestNiveauAleatoire = 'moyen';
        break;
    case 3:
        $bestNiveauAleatoire = 'difficile';
        break;
}


//Préparation des scores de la semaines
$scoreRandom = scoreRandom();
$weekNiveauAleatoire = $scoreRandom['niveau'];
$weekPointsAleatoire = $scoreRandom['nbPoints'];
$weekScores = $scoreManager->bestScoresOfWeek($weekNiveauAleatoire, $weekPointsAleatoire);
switch ($weekNiveauAleatoire){
    case 1:
        $weekNiveauAleatoire = 'facile';
        break;
    case 2:
        $weekNiveauAleatoire = 'moyen';
        break;
    case 3:
        $weekNiveauAleatoire = 'difficile';
        break;
}


//Préparation des scores du mois
$scoreRandom = scoreRandom();
$monthNiveauAleatoire = $scoreRandom['niveau'];
$monthPointsAleatoire = $scoreRandom['nbPoints'];
$monthScores = $scoreManager->bestScoresOfMonth($monthNiveauAleatoire, $monthPointsAleatoire);
switch ($monthNiveauAleatoire){
    case 1:
        $monthNiveauAleatoire = 'facile';
        break;
    case 2:
        $monthNiveauAleatoire = 'moyen';
        break;
    case 3:
        $monthNiveauAleatoire = 'difficile';
        break;
}


//Prepare the view
echo $header;

require(PARTIAL_PATH.'_home.phtml');






?>