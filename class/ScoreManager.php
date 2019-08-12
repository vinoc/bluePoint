<?php


class ScoreManager
{
    private $_bdd;

    public function __construct(){
        $this->_bdd = bdd();
    }

    public function bestScores($difficulty):array
    {
        $difficulty=(isset($difficulty) AND 0< $difficulty AND $difficulty <4 )? $difficulty: 1;
        $req = $this->_bdd->prepare('SELECT scores.id, scores.idPlayer as idPlayer, members.login as login, scores.score as score FROM `scores` INNER JOIN members ON members.id = scores.idPlayer WHERE `difficulty` = ?  ORDER BY `scores`.`score` DESC LIMIT 10 ');
        $req->execute([$difficulty]);

        $tab = $req->fetchAll();
        $scores=[];
        foreach ($tab as $element){
            $scores[] = new Score($element);
        }
        return $scores;
    }

    public function bestScoresOfWeek(int $difficulty):array
    {
        $dateLessWeek= $dateLessMonth= date("Y-m-d h:m:s", strtotime("-1 week"));
        $difficulty=(isset($difficulty) AND 0< $difficulty AND $difficulty <4 )? $difficulty: 1;
        $req = $this->_bdd->prepare('SELECT scores.idPlayer, members.login, scores.score, scores.timestamp FROM `scores` INNER JOIN members ON members.id = scores.idPlayer WHERE `difficulty` = ? AND `timestamp` >= ? ORDER BY `scores`.`score` DESC LIMIT 10 ');
        $req->execute([$difficulty, $dateLessWeek]);

        $tab = $req->fetchAll();
        $scores=[];
        foreach ($tab as $element){
            $scores[] = new Score($element);
        }
        return $scores;


    }

    public function bestScoresOfMonth(int $difficulty):array
    {
        $dateLessMonth= date("Y-m-d h:m:s", strtotime("-1 month"));
        $difficulty=(isset($difficulty) AND 0< $difficulty AND $difficulty <4 )? $difficulty: 1;
        $req = $this->_bdd->prepare('SELECT scores.idPlayer, members.login, scores.score, scores.timestamp FROM `scores` INNER JOIN members ON members.id = scores.idPlayer WHERE `difficulty` = ? AND `timestamp` >= ? ORDER BY `scores`.`score` DESC LIMIT 10 ');
        $req->execute([$difficulty, $dateLessMonth]);

        $tab = $req->fetchAll();
        $scores=[];
        foreach ($tab as $element){
            $scores[] = new Score($element);
        }
        return $scores;


    }

    public function saveScore($score){
        $req= $this->_bdd->prepare('INSERT INTO `scores`( `idPlayer`, `score`, `difficulty`) VALUES (:idPlayer, :score, :difficulty)');
        $req->bindValue(':idPlayer', $score->getIdPlayer(), PDO::PARAM_INT);
        $req->bindValue(':score', $score->getScore(), PDO::PARAM_INT);
        $req->bindValue(':difficulty', $score->getDifficulty(), PDO::PARAM_INT);

        return $req->execute();

    }

    public function saveDuel($score)
    {
        if (!$score->isDuel()) {
            return false;
        }

        $req = $this->_bdd->prepare('INSERT INTO `duels`( `idPlayer1`, `idPlayer2`, `scorePlayer1`, `difficulty`) VALUES (:idPlayer1,:idPlayer2, :scorePlayer1, :diffuculty)');
        $req->bindValue(':idPlayer1', $score->_idPlayer(), PDO::PARAM_INT);
        $req->bindValue(':idPlayer2', $score->_idPlayer2(), PDO::PARAM_INT);
        $req->bindValue(':score', $score->getScore(), PDO::PARAM_INT);
        $req->bindValue(':difficulty', $score->getDifficulty(), PDO::PARAM_INT);

        return $req->execute();

    }

    public function myBestScore($id){
        $req = $this->_bdd->prepare('SELECT score FROM `scores` WHERE idPlayer= :idPlayer ORDER BY score DESC LIMIT 1 ');
        $req->bindValue(':idPlayer', $id, PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }
}