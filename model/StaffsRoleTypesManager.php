<?php

spl_autoload_register();

class StaffsRoleTypesManager {

    private $_db;
    private $staffManager;
    private $roleTypeManager;

    public function __construct($staffManager, $roleTypeManager) {
        $this->roleTypeManager = $roleTypeManager;
        $this->staffManager = $staffManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function listAllStaff() {
        return $this->staffManager->listStaff();
    }

    public function listAllRoleType() {
        return $this->roleTypeManager->listAllRoleTypes();
    }

    public function create(StaffsRoleTypes $staffRoleTypes) {
        $req = $this->_db->prepare("SELECT max( idStaffRoleType ) FROM `staffsroletypes`");
        $req->execute();
        $idStaffRoleType = $req->fetch();
        $idStaffRoleType[0] = $idStaffRoleType[0] + 1;

        $req = $this->_db->prepare('INSERT INTO `staffsroletypes`(`idStaffRoleType`, `idStaff`, `idRoleType`) VALUES (:idStaffRoleType,:idStaff,:idRoleType)');
        $req->bindValue(':idStaffRoleType', $idStaffRoleType[0]);
        $req->bindValue(':idStaff', $staffRoleTypes->getIdStaff());
        $req->bindValue(':idRoleType', $staffRoleTypes->getIdRoleType());

        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function listAllStaffsRoleTypes() {
        $req = $this->_db->prepare("SELECT s.active, s.label AS stafflabel,
            s.ordre, s.showInMenu, srt.idRoleType, srt.idStaff, r.label AS rolelabel, srt.idStaffRoleType 
            FROM staffs s, roletype r, staffsroletypes srt
            WHERE srt.idStaff = s.idStaff
            AND srt.idRoleType = r.roleTypeId order by srt.idStaffRoleType");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "StaffsRoleTypes");
            return $result;
        } catch (error $e) {
            return $e;
        }
    }

    public function getByIdRoletypeAndIdStaff($idRoleType, $idStaff) {
        $req = $this->_db->prepare("SELECT * FROM `staffsroletypes` WHERE `idStaff` = :idStaff and `idRoleType` = :idRoleType ");
        try {
            $req->bindValue(':idStaff', $idStaff);
            $req->bindValue(':idRoleType', $idRoleType);
            
            $req->execute();

            $result = $req->fetchObject("StaffsRoleTypes");
            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `staffsroletypes` where idStaffRoleType=:id");
        try {
            $req->bindValue(':id', $id);
            $req->execute();

            $result = $req->fetchObject("StaffsRoleTypes");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update($staffRoleType) {
        $req = $this->_db->prepare('UPDATE `staffsroletypes` SET `idStaff`=:idStaff,`idRoleType`=:idRoleType WHERE `idStaffRoleType` =:idStaffRoleType');
        $req->bindValue(':idStaff', $staffRoleType->getIdStaff());
        $req->bindValue(':idRoleType', $staffRoleType->getIdRoleType());
        $req->bindValue(':idStaffRoleType', $staffRoleType->getIdStaffRoleType());

        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function deleteStaffRoleType($idStaffRoleType) {
        $req = $this->_db->prepare("DELETE FROM `staffsroletypes` WHERE idStaffRoleType=:idStaffRoleType ");
        $req->bindValue(':idStaffRoleType', $idStaffRoleType);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

}
