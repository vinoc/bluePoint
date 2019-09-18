<?php


$visible = 'visible';
$hidden = 'hidden';
$afficheBoutonDeconnexion = ($member->getIdentify()) ? $visible : $hidden;
$afficheBoutonConnexion = ($member->getIdentify()) ? $hidden : $visible;

$visibiliteAdmin = ($member->getPermission() ==  "admin" ) ? $visible : $hidden;

$urlMonCompte = ($member->getIdentify()) ?   HOST .'playerPage?id='.$member->getID() : 'home';

$scoreManager = new ScoreManager();
$notification = ($scoreManager->myWaitingDuel($member->getID()) === [])? 'hidden' : 'notification';

$titrePage='Le combat, c\'est la vie !';

require (PARTIAL_PATH.'_header.phtml');