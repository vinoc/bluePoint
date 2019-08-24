<?php
if($member->isIdentify()){
    redirection('home');
}

echo $header;

require (PARTIAL_PATH.'_'.$openingPage.'.phtml');