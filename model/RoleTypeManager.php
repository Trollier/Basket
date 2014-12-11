<?php


class RoleTypeManager {

 
    private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function createRoleType(RoleType $roleType) {
        $req = $this->_db->prepare("SELECT max( roleTypeId ) FROM `roletype`");
        $req->execute();
        $roleTypeId = $req->fetch();
        $roleTypeId[0] =  $roleTypeId[0]+1;
        
        $req = $this->_db->prepare('INSERT INTO `roletype`(`roleTypeId`, `label`, `ordre`) VALUES (:roleTypeId,:label,:ordre)');
        $req->bindValue(':roleTypeId', $roleTypeId[0]);
        $req->bindValue(':label', $roleType->getLabel());
        $req->bindValue(':ordre', $roleType->getOrdre());

        try {
                $req->execute();
            } catch (error $e) {
                return $e;
        }
    }

    public function listAllRoleTypes() {
        $req = $this->_db->prepare("SELECT * FROM `roletype` order by roleTypeId asc ");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "RoleType");
            return $result;
        } catch (error $e) {
            return $e;
        }
    }
    
     public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `roletype` where roleTypeId=:roleTypeId");
        try {
            $req->bindValue(':roleTypeId', $id);
            $req->execute();

            $result = $req->fetchObject("RoleType");
            return $result;
        } catch (Exception $ex) {
            
        }
    }
    
    public function updateRoleType($roleType) {
        $req = $this->_db->prepare('update roletype set `roleTypeId`=:roleTypeId,`label`=:label,`ordre`=:ordre, `active`=:active where roleTypeId=:roleTypeId');
        $req->bindValue(':roleTypeId', $roleType->getRoleTypeId ());
        $req->bindValue(':label', $roleType->getLabel());
        $req->bindValue(':ordre', $roleType->getOrdre());
        $req->bindValue(':active', $roleType->getActive ());
        
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function deleteRoleType( $roleTypeId) {
        $req = $this->_db->prepare("DELETE FROM `roletype` WHERE roleTypeId=:roleTypeId ");
        $req->bindValue(':roleTypeId', $roleTypeId);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    
    
       public function isEnable($roleTypeId) {
        $req = $this->_db->prepare("SELECT active FROM `roletype` WHERE  roleTypeId=:roleTypeId  ");
        $req->bindValue(':roleTypeId', $roleTypeId);

        try {
            $req->execute();
            $result = $req->fetchObject("RoleType");
            return $result;
        } catch (Exception $ex) {
            
        }
    }
    

}
