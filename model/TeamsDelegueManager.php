<?php

class TeamsDelegueManager {

    private $_db;
    private $teamsManager;
    private $userManager;

    public function __construct($userManager, $teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->userManager = $userManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsDelegue $teamsCoach) {
        
        $req = $this->_db->prepare("SELECT max(idTeamDelegue) FROM `teamsdelegues` ");
        $req->execute();
        $idTeamsDelegue = $req->fetch();
        $idTeamsDelegue[0] = $idTeamsDelegue[0] + 1;
        $req = $this->_db->prepare('INSERT INTO `teamsdelegues`(`idTeamDelegue`, `idTeam`, `idDelegue`, `mainDelegue`, `yearTeam`) VALUES (:idTeamDelegue,:idTeam,:idDelegue,:mainDelegue,:yearTeam)');
        
        $req->bindValue(':idTeamDelegue', $idTeamsDelegue[0]);
        $req->bindValue(':idTeam', $teamsCoach->getIdTeam());
        $req->bindValue(':idDelegue', $teamsCoach->getIdDelegue());
        $req->bindValue(':mainDelegue', $teamsCoach->getMainDelegue());
        $req->bindValue(':yearTeam', $teamsCoach->getYearTeam());
        try {
            $req->execute();
        } catch (Exception $e) {
            
        }
    }

    public function listAllTeams() {
        return $this->teamsManager->listAll();
    }

    public function listAllUsers() {
        return $this->userManager->listAll();
    }

    public function listAll() {
        $req = $this->_db->prepare("SELECT td.*, u.name , t.label , u.firstname FROM teamsdelegues td, teams t, users u where td.idTeam = t.idTeam and td.idDelegue = u.idUser order by idTeamDelegue asc");


        try {
            $req->execute();
            $teamsDelegue = $req->fetchAll(PDO::FETCH_CLASS, "TeamsDelegue");
            return $teamsDelegue;
        } catch (error $e) {
            
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT  * from teamsdelegues where idTeamDelegue  =:idTeamDelegue");
        try {
            $req->bindValue(':idTeamDelegue', $id);
            $req->execute();
            $result = $req->fetchObject("TeamsDelegue");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(TeamsDelegue $teamsDelegue) {
         
        $req = $this->_db->prepare('UPDATE `teamsdelegues` SET `idTeam`=:idTeam,`idDelegue`=:idDelegue,`mainDelegue`=:mainDelegue,`yearTeam`=:yearTeam WHERE `idTeamDelegue`=:idTeamDelegue');

        $req->bindValue(':idTeamDelegue', $teamsDelegue->getIdTeamDelegue());
        $req->bindValue(':idTeam', $teamsDelegue->getIdTeam());
        $req->bindValue(':idDelegue', $teamsDelegue->getIdDelegue());
        $req->bindValue(':mainDelegue', $teamsDelegue->getMainDelegue());
        $req->bindValue(':yearTeam', $teamsDelegue->getYearTeam());


        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsCoach($teamsDelegue) {
        
        $req = $this->_db->prepare("DELETE FROM `teamsdelegues` WHERE idTeamdelegue=:idTeamDelegue ");
        $req->bindValue(':idTeamDelegue', $teamsDelegue);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

}
