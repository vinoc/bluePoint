<?php

if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
    //Lien externe (ex: 127.0.0.1/blog )
    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/bluePoint/';
//Lit l'arborescence interne au serveur (ex: c://wamp64/www/...etc )
    $racine_srv = $_SERVER['DOCUMENT_ROOT'] . '/bluePoint/';
    $stateDev = 'dev';
} else {
    $host = 'https://' . $_SERVER['HTTP_HOST'] . '/cheezpa/bluePoint/';
    $racine_srv = $_SERVER['DOCUMENT_ROOT'] . '/cheezpa/bluePoint/';
    $stateDev = 'prod';
}


$functions_path = $racine_srv . 'functions/';
$functions_URL = $host . 'functions/';

$controller_path = $racine_srv . 'controllers/';
$controller_URL = $host . 'controllers/';

$partial_path = $racine_srv . 'partial/';
$partial_url = $host . 'partial/';

$class_path = $racine_srv . 'class/';

$form_path = $racine_srv . 'forms/';
$form_URL = $host . 'forms/';

$css_path = $racine_srv . 'css/';
$css_url = $host . 'css/';

$js_url = $host . 'js/';

$img_url = $host . '/img/';

$avatar_url = $img_url . 'avatar/';

// constante:
define("HOST", $host);
define("RACINSRV", $racine_srv);

define("FUNCTIONS_PATH", $functions_path);
define("FUNCTIONS_URL", $functions_URL);

define("CONTROLLER_PATH", $controller_path);
define("CONTROLLER_URL", $controller_URL);

define("PARTIAL_PATH", $partial_path);
define("PARTIAL_URL", $partial_url);

define("CLASS_PATH", $class_path);

define("FORM_PATH", $form_path);
define("FORM_URL", $form_URL);

define("CSS_PATH", $css_path);
define("CSS_URL", $css_url);

define("JS_URL", $js_url);

define("IMAGE_URL", $img_url);
define("AVATAR_URL", $avatar_url);

define("STATE_DEV", $stateDev);


// BDD

if ($_SERVER['HTTP_HOST'] == '127.0.0.1' OR $_SERVER['HTTP_HOST'] == 'localhost') {
    $bddDomaine = 'localhost';
    $bddNom = 'bluePoint';
    $bddLogin = 'root';
    $bddMDP = '';
} else {
    include_once '../../bdd/bdd.php';
}

// Constante pour la BDD
define("BDD_DOMAINE", $bddDomaine);
define("BDD_NOM", $bddNom);
define("BDD_LOGIN", $bddLogin);
define("BDD_MDP", $bddMDP);

