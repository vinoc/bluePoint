<?php



$login = trim($_POST['login']);
$mail=trim($_POST['mail']);
$password=$_POST['password'];

$passwordVerification=$_POST['passwordVerification'];

//$bdd = new BDD;
//$bdd=$bdd->_bdd

$_SESSION['errors']= [];

if (empty($login)){
    $_SESSION['errors']['login'] = 'Merci de renseigner votre login';
}
if (empty($mail)){
    $_SESSION['errors']['mail'] = 'Merci de renseigner votre E-Mail';
}
if (empty($password)){
    $_SESSION['errors']['password'] = 'Merci de renseigner votre mot de passe';
}
if( $password !== $passwordVerification){
    $_SESSION['errors']['passwordVerification'] = 'Vos mots de passe ne correspondent pas.';
}

if( !empty($_SESSION['errors']))
{
    redirection('inscription');
}

$memberManager = new MemberManager();

if($memberManager->noDoubleMember($login, $mail) == false){

    $newMember = new Member([]);
    $newMember->setLogin($login);
    $newMember->setMailAdress($mail);
    $newMember->setPermission('Member');
    $newMember->setPassword($password);

    $memberManager->newMember($newMember);

    $memberManager->connectionLogin($login, $password);
    redirection('compte');
}
else{
    redirection('inscription');
}

?>