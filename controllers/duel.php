<?php
if(!$member->isIdentify()){
    $myBestScore = '<a href="connexion" class="button">Connexion requise</a>';
}
else {
    $memberManager = new MemberManager();
    $members = $memberManager->randomMembers();
    $scoreManager = new ScoreManager();
    $scores = [];
    foreach ($members as $user){
        $scores[$user->getId()] = $scoreManager->allMyBestsScores($user->getId());
    }

}





echo $header;

require PARTIAL_PATH.'_duel.phtml';
