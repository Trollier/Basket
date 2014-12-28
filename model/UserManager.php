<?php

class UserManager {

    private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(User $user) {
        $req = $this->_db->prepare("SELECT max( idRole ) FROM `roles`");
        $req->execute();
        $idRole = $req->fetch();
        $idRole[0] = $idRole[0] + 1;
        
        $req = $this->_db->prepare('INSERT INTO `roles`(`idRole`, `idUser`, `idRoleType`) VALUES (:idUser,:nom,:prenom,:adresseMail,:password)');
        $req->bindValue(':idUser', $idUser[0]);
        $req->bindValue(':nom', $user->getName());
        $req->bindValue(':prenom', $user->getFirstName());
        $req->bindValue(':adresseMail', $user->getMail());
        $req->bindValue(':password', $user->getPassword());

        try {
            $req->execute();
        } catch (Exception $e) {
        }
    }
    
    public function getByMail($mail){
         $req = $this->_db->prepare("SELECT * FROM `users`  where mail=:mail");
        try {
            $req->bindValue(':mail', $mail);
            $req->execute();

            $result = $req->fetchObject("User");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function listAll() {
        $req = $this->_db->prepare("SELECT * FROM `users` order by idUser asc");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "User");
            return $result;
        } catch (error $e) {
          
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `users`  where idUser=:idUser");
        try {
            $req->bindValue(':idUser', $id);
            $req->execute();

            $result = $req->fetchObject("User");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(User $user) {
        $req = $this->_db->prepare('update users set `name`=:nom,`firstname`=:prenom,`mail`=:adresseMail,`active`=:active where idUser=:idUser');
        $req->bindValue(':idUser', $user->getIdUser());
        $req->bindValue(':nom', $user->getName());
        $req->bindValue(':prenom', $user->getFirstname());
        $req->bindValue(':adresseMail', $user->getMail());
        $req->bindValue(':active', $user->getActive());
        
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteUser($idUser) {
        $req = $this->_db->prepare("DELETE FROM `users` WHERE idUser=:idUser ");
        $req->bindValue(':idUser', $idUser);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }


    public function isEnable($idUser) {
        $req = $this->_db->prepare("SELECT active FROM `users` WHERE  idUser=:idUser  ");
        $req->bindValue(':idUser', $idUser);

        try {
            $req->execute();
            $result = $req->fetchObject("User");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

}
