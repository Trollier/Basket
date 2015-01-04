<?php

class TeamsGames {

    private $idTeamGame;
    private $idTeam;
    private $currentYear;
    private $gameDay;
    private $gameTime;
    private $labelDay;
    private $label;

    
    function getIdTeamGame() {
        return $this->idTeamGame;
    }

    function getIdTeam() {
        return $this->idTeam;
    }

    function getCurrentYear() {
        return $this->currentYear;
    }

    function getGameDay() {
        return $this->gameDay;
    }

    function getGameTime() {
        return $this->gameTime;
    }

    function getLabelDay() {
        return $this->labelDay;
    }

    function getLabel() {
        return $this->label;
    }

    function setIdTeamGame($idTeamGame) {
        $this->idTeamGame = $idTeamGame;
    }

    function setIdTeam($idTeam) {
        $this->idTeam = $idTeam;
    }

    function setCurrentYear($currentYear) {
        $this->currentYear = $currentYear;
    }

    function setGameDay($gameDay) {
        $this->gameDay = $gameDay;
    }

    function setGameTime($gameTime) {
        $this->gameTime = $gameTime;
    }

    function setLabelDay($labelDay) {
        $this->labelDay = $labelDay;
    }

    function setLabel($label) {
        $this->label = $label;
    }


}
