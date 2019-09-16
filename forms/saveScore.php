<?php

$data = $_POST;

if($member->isIdentify()) {

    $scoreManager = new ScoreManager();
    $score = new score($data);


    $score->setIdPlayer($member->getID());


    //echo id of duel, or 'ok' for normal game
    if (isset($_SESSION['duel']['id']) AND $_SESSION['duel']['id'] != ''){
        $score->setDuel(true);
        $score->setIdPlayer2($_SESSION['duel']['id']);
        $idDuel = $scoreManager->saveDuel($score);

        $memberManager = new MemberManager();
        $memberDuel = $memberManager->getMember($_SESSION['duel']['id']);

        $mail= [];
        $mail['message'] = 'Bonjour '.$memberDuel->getLogin().', <br>
Tu as été provoqué en duel par '.$member->getLogin().'. Feras-tu mieux ?<br>
<a href="'.HOST.'game?duel='.$idDuel.'"><button>Defend ton honneur !</button></a>';

        $mail['recipient'] = $memberDuel->getMailAdress();
        $mail['subject'] = 'Blue point : Duel !';
        $mail = new Mail($mail);
        $mail->sendMail();


        echo $idDuel;
    }
    elseif (isset($_SESSION['duel']['idBack']) AND $_SESSION['duel']['idBack'] != ''){
        $score->setId($_SESSION['duel']['idBack']);

        $memberManager = new MemberManager();
        $memberDuel = $memberManager->getplayer2($score->getId());

        $mail= [];
        $mail['message'] = 'Bonjour '.$memberDuel->getLogin().', <br>
Un duel est terminé.<br>
<a href="'.HOST.'duelEnd?id='.$score->getId().'"><button>Qui a gagné ?</button></a>';

        $mail['recipient'] = $memberDuel->getMailAdress();
        $mail['subject'] = 'Blue point : Duel !';
        $mail = new Mail($mail);
        $mail->sendMail();


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

die();


