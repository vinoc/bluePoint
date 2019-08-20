<?php

memberOnly($member, 'home');


$memberUpdate = new Member($_POST);

if(isset($_POST['passwordNew']) AND $_POST['passwordNew']!== ''){
    if(isset($_POST['passwordNewVerif']) AND $_POST['passwordNewVerif'] == $_POST['passwordNew']) {

        if(!password_verify($_POST['password'], $member->getPassword())){
            $_SESSION['errors']['update'] = 'L\'ancien mot de passe ne correspond pas';
            redirection('compte');
        }
        $memberUpdate->setPassword($_POST['passwordNewVerif']);
    }
    else{
        $_SESSION['errors']['update'] = 'Les mots de passe ne correspondent pas';
        redirection('compte');
    }
    echo 1;
}


$memberManager = new MemberManager();
$_SESSION['errors']['update']=($memberManager->MemberUpdate($member, $memberUpdate))? 'Information mises à jours' : 'Une erreur est survenu veuillez retenter plus tard';
redirection('compte');
