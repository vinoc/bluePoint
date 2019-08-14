<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 15:46
 */


$errorLogin = (isset($_SESSION['errors']['login']) AND $_SESSION['errors']['login'] == true ) ? 'Merci de saisir un login' : '';

$errorPassword = (isset($_SESSION['errors']['password']) AND $_SESSION['errors']['password'] == true ) ? 'Merci de saisir un Mot de passe' : '';

$errorConnexion = (isset($_SESSION['errors']['connexion']) AND $_SESSION['errors']['connexion'] == true ) ? 'Login ou mot de passe incorrect' : '';

unset($_SESSION['errors']);

echo $header;

require(PARTIAL_PATH.'_connexion.phtml');