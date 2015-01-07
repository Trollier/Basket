<?php

class DaysOfWeekManager {

    private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function createDaysOfWeek($daysOfWeek) {
        $req = $this->_db->prepare("SELECT max( idDay ) FROM `daysofweek` ");
        $req->execute();
        $idDay = $req->fetch();
        $idDay[0] = $idDay[0] + 1;
        $req = $this->_db->prepare('INSERT INTO `daysofweek`(`idDay`, `Label`) VALUES (:idDay,:Label)');
        $req->bindValue(':idDay', $idDay[0]);
        $req->bindValue(':Label', $daysOfWeek->getLabel());

        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function listAllDaysOfWeek() {
        $req = $this->_db->prepare("SELECT * FROM `daysofweek` order by idDay asc ");
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, "DaysOfWeek");
            return $result;
        } catch (error $e) {
            return $e;
        }
    }

    public function get($id) {
        $req = $this->_db->prepare("SELECT * FROM `daysofweek` where idDay=:idDay");
        try {
            $req->bindValue(':idDay', $id);
            $req->execute();

            $result = $req->fetchObject("DaysOfWeek");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    public function deleteDaysOfWeek($daysOfWeek) {
        $req = $this->_db->prepare("DELETE FROM `daysofweek` WHERE idDay=:idDay ");
        $req->bindValue(':idDay', $daysOfWeek);
        try {
            $req->execute();
        } catch (error $e) {
            return $e;
        }
    }

    public function getByMail(DaysOfWeek $day) {
        
        $req = $this->_db->prepare("SELECT * FROM `daysofweek`  where  Label=:label  ");
        try {
            $req->bindValue(':label', $day->getLabel());
            $req->execute();

            $result = $req->fetchObject("DaysOfWeek");
            return $result;
        } catch (Exception $ex) {
            
        }
    }

}
