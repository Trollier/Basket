<?php

class DaysOfWeekManager {
    private $_db;

    public function __construct() {
        $this->_db = ConnectionSingleton::getPDO();
    }

    public function createDaysOfWeek( $daysOfWeek) {

        $req = $this->_db->prepare('INSERT INTO `daysofweek`(`idDay`, `Label`) VALUES (:idDay,:Label)');
        $req->bindValue(':idDay', $daysOfWeek->getIdDay());
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
}
