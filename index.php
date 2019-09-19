<?php


//call function files (include automatic class call)
require_once ('config/config.php');
require_once (FUNCTIONS_PATH.'functions.php');

//Initialise session AFTER class initialisation
session_start();

//Show error if in local (127.0.0.1||localhost)
ini_set('display_error', devOrProd());
set_error_handler('errorPHP', E_ALL);
//Preparing Member(user information)
$member = connecting();

//prepare the view
$openingPage = (isset($_GET['url']) AND !empty($_GET['url']) ) ? trim($_GET['url']) : 'home' ;
$title = $openingPage;

//calling header, but not display yet
//ob_start();
//require (CONTROLLER_PATH.'header.php');
//$header = ob_get_clean();

if (file_exists(CONTROLLER_PATH.''.$openingPage.'.php')){
    require(CONTROLLER_PATH.''.$openingPage.'.php');
    if(file_exists(PARTIAL_PATH.'_'.$openingPage.'.phtml')){
        require (CONTROLLER_PATH.'header.php');
        require (PARTIAL_PATH.'_'.$openingPage.'.phtml');
    }
}
elseif (file_exists(PARTIAL_PATH.'_'.$openingPage.'.php') )
{
    require(PARTIAL_PATH.'_'.$openingPage.'.phtml');
}
elseif (file_exists(FORM_PATH.''.$openingPage.'.php')){
    require (FORM_PATH.''.$openingPage.'.php');
}
//elseif ($openingPage == 'js/game/workerTimer.js'){
//    require(JS_URL.'js/game/workerTimer.js');
//}
else{
    require (CONTROLLER_PATH.'header.php');
    require (PARTIAL_PATH.'_404.phtml');
}



//footer is useless on game page
if($openingPage != 'game') {
    require(PARTIAL_PATH . '_footer.phtml');
}















