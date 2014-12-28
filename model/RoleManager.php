<?php
spl_autoload_register();

class RoleManager {
    private $_db;
    private $userManager;
    private $roleTypeManager;

    public function __construct($userManager, $roleTypeManager) {
        $this->roleTypeManager = $roleTypeManager;
        $this->userManager = $userManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function listAllUser() {
        return $this->userManager->listAll();
    }

    public function listAllRoleType() {
        return $this->roleTypeManager->listAllRoleTypes();
    }

    public function create(Role $role) {
        $req = $this->_db->prepare("SELECT max( idRole ) FROM `roles`");
        $req->execute();
        $idRole = $req->fetch();
        $idRole[0] = $idRole[0] + 1;
        
        $req = $this->_db->prepare('INSERT INTO `roles`(`idRole`, `idUser`, `idRoleType`) VALUES (:idRole,:idUser,:idRoleType)');
        $req->bindValue(':idRole', $idRole[0]);
        $req->bindValue(':idUser', $role->getIdUser());
        $req->bindValue(':idRoleType', $role->getRoleTypeId());

        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function listAllRole() {
        $req = $this->_db->prepare("SELECT users.name,users.firstname,roletype.label,users.idUser,roletype.roleTypeId,roles.idRole FROM `roles`,users,roletype WHERE roles.idUser= users.idUser and roletype.roleTypeId = roles.idRoleType");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "Role");
            return $result;
        } catch (error $e) {
            return $e;
        }
    }

    public function getByIdRoletypeAndIdUser($idRoleType, $idUser) {
        $req = $this->_db->prepare("SELECT * FROM `roles` WHERE `idUser` = :idUser and `idRoleType` = :idRoleType ");
        try {
            $req->bindValue(':idUser', $idUser);
            $req->bindValue(':idRoleType', $idRoleType);
            $req->execute();

            $result = $req->fetchObject("Role");
            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `roles` where idRole=:id");
        try {
            $req->bindValue(':id', $id);
            $req->execute();

            $result = $req->fetchObject("Role");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update($role) {
        $req = $this->_db->prepare('UPDATE `roles` SET `idUser`=:idUser,`idRoleType`=:idRoleType WHERE `idRole` =:idRole');
        $req->bindValue(':idUser', $role->getIdUser());
        $req->bindValue(':idRoleType', $role->getRoleTypeId());
        $req->bindValue(':idRole', $role->getIdRole());

        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function deleteRole($idRole) {
        $req = $this->_db->prepare("DELETE FROM `roles` WHERE `idRole`=:idRole ");
        $req->bindValue(':idRole', $idRole);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }
}
