<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 01/02/2019
 * Time: 14:46
 */

$_SESSION=[];
unset($_SESSION);
setcookie('1234', '1', time() -1, '/', $_SERVER['HTTP_HOST'], false, true);
setcookie('1235', '1', time() -1, '/', $_SERVER['HTTP_HOST'], false, true);

redirection('home');