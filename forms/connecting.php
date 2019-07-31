<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 15:49
 */

$_SESSION['errors'] = [];
if ($member->getIdentify()== true){
    redirection('home');
}


if (!isset($_POST['login']) OR $_POST['login'] == ''){
    $_SESSION['errors']['login'] = true;
}

if (!isset($_POST['password']) OR $_POST['password'] == ''){
    $_SESSION['errors']['password'] = true;
}


if (!isset($_POST)){
    $_SESSION['errors']['login'] = true;
    $_SESSION['errors']['password'] = true;

    redirection('connexion');
}

if($_SESSION['errors'] !== []){
    redirection('connexion');
}

$login = htmlspecialchars($_POST['login']);
$password = $_POST['password'];


$memberAdministrator= new MemberManager();

if ($memberAdministrator->connectionLogin($login, $password) == false){

    $_SESSION['errors']['connexion'] = true;
    redirection('connexion');
}
else{
    redirection('compte');
}
