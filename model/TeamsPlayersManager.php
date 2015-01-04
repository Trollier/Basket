<?php

class TeamsPlayersManager {

    private $_db;
    private $teamsManager;
    private $playerManager;

    public function __construct($playerManager, $teamsManager) {
        $this->teamsManager = $teamsManager;
        $this->playerManager = $playerManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function create(TeamsPlayers $teamsPlayer) {
       
        $req = $this->_db->prepare("SELECT max(idTeamPlayer) FROM `teamsplayers` ");
        $req->execute();
        $idTeamsPlayer = $req->fetch();
        $idTeamsPlayer[0] = $idTeamsPlayer[0] + 1;
        $req = $this->_db->prepare('INSERT INTO `teamsplayers`(`idTeamPlayer`, `idTeam`, `idPlayer`, `number`, `position`, `yearTeam`) VALUES (:idTeamPlayer,:idTeam,:idPlayer,:number,:position,:yearTeam)');
        
        
        $req->bindValue(':idTeamPlayer', $idTeamsPlayer[0]);
        $req->bindValue(':idTeam', $teamsPlayer->getIdTeam());
        $req->bindValue(':idPlayer', $teamsPlayer->getIdPlayer());
        $req->bindValue(':number', $teamsPlayer->getNumber());
        $req->bindValue(':position', $teamsPlayer->getPosition());
        $req->bindValue(':yearTeam', $teamsPlayer->getYearTeam());
        try {
            $req->execute();
        } catch (Exception $e) {
            
        }
    }

    public function listAllTeams() {
        return $this->teamsManager->listAll();
    }

    public function listAllPlayers() {
        return $this->playerManager->listAllPlayers();
    }

    public function listAll() {
        $req = $this->_db->prepare("SELECT t.*, p.name, p.firstname, te.label FROM `teamsplayers` t, players p , teams te WHERE t.idplayer = p.idplayer and t.idteam=te.idteam order by idTeamPlayer asc");


        try {
            $req->execute();
            $teamsPlayer = $req->fetchAll(PDO::FETCH_CLASS, "TeamsPlayers");
            return $teamsPlayer;
        } catch (error $e) {
            
        }
    }

    public function get($id) {
      
        $req = $this->_db->prepare("SELECT * FROM `teamsplayers` WHERE `idTeamPlayer` = :idTeamPlayer");
        try {
            $req->bindValue(':idTeamPlayer', $id);
            $req->execute();
            $result = $req->fetchObject("TeamsPlayers");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update( $teamsPlayer) {
         
        $req = $this->_db->prepare('UPDATE `teamsplayers` SET  `idTeam`=:idTeam,`idPlayer`=:idPlayer,`number`=:number,`position`=:position,`yearTeam`=:yearTeam WHERE idTeamPlayer=:idTeamPlayer');

        $req->bindValue(':idTeamPlayer', $teamsPlayer->getIdTeamPlayer());
        $req->bindValue(':idTeam', $teamsPlayer->getIdTeam());
        $req->bindValue(':idPlayer', $teamsPlayer->getIdPlayer());
        $req->bindValue(':number', $teamsPlayer->getNumber());
        $req->bindValue(':position', $teamsPlayer->getPosition());
        $req->bindValue(':yearTeam', $teamsPlayer->getYearTeam());


        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeamsPlayer ($teamsPlayer) {
        
        $req = $this->_db->prepare("DELETE FROM `teamsplayers` WHERE idTeamplayer=:idTeamPlayer ");
        $req->bindValue(':idTeamPlayer', $teamsPlayer);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

}
