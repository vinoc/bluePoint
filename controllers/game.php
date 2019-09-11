<?php
if(!$member->isIdentify()){
    $myBestScore = '<a href="connexion" class="button">Connexion requise</a>';
}
else {
    $scoreManager = new ScoreManager();
    $myBestScore = $scoreManager->myBestScore($member->getID());
    $myBestScore = ($myBestScore == false) ? 0 : $myBestScore[0];
}

$showDuel = 'hidden';


$memberManager = new MemberManager();

if(isset($_GET['duel']) AND intval($_GET['duel']) >= 1){
    if(!$member->isIdentify()){
        redirection('connexion');
    }
    $versus = $memberManager->getMember(intval($_GET['duel']));
}
else{
    $versus=false;
}

$scoreManager = new ScoreManager();
$duelBack = (isset($_GET['duel']) AND intval($_GET['duel']) >= 1) ? $scoreManager->incompletDuel($_GET['duel']): false;

$disable = '';

//prepare Selects
$difficultySelected1 ='';
$difficultySelected2 ='';
$difficultySelected3 ='';

$nbpointsSelected3 = '';
$nbpointsSelected6 = '';
$nbpointsSelected9 = '';

//prepare Session
$_SESSION['duel'] = [];
$_SESSION['duel']['id'] = '';
$_SESSION['duel']['idBack'] ='';
if ($versus != false) {
    $showDuel = '';
    $duelLogin = 'Match en Duel contre: ' . $versus->getLogin();
    $isDuel = 'true';
    $score='';
    $_SESSION['duel']['id']= $versus->getID();

}
elseif($duelBack != false){
    $showDuel = '';
    $duelLogin = 'Match retour contre '.$duelBack->getLogin().' qui a fait '. $duelBack->getScore().' points !';

    if($duelBack->getScore2() != 'xx'){
        $duelLogin = 'Ce match a déjà eu lieux !';
        redirection('duelEnd');
    }

    $_SESSION['duel']['idBack'] = $duelBack->getId();


    //prepare selects
    $disable = 'disabled';

    switch($duelBack->getDifficulty()){
        case 1:
            $difficultySelected1 = 'selected';
            break;
        case '2':
            $difficultySelected2 = 'selected';
            break;
        case 3:
            $difficultySelected3 = 'selected';
            break;
    }

    switch ($duelBack->getNbPoints()){
        case 3:
            $nbpointsSelected3 = 'selected';
            break;
        case 6:
            $nbpointsSelected6 = 'selected';
            break;
        case '9':
            $nbpointsSelected9 = 'selected';
            break;
    }



    }
    else{
        $duelLogin = '';
        $isDuel = 'false';

    }


if(isset($_GET['duel']) AND intval($_GET['duel']) >= 1){
    $showDuel = (isset($_GET['duel']) AND intval($_GET['duel']) >= 1) ? '' : 'hidden';
}

