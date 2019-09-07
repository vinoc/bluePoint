<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 23/08/2018
 * Time: 21:38
 */

$visible = 'visible';
$hidden = 'hidden';
$afficheBoutonDeconnexion = ($member->getIdentify()) ? $visible : $hidden;
$afficheBoutonConnexion = ($member->getIdentify()) ? $hidden : $visible;

$visibiliteAdmin = ($member->getPermission() ==  "admin" ) ? $visible : $hidden;

$urlMonCompte = ($member->getIdentify()) ?   HOST .'compte' : 'home';

$scoreManager = new ScoreManager();
$notification = ($scoreManager->myWaitingDuel($member->getID()) === [])? 'hidden' : 'notification';
debug($notification);

$titrePage='Le combat, c\'est la vie !';

require (PARTIAL_PATH.'_header.phtml');