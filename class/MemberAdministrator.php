<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 23/04/2018
 * Time: 15:50
 */

class MemberAdministrator
{
    private $id;
    protected $bdd;

    public function __construct()
    {
        $this->bdd = bdd();


    }



    public function connectionLogin(string $login,string $password){
        if ($login !== '0' OR $password !== '0') {

            $req = $this->bdd;
            $resultat = $req->prepare('SELECT * FROM members WHERE login = ?');
            $resultat->execute([$login]);
            $data = $resultat->fetch(PDO::FETCH_ASSOC);

            if($data == false){
                return false;
            }

            $member= new Member($data);

            //if password work's, continue
            if (!password_verify( $password, $member->getPassword())) {
                return false;
            }



            $member->setPasswordTemp(uniqid('', true));
            $this->memberUpdatePasswordTemp($member);



            setcookie('1234', $member->getID(), time() + 30 * 24 * 3600, '/', $_SERVER['HTTP_HOST'], false, true);
            setcookie('1235', $member->getPasswordTemp(), time() + 30 * 24 * 3600, '/', $_SERVER['HTTP_HOST'], false, true);

            $_SESSION['member'] = $data;

            return $member;



        }
        else{

            return false;
        }


    }



    public function connexionCookie(int $id,string $passwordTemp):object
    {

        if ($id !== '0' OR $passwordTemp !== '0') {

            $req = $this->bdd;
            $resultat = $req->prepare('SELECT * FROM members WHERE id = ? AND passwordTemp = ?');
            $resultat->execute([$id, $passwordTemp]);
            $data= $resultat->fetch(PDO::FETCH_ASSOC);
            if($data ==false){
                return new Member([]);
            }


            $member= new Member($data);
            $_SESSION['member'] = $data;

            return new Member($data);
        }
        else{
            return new Member([]);
        }

    }



    public function newMember(object $member):bool
    {
        if ($member->getIdentify() !== false){
            return false;
        }
        else{
            $password = password_hash($member->getPassword(),PASSWORD_DEFAULT);
            $saveNewMember = $this->bdd->prepare('INSERT INTO members (login, mailAdress, password, permission, first_Date) VALUE (?, ?, ?, ?, ?)');
            return $saveNewMember->execute([$member->getLogin(), $member->getMailAdress(), $password, $member->getPermission(), date("d-m-y H:i:s")]);

        }

    }

    public function memberUpdatePasswordTemp(object $member):bool{
        $req = $this->bdd;
        $update = $req->prepare('UPDATE members SET passwordTemp = ? WHERE id = ?');
        return  $update->execute([$member->getPasswordTemp(), $member->getID()]);;
    }



}