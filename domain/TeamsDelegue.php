<?php

class TeamsDelegue {

    private $idTeamDelegue;
    private $idTeam;
    private $idDelegue;
    private $mainDelegue;
    private $yearTeam;
    private $label;
    private $firstname;
    private $name;
    
    function getIdTeamDelegue() {
        return $this->idTeamDelegue;
    }

    function getIdTeam() {
        return $this->idTeam;
    }

    function getIdDelegue() {
        return $this->idDelegue;
    }

    function getMainDelegue() {
        return $this->mainDelegue;
    }

    function getYearTeam() {
        return $this->yearTeam;
    }

    function getLabel() {
        return $this->label;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getName() {
        return $this->name;
    }

    function setIdTeamDelegue($idTeamDelegue) {
        $this->idTeamDelegue = $idTeamDelegue;
    }

    function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }

    function setIdDelegue($idDelegue) {
        $this->idDelegue = $idDelegue;
    }

    function setMainDelegue($mainDelegue) {
        $this->mainDelegue = $mainDelegue;
    }

    function setYearTeam($yearTeam) {
        $this->yearTeam = $yearTeam;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setName($name) {
        $this->name = $name;
    }


}
