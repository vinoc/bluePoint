<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 13:48
 */

$scoreManager= new ScoreManager();

//Préparation des scores depuis toujours !
$bestNiveauAleatoire = random_int(1,3);
$bestScores = $scoreManager->bestScores($bestNiveauAleatoire);
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
$weekNiveauAleatoire = random_int(1,3);
$weekScores = $scoreManager->bestScoresOfWeek($weekNiveauAleatoire);
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
$monthNiveauAleatoire = random_int(1,3);
$monthScores = $scoreManager->bestScoresOfMonth($monthNiveauAleatoire);
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