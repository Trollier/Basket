<?php

class TeamsCoachManager {

    private $_db;
    private $teamsManager;
    private $userManager;

    public function __construct($userManager, $teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->userManager = $userManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsCoach $teamsCoach) {

        $req = $this->_db->prepare("SELECT max(idTeamCoach ) FROM `teamscoaches` ");
        $req->execute();
        $idTeamsCoach = $req->fetch();
        $idTeamsCoach[0] = $idTeamsCoach[0] + 1;

        $req = $this->_db->prepare('INSERT INTO `teamscoaches`(`idTeamCoach`, `idTeam`, `idCoach`, `coachLicence`, `mainCoach`, `YearTeam`) VALUES '
                . '  (:idTeamCoach,:idTeam,:idCoach,:coachLicence,:mainCoach,:YearTeam)');
        $req->bindValue(':idTeamCoach', $idTeamsCoach[0]);
        $req->bindValue(':idTeam', $teamsCoach->getIdTeam());
        $req->bindValue(':idCoach', $teamsCoach->getIdCoach());
        $req->bindValue(':coachLicence', $teamsCoach->getCoachLicence());
        $req->bindValue(':mainCoach', $teamsCoach->getMainCoach());
        $req->bindValue(':YearTeam', $teamsCoach->getYearTeam());


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
        $req = $this->_db->prepare("SELECT tc.*, t.label, u.firstname, u.name FROM teamscoaches tc, teams t, users u where tc.idTeam = t.idTeam and tc.idCoach = u.idUser order by idTeamCoach asc");


        try {
            $req->execute();
            $teamsCoach = $req->fetchAll(PDO::FETCH_CLASS, "TeamsCoach");
            return $teamsCoach;
        } catch (error $e) {
            
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT  * from teamscoaches where idTeamCoach =:idTeamCoach");
        try {
            $req->bindValue(':idTeamCoach', $id);
            $req->execute();
            $result = $req->fetchObject("TeamsCoach");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(TeamsCoach $teamsCoach) {
        $req = $this->_db->prepare('UPDATE `teamscoaches` SET `idTeam`=:idTeam,`idCoach`=:idCoach,`coachLicence`=:coachLicence,`mainCoach`=:mainCoach, `YearTeam`=:YearTeam WHERE idTeamCoach=:idTeamCoach');

        $req->bindValue(':idTeam', $teamsCoach->getIdTeam());
        $req->bindValue(':idCoach', $teamsCoach->getIdCoach());
        $req->bindValue(':coachLicence', $teamsCoach->getCoachLicence());
        $req->bindValue(':mainCoach', $teamsCoach->getMainCoach());
        $req->bindValue(':YearTeam', $teamsCoach->getYearTeam());
        $req->bindValue(':idTeamCoach', $teamsCoach->getIdTeamCoach());


        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsCoach($teamsCoach) {
        $req = $this->_db->prepare("DELETE FROM `teamscoaches` WHERE idTeamCoach=:idTeamCoach ");
        $req->bindValue(':idTeamCoach', $teamsCoach);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

}
