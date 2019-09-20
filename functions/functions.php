<?php

/**
 * @return PDO
 */

function getErrors(string $nomDuChamp):string
{
    if (empty($_SESSION['errors'][$nomDuChamp]))
    {
        return '';
    }

    $error=  $_SESSION['errors'][$nomDuChamp];
    unset($_SESSION['errors'][$nomDuChamp]);
    return $error;
}


function connecting():object
{
    if (isset($_SESSION['member'])) {
        return new Member($_SESSION['member']);
    }
    /* 1234 == ID   1235 == passtemp */
    elseif (isset($_COOKIE['1234']) AND isset($_COOKIE['1235'])) {
        $id = htmlspecialchars($_COOKIE['1234']);
        $passwordtemp= htmlspecialchars($_COOKIE['1235']);
        $memberAdministrator= new MemberManager();
        return $memberAdministrator->connexionCookie($id,$passwordtemp);
    }
    else{
        return new Member([]);
    }
}


function chargeClasse($classe)
{
    require 'class/' .ucfirst ($classe) .'.php';
}

spl_autoload_register('chargeClasse');


function redirect($location)
{
    header("location: ".HOST."$location");
    die();
}


function debug($variable, $die = 0)
{
    var_dump($variable);

    if ($die == 1){
        die();
    }
    else
        echo "<br />";
}


function devOrProd(): bool
{
    if(STATE_DEV == "dev"){
        return true;
    }
    else{
        return false;
    }
}


function scoreRandom():array
{
    $tab['niveau'] = random_int(1,3);
    $tab['nbPoints'] = random_int(1,3)*3;
    return $tab;
}


function memberOnly(object $member, string $redirection){
    if($member->getPermission() == 'visitor'){
        redirect($redirection);
    }
}


function errorPHP($err_severity, $err_msg, $err_file, $err_line, array $err_context){
    if(devOrProd()) {
        echo '<div class="error"><p> erreur N°' . $err_severity . '</p>
        <p>Message: ' . $err_msg . '</p>
        <p>fichier: ' . $err_file . '</p>
        <p>ligne: ' . $err_line . '</p>
        </div>';
    }
}
?>