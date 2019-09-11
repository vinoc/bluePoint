<?php
if(!$member->isIdentify()){
   redirection('connexion');
}
else {
    $memberManager = new MemberManager();
    $members = $memberManager->randomMembers();

    $scoreManager = new ScoreManager();
    $scores = [];
    foreach ($members as $user){
        $scores[$user->getId()] = $scoreManager->allMyBestsScores($user->getId());
    }

    $duelScores = $scoreManager->myWaitingDuel($member->getID());
}

