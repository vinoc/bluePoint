<?php
if($_SESSION['duel'] ==[]){
    redirection('duel');
}
$duelLogin = $_SESSION['duel']['login'];
$duelScore = $_SESSION['duel']['score'];

$_SESSION['duel'] = [];

echo $header;


require(PARTIAL_PATH.'_duelEnd.phtml');