<?php


class Score
{
    private $_id;
    private $_score;
    private $_idPlayer;
    private $_login;
    private $_duree;//Durée de la partie
    private $_nbPoints;
    private $_difficulty;
    private $_timestamp;
    private $_duel;
    private $_idPlayer2;
    private $_login2;
    private $_score2;
    private $_dateProvocation;
    private $_dateBack;
    private $_errors;



    public function __construct($data)
    {
   //player 2
            if(isset($data['idPlayer2'])){
                $this->setIdPlayer2($data['idPlayer2']);
            }
            else{
                $this->_errors[] = 'idPlayeur2';
            }

            if(isset($data['scorePlayer2'])){
                $this->setScore2($data['scorePlayer2']);
            }
            else{
                $this->setScore2('xx');
                $this->_errors[] = 'score2';
            }

            if(isset($data['duel'])){
                $this->setDuel($data['duel']);
            }
            else{
                $this->setDuel(false);
                $this->_errors[] = 'duel';
            }

            if(isset($data['dateDuel'])){
                $this->setDateProvocation($data['dateDuel']);
            }
            else{
                $this->_errors[] = 'dateDuel';
            }

            if(isset($data['dateBack'])){
                $this->setDateBack($data['dateBack']);
            }
            else{
                $this->setDateBack('xxxx-xx-xx xx:xx:xx ');
                $this->_errors[] = 'dateBack';
            }

            if(isset($data['login2'])){
                $this->setLogin2($data['login2']);
            }
            else{
                $this->_errors[] = 'login2';
            }
  //end player2

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
            $this->setScore(0);
            $this->_errors[] = 'score';
        }
        if(isset($data['scorePlayer1'])){
            $this->setScore($data['scorePlayer1']);
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
            $this->_errors[] = 'login';
        }

        if(isset($data['duree'])){
            $this->setDuree($data['duree']);
            }
        else{
            $this->setDuree(30);
            $this->_errors[] = 'duree';
        }

        if(isset($data['nbPoints'])){
            $this->setNbPoints($data['nbPoints']);
        }
        else{
            $this->setNbPoints(3);
            $this->_errors[] = 'nbPoints';
        }


        if(isset($data['difficulty'])){
            $this->setDifficulty($data['difficulty']);
            }
        else{
            $this->setDifficulty(1);
            $this->_errors[] = 'difficulty';
        }

        if(isset($data['timestamp'])){
            $this->setTimestamp($data['timestamp']);
            }
        else{
            $this->_errors[] = 'timestamp';
        }

        if(isset($data['dateProvocation'])){
            $this->setDateProvocation($data['dateProvocation']);
            }
        else{
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

    public function setTimestamp(string $timestamp)
    {
        $this->_timestamp = $timestamp;
    }

    public function setDuel(bool $duel)
    {
        $this->_duel = $duel;
    }

    public function setDuree(int $duree)
    {
        $this->_duree = $duree;
    }

    public function setNbPoints(int $nbpoints){

        if($nbpoints ==3 OR $nbpoints == 6 OR $nbpoints ==9){
            $this->_nbPoints = $nbpoints;
        }
        else{
            $this->_nbPoints = 3;
            $this->_errors[] = 'nbPoints';
        }
}

    public function setIdPlayer2(int $idPlayer2)
    {
        $this->_idPlayer2 = $idPlayer2;
    }

       public function setLogin2(string $login2){
           $this->_login2 = $login2;
       }

    public function setScore2($score2)
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

    public function getNbPoints():int{
        return $this->_nbPoints;
    }

    public function getDifficulty():int
    {
        return htmlspecialchars($this->_difficulty);
    }

    public function getDifficultyClass():string
    {
        switch ($this->_difficulty) {
            case 1:
                return 'facile';
                break;
            case 2:
                return 'moyen';
                break;
            case 3:
                return 'difficile';
                break;
            default:
                return 'error';
        }

    }

    public function getTimestamp():string {
        return $this->_timestamp;
    }

    public function isDuel(): bool
    {
        return $this->_duel;
    }

    public function getIdPlayer2():int
    {
        return $this->_idPlayer2;
    }

    public function getScore2()
    {
        return htmlspecialchars($this->_score2);
    }

    public function getDateProvocation():string
    {
        return $this->_dateProvocation;
    }

    public function getDateBack()
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