<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeamsCoach
 *
 * @author Brahim
 */
class TeamsCoach {

    private $idTeamCoach;
    private $idTeam;
    private $idCoach;
    private $coachLicence;
    private $mainCoach;
    private $YearTeam;
    private $label;
    private $firstname;
    private $name;
    function getIdTeamCoach() {
        return $this->idTeamCoach;
    }

    function getIdTeam() {
        return $this->idTeam;
    }

    function getIdCoach() {
        return $this->idCoach;
    }

    function getCoachLicence() {
        return $this->coachLicence;
    }

    function getMainCoach() {
        return $this->mainCoach;
    }

    function getYearTeam() {
        return $this->YearTeam;
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

    function setIdTeamCoach($idTeamCoach) {
        $this->idTeamCoach = $idTeamCoach;
    }

    function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }

    function setIdCoach($idCoach) {
        $this->idCoach = $idCoach;
    }

    function setCoachLicence($coachLicence) {
        $this->coachLicence = $coachLicence;
    }

    function setMainCoach($mainCoach) {
        $this->mainCoach = $mainCoach;
    }

    function setYearTeam($YearTeam) {
        $this->YearTeam = $YearTeam;
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
