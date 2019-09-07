<?php
$memberManager = new MemberManager();
if(!isset($_GET['id']) OR intval($_GET['id']) < 1){
    $playerPage = $memberManager->getMember(1);
}
else{
    $playerPage = $memberManager->getMember($_GET['id']);
}

$scoreManager = new ScoreManager();
$duelListeAll =  $scoreManager->myDuels($playerPage->getID());

echo $header;
require (PARTIAL_PATH.'_'.$openingPage.'.phtml');