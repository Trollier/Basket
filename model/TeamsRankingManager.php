<?php

class TeamsRankingManager {

    private $_db;
    private $teamsManager;

    public function __construct($teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsRanking $teamsRanking) {

        $req = $this->_db->prepare("SELECT max( idRanking ) FROM `teamsranking` ");
        $req->execute();
        $idTeamRanking = $req->fetch();
        $idTeamRanking[0] = $idTeamRanking[0] + 1;

        $points = ($teamsRanking->getWin() * 3) + ($teamsRanking->getDeuce());
        $req = $this->_db->prepare('INSERT INTO `teamsranking`(`idRanking`, `idTeam`, `myYear`, `name`, `played`, `win`, `lost`, `deuce`, `points`, `dateRanking`)'
                . ' VALUES (:idTeamsRanking,:idTeam,:myYear,:name,:played,:win,:lost,:deuce,:points,:dateRanking)');
        $req->bindValue(':idTeamsRanking', $idTeamRanking[0]);
        $req->bindValue(':dateRanking', $teamsRanking->getDateRanking());
        $req->bindValue(':deuce', $teamsRanking->getDeuce());
        $req->bindValue(':idTeam', $teamsRanking->getIdTeam());
        $req->bindValue(':lost', $teamsRanking->getLost());
        $req->bindValue(':myYear', $teamsRanking->getMyYear());
        $req->bindValue(':played', $teamsRanking->getPlayed());
        $req->bindValue(':name', $teamsRanking->getName());
        $req->bindValue(':points', $points);
        $req->bindValue(':win', $teamsRanking->getWin());

        try {
            $req->execute();
        } catch (Exception $e) {
            
        }
    }

    public function listAllTeams() {
        return $this->teamsManager->listAll();
    }

    public function listAll() {
        $req = $this->_db->prepare("SELECT `idRanking`, teamsRanking.`idTeam`, `myYear`, `name`, `played`, `win`, `lost`, `deuce`, `points`, `dateRanking` FROM `teamsranking`,teams WHERE teams.idTeam = teamsRanking.idTeam");


        try {
            $req->execute();
            $teamsRanking = $req->fetchAll(PDO::FETCH_CLASS, "TeamsRanking");
            return $teamsRanking;
        } catch (error $e) {
            
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT `idRanking`, teamsRanking.`idTeam`, `myYear`, `name`, `played`, `win`, `lost`, `deuce`, `points`, `dateRanking` FROM `teamsranking`,teams WHERE teams.idTeam = teamsRanking.`idTeam` and idRanking =:idTeamsRanking");
        try {
            $req->bindValue(':idTeamsRanking', $id);
            $req->execute();

            $result = $req->fetchObject("TeamsRanking");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(TeamsRanking $teamsRanking) {
        $points = ($teamsRanking->getWin() * 3) + ($teamsRanking->getDeuce());
        $req = $this->_db->prepare('UPDATE `teamsranking` SET `idTeam`=:idTeam,`myYear`=:myYear,`name`=:name,'
                . '`played`=:played,`win`=:win,`lost`=:lost,`deuce`=:deuce,'
                . '`points`=:points,`dateRanking`=:dateRanking WHERE :idTeamsRanking=idRanking');

        $req->bindValue(':idTeamsRanking', $teamsRanking->getIdRanking());
        $req->bindValue(':dateRanking', $teamsRanking->getDateRanking());
        $req->bindValue(':deuce', $teamsRanking->getDeuce());
        $req->bindValue(':idTeam', $teamsRanking->getIdTeam());
        $req->bindValue(':lost', $teamsRanking->getLost());
        $req->bindValue(':myYear', $teamsRanking->getMyYear());
        $req->bindValue(':played', $teamsRanking->getPlayed());
        $req->bindValue(':name', $teamsRanking->getName());
        $req->bindValue(':points', $points);
        $req->bindValue(':win', $teamsRanking->getWin());

        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsRanking($teamsRanking) {
        $req = $this->_db->prepare("DELETE FROM `teamsRanking` WHERE idRanking=:idTeam ");
        $req->bindValue(':idTeam', $teamsRanking);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function validate($idTeam) {
        $req = $this->_db->prepare("SELECT * FROM `teamsRanking` WHERE `idTeam` = :idTeam ");
        try {
            $req->bindValue(':idTeam', $idTeam);

            $req->execute();

            $result = $req->fetchObject("TeamsRanking");
            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }

}
