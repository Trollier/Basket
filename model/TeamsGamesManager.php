<?php

class TeamsGamesManager {

    private $_db;
    private $teamsManager;
    private $daysOfWeekManager;

    public function __construct($daysOfWeekManager, $teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->daysOfWeekManager = $daysOfWeekManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsGames $teamsGame) {
       
        $req = $this->_db->prepare("SELECT max(idTeamGame) FROM `teamsgames` ");
        $req->execute();
        $idTeamsGame = $req->fetch();
        $idTeamsGame[0] = $idTeamsGame[0] + 1;
        $req = $this->_db->prepare('INSERT INTO `teamsgames`(`idTeamGame` ,`idTeam`, `currentYear`, `gameDay`, `gameTime`)  VALUES (:idTeamGame,:idTeam,:currentYear,:gameDay,:gameTime) ');

        $req->bindValue(':idTeamGame', $idTeamsGame[0]);
        $req->bindValue(':idTeam', $teamsGame->getIdTeam());
        $req->bindValue(':currentYear', $teamsGame->getCurrentYear());
        $req->bindValue(':gameDay', $teamsGame->getGameDay());
        $req->bindValue(':gameTime', $teamsGame->getGameTime().':00');
        
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
        $req = $this->_db->prepare("SELECT t.*,te.label,d.label as labelDay FROM `teamsgames` t, teams te, daysofweek d WHERE t.idteam = te.idteam and d.idday=t.gameday order by idTeamGame asc");


        try {
            $req->execute();
            $teamsGame = $req->fetchAll(PDO::FETCH_CLASS, "TeamsGames");
            return $teamsGame;
        } catch (error $e) {
            
        }
    }

    public function get($id) {
      
        $req = $this->_db->prepare("SELECT * FROM `teamsgames` WHERE `idTeamGame` = :idTeamGame");
        try {
            $req->bindValue(':idTeamGame', $id);
            $req->execute();
            $result = $req->fetchObject("TeamsGames");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update( $teamsGame) {
        var_dump($teamsGame);
        $req = $this->_db->prepare('UPDATE `teamsgames` SET `idTeam`=:idTeam,`currentYear`=:currentYear,`gameDay`=:gameDay,`gameTime`=:gameTime WHERE  `idTeamGame`=:idTeamGame');

        $req->bindValue(':idTeamGame', $teamsGame->getIdTeamGame());
        $req->bindValue(':idTeam', $teamsGame->getIdTeam());
        $req->bindValue(':currentYear', $teamsGame->getCurrentYear());
        $req->bindValue(':gameDay', $teamsGame->getGameDay());
        $req->bindValue(':gameTime', $teamsGame->getGameTime().':00');


        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsGame ($teamsGame) {
        
        $req = $this->_db->prepare("DELETE FROM `teamsgames` WHERE  `idTeamGame`=:idTeamGame ");
        $req->bindValue(':idTeamGame', $teamsGame);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

}
