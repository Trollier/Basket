<?php


class PlayerManager {

 
    private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function createPlayer(Player $player) {
        $req = $this->_db->prepare("SELECT max( idPlayer ) FROM `players` ");
        $req->execute();
        $idPlayer = $req->fetch();
        $idPlayer[0] =  $idPlayer[0]+1;
        
        $req = $this->_db->prepare('INSERT INTO `players`(`idPlayer`, `name`, `firstname`, `birthdate`, `email`) VALUES (:idPlayer,:name,:firstname,:birthdate,:email)');
        $req->bindValue(':idPlayer', $idPlayer[0]);
        $req->bindValue(':name', $player->getName());
        $req->bindValue(':firstname', $player->getFirstname());
        $req->bindValue(':birthdate', $player->getBirthdate());
        $req->bindValue(':email', $player->getEmail ());

        try {
                $req->execute();
            } catch (error $e) {
                return $e;
        }
    }

    public function listAllPlayers() {
        $req = $this->_db->prepare("SELECT * FROM `players` order by idPlayer asc ");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "Player");
            return $result;
        } catch (error $e) {
            return $e;
        }
    }
    
     public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `players`  where idPlayer=:idPlayer");
        try {
            $req->bindValue(':idPlayer', $id);
            $req->execute();

            $result = $req->fetchObject("Player");
            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public function updatePlayer(Player $player) {
        $req = $this->_db->prepare('update players set `name`=:name,`firstname`=:firstname,`birthdate`=:birthdate,`email`=:email, `active`=:active where idPlayer=:idPlayer');
        $req->bindValue(':name', $player->getName());
        $req->bindValue(':firstname', $player->getFirstname());
        $req->bindValue(':birthdate', $player->getBirthdate());
        $req->bindValue(':email', $player->getEmail ());
        $req->bindValue(':idPlayer', $player->getIdPlayer ());
        $req->bindValue(':active', $player->getActive ());
        
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function deletePlayer( $idPlayer) {
        $req = $this->_db->prepare("DELETE FROM `players` WHERE idPlayer=:idPlayer ");
        $req->bindValue(':idPlayer', $idPlayer);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    
    
       public function isEnable($idPlayer) {
        $req = $this->_db->prepare("SELECT active FROM `players` WHERE  idPlayer=:idPlayer  ");
        $req->bindValue(':idPlayer', $idPlayer);

        try {
            $req->execute();
            $result = $req->fetchObject("Player");
            return $result;
        } catch (Exception $ex) {
            
        }
    }
    

}
