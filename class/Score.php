<?php


class Score
{
    private $_id;
    private $_score;
    private $_idPlayer;
    private $_login;
    private $_duree;//Durée de la partie
    private $_difficulty;
    private $_duel;
    private $_idPlayer2;
    private $_login2;
    private $_score2;
    private $_dateProvocation;
    private $_dateBack;
    private $_errors;



    public function __construct($data)
    {

        if(!isset($data['duel']) OR $data['duel']==false){
            $this->_idPlayer2= null;
            $this->_score2 = null;
            $this->_duel = false;
            $this->_dateProvocation= null;
            $this->_dateBack = null;
            $this->_login2 = null;
        }else{
            if(isset($data['idPlayer2'])){
                $this->setIdPlayer2($data['idPlayer2']);
            }
            else{
                $this->setIdPlayer2(null);
                $this->_errors[] = 'idPlayeur2';
            }

            if(isset($data['score2'])){
                $this->setScore2($data['score2']);
            }
            else{
                $this->setScore2(null);
                $this->_errors[] = 'score2';
            }

            if(isset($data['duel'])){
                $this->setDuel($data['duel']);
            }
            else{
                $this->setDuel(false);
                $this->_errors[] = 'duel';
            }

            if(isset($data['dateProvocation'])){
                $this->setDateProvocation($data['dateProvocation']);
            }
            else{
                $this->setDateProvocation(null);
                $this->_errors[] = 'dateProvocation';
            }

            if(isset($data['dateBack'])){
                $this->setDateBack($data['dateBack']);
            }
            else{
                $this->setDateBack(null);
                $this->_errors[] = 'dateBack';
            }

            if(isset($data['login2'])){
                $this->setLogin2($data['login2']);
            }
            else{
                $this->setLogin2(null);
                $this->_errors[] = 'login2';
            }
        }

        if(isset($data['id'])){
            $this->setId($data['id']);
            }
        else{
            $this->setId(0);
            $this->_errors[] = 'id';
        }

        if(isset($data['score'])){
            $this->setScore($data['score']);
            }
        else{
            $this->setScore(null);
            $this->_errors[] = 'score';
        }

        if(isset($data['idPlayer'])){
            $this->setIdPlayer($data['idPlayer']);
            }
        else{
            $this->setIdPlayer(0);
            $this->_errors[] = 'idPlayer';
        }

        if(isset($data['login'])){
            $this->setLogin($data['login']);
        }
        else{
            $this->setLogin(0);
            $this->_errors[] = 'login';
        }

        if(isset($data['duree'])){
            $this->setDuree($data['duree']);
            }
        else{
            $this->setDuree(30);
            $this->_errors[] = 'duree';
        }

        if(isset($data['difficulty'])){
            $this->setDifficulty($data['difficulty']);
            }
        else{
            $this->setDifficulty(0);
            $this->_errors[] = 'difficulty';
        }

        if(isset($data['dateProvocation'])){
            $this->setDateProvocation($data['dateProvocation']);
            }
        else{
            $this->setDateProvocation('');
            $this->_errors[] = 'dateProvocation';
        }
    }

//SETTEUR
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    public function setScore(int $score)
    {
        $this->_score = $score;
    }

    public function setIdPlayer(int $idPlayer)
    {
        $this->_idPlayer = $idPlayer;
    }

    public function setLogin(string $login){
        $this->_login = $login;
    }

    public function setDifficulty(int $difficulty)
    {
        $this->_difficulty = $difficulty;
    }

    public function setDuel(bool $duel)
    {
        $this->_duel = $duel;
    }

    public function setDuree(int $duree)
    {
        $this->_duree = $duree;
    }

    public function setIdPlayer2(int $idPlayer2)
    {
        $this->_idPlayer2 = $idPlayer2;
    }

       public function setLogin2(string $login2){
           $this->_login2 = $login2;
       }

    public function setScore2(int $score2)
    {
        $this->_score2 = $score2;
    }

    public function setDateProvocation(string $dateProvocation)
    {
        $this->_dateProvocation = $dateProvocation;
    }

    public function setDateBack(string $dateBack)
    {
        $this->_dateBack = $dateBack;
    }

//GETTEUR

    public function getId():int
    {
        return $this->_id;
    }

    public function getScore():int
    {
        return htmlspecialchars($this->_score);
    }

    public function getIdPlayer():int
    {
        return $this->_idPlayer;
    }

    public function getDuree():int
    {
        return htmlspecialchars($this->_duree);
    }

    public function getDifficulty():int
    {
        return htmlspecialchars($this->_difficulty);
    }

    public function isDuel(): bool
    {
        return $this->_duel;
    }

    public function getIdPlayer2():int
    {
        return $this->_idPlayer2;
    }

    public function getScore2():int
    {
        return htmlspecialchars($this->_score2);
    }

    public function getDateProvocation():int
    {
        return $this->_dateProvocation;
    }

    public function getDateBack():int
    {
        return $this->_dateBack;
    }

    public function getErrors():int
    {
        return $this->_errors;
    }

    public function getLogin()
    {
        return htmlspecialchars($this->_login);
    }
    public function getLogin2()
    {
        return htmlspecialchars($this->_login2);
    }








}