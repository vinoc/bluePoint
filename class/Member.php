<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 15/03/2018
 * Time: 15:06
 */

class Member
{
    protected $id;
    protected $login;
    protected $name;
    protected $lastName;
    protected $mailAdress;
    protected $password;
    protected $passwordTemp;
    protected $permission;
    private $errors;
    private $identify;

    const EST_ADMIN = 'admin';
    const EST_MEMBRE = 'Member';
    const EST_MODERATEUR = 'moderator';
    const EST_VISITEUR = 'visitor';


    public function __construct(array $donnees) {
        $this->errors = [];
        if (!empty($donnees)) {

            if (isset($donnees['id'])) {
                $this->setID($donnees['id']);
            }

            if (isset($donnees['login'])) {
                $this->setLogin($donnees['login']);
            }
            else{
                $this->errors[] = 'login';
            }

            if (isset($donnees['name'])){
                $this->setName($donnees['namea']);
            }
            else{
                $this->errors[] = 'name';
            }

            if (isset($donnees['lastName'])){
                $this->setLastName($donnees['lastName']);
            }
            else{
                $this->errors[] = 'lastName';
            }

            if (isset($donnees['mailAdress'])){
                $this->setMailAdress($donnees['mailAdress']);
            }
            else{
                $this->errors[] = 'adresse mail';
            }

            if (isset($donnees['password'])){
                $this->setPassword($donnees['password']);
            }
            else{
                $this->setPassword('');
                $this->errors[] = 'mot de passe';
            }

            if (isset($donnees['passwordTemp'])){
                $this->setPasswordTemp($donnees['passwordTemp']);
            }

            if (isset($donnees['permission'])){
                $this->setPermission($donnees['permission']);
            }
            else{
                $this->setPermission('visitor');
            }

            $this->identify = true;
           }
        else{
            $this->identify = false;
            $this->setPermission('visitor');

        }

}

    public function setID(int $id){
        $this->id = intval($id);

    }
    public function setLogin(string $login)
    {
        $this->login= htmlspecialchars($login);
    }
    public function setName(string $name){
        $this->name = htmlspecialchars($name);
    }
    public function setLastName(string $lastName){
        $this->lastName = htmlspecialchars($lastName);
    }
    public function setMailAdress(string $mailAdress){

        if (filter_var($mailAdress, FILTER_VALIDATE_EMAIL)){
            $this->mailAdress = htmlspecialchars($mailAdress);
            }
            else{
            $this->mailAdress =null;
            $this->errors[] = 'mailAdress';
            }
    }
    public function setPassword(string $password){
        $this->password= htmlspecialchars($password);
    }
    public function setPasswordTemp(string $passwordTemp){
        $this->passwordTemp = $passwordTemp;
    }
    public function setPermission(string $permission){
        $permission = ($permission =='admin' OR $permission == 'Member' OR $permission == 'moderator') ? $permission : 'visitor' ;
        $this->permission = $permission;
    }
    public function setIdentify(bool $value){
        $this->identify = $value;
    }




    public function getID():int
    {

        return ($this->id ==null)? '0': $this->id;
    }
    public function getLogin():string
    {
        $login = ($this->login === null)? 'Inconnu': $this->login;
        return$login;
    }
    public function getName():string
    {
        return $this->name;
    }
    public function getLastName():string
    {
        return $this->lastName;
    }
    public function getMailAdress():string
    {
        return $this->mailAdress;
    }
    public function getPassword():string
    {
        return $this->password;
    }
    public function getPasswordTemp():string
    {
        return $this->passwordTemp;
    }
    public function getPermission():string
    {
        return $this->permission;
    }
    public function getErrors():array
    {
        return $this->errors;
    }
    public function getIdentify():bool
    {
        return $this->identify;
    }


    Public function isIdentify():bool {
        return $this->identify;
    }


}