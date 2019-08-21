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
$versus = (isset($_GET['id']) AND intval($_GET['id']) >= 1) ? $memberManager->getMember(intval($_GET['id'])) : false;

$scoreManager = new ScoreManager();
$duelBack = (isset($_GET['duel']) AND intval($_GET['duel']) >= 1) ? $scoreManager->oneDuel($_GET['duel']): false;

$disable = '';
if ($versus != false) {
    $showDuel = '';
    $_SESSION['duel'] = [];
    $duelLogin = 'Match en Duel contre: ' . $versus->getLogin();
    $_SESSION['duel']['id'] = $versus->getID();
    $_SESSION['duel']['login'] = $versus->getLogin();
    $isDuel = 'true';
    $score='';

}
elseif($duelBack != false){

    $showDuel = '';
//        $_SESSION['duel']['idBack'] =

    $duelLogin = 'Match retour contre '.$duelBack->getLogin().' qui a fait '. $duelBack->getScore().' points !';
    $disable = 'disabled';
//todo selectionner le bon element dans les selects

    }
    else{
        $duelLogin = '';
        $_SESSION['duel'] = '';
        $isDuel = 'false';

    }


if(isset($_GET['duel']) AND intval($_GET['duel']) >= 1){
    $showDuel = (isset($_GET['duel']) AND intval($_GET['duel']) >= 1) ? '' : 'hidden';
}


echo $header;

require PARTIAL_PATH.'_game.phtml';
