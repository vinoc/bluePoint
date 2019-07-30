<?php

/**
 * @return PDO
 */
function bdd()
{
    $bddDomaine = BDD_DOMAINE;
    $bddNom = BDD_NOM;
    $bddLogin = BDD_LOGIN;
    $bddMDP = BDD_MDP;
    $bddHost= "mysql:host=$bddDomaine;dbname=$bddNom;charset=utf8";

    try {
        $bdd = new PDO($bddHost, $bddLogin, $bddMDP, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch (exeption $e){
        die('erreur : ' . $e->$getmessage());

    }

}

function recupererErreur($nomDuChamp)
{
    if (empty($_SESSION['errors'][$nomDuChamp]))
    {
        return '';
    }

    $error=  $_SESSION['errors'][$nomDuChamp];
    unset($_SESSION['errors'][$nomDuChamp]);
    return $error;
}


function connecting()
{
    if (isset($_SESSION['member'])) {
        return new Member($_SESSION['member']);
    }
    /* 1234 == ID   1235 == passtemp */
    elseif (isset($_COOKIE['1234']) AND isset($_COOKIE['1235'])) {
        $id = htmlspecialchars($_COOKIE['1234']);
        $passwordtemp= htmlspecialchars($_COOKIE['1235']);
        $memberAdministrator= new MemberAdministrator();
        return $memberAdministrator->connexionCookie($id,$passwordtemp);
    }
    else{
        return new Member([]);
    }

}





function chargerClasse($classe)
{
    require 'class/' .ucfirst ($classe) .'.php'; // On inclut la classe correspondante au paramètre passé. Le fichier doit porter le nom de la class qu'il contient !
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.




function redirection($destination)
{
    header("location: $destination");
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
        return false;
    }
    else{
        return true;
    }
}
?>