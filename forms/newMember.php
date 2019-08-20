<?php



$login = trim($_POST['login']);
$mail=trim($_POST['mail']);
$password=$_POST['password'];

$passwordVerification=$_POST['passwordVerification'];

$bdd = bdd();

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


$req_antiDoublon = $bdd ->prepare('Select login, mailAdress FROM members WHERE login= ? OR mailAdress = ? ');
$req_antiDoublon -> execute([$login,$mail]);
$antiDoublon= $req_antiDoublon->fetch();

if(!empty($antiDoublon)){
    if ($antiDoublon['login'] == $login)
    {
        $_SESSION['errors']['login'] = "Ce login est déjà pris ";
    }
    if ($antiDoublon['mail'] == $mail )
    {
        $_SESSION['errors']['mail'] =" Un compte existe déjà avec cette adresse mail.";
    }
    redirection('inscription');
}

$member = new Member([]);
$member->setLogin($login);
$member->setMailAdress($mail);
$member->setPermission('Member');
$member->setPassword($password);

$memberManager = new MemberManager();
$memberManager->newMember($member);

$memberManager->connectionLogin($login, $password);
redirection('compte');

?>