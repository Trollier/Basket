<?php

class TeamsManager {

    private $_db;
    private $playerManager;

    public function __construct($playerManager) {
        $this->playerManager = $playerManager;
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function getGodfatherById($idGodfather) {

        return $this->playerManager->get($idGodfather);
    }

    public function create(Teams $team) {
        $req = $this->_db->prepare("SELECT max( idTeam ) FROM `teams` ");
        $req->execute();
        $idTeam = $req->fetch();
        $idTeam[0] = $idTeam[0] + 1;

        $req = $this->_db->prepare('INSERT INTO `teams`(`idTeam`, `label`, `ageMin`, `ageMax`, `godFather`, `ordre`) VALUES (:idTeam,:label,:ageMin,:ageMax,:godFather,:ordre)');
        $req->bindValue(':idTeam', $idTeam[0]);
        $req->bindValue(':label', $team->getLabel());
        $req->bindValue(':ageMin', $team->getAgeMin());
        $req->bindValue(':ageMax', $team->getAgeMax());
        $req->bindValue(':godFather', $team->getGodFather());
        $req->bindValue(':ordre', $team->getOrdre());

        try {
            $req->execute();
        } catch (Exception $e) {
            
        }
    }

    public function listAllPlayer() {
        return $this->playerManager->listAllPlayers();
    }

    public function listAll() {
        $reqSelectAllTeams = $this->_db->prepare("select idTeam, label, ageMin, ageMax, godFather, ordre, active from teams order by idTeam asc");
        $reqSelectAllPlayersWithATeam = $this->_db->prepare("select name, firstname, teams.godFather from players,teams where players.idPlayer = teams.godFather order by idTeam asc");

        try {
            $reqSelectAllTeams->execute();
            $teams = $reqSelectAllTeams->fetchAll(PDO::FETCH_CLASS, "Teams");
            $reqSelectAllPlayersWithATeam->execute();

            $teamPlayers = $reqSelectAllPlayersWithATeam->fetchAll(PDO::FETCH_CLASS, "Teams");

            foreach ($teams as $team) {

                foreach ($teamPlayers as $teamPlayer) {

                    if ($teamPlayer->getGodFather() === $team->getGodFather()) {
                        $team->setFirstname($teamPlayer->getFirstname());
                        $team->setName($teamPlayer->getName());
                    }
                }
            }

            return $teams;
        } catch (error $e) {
            var_dump($e);
            die();
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `teams`  where idTeam=:idTeam");
        try {
            $req->bindValue(':idTeam', $id);
            $req->execute();

            $result = $req->fetchObject("Teams");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function update(Teams $team) {
        
        $req = $this->_db->prepare('UPDATE `teams` SET `label`=:label,`ageMin`=:ageMin,`ageMax`=:ageMax,`godFather`=:godFather,`ordre`=:ordre,`active`=:active where `idTeam`=:idTeam');
        $req->bindValue(':idTeam', $team->getIdTeam());
        $req->bindValue(':label', $team->getLabel());
        $req->bindValue(':ageMin', $team->getAgeMin());
        $req->bindValue(':ageMax', $team->getAgeMax());
        $req->bindValue(':godFather', $team->getGodFather());
        $req->bindValue(':ordre', $team->getOrdre());
        $req->bindValue(':active', $team->getActive());

        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function deleteTeam($idTeam) {
        $req = $this->_db->prepare("DELETE FROM `teams` WHERE idTeam=:idTeam ");
        $req->bindValue(':idTeam', $idTeam);
        try {
            $req->execute();
        } catch (error $e) {
            
        }
    }

    public function isEnable($idTeam) {
        $req = $this->_db->prepare("SELECT active FROM `teams` WHERE  idTeam=:idTeam  ");
        $req->bindValue(':idTeam', $idTeam);

        try {
            $req->execute();
            $result = $req->fetchObject("Teams");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

}
