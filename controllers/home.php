<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 13:48
 */

$bddJoueurs = bdd();
$bddPersonnages = bdd();

$requestJoueur = $bddJoueurs->query('SELECT * FROM members');


//TODO Créer BDD compatible (joueurs et perso avec le même ID actuellement 1-12-14-15)



//Prepare the view
echo $header;

require(PARTIAL_PATH.'_home.php');
?>