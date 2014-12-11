<?php


class TypesMatchManager {
     private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function createTypesMatch( $typeMatch) {

        $req = $this->_db->prepare('INSERT INTO `typesmatchs`(`idTypeMatch`, `TypeMatch`) VALUES (:idTypeMatch,:TypeMatch)');
        $req->bindValue(':idTypeMatch', $typeMatch->getIdTypeMatch());
        $req->bindValue(':TypeMatch', $typeMatch->getTypeMatch());

        try {
                $req->execute();
            } catch (error $e) {
                return $e;
        }
    }

    public function listAllTypesMatch() {
        $req = $this->_db->prepare("SELECT * FROM `typesmatchs` order by idTypeMatch asc ");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "TypesMatchs");
            return $result;
        } catch (error $e) {
            return $e;
        }
    }
    
     public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `typesmatchs` where idTypeMatch=:idTypeMatch");
        try {
            $req->bindValue(':idTypeMatch', $id);
            $req->execute();

            $result = $req->fetchObject("TypesMatchs");
            return $result;
        } catch (Exception $ex) {
            
        }
    }
    
    public function updateTypesMatch($typeMatch) {
        $req = $this->_db->prepare('UPDATE `typesmatchs` SET `idTypeMatch`=:idTypeMatch,`TypeMatch`=:typeMatch');
        $req->bindValue(':idTypeMatch', $typeMatch->getIdTypeMatch());
        $req->bindValue(':typeMatch', $typeMatch->getTypeMatch());
        
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function deleteTypesMatch($idTypeMatch) {
        $req = $this->_db->prepare("DELETE FROM `typesmatchs` WHERE idTypeMatch=:idTypeMatch ");
        $req->bindValue(':idTypeMatch', $idTypeMatch);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

}
