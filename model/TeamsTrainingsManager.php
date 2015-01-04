<?php

class TeamsTrainingsManager {

    private $_db;
    private $teamsManager;
    private $daysOfWeekManager;

    public function __construct($daysOfWeekManager, $teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->daysOfWeekManager = $daysOfWeekManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsTraining $teamsTraining) {
       
        $req = $this->_db->prepare("SELECT max(idTraining) FROM `teamstraining` ");
        $req->execute();
        $idTeamsTraining = $req->fetch();
        $idTeamsTraining[0] = $idTeamsTraining[0] + 1;
        $req = $this->_db->prepare('INSERT INTO `teamstraining`(`idTraining`, `idTeam`, `currentYear`, `dayOfWeek`, `startTime`, `endTime`, `room`)  VALUES (:idTraining, :idTeam, :currentYear, :dayOfWeek, :startTime, :endTime, :room) ');

        $req->bindValue(':idTraining', $idTeamsTraining[0]);
        $req->bindValue(':idTeam', $teamsTraining->getIdTeam());
        $req->bindValue(':currentYear', $teamsTraining->getCurrentYear());
        $req->bindValue(':dayOfWeek', $teamsTraining->getDayOfWeek());
        $req->bindValue(':startTime', $teamsTraining->getStartTime().':00');
        $req->bindValue(':endTime', $teamsTraining->getEndTime().':00');
        $req->bindValue(':room', $teamsTraining->getRoom());
        try {
            $req->execute();
        } catch (Exception $e) {
            
        }
    }

    public function listAllTeams() {
        return $this->teamsManager->listAll();
    }

    public function listAllDaysOfWeek() {
        return $this->daysOfWeekManager->listAllDaysOfWeek();
    }

    public function listAll() {
        $req = $this->_db->prepare("SELECT t.*,te.label,d.label as labelDay FROM `teamstraining` t, teams te, daysofweek d WHERE t.`idTeam` = te.`idTeam` and d.idday=t.`dayOfWeek` order by `idTraining` asc");


        try {
            $req->execute();
            $teamsTraining = $req->fetchAll(PDO::FETCH_CLASS, "TeamsTraining");
            return $teamsTraining;
        } catch (error $e) {
            
        }
    }

    public function get($id) {
      
        $req = $this->_db->prepare("SELECT * FROM `teamstraining` WHERE `idTraining`=:idTraining");
        try {
            $req->bindValue(':idTraining', $id);
            $req->execute();
            $result = $req->fetchObject("TeamsTraining");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(TeamsTraining $teamsTraining) {
     
        $req = $this->_db->prepare('UPDATE `teamstraining` SET `idTeam`=:idTeam,`currentYear`=:currentYear,`dayOfWeek`=:dayOfWeek,`startTime`=:startTime,`endTime`=:endTime,`room`=:room  WHERE  `idTraining`=:idTraining');

        $req->bindValue(':idTraining', $teamsTraining->getIdTraining());
        $req->bindValue(':idTeam', $teamsTraining->getIdTeam());
        $req->bindValue(':currentYear', $teamsTraining->getCurrentYear());
        $req->bindValue(':dayOfWeek', $teamsTraining->getDayOfWeek());
        $req->bindValue(':startTime', $teamsTraining->getStartTime().':00');
        $req->bindValue(':endTime', $teamsTraining->getEndTime().':00');
        $req->bindValue(':room', $teamsTraining->getRoom());


        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsTraining ($id) {
        
        $req = $this->_db->prepare("DELETE FROM `teamstraining` WHERE `idTraining`=:idTraining ");
        $req->bindValue(':idTraining', $id);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

}
