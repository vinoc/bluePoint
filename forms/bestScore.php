<?php
if($member->isIdentify()) {
    $difficulty = (isset($_POST['difficulty']) AND 0 < $_POST['difficulty'] AND $_POST['difficulty'] < 4) ? $_POST['difficulty'] : die();

    $nbPoints = (isset($_POST['nbPoints']) AND ($_POST['nbPoints'] == 3 OR $_POST['nbPoints'] == 6 OR $_POST['nbPoints'] == 9)) ? $_POST['nbPoints'] : die();


    $scoreManager = new ScoreManager();

    //echo int only, don't display the error message if an error occurs
    echo $scoreManager->myBestScore($member->getID(), $difficulty, $nbPoints)[0];
}
die();