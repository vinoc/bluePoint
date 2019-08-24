<?php
if($_SESSION['duel'] ===[]){
    //redirection('duel');
}

if(!isset($_GET['id']) OR intval($_GET['id']) <=0) {
    //redirection('duel');
    echo 'redirection';
}
else{
    $scoreManager = new ScoreManager();
    $score = $scoreManager->onetDuel($_GET['id']);
}




$_SESSION['duel'] = [];

echo $header;


require(PARTIAL_PATH.'_duelEnd.phtml');