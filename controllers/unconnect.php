<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 01/02/2019
 * Time: 14:46
 */

unset($_SESSION['member']);
setcookie('1234', $member->getID(), time() -1, '/', $_SERVER['HTTP_HOST'], false, true);
setcookie('1235', $member->getPasswordTemp(), time() -1, '/', $_SERVER['HTTP_HOST'], false, true);

redirection('home');