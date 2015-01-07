<?php

class TeamsCalendarManager {

    private $_db;
    private $teamsManager;
    private $typesMatchManager;

    public function __construct($typesMatchManager, $teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->typesMatchManager = $typesMatchManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsCalendar $teamsCalendar) {

        $req = $this->_db->prepare("SELECT max(idCalendar) FROM `teamscalendar` ");
        $req->execute();
        $idTeamsCalendar = $req->fetch();
        $idTeamsCalendar[0] = $idTeamsCalendar[0] + 1;
        $req = $this->_db->prepare('INSERT INTO `teamscalendar`(`idCalendar`, `idTeam`, `yearTeam`, `inTeam`, `outTeam`, `scoreIn`, `scoreOut`, `modified`, `matchNumber`, `dateMatch`, `timeMatch`, `TypeMatch`) VALUES (:idCalendar, :idTeam, :yearTeam, :inTeam, :outTeam, :scoreIn, :scoreOut, :modified, :matchNumber, :dateMatch, :timeMatch, :TypeMatch)');


        $req->bindValue(':idCalendar', $idTeamsCalendar[0]);
        $req->bindValue(':idTeam', $teamsCalendar->getIdTeam());
        $req->bindValue(':yearTeam', $teamsCalendar->getYearTeam());
        $req->bindValue(':inTeam', $teamsCalendar->getInTeam());
        $req->bindValue(':outTeam', $teamsCalendar->getOutTeam());
        $req->bindValue(':scoreIn', $teamsCalendar->getScoreIn());
        $req->bindValue(':scoreOut', $teamsCalendar->getScoreOut());
        $req->bindValue(':modified', 0);
        $req->bindValue(':matchNumber', $teamsCalendar->getMatchNumber());
        $req->bindValue(':dateMatch', $teamsCalendar->getDateMatch());
        $req->bindValue(':timeMatch', $teamsCalendar->getTimeMatch());
        $req->bindValue(':TypeMatch', $teamsCalendar->getTypeMatch());
        try {
            $req->execute();
        } catch (Exception $e) {
            
        }
    }

    public function listAllTeams() {
        return $this->teamsManager->listAll();
    }

    public function listAllTypesMatch() {
        return $this->typesMatchManager->listAllTypesMatch();
    }

    public function listAll() {
        $req = $this->_db->prepare("SELECT t.*,te.label FROM `teamscalendar`t , teams te WHERE t.`idTeam` = te.`idTeam` order by idCalendar asc");


        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "TeamsCalendar");
            return $result;
        } catch (error $e) {
            
        }
    }

    public function get($id) {

        $req = $this->_db->prepare("SELECT * FROM `teamscalendar` WHERE `idCalendar`=:idCalendar");
        try {
            $req->bindValue(':idCalendar', $id);
            $req->execute();
            $result = $req->fetchObject("TeamsCalendar");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(TeamsCalendar $teamsCalendar) {

        $req = $this->_db->prepare('UPDATE `teamscalendar` SET `idTeam`=:idTeam,`yearTeam`=:yearTeam,`inTeam`=:inTeam,`outTeam`=:outTeam,`scoreIn`=:scoreIn,`scoreOut`=:scoreOut,`modified`=:modified,`matchNumber`=:matchNumber,`dateMatch`=:dateMatch,`timeMatch`=:timeMatch,`TypeMatch`=:TypeMatch WHERE idCalendar=:idCalendar');

        $req->bindValue(':idCalendar', $teamsCalendar->getIdCalendar());
        $req->bindValue(':idTeam', $teamsCalendar->getIdTeam());
        $req->bindValue(':yearTeam', $teamsCalendar->getYearTeam());
        $req->bindValue(':inTeam', $teamsCalendar->getInTeam());
        $req->bindValue(':outTeam', $teamsCalendar->getOutTeam());
        $req->bindValue(':scoreIn', $teamsCalendar->getScoreIn());
        $req->bindValue(':scoreOut', $teamsCalendar->getScoreOut());
        $req->bindValue(':modified', 1);
        $req->bindValue(':matchNumber', $teamsCalendar->getMatchNumber());
        $req->bindValue(':dateMatch', $teamsCalendar->getDateMatch());
        $req->bindValue(':timeMatch', $teamsCalendar->getTimeMatch());
        $req->bindValue(':TypeMatch', $teamsCalendar->getTypeMatch());


        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsCalendar($id) {

        $req = $this->_db->prepare("DELETE FROM `teamscalendar` WHERE idCalendar=:idCalendar");
        $req->bindValue(':idCalendar', $id);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
        
    }    
    
        public function validate ($idTeam, $type) {
        $req = $this->_db->prepare("SELECT * FROM `teamscalendar` WHERE `idTeam` = :idTeam and TypeMatch = :Type ");
        try {
            $req->bindValue(':idTeam', $idTeam);
            $req->bindValue(':Type', $type);
            
            $req->execute();

            $result = $req->fetchObject("TeamsCalendar");
            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }

}
