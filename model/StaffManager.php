<?php

spl_autoload_register();

class StaffManager {

    private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function createStaff(Staff $staff) {
        $req = $this->_db->prepare("SELECT  max(idStaff) FROM `staffs`");
        $req->execute();
        $idStaff = $req->fetch();
        $idStaff[0] = $idStaff[0]+1;
        
        $req = $this->_db->prepare('INSERT INTO `staffs`(`idStaff`, `label`, `ordre`) VALUES (:idStaff,:label,:ordre)');
        $req->bindValue(':idStaff', $idStaff[0]);
        $req->bindValue(':label', $staff->getLabel());
        $req->bindValue(':ordre', $staff->getOrdre());
        
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function listStaff() {
        $req = $this->_db->prepare("SELECT * FROM `staffs` order by idStaff asc");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS,"Staff");
            
            return $result;
        } catch (error $e) {
            
        }
    }
    
    public function getStaff($id) {
        $req = $this->_db->prepare("SELECT * FROM `staffs`  where idStaff=:idStaff");
        try {
            $req->bindValue(':idStaff', $id);
            $req->execute();

            $result = $req->fetchObject("Staff");
            return $result;
        } catch (Exception $ex) {
            
        }
    }
    
    public function updateStaff ($staff) {        
        $req = $this->_db->prepare('update staffs set `label`=:label,`ordre`=:order, `showInMenu`=:showInMenu,`active`=:active where idStaff=:idStaff');
        $req->bindValue(':label', $staff->getLabel());
        $req->bindValue(':order', $staff->getOrdre());
        $req->bindValue(':idStaff', $staff->getidStaff());
        $req->bindValue(':showInMenu', $staff->getShowInMenu());
        $req->bindValue(':active', $staff->getActive());
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function deleteStaff($idStaff) {
        $req = $this->_db->prepare("delete from `staffs` where idStaff=:idStaff ");
        $req->bindValue(':idStaff', $idStaff);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

   public function isEnable($idStaff) {
        $req = $this->_db->prepare("SELECT active FROM `staffs` WHERE  idStaff=:idStaff  ");
        $req->bindValue(':idStaff', $idStaff);

        try {
            $req->execute();
            $result = $req->fetchObject("Staff");
            return $result;
        } catch (Exception $ex) {
            
        }
    }
    

}
