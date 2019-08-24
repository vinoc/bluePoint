<?php


$data = $_POST;

if($member->isIdentify()){

    $scoreManager = new ScoreManager();
    $score = new score($data);


    $score->setIdPlayer($member->getID());

    //echo id of duel, or 'ok' for normal game
    if(isset($_SESSION['duel']['id']) AND $_SESSION['duel']['id'] != ''){
        $score->setDuel(true);
        $score->setIdPlayer2($_SESSION['duel']['id']);
        echo  $scoreManager->saveDuel($score);
    }
    elseif (isset($_SESSION['duel']['idBack']) AND $_SESSION['duel']['idBack'] != ''){
        $score->setId($_SESSION['duel']['idBack']);
        echo $scoreManager->updateDuel($score);
    }
    else{
        $scoreManager->saveScore($score);
        echo 'ok';
    }

}
else{
    echo 'ok';
}


