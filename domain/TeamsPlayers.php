<?php

class TeamsPlayers {

    private $idTeamPlayer;
    private $idTeam;
    private $idPlayer;
    private $number;
    private $position;
    private $yearTeam;
    private $name;
    private $firstname;
    private $label;
    
    function getIdTeamPlayer() {
        return $this->idTeamPlayer;
    }

    function getIdTeam() {
        return $this->idTeam;
    }

    function getIdPlayer() {
        return $this->idPlayer;
    }

    function getNumber() {
        return $this->number;
    }

    function getPosition() {
        return $this->position;
    }

    function getYearTeam() {
        return $this->yearTeam;
    }

    function getName() {
        return $this->name;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLabel() {
        return $this->label;
    }

    function setIdTeamPlayer($idTeamPlayer) {
        $this->idTeamPlayer = $idTeamPlayer;
    }

    function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }

    function setIdPlayer($idPlayer) {
        $this->idPlayer = $idPlayer;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function setYearTeam($yearTeam) {
        $this->yearTeam = $yearTeam;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLabel($label) {
        $this->label = $label;
    }


}
