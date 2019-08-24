<?php
$login = (isset($_POST['login']))? $_POST['login']: '';
$mailAdress= (isset($_POST['mailAdress']))? $_POST['mailAdress']: '';

$memberManager = new MemberManager();
$distractedUser = new Member([]);
if($login !=''){
    $distractedUser = $memberManager->getMemberByLogin($login);
}

if($mailAdress != ''){
    $distractedUser = $memberManager->getMemberByMailAdress($mailAdress);
}

if( $distractedUser->getID() !=null ){

}
debug($distractedUser);