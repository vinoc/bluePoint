<?php

$memberManager = new MemberManager();
if (!isset($_GET['id']) OR intval($_GET['id']) < 1) {
    $myPage = 'hidden';
    $playerPage = $memberManager->getMember(1);
}
else {
    $myPage = (intval($_GET['id']) == intval($member->getID())) ? '' : 'hidden';
    $playerPage = $memberManager->getMember($_GET['id']);

}

$scoreManager = new ScoreManager();
$duelListeAll = $scoreManager->myDuels($playerPage->getID());

$myScores = $scoreManager->myScores($_GET['id']);