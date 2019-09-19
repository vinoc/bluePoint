<?php

if($_SESSION['duel'] ===[]){
    redirect('duel');
}

if(!isset($_GET['id']) OR intval($_GET['id']) <=0) {
    redirect('duel');
}
else{
    $scoreManager = new ScoreManager();
    $score = $scoreManager->onetDuel($_GET['id']);
}

$_SESSION['duel'] = [];