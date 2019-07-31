<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 13:48
 */

$scoreManager= new ScoreManager();
$bestScores = $scoreManager->bestScores(random_int(1,3));

//Prepare the view
echo $header;

require(PARTIAL_PATH.'_home.php');






?>