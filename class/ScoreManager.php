<?php


class ScoreManager extends BDD
{

    public function bestScores(int $difficulty, int $nbPoints):array
    {
        $difficulty=(isset($difficulty) AND 0< $difficulty AND $difficulty <4 )? $difficulty: 1;
        $nbPoints=(isset($nbPoints) AND($nbPoints==3 OR $nbPoints ==6 OR $nbPoints==9 ))? $nbPoints: 3;
        $req = $this->_bdd->prepare('SELECT scores.id, scores.idPlayer as idPlayer, members.login as login, scores.score as score, scores.nbPoints as nbPoints FROM `scores` INNER JOIN members ON members.id = scores.idPlayer WHERE `difficulty` = ? AND scores.nbPoints = ?  ORDER BY `scores`.`score` DESC LIMIT 10 ');
        $req->execute([$difficulty, $nbPoints]);

        $tab = $req->fetchAll();
        $scores=[];
        foreach ($tab as $element){
            $scores[] = new Score($element);
        }
        return $scores;
    }

    public function bestScoresOfWeek(int $difficulty, int $nbPoints):array
    {
        $dateLessWeek= $dateLessMonth= date("Y-m-d h:m:s", strtotime("-1 week"));
        $difficulty=(isset($difficulty) AND 0< $difficulty AND $difficulty <4 )? $difficulty: 1;
        $req = $this->_bdd->prepare('SELECT scores.idPlayer, members.login, scores.score, scores.timestamp FROM `scores` INNER JOIN members ON members.id = scores.idPlayer WHERE `difficulty` = ? AND `timestamp` >= ? AND scores.nbPoints = ? ORDER BY `scores`.`score` DESC LIMIT 10 ');
        $req->execute([$difficulty, $dateLessWeek, $nbPoints]);

        $tab = $req->fetchAll();
        $scores=[];
        foreach ($tab as $element){
            $scores[] = new Score($element);
        }
        return $scores;


    }

    public function bestScoresOfMonth(int $difficulty, int $nbPoints):array
    {
        $dateLessMonth= date("Y-m-d h:m:s", strtotime("-1 month"));
        $difficulty=(isset($difficulty) AND 0< $difficulty AND $difficulty <4 )? $difficulty: 1;
        $req = $this->_bdd->prepare('SELECT scores.idPlayer, members.login, scores.score, scores.timestamp FROM `scores` INNER JOIN members ON members.id = scores.idPlayer WHERE `difficulty` = ? AND `timestamp` >= ? AND scores.nbPoints = ?  ORDER BY `scores`.`score` DESC LIMIT 10 ');
        $req->execute([$difficulty, $dateLessMonth, $nbPoints]);

        $tab = $req->fetchAll();
        $scores=[];
        foreach ($tab as $element){
            $scores[] = new Score($element);
        }
        return $scores;


    }

    public function saveScore($score){
        $req= $this->_bdd->prepare('INSERT INTO `scores`( `idPlayer`, `score`, `difficulty`,`nbPoints` ) VALUES (:idPlayer, :score, :difficulty, :nbPoints)');
        $req->bindValue(':idPlayer', $score->getIdPlayer(), PDO::PARAM_INT);
        $req->bindValue(':score', $score->getScore(), PDO::PARAM_INT);
        $req->bindValue(':difficulty', $score->getDifficulty(), PDO::PARAM_INT);
        $req->bindValue(':nbPoints', $score->getNbPoints(), PDO::PARAM_INT);

        return $req->execute();

    }

    public function saveDuel($score):int
    {

        $req = $this->_bdd->prepare('INSERT INTO `duels`( `idPlayer1`, `idPlayer2`, `scorePlayer1`, `difficulty`, `nbPoints`) VALUES (:idPlayer1,:idPlayer2, :scorePlayer1, :difficulty, :nbPoints)');
        $req->bindValue(':idPlayer1', $score->getIdPlayer(), PDO::PARAM_INT);
        $req->bindValue(':idPlayer2', $score->getIdPlayer2(), PDO::PARAM_INT);
        $req->bindValue(':scorePlayer1', $score->getScore(), PDO::PARAM_INT);
        $req->bindValue(':difficulty', $score->getDifficulty(), PDO::PARAM_INT);
        $req->bindValue(':nbPoints', $score->getNbPoints(), PDO::PARAM_INT);

        $req->execute();

        return $this->_bdd->lastInsertId();

    }



    public function myBestScore($id){
        $req = $this->_bdd->prepare('SELECT score FROM `scores` WHERE idPlayer= :idPlayer ORDER BY score DESC LIMIT 1 ');
        $req->bindValue(':idPlayer', $id, PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    public function myScore($id){
        $req = $this->_bdd->prepare('SELECT score, timestamp FROM `scores` WHERE idPlayer= :idPlayer ORDER BY timestamp DESC');
        $req->bindValue(':idPlayer', $id, PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll();
    }

     public function allMyBestsScores(int $id):array
     {
         $scores = [];
         for ($difficulty = 1; $difficulty < 4; $difficulty++) {

            for($nbPoints = 3; $nbPoints<10; $nbPoints+=3) {

                $req = $this->_bdd->prepare('SELECT * FROM `scores`  WHERE `idPlayer` = :id AND `difficulty` = :difficulty AND nbPoints = :nbPoints  ORDER BY `score` DESC LIMIT 1 ');

                $req->bindValue(':id', $id, PDO::PARAM_INT);
                $req->bindValue(':difficulty', $difficulty, PDO::PARAM_INT);
                $req->bindValue(':nbPoints', $nbPoints, PDO::PARAM_INT);

                 $req->execute();
                 $tab = $req->fetchAll();
                 foreach ($tab as $element) {
                     $scores[] = new Score($element);

                }

            }

        }
         return $scores;
     }

     public function myWaitingDuel(int $id):array {
        $req=$this->_bdd->prepare('SELECT duels.id, `idPlayer1`,`scorePlayer1`,`scorePlayer2`, members.login, `dateDuel`,`dateBack`,`difficulty`,`nbPoints` FROM `duels` INNER JOIN members ON members.id = `idPlayer1`
WHERE `idPlayer2`= :idPlayer2 AND ISNULL(`scorePlayer2`) = 1 ');

        $req->bindValue(':idPlayer2', $id, PDO::PARAM_INT);

        $req->execute();

        $scores=[];
        foreach ($req->fetchAll() as $value){
            $value['duel']= true;
            $scores[] = new Score($value);
        }

        return $scores;
     }

     public function myDuels(int $id):array{
        $req = $this->_bdd->prepare('SELECT members1.login, members1.id, members2.login AS login2, members2.id, duels.*  FROM `duels` 
INNER JOIN members AS members1 ON members1.id = `idPlayer1`
INNER JOIN members AS members2 ON members2.id = `idPlayer2`
WHERE `idPlayer1`= :id  OR `idPlayer2`= :id
ORDER BY `dateDuel` DESC');

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
        $data = $req->fetchAll();
        $scores=[];
        foreach ($data as $score){
            $scores[] = new Score($score);
        }

        return $scores;
     }

     public function incompletDuel(int $idDuel) {
        $req=$this->_bdd->prepare('SELECT duels.id, members.login, `scorePlayer1`, `scorePlayer2`, `difficulty`, `nbPoints`
 FROM `duels` 
INNER JOIN members ON members.id = `idPlayer1`
WHERE duels.id = :idDuel AND ISNULL(`scorePlayer2`) =1');

        $req->bindValue(':idDuel', $idDuel, PDO::PARAM_INT);

        $req->execute();
        $score= $req->fetch();

        if($score == false){
            return  false;
        }
        else {
            return new Score($score);
        }

     }

    public function onetDuel(int $idDuel) {
        $req=$this->_bdd->prepare('SELECT duels.*, members.login, membersS.login as login2
FROM `duels` 
INNER JOIN members ON members.id = `idPlayer1`
INNER JOIN members as membersS ON membersS.id=`idPlayer2`
WHERE duels.id = :idDuel');

        $req->bindValue(':idDuel', $idDuel, PDO::PARAM_INT);

        $req->execute();
        $score= $req->fetch();

        if($score == false){
            return  false;
        }
        else {
            return new Score($score);
        }

    }

     public function updateDuel(object $score){
        $req=$this->_bdd->prepare('UPDATE `duels` SET `scorePlayer2` = :scorePlayer2 , `dateBack` = :dateBack  WHERE id = :id');

        $req->bindValue(':scorePlayer2', $score->getScore(), PDO::PARAM_INT);
        $req->bindValue(':dateBack', date("Y-m-d H:i:s"));
        $req->bindValue('id', $score->getId(), PDO::PARAM_INT);

        $req->execute();

        return $score->getId();


     }




}